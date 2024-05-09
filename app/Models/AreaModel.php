<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'id_area';
    protected $fillable = ['nombre', 'estado', 'descripcion'];
    protected $guarded = [];
    public $timestamps = false;
}
