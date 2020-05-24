<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->truncatetables ([
        'clientes',
        'domicilios',
        'tarjetas',
        'cervecerias',
        'cervezas',
        'pedidos',
        'cerveza_pedido',
        'cantidad_minima_coupons',
        'porcentaje_coupons',
        'valor_fijo_coupons',
        'coupons',
        'editors',
        'eventos',
        'reportes'
      ]);
        
      $this->call(ClientesSeeder::class);
      $this->call(DomicilioSeeder::class);
      $this->call(TarjetaSeeder::class);
      $this->call(CerveceriasSeeder::class);
      $this->call(CervezasSeeder::class);
      $this->call(PedidoSeeder::class);
      $this->call(CervezaPedidoSeeder::class);
      $this->call(CantidadMinimaCuponSeeder::class);
      $this->call(PorcentajeCuponSeeder::class);
      $this->call(ValorFijoCuponSeeder::class);
      $this->call(CuponSeeder::class);
      $this->call(EditorSeeder::class);
      $this->call(EventoSeeder::class);
      $this->call(ReporteSeeder::class);
    }

    protected function truncatetables(array $tables) // Tablas de areglo que queremos vaciar
    {
        foreach ($tables as $table) {
           DB::table($table)->truncate();
        }
    }
    
}
