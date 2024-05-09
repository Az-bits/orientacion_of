<?php

namespace Database\Seeders;

use App\Models\AreaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['nombre' => 'Calculo'],    //1
            ['nombre' => 'Científica'], //2
            ['nombre' => 'Diseño'],
            ['nombre' => 'Tecnología'],
            ['nombre' => 'Gastronomía'],
            ['nombre' => 'Naturalista'],
            ['nombre' => 'Sanitaria'],
            ['nombre' => 'Asistencial'],
            ['nombre' => 'Jurídica'],
            ['nombre' => 'Económica'],
            ['nombre' => 'Comunicacional'],
            ['nombre' => 'Humanística'],
            ['nombre' => 'Artística'],
            ['nombre' => 'Musical'],
            ['nombre' => 'Lingüística'],
        ];

        // Iterar sobre las áreas y guardarlas en la base de datos
        foreach ($areas as $area) {
            AreaModel::create($area);
        }
    }
}
