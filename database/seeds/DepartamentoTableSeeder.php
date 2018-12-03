<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            [
                'id' => 1,
                'nombre' => "Valle del cauca"
            ],
            [
                'id' => 2,
                'nombre' => "Antioquia"
            ],
            [
                'id' => 3,
                'nombre' => "Cundimarca"
            ]
        ]);
    }

}