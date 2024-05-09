<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaModel extends Model
{
    use HasFactory;
    protected $table = 'preguntas';
    protected $primaryKey = 'id_pregunta';
    protected $fillable = ['pregunta', 'estado', 'id_usuario', 'id_area', 'id_test'];
    protected $guarded = [];
    public $timestamps = false;
}
