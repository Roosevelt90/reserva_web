<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentoTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(TipoIdentificacionTableSeeder::class);
        $this->call(ClaseTableSeeder::class);
        $this->call(CiudadTableSeeder::class);
    }

}