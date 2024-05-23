<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = [
            [
                'carrera' => 'ECONOMÍA',
                'id_area_existente' => '1',
                'id_area' => '10',
            ],
            [
                'carrera' => 'CONTADURÍA PUBLICA',
                'id_area_existente' => '1',
                'id_area' => '10',
            ],
            [
                'carrera' => 'ADMINISTRACIÓN DE EMPRESAS',
                'id_area_existente' => '1',
                'id_area' => '10',
            ],
            [
                'carrera' => 'GESTIÓN TURÍSTICA Y HOTELERA',
                'id_area_existente' => '1',
                'id_area' => '10',
            ],
            [
                'carrera' => 'COMERCIO INTERNACIONAL',
                'id_area_existente' => '1',
                'id_area' => '10',
            ],
            [
                'carrera' => 'CIENCIAS DE LA EDUCACIÓN',
                'id_area_existente' => '2',
                'id_area' => '12',
            ],
            [
                'carrera' => 'EDUCACIÓN PARVULARIA',
                'id_area_existente' => '2',
                'id_area' => '12',
            ],
            [
                'carrera' => 'PSICOMOTRICIDAD Y DEPORTES',
                'id_area_existente' => '2',
                'id_area' => '12',
            ],
            [
                'carrera' => 'SOCIOLOGÍA',
                'id_area_existente' => '3',
                'id_area' => '11',
            ],
            [
                'carrera' => 'TRABAJO SOCIAL',
                'id_area_existente' => '3',
                'id_area' => '11',
            ],
            [
                'carrera' => 'CIENCIAS DE LA COMUNICACIÓN SOCIAL',
                'id_area_existente' => '3',
                'id_area' => '11',
            ],
            [
                'carrera' => 'PSICOLOGÍA',
                'id_area_existente' => '3',
                'id_area' => '12',
            ],
            [
                'carrera' => 'CIENCIAS DEL DESARROLLO',
                'id_area_existente' => '3',
                'id_area' => '12',
            ],
            [
                'carrera' => 'HISTORIA',
                'id_area_existente' => '3',
                'id_area' => '12',
            ],
            [
                'carrera' => 'LINGÜÍSTICA',
                'id_area_existente' => '3',
                'id_area' => '11',
            ],
            [
                'carrera' => 'DERECHO',
                'id_area_existente' => '4',
                'id_area' => '9',
            ],
            [
                'carrera' => 'CIENCIAS POLÍTICAS',
                'id_area_existente' => '4',
                'id_area' => '9',
            ],
            [
                'carrera' => 'ARQUITECTURA',
                'id_area_existente' => '5',
                'id_area' => '3',
            ],
            [
                'carrera' => 'ARTES PLÁSTICAS',
                'id_area_existente' => '5',
                'id_area' => '3',
            ],
            [
                'carrera' => 'MEDICINA',
                'id_area_existente' => '6',
                'id_area' => '1',
            ],
            [
                'carrera' => 'ODONTOLOGÍA',
                'id_area_existente' => '6',
                'id_area' => '1',
            ],
            [
                'carrera' => 'ENFERMERÍA',
                'id_area_existente' => '6',
                'id_area' => '1',
            ],
            [
                'carrera' => 'NUTRICIÓN Y DIETÉTICA',
                'id_area_existente' => '6',
                'id_area' => '1',
            ],
            [
                'carrera' => 'TECNOLOGÍA EN LABORATORIO DENTAL',
                'id_area_existente' => '6',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA ELECTRÓNICA',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA ELÉCTRICA',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA EN PRODUCCIÓN EMPRESARIAL',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA AUTOCRÍTICA',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA TEXTIL',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA AMBIENTAL',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA DE GAS Y PETROQUIMICA',
                'id_area_existente' => '7',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA CIVIL',
                'id_area_existente' => '8',
                'id_area' => '4',
            ],
            [
                'carrera' => 'INGENIERÍA DE SISTEMAS',
                'id_area_existente' => '8',
                'id_area' => '4',
            ],
            [
                'carrera' => 'CIENCIAS FÍSICAS Y ENERGÍAS ALTERNATIVAS',
                'id_area_existente' => '8',
                'id_area' => '2',
            ],
            [
                'carrera' => 'CARRERA MILITAR Y POLICIAL',
                'id_area_existente' => '9',
                'id_area' => '8',
            ],
            [
                'carrera' => 'ARMADA Y FUERZAS AÉREAS',
                'id_area_existente' => '9',
                'id_area' => '8',
            ],
            [
                'carrera' => 'MEDICINA VETERINARIA Y ZOOTECNIA',
                'id_area_existente' => '10',
                'id_area' => '1',
            ],
            [
                'carrera' => 'INGENIERÍA ZOOTECNIA E INDUSTRIA PECUARIA',
                'id_area_existente' => '10',
                'id_area' => '6',
            ],
            [
                'carrera' => 'INGENIERÍA AGRONOMÍA',
                'id_area_existente' => '10',
                'id_area' => '6',
            ],


        ];

        foreach ($carreras as $c) {
            DB::table('carreras')->insert($c);
        }
    }
}
