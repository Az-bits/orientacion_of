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
            ['colegio' => '16 DE FEBRERO', 'id_municipio' => '18'],
            ['colegio' => 'ACHOCALLA', 'id_municipio' => '17'],
            ['colegio' => 'ADRIAN CASTILLO NAVA', 'id_municipio' => '18'],
            ['colegio' => 'ADVENTISTA VIACHA', 'id_municipio' => '10'],
            ['colegio' => 'ALMIRANTE MIGUEL GRAU-B', 'id_municipio' => '18'],
            ['colegio' => 'ALTO DE LA ALIANZA', 'id_municipio' => '18'],
            ['colegio' => 'AMACHUMA', 'id_municipio' => '17'],
            ['colegio' => 'ANDRES BELLO', 'id_municipio' => '18'],
            ['colegio' => 'ANTOFAGASTA', 'id_municipio' => '12'],
            ['colegio' => 'ANTOFAGASTA NORUEGO', 'id_municipio' => '18'],
            ['colegio' => 'BELÉN IQUIACA', 'id_municipio' => '5'],
            ['colegio' => 'BETHSABE SALMON VDA. BELTRAN', 'id_municipio' => '17'],
            ['colegio' => 'BRASIL', 'id_municipio' => '18'],
            ['colegio' => 'CALAMARCA', 'id_municipio' => '1'],
            ['colegio' => 'CANDELARIA FE Y ALEGRÍA', 'id_municipio' => '18'],
            ['colegio' => 'CAÑUMA', 'id_municipio' => '17'],
            ['colegio' => 'CARLOS PALENQUE AVILES', 'id_municipio' => '12'],
            ['colegio' => 'CARLOS PALENQUE AVILÉS', 'id_municipio' => '18'],
            ['colegio' => 'CENTRAL', 'id_municipio' => '6'],
            ['colegio' => 'CHAÑOCAHUA', 'id_municipio' => '17'],
            ['colegio' => 'CIC', 'id_municipio' => '14'],
            ['colegio' => 'CNL MAX TOLEDO', 'id_municipio' => '14'],
            ['colegio' => 'COSMOS 79', 'id_municipio' => '18'],
            ['colegio' => 'DIONICIO MORALES', 'id_municipio' => '18'],
            ['colegio' => 'DR. CARLOS MONTENEGRO', 'id_municipio' => '18'],
            ['colegio' => 'EL ALTO INTEGRACIÓN', 'id_municipio' => '18'],
            ['colegio' => 'EMMA VASQUEZ', 'id_municipio' => '17'],
            ['colegio' => 'ERNESTO CHE GUEVARA', 'id_municipio' => '18'],
            ['colegio' => 'FAB', 'id_municipio' => '18'],
            ['colegio' => 'FERNANDO NOGALES CASTRO', 'id_municipio' => '18'],
            ['colegio' => 'FRANZ TAMAYO', 'id_municipio' => '17'],
            ['colegio' => 'FRANZ TAMAYO UNCURA', 'id_municipio' => '17'],
            ['colegio' => 'FRED NUÑEZ GONZÁLEZ', 'id_municipio' => '10'],
            ['colegio' => 'FUNDACIÓN BETHESDA', 'id_municipio' => '18'],
            ['colegio' => 'GERMAN BUSCH', 'id_municipio' => '4'],
            ['colegio' => 'GRAN BRETAÑA', 'id_municipio' => '18'],
            ['colegio' => 'HABANA CUBA', 'id_municipio' => '18'],
            ['colegio' => 'HÉROES DEL PACIFICO', 'id_municipio' => '18'],
            ['colegio' => 'HORIZONTES B', 'id_municipio' => '18'],
            ['colegio' => 'HUMBERTO PUERTO CARRERO', 'id_municipio' => '18'],
            ['colegio' => 'ILLIMANI', 'id_municipio' => '18'],
            ['colegio' => 'ILLIMANI MERCURIO', 'id_municipio' => '18'],
            ['colegio' => 'JAPÓN', 'id_municipio' => '18'],
            ['colegio' => 'JESÚS DE BELÉN', 'id_municipio' => '18'],
            ['colegio' => 'JOSE ANTONIO PAREDES CANDIA', 'id_municipio' => '18'],
            ['colegio' => 'JOSE BALLIVIAN DE HICHURAYA', 'id_municipio' => '18'],
            ['colegio' => 'JOSE LUIS SUAREZ GUZMAN', 'id_municipio' => '18'],
            ['colegio' => 'JUAN JOSE TORREZ GONZALES', 'id_municipio' => '18'],
            ['colegio' => 'KURMI WASI', 'id_municipio' => '17'],
            ['colegio' => 'LA PAZ A', 'id_municipio' => '14'],
            ['colegio' => 'LAS DELICIAS B', 'id_municipio' => '18'],
            ['colegio' => 'LIBERTAD', 'id_municipio' => '18'],
            ['colegio' => 'LIBERTAD DE LAS AMÉRICAS - EPDB', 'id_municipio' => '18'],
            ['colegio' => 'LOS ANGELES', 'id_municipio' => '17'],
            ['colegio' => 'LUIS ESPINAL CAMPS', 'id_municipio' => '18'],
            ['colegio' => 'LUIS ESPINAL CAMPS N2', 'id_municipio' => '14'],
            ['colegio' => 'MARCELO QUIROGA SANTA CRUZ', 'id_municipio' => '18'],
            ['colegio' => 'MARISCAL ANDRES DE SANTA CRUZ', 'id_municipio' => '18'],
            ['colegio' => 'MARISCAL ANDRÉS DE SANTA CRUZ', 'id_municipio' => '12'],
            ['colegio' => 'MARISCAL DE AYACUCHO', 'id_municipio' => '10'],
            ['colegio' => 'MARISCAL SUCRE', 'id_municipio' => '18'],
            ['colegio' => 'MARISCAL SUCRE', 'id_municipio' => '17'],
            ['colegio' => 'MERCEDES BELZU DE DORADO', 'id_municipio' => '18'],
            ['colegio' => 'MERCEDES BELZU DE DORADO', 'id_municipio' => '18'],
            ['colegio' => 'METODISTA ANDINO', 'id_municipio' => '18'],
            ['colegio' => 'NACIONAL LITORAL', 'id_municipio' => '6'],
            ['colegio' => 'NACIONAL QUIME', 'id_municipio' => '57'],
            ['colegio' => 'NUEVO AMANECER', 'id_municipio' => '18'],
            ['colegio' => 'OSCAR ALFARO', 'id_municipio' => '18'],
            ['colegio' => 'OTROS', 'id_municipio' => '18'],
            ['colegio' => 'PALOS BLANCOS B', 'id_municipio' => '50'],
            ['colegio' => 'PEDRO DOMINGO MURILLO', 'id_municipio' => '18'],
            ['colegio' => 'PEDRO DOMINGO MURILLO', 'id_municipio' => '17'],
            ['colegio' => 'PUERTO DE MEJILLONES', 'id_municipio' => '18'],
            ['colegio' => 'PUERTO DEL ROSARIO', 'id_municipio' => '18'],
            ['colegio' => 'PUERTO DEL ROSARIO', 'id_municipio' => '18'],
            ['colegio' => 'RAFAEL MENDOZA CASTELLÓN', 'id_municipio' => '18'],
            ['colegio' => 'REPUBLICA DE CHILE', 'id_municipio' => '18'],
            ['colegio' => 'REPÚBLICA DE CUBA', 'id_municipio' => '18'],
            ['colegio' => 'REPÚBLICA DE FRANCIA', 'id_municipio' => '18'],
            ['colegio' => 'SAGRADOS CORAZONES', 'id_municipio' => '14'],
            ['colegio' => 'SAN ANTONIO B', 'id_municipio' => '12'],
            ['colegio' => 'SAN LORENZO', 'id_municipio' => '48'],
            ['colegio' => 'SAN LUIS', 'id_municipio' => '10'],
            ['colegio' => 'SAN SEBASTIÁN B', 'id_municipio' => '18'],
            ['colegio' => 'SAN VICENTE DE PAUL', 'id_municipio' => '18'],
            ['colegio' => 'SIMON BOLIVAR', 'id_municipio' => '18'],
            ['colegio' => 'SIMÓN BOLÍVAR', 'id_municipio' => '57'],
            ['colegio' => 'TARAPACA', 'id_municipio' => '18'],
            ['colegio' => 'TÉC. HUM. JORGE ZALLES', 'id_municipio' => '54'],
            ['colegio' => 'TÉCNICO HUMANÍSTICO JORGE ZALLES', 'id_municipio' => '54'],
            ['colegio' => 'TOCOPILLA', 'id_municipio' => '18'],
            ['colegio' => 'TOMAS KATARI', 'id_municipio' => '12'],
            ['colegio' => 'UNIDAD EDUCATIVA EBENEZER', 'id_municipio' => '164'],
            ['colegio' => 'UNIDAD EDUCATIVA NORUEGA', 'id_municipio' => '18'],
            ['colegio' => 'UNIÓN EUROPEA B', 'id_municipio' => '18'],
            ['colegio' => 'URIPAMPA', 'id_municipio' => '35'],
            ['colegio' => 'UYPACA', 'id_municipio' => '17'],
            ['colegio' => 'VICENTE DONOSO TORREZ', 'id_municipio' => '18'],
            ['colegio' => 'VILLA EL CARMEN', 'id_municipio' => '18'],
            ['colegio' => 'VILLA LAYURI', 'id_municipio' => '17'],
            ['colegio' => 'VILLA TUNARI', 'id_municipio' => '18'],
            ['colegio' => 'VILLANDRANI', 'id_municipio' => '18'],
            ['colegio' => 'WALTER ALPIRI DURAN', 'id_municipio' => '18'],
            ['colegio' => 'WILLIAM BOOTH', 'id_municipio' => '10'],
            ['colegio' => 'YUNGUYO FE Y ALEGRÍA', 'id_municipio' => '18'],
        ];




        // Iterar sobre las áreas y guardarlas en la base de datos
        foreach ($colegios as $colegio) {
            ColegioModel::create($colegio);
        }
    }
}
