<?php

namespace App\Http\Controllers;

use App\Cerveza;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartConditions = Cart::getConditions();
        if($cartConditions->isEmpty()){
            $impuesto = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'IVA',
                'type' => 'tax',
                'target' => 'total',
                'value' => '16%'
            ));
    
            /*$envio = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'envio',
                'type' => 'shipping',
                'target' => 'total',
                'value' => '+150',
                'attributes' => array(
                    'format' => '$150.00'
                )
            ));*/
            Cart::condition($impuesto);
            //Cart::condition($envio);
        }

        return view('layouts_cliente.clienteCompra');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicados = Cart::search(function($cartItem, $id) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicados->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('success_message', "Ya has agregado este producto antes");
        }

        $cerveza = new Cerveza();
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $cerveza
        ));
        //dd(Cart::getContent());

        return redirect()->route('cart.index')->with('success_message', 'El producto fue agregado al carro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        session()->flash('success_message', 'La cantidad ha sido actualizada');
        return response()->json(["mensaje_exito" => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Cart::remove($id);

        return back()->with('success_message', 'El producto ha sido removido');
    }
}
