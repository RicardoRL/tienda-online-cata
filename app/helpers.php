<?php

use App\Cerveceria;
use APP\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function mostrarCerveceriasMenu()
{
    //Función para mostrar las cervecerías disponibles en el menú inicial
    //Al ser una sola función, no es necesario crear un controlador.
    $cervecerias = (DB::table('cervecerias')->orderBy('nombre', 'ASC')->get())->all();

    $total = count($cervecerias);

    $grupo1 = array();
    $grupo2 = array();
    $grupo3 = array();
    $grupo4 = array();

    for($i = 0; $i < $total; $i++)
    {
        $nombreCerveceria = $cervecerias[$i]->nombre;

        if($nombreCerveceria[0] >= 'A' && $nombreCerveceria[0] <= 'G')
        {
            $grupo1[] = $nombreCerveceria;
        }
        else if($nombreCerveceria[0] >= 'H' && $nombreCerveceria[0] <= 'N')
        {
            $grupo2[] = $nombreCerveceria;
        }
        else if($nombreCerveceria[0] >= 'O' && $nombreCerveceria[0] <= 'T')
        {
            $grupo3[] = $nombreCerveceria;
        }
        else if($nombreCerveceria[0] >= 'U' && $nombreCerveceria[0] <= 'Z')
        {
            $grupo4[] = $nombreCerveceria;
        }
    }

    return array($grupo1, $grupo2, $grupo3, $grupo4);
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