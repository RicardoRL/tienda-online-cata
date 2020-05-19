<?php

namespace App\Http\Controllers;

use App\Cerveza;
use App\Cerveceria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CervezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        return view('layouts_cervezas.cervezasCreate',compact('cervecerias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cerveceria_id' => 'required',
            'nombre' => 'required|min:10',
            'estilo' => 'required|min:10',
            'aspecto' => 'required|min:10',
            'sabor_aroma' => 'required|min:10',
            'alcohol' => 'required',
            'temp_consumo' => 'required',
            'maridaje' => 'required|min:10',
            'presentacion' => 'required|min:10',
            'precio' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
        ]);

      /*  $subcadena = "";
        $contador = 0;
        foreach($cadena as $char){
        $subcadena.=$char;
            
                if($char == '/' ){
                $contador++;
                }

                if($contador == 5){
                break;
                }
            
            }
*/
        $entrada=$request->all();
            
        if($request->hasFile('imagen'))
        {
            //$cervecerias = DB::table('cerveceria')->get();
            $tipo = $request->nombre;
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/img/imagenes_Cervezas/'.$request->tipo.'/minerva', $nombre);
            $entrada['imagen'] = $nombre;
        }

        Cerveza::Create($entrada);

        return redirect()->route('editor.index')
                ->with([
                    'cervezaCreate' => 'Se ha agregado una nueva cerveza con exito',
                    'clase-alerta' => 'alert-success',
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function show(Cerveza $cerveza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function edit(Cerveza $cerveza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cerveza $cerveza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cerveza $cerveza)
    {
        //
    }

    public function estilos($estilo)
    {
    }
}
