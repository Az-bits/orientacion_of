<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaModel extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $fillable = ['ci', 'expedido', 'fecha_nac', 'nombre', 'paterno', 'materno', 'correo', 'celular', 'estado', 'complemento', 'genero'];
    protected $guarded = [];
    public $timestamps = true;
}
