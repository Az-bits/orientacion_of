<?php

namespace App\Models\CarrerasAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaExistenteModel extends Model
{
    use HasFactory;
    protected $table = 'areas_existentes';
    protected $primaryKey = 'id_area_existente';
    protected $fillable = ['nombre', 'estado', 'descripcion'];
    protected $guarded = [];
    public $timestamps = false;
}
