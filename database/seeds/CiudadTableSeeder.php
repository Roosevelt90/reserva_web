<?php

use Illuminate\Database\Seeder;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudad')->insert([
            [
                'id' => 1,
                'nombre' => 'Cali',
                'idDepartamento' => 1
            ],
            [
                'id' => 2,
                'nombre' => 'Palmira',
                'idDepartamento' => 1
            ],
            [
                'id' => 3,
                'nombre' => 'Buga',
                'idDepartamento' => 1
            ],
            [
                'id' => 4,
                'nombre' => 'Medellin',
                'idDepartamento' => 2
            ],
            [
                'id' => 5,
                'nombre' => 'Bogota',
                'idDepartamento' => 3
            ]
        ]);
    }

}