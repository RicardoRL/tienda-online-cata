<?php

use App\Cerveceria;
use APP\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function mostrarCerveceriasMenu()
{
    //Función para mostrar las cervecerías disponibles en el menú inicial
    //Al ser una sola función, no es necesario crear un controlador.

    //$cervecerias = (DB::table('cervecerias')->orderBy('nombre', 'ASC')->get())->all();

    $cervecerias = Cerveceria::orderBy('nombre', 'ASC')->get();
    //dd($cervecerias);

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
        )
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
    
    //dd($conjuntos);

    return array($conjuntos);
}

function mostrarEstilosMenu()
{
    //Función para mostrar los estilos en el menú

    $cervezas = (DB::table('cervezas')->select('estilo')
                ->groupBy('estilo')->orderBy('estilo', 'ASC')->get())->all();

    $total = count($cervezas);

    $estilos1 = array();
    $estilos2 = array();
    $estilos3 = array();
    $estilos4 = array();

    for($i = 0; $i < $total; $i++)
    {
        $estilo = $cervezas[$i]->estilo;

        if($i >= 0 && $i <= 30)
        {
            $estilos1[] = $estilo;
        }
        else if($i >= 31 && $i <=60)
        {
            $estilos2[] = $estilo;
        }
        else if($i >= 61 && $i <= 90)
        {
            $estilos3[] = $estilo;
        }
        else if($i >= 91 && $i <= 120)
        {
            $estilos4[] = $estilo;
        }
    }

    return array($estilos1, $estilos2, $estilos3, $estilos4);
}

?>