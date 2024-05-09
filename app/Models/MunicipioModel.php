<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipioModel extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipio';
    protected $fillable = ['municipio', 'estado', 'id_municipio'];
    protected $guarded = [];
    public $timestamps = false;
}
