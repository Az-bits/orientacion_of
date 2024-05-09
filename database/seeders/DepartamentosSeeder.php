<?php

namespace Database\Seeders;

use App\Models\DepartamentoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            [
                'departamento' => 'LA PAZ',
                'sigla' => 'LP',
            ],
            [
                'departamento' => 'ORURO',
                'sigla' => 'OR',
            ],
            [
                'departamento' => 'COCHABAMBA',
                'sigla' => 'CBBA',
            ],
            [
                'departamento' => 'CHUQUISACA',
                'sigla' => 'CH',
            ],
            [
                'departamento' => 'PANDO',
                'sigla' => 'PND',
            ],
            [
                'departamento' => 'SANTA CRUZ',
                'sigla' => 'SC',
            ],
            [
                'departamento' => 'POTOSÍ',
                'sigla' => 'PT',
            ],
            [
                'departamento' => 'BENI',
                'sigla' => 'BN',
            ],
            [
                'departamento' => 'TARIJA',
                'sigla' => 'TJ',
            ],

        ];

        // Iterar sobre las áreas y guardarlas en la base de datos
        foreach ($departamentos as $departamento) {
            DepartamentoModel::create($departamento);
        }
    }
}
