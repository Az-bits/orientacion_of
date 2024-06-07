<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoModel extends Model
{
    use HasFactory;
    protected $table = 'resultados';
    protected $primaryKey = 'id_resultado';
    protected $fillable =
    ['id_estudiante', 'tiempo', 'id_test',    'id_usuario',    'pts_cal',    'pts_cie', 'pts_dis',    'pts_tec',    'pts_geo',    'pts_nat',    'pts_san',    'pts_asi',    'pts_jur', 'pts_eco', 'pts_com', 'pts_hum', 'pts_art', 'pts_mus',    'pts_lin', 'pctl_cal', 'pctl_cie', 'pctl_dis',    'pctl_tec',    'pctl_geo',    'pctl_nat',    'pctl_san', 'pctl_asi', 'pctl_jur', 'pctl_eco', 'pctl_com',    'pctl_hum', 'pctl_art', 'pctl_mus',    'pctl_lin'];
    protected $guarded = [];
    public $timestamps = true;
    protected $dateFormat = 'Y-m-d H:i:s';
}
