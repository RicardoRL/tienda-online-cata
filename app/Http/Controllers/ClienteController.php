<?php

namespace App\Http\Controllers;

use Cart;
use App\Cliente;
use App\Cerveza;
use App\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('confirm_email');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cervezas = Cerveza::inRandomOrder()->take(10)->get();
        $cervezas = $cervezas->all();

        return view('layouts.content', compact('cervezas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts_cliente.clienteAcceso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('layouts_cliente.clienteInfo'); //["cliente" => $cliente]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apepat' => 'required|string|max:50',
            'apemat' => 'required|string|max:50',
            'fecnac' => 'required|date',
            'telefono' => 'required|string|min:10'
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->apepat = $request->apepat;
        $cliente->apemat = $request->apemat;
        $cliente->fecnac = $request->fecnac;
        $cliente->telefono = $request->telefono;

        $cliente->save();

        return redirect()->route('cliente.show', [$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function passwd()
    {
        return view('layouts_cliente.clientePassword');
    }

    public function checkout_dom()
    {
      $cliente_id = \Auth::user()->id;
      $domicilio_array = DB::table('domicilios')->where('cliente_id', $cliente_id)->get();
      $domicilio = new Domicilio();

      if(!empty($domicilio_array->all()))
      {
        $domicilio_array = DB::table('domicilios')->where('cliente_id', $cliente_id)->get()->toArray()[0];

        $domicilio->id = $domicilio_array->id;
        $domicilio->cliente_id = $domicilio_array->cliente_id;
        $domicilio->codigo_postal = $domicilio_array->codigo_postal;
        $domicilio->estado = $domicilio_array->estado;
        $domicilio->ciudad = $domicilio_array->ciudad;
        $domicilio->colonia = $domicilio_array->colonia;
        $domicilio->calle_principal = $domicilio_array->calle_principal;
        $domicilio->num_ext = $domicilio_array->num_ext;
        $domicilio->num_int = $domicilio_array->num_int;
        $domicilio->calle1 = $domicilio_array->calle1;
        $domicilio->calle2 = $domicilio_array->calle2;
        $domicilio->referencia = $domicilio_array->referencia;
      }

      return view('layouts.checkout', compact('domicilio'));
    }

    public function checkout_env(Request $request)
    {
      return view('layouts.checkout');
    }

    public function checkout_pag(Request $request)
    {
      if($request->envio == NULL)
      {
        return redirect()->back()->with('error_message', 'Debes seleccionar un método de envío');
      }

      $conditions = Cart::getConditions();
      $exite_condicion = false;

      foreach($conditions as $condition)
      {
        if($condition->getType() == 'shipping')
        {
          if($condition->getAttributes()['tipo'] == $request->envio)
          {
            $exite_condicion = true;
          }
          else{
            Cart::removeCartCondition($condition->getAttributes()['tipo']);
          }
        }
      }

      if($exite_condicion == false)
      {
        $envio = null;
        if($request->envio == 'normal')
        {
          $costo = 116; //100 de envío mas 16% de IVA
          $envio = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'envio',
            'type' => 'shipping',
            'target' => 'total',
            'value' => '+'.$costo,
            'attributes' => array(
              'format' => '$'.$costo.'.00',
              'tipo' => 'normal'
            )
          ));
        }
        else if($request->envio == 'expres')
        {
          $costo = 174; //150 de envío más 16% de IVA
          $envio = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'envio',
            'type' => 'shipping',
            'target' => 'total',
            'value' => '+'.$costo,
            'attributes' => array(
              'format' => '$'.$costo.'.00',
              'tipo' => 'expres'
            )
          )); 
        }

        if(!empty($envio)){
          Cart::condition($envio);
        }
      }

      return view('layouts.checkout');
    }

    public function checkout_rev(Request $request)
    {
      if($request->pago == NULL)
      {
        return redirect()->back()->with('error_message', 'Debes seleccionar un método de pago');
      }
      elseif($request->pago == "tarjeta")
      {
        $tarjeta = Cliente::find(\Auth::id())->tarjeta;

        if(empty($tarjeta))
        {
          return redirect()->back()->with('error_message', 'Debes registrar la información de una tarjeta de crédito/débito para continuar');
        }
      }
      $request->flash();
      return view('layouts.checkout');
    }

    public function changePassword(Request $request, $id)
    {
      //dd($request);
      $request->validate([
        'password' => 'required|min:6',
        'same_password' => 'required|min:6'
      ]);

      if($request->password == $request->same_password)
      {
        $cliente = Cliente::find($id);

        $cliente->password = \Hash::make($request->password);
        $cliente->save();
        return redirect()->back()->with('success_message', 'Tu contraseña ha sido cambiada');
      }

      return redirect()->back()->with('error_message', 'Has escrito mal tu contraseña');
    }
}
