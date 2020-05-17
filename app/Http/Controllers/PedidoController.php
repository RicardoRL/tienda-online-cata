<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Cliente;
use App\Cerveza;
use App\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function crearPedido(Request $request)
  {
    //dd($request);
    /*$request->validate([
      'envio' => 'required|string|max:50',
      'pago' => 'required|string|max:50',
    ]);*/

    $pedido = new Pedido();
    $fecha = date('Y-m-d');
    
    //Se crea y guarda el pedido en la BD
    $pedido->cliente_id = \Auth::user()->id;
    $pedido->fecha = $fecha;
    $pedido->estado = "pedido hecho";
    $pedido->metodo_envio = $request->old('envio');
    $pedido->metodo_pago = $request->old('pago');
    $pedido->cantidad = \Cart::getTotalQuantity();
    $pedido->subtotal = floatval(str_replace(",", "", \Cart::getSubtotal()));
    $pedido->total = floatval(str_replace(",", "", \Cart::getTotal()));
    $pedido->save();
    
    //Se obtiene el id del último pedido que acaba de insertarse en la BD
    $pedido_id = DB::table('pedidos')->latest('created_at')->first()->id;
    
    //Se obtiene el modelo de Pedido de acuerdo al id
    $pedido = Pedido::find($pedido_id);
    
    //Por cada cerveza del carrito se asigna cerveza_id al pedido obtenido arriba
    foreach(\Cart::getContent() as $item)
    {
      $pedido->cervezas()->attach($item->model->id, ['cantidad' => $item->quantity]); //$item->model->id es cerveza_id
    }

    //Se vacía el carrito y se eliminan las condiciones por si se desea hacer otro pedido
    \Cart::clear();
    \Cart::clearCartConditions();

    return redirect()->route('pedido.showOrders');
  }

  public function showOrders()
  {
    $pedidos = Pedido::where('cliente_id', \Auth::user()->id)->get()->all();
    return view('layouts_cliente.clientePedidos', compact('pedidos'));
  }

  public function showOneOrder(Cliente $cliente, Pedido $pedido)
  {
    //dd($pedido);
    //Obtener el domicilio del cliente
    $domicilio = Domicilio::where('cliente_id', $cliente->id)->first();

    //Array de las cervezas correspondientes del pedido
    $cervezas = array(
      "modelo" => NULL,
      "cantidad" => NULL
    );

    //Se agrega en el arreglo el modelo de cerveza pedido, con su cantidad
    foreach($pedido->cervezas as $cerveza)
    {
      $cervezas["modelo"][] = Cerveza::where('id', $cerveza->pivot->cerveza_id)->first();
      $cervezas["cantidad"][] = $cerveza->pivot->cantidad;
    }

    $size = count($cervezas['modelo']);

    return view('layouts_cliente.clientePedidoIndividual', compact('pedido', 'domicilio', 'cervezas', 'size'));
  }
}
