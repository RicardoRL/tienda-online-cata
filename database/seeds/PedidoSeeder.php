<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $file=fopen("public/pedidos.txt","r") or die ("Error al abrir el archivo");
      rewind($file);

      while(($datos = fgetcsv($file,1000,"|")) !== FALSE)
      {
        DB::table('pedidos')->insert([
          'cliente_id' => $datos[0],
          'fecha' => $datos[1],
          'estado' => $datos[2],
          'metodo_envio' => $datos[3],
          'metodo_pago' => $datos[4],
          'cantidad' => $datos[5],
          'subtotal' => $datos[6],
          'total' => $datos[7],
        ]);
      }
      fclose($file);
    }
}
