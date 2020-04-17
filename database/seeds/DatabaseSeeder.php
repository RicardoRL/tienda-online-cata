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
        // $this->call(UserSeeder::class);
        $this->truncatetables ([
            'cervecerias',
            'users',
            'cervezas'
        ]);

        $this->call(CerveceriasSeeder::class);
        $this->call(UsersSeeder::class);
        //$this->call(ClientesSeeder::class);
        $this->call(CervezasSeeder::class);
    }

    protected function truncatetables(array $tables) // Tablas de areglo que queremos vaciar
    {
        foreach ($tables as $table) {
           DB::table($table)->truncate();
        }
    }
    
}
