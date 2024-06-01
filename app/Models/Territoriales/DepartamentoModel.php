<?php

namespace App\Models\Territoriales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoModel extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';
    protected $fillable = ['departamento', 'sigla', 'estado'];
    protected $guarded = [];
    public $timestamps = true;
}
