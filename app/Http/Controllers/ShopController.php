<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cerveza;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = (DB::table('cervezas')->select('estilo')
                    ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();
        
        //Mostrar 12 cervezas aleatoriamente (esto es temporal)
        $productos = Cerveza::inRandomOrder()->take(12)->get();
        $productos = $productos->all();

        //Obtener el total de cervezas de la base de datos para generar paginación
        $cervezas = DB::table('cervezas')->get()->all();
        $total_cervezas = count($cervezas);

        //Se obtiene el total de las páginas en relación a las cervezas que hay, 12 cerv/pag
        $total_paginas = round(($total_cervezas/12), 0, PHP_ROUND_HALF_DOWN);
        $paginas = array();

        for($i = 1; $i <= $total_paginas; $i++)
        {
            $paginas[] = $i;
        }
        $limite = 5;
        $inicio = 1;
        //$productos = (DB::table('cervezas')->orderBy('nombre', 'ASC')->get())->all();

        return view('layouts_tienda.tienda', compact('estilos', 'productos', 'paginas', 'limite', 'inicio'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = (DB::table('cervezas')->select('estilo')
                    ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();

        $cerveza = Cerveza::where('id', $id)->firstOrFail();

        return view('layouts_tienda.producto', compact('cerveza', 'estilos'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function paginacion(int $paginas)
    {
        dd($paginas);
    }
}
