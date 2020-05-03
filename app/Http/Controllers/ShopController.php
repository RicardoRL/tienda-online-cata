<?php

namespace App\Http\Controllers;

use App\Cerveza;
use App\Cerveceria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = getEstilos();
        
        //Crear paginador personalizado
        $productos = Cerveza::all();
        $set = paginator($request, $productos);

        //Obtener los productos como array
        $productos = $set['paginator']->all();

        return view('layouts_tienda.tienda', compact('estilos', 'productos', 'set'));
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
      $estilos = getEstilos();

      $cerveza = Cerveza::where('id', $id)->firstOrFail();

      return view('layouts_tienda.producto', compact('cerveza', 'estilos'));
    }

    public function update(Request $request, $id)
    {

    }

    public function porCerveceria()
    {
      $id = $_GET['id'];

      $productos = Cerveza::whereHas('cerveceria', function($query) use ($id){
        $query->where('id', $id);
      })->get();

      $estilos = getEstilos();

      return view('layouts_tienda.tienda', compact('productos', 'estilos'));
    }

    public function porEstilo($estilo)
    {
      $estilos = getEstilos();

      $productos = Cerveza::where('estilo', $estilo)->get()->all();
        
      return view('layouts_tienda.tienda', compact('productos', 'estilos'));
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
}
