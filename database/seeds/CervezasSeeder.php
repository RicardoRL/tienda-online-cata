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
                'nombre' => $datos[0],
                'estilo' => $datos[1],
                'aspecto' => $datos[2],
                'sabor_aroma' => $datos[3],
                'alcohol' => $datos[4],
                'temp_consumo' => $datos[5],
                'maridaje' => $datos[6],
                'presentacion' => $datos[7],
                'precio' => $datos[8],
                'cantidad' => $datos[9],
            ]);
        }
        fclose($prueba);
    }
}
