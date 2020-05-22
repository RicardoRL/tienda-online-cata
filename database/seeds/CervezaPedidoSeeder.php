<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CervezaPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $file=fopen("public/cerveza_pedido.txt","r") or die ("Error al abrir el archivo");
      rewind($file);

      while(($datos = fgetcsv($file,1000,"|")) !== FALSE)
      {
        DB::table('cerveza_pedido')->insert([
          'cerveza_id' => $datos[0],
          'pedido_id' => $datos[1],
          'cantidad' => $datos[2],
        ]);
      }
      fclose($file);
    }
}
