<?php

use Illuminate\Database\Seeder;

class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clase')->insert([
            [
                'id' => 1,
                'nombre' => 'Baja'
            ],
            [
                'id' => 2,
                'nombre' => 'Media',
            ],
            [
                'id' => 3,
                'nombre' => 'Alta',
            ]
        ]);
    }

}