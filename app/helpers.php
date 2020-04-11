<?php

use App\Cerveceria;
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

?>