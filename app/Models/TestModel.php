<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $primaryKey = 'id_test';
    protected $fillable = ['test', 'estado', 'id_usuario'];
    protected $guarded = [];
    public $timestamps = false;
}
