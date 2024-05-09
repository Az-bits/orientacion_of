<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinciaModel extends Model
{
    use HasFactory;
    protected $table = 'provincias';
    protected $primaryKey = 'id_provincia';
    protected $fillable = ['provincia', 'estado', 'id_departamento'];
    protected $guarded = [];
    public $timestamps = false;
}
