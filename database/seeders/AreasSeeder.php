<?php

namespace Database\Seeders;

use App\Models\CarrerasAreas\AreaModel;
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
            ['nombre' => 'Calculo'], //1
            ['nombre' => 'Científica'], //2
            ['nombre' => 'Diseño'], //3
            ['nombre' => 'Tecnología'], //4
            ['nombre' => 'Geoastronómica'], //5
            ['nombre' => 'Naturalista'], //6
            ['nombre' => 'Sanitaria'], //7
            ['nombre' => 'Asistencial'], //8
            ['nombre' => 'Jurídica'], //9
            ['nombre' => 'Económica'], //10
            ['nombre' => 'Comunicacional'], //11
            ['nombre' => 'Humanística'], //12
            ['nombre' => 'Artística'], //13
            ['nombre' => 'Musical'], //14
            ['nombre' => 'Lingüística'], //15
        ];
        // Ciencias Agrarias de la Naturaleza, Zoológicas y Biológicas

        // ['nombre' => 'Naturalista']

        // Defensa y Seguridad

        // ['nombre' => 'Asistencial']
        // Ingenierías, Carreras Técnicas y Computación

        // ['nombre' => 'Cálculo']
        // ['nombre' => 'Tecnología']
        // ['nombre' => 'Diseño']
        // ['nombre' => 'Geoastronómica']
        // Medicina y Ciencias de la Salud

        // ['nombre' => 'Sanitaria']
        // ['nombre' => 'Asistencial']
        // Artísticas

        // ['nombre' => 'Artística']
        // ['nombre' => 'Musical']
        // Humanísticas, Ciencias Jurídicas y Sociales

        // ['nombre' => 'Jurídica']
        // ['nombre' => 'Humanística']
        // ['nombre' => 'Lingüística']
        // ['nombre' => 'Comunicacional']
        // Administrativas, Contables y Económicas

        // ['nombre' => 'Económica']

        // Iterar sobre las áreas y guardarlas en la base de datos
        foreach ($areas as $area) {
            AreaModel::create($area);
        }
    }
}
