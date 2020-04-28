<?php

namespace App\Http\Controllers;

use App\Cerveza;
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
        //
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
        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = (DB::table('cervezas')->select('estilo')
                    ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();

        $productos = Cerveza::where('estilo', $estilo)->get()->all();
        
        return view('layouts_tienda.tienda', compact('productos', 'estilos'));
    }
}
