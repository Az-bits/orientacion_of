<?php

namespace App\Models\Territoriales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipioModel extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipio';
    protected $fillable = ['municipio', 'estado', 'id_provincia'];
    protected $guarded = [];
    public $timestamps = false;
}
