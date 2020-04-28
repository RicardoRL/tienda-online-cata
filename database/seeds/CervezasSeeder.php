<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CervezasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prueba=fopen("public/cervezas.txt","r") or die ("Error al abrir el archivo");

        while(($datos = fgetcsv($prueba,1000,"|")) !== FALSE)
        {
            DB::table('cervezas')->insert([
                'cerveceria_id' => $datos[0],
                'nombre' => $datos[1],
                'estilo' => $datos[2],
                'aspecto' => $datos[3],
                'sabor_aroma' => $datos[4],
                'alcohol' => $datos[5],
                'temp_consumo' => $datos[6],
                'maridaje' => $datos[7],
                'presentacion' => $datos[8],
                'precio' => $datos[9],
                'cantidad' => $datos[10],
                'imagen' => $datos[11],
            ]);
        }
        fclose($prueba);
    }
}
