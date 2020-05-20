<?php

use App\Cerveceria;
use APP\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

function getEstilos()
{
  $estilos = (DB::table('cervezas')->select('estilo')
              ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();
  
  return $estilos;
}

function getCervecerias()
{
  $cervecerias = DB::table('cervecerias')->select('id', 'nombre')->orderBy('nombre')->get();

  return $cervecerias;
}

function cervecerias()
{
  //Función para mostrar las cervecerías disponibles en el menú inicial
  //Al ser una sola función, no es necesario crear un controlador.

  $cervecerias = Cerveceria::orderBy('nombre', 'ASC')->get();

  $total = count($cervecerias);

  $conjuntos = array(
    "grupo1" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "grupo2" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "grupo3" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "grupo4" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "todos" => $cervecerias
  );

  for($i = 0; $i < $total; $i++)
  {
    $nombreCerveceria = $cervecerias[$i]->nombre;

    if($nombreCerveceria[0] >= 'A' && $nombreCerveceria[0] <= 'G')
    {
      $conjuntos["grupo1"]["conjunto"][] = $cervecerias[$i];
    }
    else if($nombreCerveceria[0] >= 'H' && $nombreCerveceria[0] <= 'N')
    {
      $conjuntos["grupo2"]["conjunto"][] = $cervecerias[$i];
    }
    else if($nombreCerveceria[0] >= 'O' && $nombreCerveceria[0] <= 'T')
    {
      $conjuntos["grupo3"]["conjunto"][] = $cervecerias[$i];
    }
    else if($nombreCerveceria[0] >= 'U' && $nombreCerveceria[0] <= 'Z')
    {
      $conjuntos["grupo4"]["conjunto"][] = $cervecerias[$i];
    }
  }

  $conjuntos["grupo1"]["cantidad"] = count($conjuntos["grupo1"]["conjunto"]);
  $conjuntos["grupo2"]["cantidad"] = count($conjuntos["grupo2"]["conjunto"]);
  $conjuntos["grupo3"]["cantidad"] = count($conjuntos["grupo3"]["conjunto"]);
  $conjuntos["grupo4"]["cantidad"] = count($conjuntos["grupo4"]["conjunto"]);

  //dd($conjuntos['grupo1']['conjunto'][1]->id);

  return $conjuntos;
}

function estilos_cerveza()
{
  //Función para mostrar los estilos en el menú
  $cervezas = getEstilos();

  $total = count($cervezas);

  $conjuntos = array(
    "estilos1" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "estilos2" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "estilos3" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "estilos4" => array(
      "cantidad" => 0,
      "conjunto" => array()
    ),
    "todos" => $cervezas
  );

  for($i = 0; $i < $total; $i++)
  {
    $estilo = $cervezas[$i]->estilo;

    if($i >= 0 && $i <= 30)
    {
      $conjuntos["estilos1"]["conjunto"][] = $estilo;
    }
    else if($i >= 31 && $i <=60)
    {
      $conjuntos["estilos2"]["conjunto"][] = $estilo;
    }
    else if($i >= 61 && $i <= 90)
    {
      $conjuntos["estilos3"]["conjunto"][] = $estilo;
    }
    else if($i >= 91 && $i <= 120)
    {
      $conjuntos["estilos4"]["conjunto"][] = $estilo;
    }
  }

  $conjuntos["estilos1"]["cantidad"] = count($conjuntos["estilos1"]["conjunto"]);
  $conjuntos["estilos2"]["cantidad"] = count($conjuntos["estilos2"]["conjunto"]);
  $conjuntos["estilos3"]["cantidad"] = count($conjuntos["estilos3"]["conjunto"]);
  $conjuntos["estilos4"]["cantidad"] = count($conjuntos["estilos4"]["conjunto"]);
  
  return $conjuntos;
}

function paginator(Request $request, $productos)
{
  $array = (is_array($productos)) ? $productos : $productos->toArray();
  $total = count($productos);
  $per_page = 24;
  $current_page = $request->input("page") ?? 1;
  $starting_point = ($current_page * $per_page) - $per_page;
  $array = array_slice($array, $starting_point, $per_page, true);
  $array = new Paginator($array, $total, $per_page, $current_page, [
      'path' => $request->url(),
      'query' => $request->query(),
  ]);

  //Variables adicionales para personalizar paginación
  $block = $request->input("block") ?? 1;
  $pages_per_block = 5;
  $limit_blocks = (int)ceil($array->lastPage()/$pages_per_block);
  $max_page_of_block = ($block < $limit_blocks) ? ($pages_per_block * $block) : (($array->lastPage() - $current_page) + 1);
  $endFor = ($block < $limit_blocks) ? $max_page_of_block : $array->lastPage();
  if($block == 1){
      $initFor = 1;
  }
  elseif($block < $limit_blocks){
      $initFor = ($max_page_of_block - $pages_per_block) + 1;
  }
  else{
      $initFor = ($array->lastPage() - $max_page_of_block) + 1;
  }

  //Arreglo con todas las variables que necesitamos para mostrar los productos en el blade
  $set = array(
      "paginator" => $array, 
      "limit_blocks" => $limit_blocks,
      "block" => $block,
      "max_page_of_block" => $max_page_of_block, 
      "start" => $initFor,
      "end" => $endFor
  );
  //dd($set);

  return $set;
}

?>