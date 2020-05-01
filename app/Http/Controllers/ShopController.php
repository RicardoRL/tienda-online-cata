<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Cerveza;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd((int)$request->input("page"));
        //Mostrar los estilos de cervezas en el sidebar menu izquierdo
        $estilos = (DB::table('cervezas')->select('estilo')
                    ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();
        
        //Crear paginador personalizado
        $productos = Cerveza::all();
        $array = $productos->toArray();
        $total = count($productos);
        $per_page = 12;
        $current_page = $request->input("page") ?? 1;
        $starting_point = ($current_page * $per_page) - $per_page;
        $array = array_slice($array, $starting_point, $per_page, true);
        $array = new Paginator($array, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        //dd($array);
        //dd(array_key_last($array->all()));
        //Fin paginador
        //Obtener los productos como array
        $productos = $array->all();
        
        //Variables adicionales para personalizar paginación
        //dd((int)$request->input("block"));
        $block = $request->input("block") ?? 1;
        $limit = 5;
        $max_per_block = ($block < $limit) ? ($limit * $block) : (($array->lastPage() - $current_page) + 1);
        $endFor = ($block < $limit) ? $max_per_block : $array->lastPage();
        if($block == 1){
            $initFor = 1;
        }
        elseif($block < $limit){
            $initFor = ($max_per_block -$limit) + 1;
        }
        else{
            $initFor = ($array->lastPage() - $max_per_block) + 1;
        }

        $set = array(
            "paginator" => $array, 
            "limit" => $limit,
            "block" => $block,
            "max_per_block" => $max_per_block, 
            "start" => $initFor,
            "end" => $endFor
        );
        //dd($set);

        //dd($array);
        
        //dd($productos);
        //dd($array->lastPage());
        //dd($array->all());

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
