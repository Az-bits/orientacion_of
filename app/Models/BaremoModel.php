<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaremoModel extends Model
{
    use HasFactory;
    protected $table = 'baremo';
    protected $primaryKey = 'id_baremo';
    protected $fillable = ['percentil', 'valor', 'limite_inf', 'limite_sup', 'id_usuario', 'id_area'];
    protected $guarded = [];
    public $timestamps = false;
}
