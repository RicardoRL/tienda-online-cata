<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //dd($this);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.content');
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
        //dd($cliente);
        $cliente_id = $cliente->id;
        return view('layouts_cliente.clienteInfo', ["cliente" => $cliente]);
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
        /*
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:50'],
            'apepat' => ['required', 'string', 'max:50'],
            'apemat' => ['required', 'string', 'max:50'],
            'fecnac' => ['required', 'date'],
            'correo' => ['required', 'string', 'email', 'max:100', 'unique:clientes'],
            'password' => ['required', 'string', 'min:8'],
            'telefono' => ['required', 'string', 'min:10'],
        ]);
        */
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
        //dd($cliente_id);
        //$cliente_id = $cliente->id;
        return view('layouts_cliente.clientePassword');
    }

    public function compra()
    {
        return view('layouts_cliente.clienteCompra');
    }
}
