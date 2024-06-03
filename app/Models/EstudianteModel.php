<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteModel extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';
    protected $fillable = ['id_colegio', 'edad', 'id_persona', 'estado'];
    protected $guarded = [];
    public $timestamps = true;
}
