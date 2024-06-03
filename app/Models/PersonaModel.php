<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonaModel extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $fillable = ['ci', 'expedido', 'fecha_nac', 'nombre', 'paterno', 'materno', 'correo', 'celular', 'estado', 'complemento', 'genero'];
    protected $guarded = [];
    public $timestamps = true;
    public function getEstudiante($ci)
    {
        return DB::table('estudiantes as e')
            ->leftJoin('personas as p', 'e.id_persona', '=', 'p.id_persona')
            ->select(
                'e.*',
                'p.*',
                'p.nombre as nombres',
                DB::raw("CONCAT(p.paterno, ' ', p.materno) as apellidos")
            )
            ->where('p.ci', $ci)  // Asegúrate de que la columna 'ci' se refiera a la tabla correcta.
            ->first();
    }
}
