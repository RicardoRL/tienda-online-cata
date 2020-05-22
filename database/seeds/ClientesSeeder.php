<?php
use App\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clientes')->insert([
        'nombre' => 'Ricardo',
        'apepat' => 'Rodriguez',
        'apemat' => 'Lopez',
        'fecnac' => '1993-09-20',
        'correo' => 'ricardo@cliente.com',
        'password' => Hash::make('ricardo10'),
        'telefono' => '3326585777'
      ]);
      DB::table('clientes')->insert([
        'nombre' => 'Daniel',
        'apepat' => 'Ramirez',
        'apemat' => 'Villalvazo',
        'fecnac' => '1998-10-02',
        'correo' => 'daniel@cliente.com',
        'password' => Hash::make('123456789'),
        'telefono' => '3387592301'
      ]);
      factory(Cliente::class, 10)->create();
    }
}
