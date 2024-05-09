<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PersonaModel;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PersonaModel::factory()->count(20)->create();
    }
}
