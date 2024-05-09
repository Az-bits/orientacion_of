<?php

namespace Database\Seeders;

use App\Models\ColegioModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colegios = [
            [
                'colegio' => '16 DE FEBRERO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ACHOCALLA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'ADRIAN CASTILLO NAVA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ADVENTISTA VIACHA',
                'id_municipio' => 305,
            ],
            [
                'colegio' => 'ALMIRANTE MIGUEL GRAU-B',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ALTO DE LA ALIANZA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'AMACHUMA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'ANDRES BELLO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ANTOFAGASTA',
                'id_municipio' => 115,
            ],
            [
                'colegio' => 'ANTOFAGASTA NORUEGO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'BELEN IQUIACA',
                'id_municipio' => 175,
            ],
            [
                'colegio' => 'BETHSABE SALMON VDA. BELTRAN',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'BRASIL',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'CALAMARCA',
                'id_municipio' => 38,
            ],
            [
                'colegio' => 'CANDELARIA FE Y ALEGRÍA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'CAÑUMA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'CARLOS PALENQUE AVILÉS',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'CENTRAL',
                'id_municipio' => 76,
            ],
            [
                'colegio' => 'CHAÑOCAHUA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'CIC',
                'id_municipio' => 135,
            ],
            [
                'colegio' => 'CNL MAX TOLEDO',
                'id_municipio' => 135,
            ],
            [
                'colegio' => 'COSMOS 79',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'DIONICIO MORALES',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'DR. CARLOS MONTENEGRO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'EL ALTO INTEGRACIÓN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'EMMA VASQUEZ',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'ERNESTO CHE GUEVARA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'FAB',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'FERNANDO NOGALES CASTRO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'FRANZ TAMAYO',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'FRANZ TAMAYO UNCURA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'FRED NUÑEZ GONZÁLEZ',
                'id_municipio' => 305,
            ],
            [
                'colegio' => 'FUNDACIÓN BETHESDA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'GERMAN BUSCH',
                'id_municipio' => 20,
            ],
            [
                'colegio' => 'GRAN BRETAÑA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'HABANA CUBA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'HÉROES DEL PACIFICO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'HORIZONTES B',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'HUMBERTO PUERTO CARRERO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ILLIMANI',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'ILLIMANI MERCURIO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JAPÓN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JESÚS DE BELÉN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JOSE ANTONIO PAREDES CANDIA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JOSE BALLIVIAN DE HICHURAYA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JOSE LUIS SUAREZ GUZMAN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'JUAN JOSE TORREZ GONZALES',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'KURMI WASI',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'LA PAZ A',
                'id_municipio' => 135,
            ],
            [
                'colegio' => 'LAS DELICIAS B',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'LIBERTAD',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'LIBERTAD DE LAS AMÉRICAS - EPDB',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'LOS ANGELES',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'LUIS ESPINAL CAMPS',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'LUIS ESPINAL CAMPS N2',
                'id_municipio' => 135,
            ],
            [
                'colegio' => 'MARCELO QUIROGA SANTA CRUZ',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'MARISCAL ANDRES DE SANTA CRUZ',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'MARISCAL DE AYACUCHO',
                'id_municipio' => 190,
            ],
            [
                'colegio' => 'MARISCAL SUCRE',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'MERCEDES BELZU DE DORADO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'METODISTA ANDINO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'NACIONAL LITORAL',
                'id_municipio' => 76,
            ],
            [
                'colegio' => 'NACIONAL QUIME',
                'id_municipio' => 205,
            ],
            [
                'colegio' => 'NUEVO AMANECER',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'OSCAR ALFARO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'OTROS',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'PALOS BLANCOS B',
                'id_municipio' => 170,
            ],
            [
                'colegio' => 'PEDRO DOMINGO MURILLO',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'PUERTO DE MEJILLONES',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'PUERTO DEL ROSARIO',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'RAFAEL MENDOZA CASTELLÓN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'REPUBLICA DE CHILE',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'REPÚBLICA DE CUBA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'REPÚBLICA DE FRANCIA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'SAGRADOS CORAZONES',
                'id_municipio' => 135,
            ],
            [
                'colegio' => 'SAN ANTONIO B',
                'id_municipio' => 115,
            ],
            [
                'colegio' => 'SAN LORENZO',
                'id_municipio' => 45,
            ],
            [
                'colegio' => 'SAN LUIS',
                'id_municipio' => 305,
            ],
            [
                'colegio' => 'SAN SEBASTIÁN B',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'SAN VICENTE DE PAUL',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'SIMÓN BOLÍVAR',
                'id_municipio' => 205,
            ],
            [
                'colegio' => 'TARAPACA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'TÉC. HUM. JORGE ZALLES',
                'id_municipio' => 329,
            ],
            [
                'colegio' => 'TECNICO HUMANISTICO JOSE LUIS SUAREZ GUZMAN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'TOCOPILLA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'TOMAS KATARI',
                'id_municipio' => 115,
            ],
            [
                'colegio' => 'UNIDAD EDUCATIVA EBENEZER',
                'id_municipio' => 322,
            ],
            [
                'colegio' => 'UNIDAD EDUCATIVA NORUEGA',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'UNIÓN EUROPEA B',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'URIPAMPA',
                'id_municipio' => 62,
            ],
            [
                'colegio' => 'UYPACA',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'VICENTE DONOSO TORREZ',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'VILLA EL CARMEN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'VILLA LAYURI',
                'id_municipio' => 3,
            ],
            [
                'colegio' => 'VILLA TUNARI',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'VILLANDRANI',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'WALTER ALPIRI DURAN',
                'id_municipio' => 97,
            ],
            [
                'colegio' => 'WILLIAM BOOTH',
                'id_municipio' => 305,
            ],
            [
                'colegio' => 'YUNGUYO FE Y ALEGRÍA',
                'id_municipio' => 97,
            ],
        ];

        // Iterar sobre las áreas y guardarlas en la base de datos
        foreach ($colegios as $colegio) {
            ColegioModel::create($colegio);
        }
    }
}
