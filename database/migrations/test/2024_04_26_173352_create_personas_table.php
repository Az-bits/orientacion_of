<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('ci', 20)->unique();
            $table->string('nombre', 45);
            $table->string('paterno', 45);
            $table->string('materno', 45)->nullable();
            $table->integer('celular')->nullable();
            $table->enum('expedido', ['LP', 'OR', 'CBBA', 'PT', 'SC', 'BN', 'TR', 'PN', 'CH'])->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('correo', 150)->nullable();
            $table->enum('estado', ['0', '1'])->nullable()->default('1');
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->string('complemento', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
