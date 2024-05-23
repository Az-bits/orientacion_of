<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasExistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $areas = [
            [
                'nombre' => 'Area ciencias económicas, financieras y administrativas',
            ],
            [
                'nombre' => 'Area ciencias de la educación',
            ],
            [
                'nombre' => 'Area ciencias sociales',
            ],
            [
                'nombre' => 'Jurídicas',
            ],
            [
                'nombre' => 'Area ciencias y artes del habitad',
            ],
            [
                'nombre' => 'Area ciencias de la salud',
            ],
            [
                'nombre' => 'Area ingeniería desarrollo tecnológico productivo',
            ],
            [
                'nombre' => 'Area ciencias y tecnologías',
            ],
            [
                'nombre' => 'No existen en UPEA, por lo que sugiere otras instituciones o carreras',
            ],
            [
                'nombre' => 'Area ciencias agrícolas, pecuarias y recursos naturales',
            ],

        ];

        foreach ($areas as $area) {
            DB::table('areas_existentes')->insert($area);
        }
    }
}
