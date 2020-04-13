<?php

namespace App\Http\Controllers;

use App\Tarjeta;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarjetaController extends Controller
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
        //return view('layouts_cliente.clienteTarjeta');
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
        $request->validate([
            'tipo' => 'required|string|max:20',
            'num_tarjeta' => 'required|string|digits:16',
            'banco' => 'required|string|max:50',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fecha_exp' => 'required|string|size:5',
            'codigo' => 'required|string|digits:3'
        ]);

        $tarjeta = new Tarjeta();

        $tarjeta->cliente_id = \Auth::user()->id;
        $tarjeta->tipo = $request->tipo;
        $tarjeta->num_tarjeta = $request->num_tarjeta;
        $tarjeta->banco = $request->banco;
        $tarjeta->nombre = $request->nombre;
        $tarjeta->apellido = $request->apellido;
        $tarjeta->fecha_exp = $request->fecha_exp;
        $tarjeta->codigo = $request->codigo;
        
        $tarjeta->save();

        return redirect()->route('tarjeta.show', $tarjeta->cliente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show(int $cliente_id)
    {
        $tarjeta_array = DB::table('tarjetas')->where('cliente_id', $cliente_id)->get();
        $tarjeta = new Tarjeta();

        if(!empty($tarjeta_array->all()))
        {
            $tarjeta_array = DB::table('tarjetas')->where('cliente_id', $cliente_id)->get()->toArray()[0];

            $tarjeta->id = $tarjeta_array->id;
            $tarjeta->cliente_id = $tarjeta_array->cliente_id;
            $tarjeta->tipo = $tarjeta_array->tipo;
            $tarjeta->num_tarjeta = $tarjeta_array->num_tarjeta;
            $tarjeta->banco = $tarjeta_array->banco;
            $tarjeta->nombre = $tarjeta_array->nombre;
            $tarjeta->apellido = $tarjeta_array->apellido;
            $tarjeta->fecha_exp = $tarjeta_array->fecha_exp;
            $tarjeta->codigo = $tarjeta_array->codigo;
        }

        return view('layouts_cliente.clienteTarjeta', compact('tarjeta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarjeta $tarjetum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarjeta $tarjetum)
    {
        $request->validate([
            'tipo' => 'required|string|max:20',
            'num_tarjeta' => 'required|string|digits:16',
            'banco' => 'required|string|max:50',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fecha_exp' => 'required|string|size:5',
            'codigo' => 'required|string|digits:3'
        ]);

        $tarjetum->tipo = $request->tipo;
        $tarjetum->num_tarjeta = $request->num_tarjeta;
        $tarjetum->banco = $request->banco;
        $tarjetum->nombre = $request->nombre;
        $tarjetum->apellido = $request->apellido;
        $tarjetum->fecha_exp = $request->fecha_exp;
        $tarjetum->codigo = $request->codigo;

        $tarjetum->save();

        return redirect()->route('tarjeta.show', $tarjetum->cliente_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarjeta $tarjetum)
    {
        //
    }
}
