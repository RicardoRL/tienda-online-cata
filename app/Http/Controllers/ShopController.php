<?php

namespace App\Http\Controllers;

use App\Pedido;
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

        $cervecerias = getCervecerias();
        //dd($cervecerias);
        
        //Crear paginador personalizado
        $productos = Cerveza::all();
        $set = paginator($request, $productos);

        //Obtener los productos como array
        $productos = $set['paginator']->all();

        return view('layouts_tienda.tienda', compact('estilos', 'productos', 'set', 'cervecerias'));
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

      $cervecerias = getCervecerias();

      $cerveza = Cerveza::where('id', $id)->firstOrFail();

      return view('layouts_tienda.producto', compact('cerveza', 'estilos', 'cervecerias'));
    }

    public function porCerveceria(Request $request)
    {
      $id = (int)$request->input('id');

      $productos = Cerveza::whereHas('cerveceria', function($query) use ($id){
        $query->where('id', $id);
      })->get();

      $estilos = getEstilos();

      $cervecerias = getCervecerias();

      $set = paginator($request, $productos);

      return view('layouts_tienda.tienda', compact('productos', 'estilos', 'set', 'cervecerias'));
    }

    public function porEstilo(Request $request, $estilo)
    {
      $estilos = getEstilos();

      $cervecerias = getCervecerias();

      $productos = Cerveza::where('estilo', $estilo)->get()->all();

      $set = paginator($request, $productos);
        
      return view('layouts_tienda.tienda', compact('productos', 'estilos', 'set', 'cervecerias'));
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
