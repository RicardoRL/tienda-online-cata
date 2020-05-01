<?php

namespace App\Http\Controllers;

use App\Cerveceria;
use App\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CerveceriaController extends Controller
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
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function show(Cerveceria $cerveceria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function edit(Cerveceria $cerveceria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cerveceria $cerveceria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cerveceria $cerveceria)
    {
        //
    }

    public function cervezas()
    {
        $id = $_GET['id'];

        $productos = Cerveza::whereHas('cerveceria', function($query) use ($id){
            $query->where('id', $id);
        })->get();

        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = (DB::table('cervezas')->select('estilo')
                    ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();

        return view('layouts_tienda.tienda', compact('productos', 'estilos'));
    }
}
