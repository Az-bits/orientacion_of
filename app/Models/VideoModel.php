<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $primaryKey = 'id_video';
    protected $fillable = ['enlace', 'id_area', 'id_carrera', 'id_usuario', 'tipo', 'estado', 'titulo'];
    protected $guarded = [];
    public $timestamps = true;
}
