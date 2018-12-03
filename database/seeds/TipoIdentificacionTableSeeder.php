<?php

use Illuminate\Database\Seeder;

class TipoIdentificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoidentificacion')->insert([
            [
                'id' => 1,
                'nombre' => 'Cedula'
            ],
            [
                'id' => 2,
                'nombre' => 'Tarjeta de identidad',
            ],
            [
                'id' => 3,
                'nombre' => 'Registro civil',
            ]
        ]);
    }

}