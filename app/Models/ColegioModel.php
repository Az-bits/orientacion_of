<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColegioModel extends Model
{
    use HasFactory;
    protected $table = 'colegios';
    protected $primaryKey = 'id_colegio';
    protected $fillable = ['colegios', 'estado', 'id_municipio'];
    protected $guarded = [];
    public $timestamps = false;
}
