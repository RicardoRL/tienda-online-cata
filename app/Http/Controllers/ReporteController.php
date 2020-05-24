<?php

namespace App\Http\Controllers;

use App\Cerveza;
use App\Pedido;
use App\Editor;
use App\Reporte;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_editor.editorCrearReporte', compact('admin'));
    }

    public function view(Request $request)
    {
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();

      $reporte_nuevo = DB::table('reportes')->latest('created_at')->first();
      $reporte_id = $reporte_nuevo->id;
      $reporte_nuevo = Reporte::where('id', $reporte_nuevo->id)->first();
      $id = $reporte_nuevo->id;

      //Consulta API
      $req = Request::create('api/reporte/'.$id, 'GET');
      $res = \Route::dispatch($req);
      $datos = json_decode($res->getContent(), true);

      return view('layouts_editor.editorReporte', compact('admin', 'datos'));
    }

    public function select(Request $request, Reporte $reporte)
    {

      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();

      $id = $reporte->id;

      //Consulta API
      $req = Request::create('api/reporte/'.$id, 'GET');
      $res = \Route::dispatch($req);
      $datos = json_decode($res->getContent(), true);

      return view('layouts_editor.editorReporte', compact('admin', 'datos', 'reporte'));
    }

    public function createReport(Request $request)
    {
      $request->validate([
        'editor_id' => 'required|numeric',
        'periodo' => 'required|string',
        'fecha_inicio' => 'required|date',
      ]);

      $reporte = new Reporte();

      $reporte->editor_id = $request->editor_id;
      $reporte->periodo = $request->periodo;
      $reporte->fecha_inicio = $request->fecha_inicio;
      $reporte->save();

      return redirect()->route('reporte.view');
    }

    public function viewReports()
    {
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();

      $reportes = Reporte::all();

      return view('layouts_editor.editorListaReportes', compact('admin', 'reportes'));
    }

    public function createPdf(Request $request)
    {
      $id = $request->reporte_id;

      $reporte = Reporte::where('id', $id)->first();

      //Consulta API
      $req = Request::create('api/reporte/'.$id, 'GET');
      $res = \Route::dispatch($req);
      $datos = json_decode($res->getContent(), true);

      $pdf = PDF::loadView('partials.pdf-report', compact('datos', 'reporte'));

      return $pdf->stream('archivo.pdf');
    }

    public function getInfoReport($reporte)
    {
      //Se obtiene el reporte deseado
      $report = Reporte::where('id', $reporte)->first();

      //Se crea un string para pasarlo a la función date_interval_create_from_date_string()
      $periodo = "";
      if($report->periodo == "semanal")
      {
        $periodo = '7 days';
      }
      elseif($report->periodo == "quincenal")
      {
        $periodo = '15 days';
      }
      elseif($report->periodo == "mensual")
      {
        $periodo = '1 month';
      }

      //Se obtiene la fecha final de acuerdo a la fecha_inicio y el periodo seleccionado
      $fecha_inicio = $report->fecha_inicio;
      $fecha_final = date_create($fecha_inicio);
      date_add($fecha_final, date_interval_create_from_date_string($periodo));
      $fecha_final = date_format($fecha_final, 'Y-m-d');

      //Se procede a obtener los pedidos en el intervalo establecido
      $pedidos = Pedido::whereBetween('fecha', [$fecha_inicio, $fecha_final])->get()->all();

      //Se declaran los arrays donde se van a guardar los datos de interés para mostrar en el reporte
      $array_id = array(); // array de id's
      $array_nombre = array(); //array de nombres de cervezas
      $array_cantidad = array(); //array de cantidad por cerveza vendida
      $array_total_por_cerv = array(); //array del monto total por cerveza vendida

      $cant_total = 0;
      $suma_total = 0;
      $envios_normales = 0;
      $envios_expres = 0;
      $pagos_tarjeta = 0;
      $pagos_paypal = 0;
      $total_pedidos = 0;

      foreach($pedidos as $pedido)
      {
        foreach($pedido->cervezas as $cerveza)
        {
          $total_por_cerv = $cerveza->pivot->cantidad * $cerveza->precio;

          if(empty($array_id))
          {
            $array_id[]= $cerveza->id;
            $array_nombre[] = $cerveza->nombre;
            $array_cantidad[] = $cerveza->pivot->cantidad;
            $array_total_por_cerv[] = $total_por_cerv;
          }
          else //El array ya tiene al menos un elemento
          {
            //Se van a agregar los elementos si el id todavía no existe
            if(!in_array($cerveza->id, $array_id))
            {
              $array_id[]= $cerveza->id;
              $array_nombre[] = $cerveza->nombre;
              $array_cantidad[] = $cerveza->pivot->cantidad;
              $array_total_por_cerv[] = $total_por_cerv;
            }
            else{ 
              //Si existe el id, se actualiza la cantidad del producto en su respectivo array,
              //obteniendo el índice del array_id y pasándolo como parámetro a los arrays de cantidad y monto.
              $array_cantidad[array_search($cerveza->id, $array_id, true)] += $cerveza->pivot->cantidad;
              $array_total_por_cerv[array_search($cerveza->id, $array_id, true)] += $total_por_cerv;
            }
          }
        }

        //Se obtienen la cantidad de cervezas vendidas, el monto por las cervezas vendidas,
        //cantidad de envíos normales y exprés, y de pagos con tarjeta o paypal.
        $cant_total += $pedido->cantidad;
        $suma_total += $pedido->total;
        if($pedido->metodo_envio == 'normal')
        {
          $envios_normales++;
        }
        elseif($pedido->metodo_envio == 'expres')
        {
          $envios_expres++;
        }

        if($pedido->metodo_pago == 'tarjeta')
        {
          $pagos_tarjeta++;
        }
        elseif($pedido->metodo_pago == 'paypal')
        {
          $pagos_paypal++;
        }
      }

      //Se ordenan todos los array simultáneamente en orden ascendente
      array_multisort($array_cantidad, $array_id, $array_nombre, $array_total_por_cerv);

      //Se crea un arreglo final para devolver con todos los datos obtenidos
      $array_final =array(
        'cervezas_id' => array_reverse($array_id),
        'cervezas_nombre' => array_reverse($array_nombre),
        'cervezas_cantidad' => array_reverse($array_cantidad),
        'cervezas_monto' => array_reverse($array_total_por_cerv),
        'total_cervezas_vendidas' => $cant_total,
        'monto_vendido' => $suma_total,
        'envios_normales' => $envios_normales,
        'envios_expres' => $envios_expres,
        'pagos_tarjeta' => $pagos_tarjeta,
        'pagos_paypal' => $pagos_paypal,
        'total_cervezas' => count($array_id),
        'fecha_inicio' => $fecha_inicio,
        'fecha_final' => $fecha_final
      );
      return $array_final;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
