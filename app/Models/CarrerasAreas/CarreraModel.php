<?php

namespace App\Models\CarrerasAreas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraModel extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $fillable = ['carrera', 'link', 'estado', 'id_area_existente', 'id_area', 'descripcion', 'celular', 'direccion'];
    protected $guarded = [];
    public $timestamps = false;
}
