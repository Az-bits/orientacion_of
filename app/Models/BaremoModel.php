<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaremoModel extends Model
{
    use HasFactory;
    protected $table = 'baremo';
    protected $primaryKey = 'id_baremo';
    protected $fillable = ['percentil', 'valor', 'limite_inf', 'limite_sup', 'id_usuario', 'id_area'];
    protected $guarded = [];
    public $timestamps = false;

    public function getBaremo()
    {
        $results = DB::table(DB::raw("(
            SELECT 
                ROW_NUMBER() OVER (PARTITION BY percentil ORDER BY id_baremo) AS row_num,
                percentil,
                COALESCE(valor, CONCAT(limite_inf, ' - ', limite_sup)) AS valor
            FROM 
                baremo
            WHERE 
                percentil IN (99, 95, 90, 80, 75, 70, 60, 50, 40, 25, 10, 5, 1)
        ) r"))
            ->select(
                'percentil',
                DB::raw('MAX(CASE WHEN r.row_num = 1 THEN r.valor END) AS calculo'),
                DB::raw('MAX(CASE WHEN r.row_num = 2 THEN r.valor END) AS cientifica'),
                DB::raw('MAX(CASE WHEN r.row_num = 3 THEN r.valor END) AS diseño'),
                DB::raw('MAX(CASE WHEN r.row_num = 4 THEN r.valor END) AS tecnologia'),
                DB::raw('MAX(CASE WHEN r.row_num = 5 THEN r.valor END) AS gastronomia'),
                DB::raw('MAX(CASE WHEN r.row_num = 6 THEN r.valor END) AS naturalista'),
                DB::raw('MAX(CASE WHEN r.row_num = 7 THEN r.valor END) AS sanitaria'),
                DB::raw('MAX(CASE WHEN r.row_num = 8 THEN r.valor END) AS asistencial'),
                DB::raw('MAX(CASE WHEN r.row_num = 9 THEN r.valor END) AS juridica'),
                DB::raw('MAX(CASE WHEN r.row_num = 10 THEN r.valor END) AS economica'),
                DB::raw('MAX(CASE WHEN r.row_num = 11 THEN r.valor END) AS comunicacional'),
                DB::raw('MAX(CASE WHEN r.row_num = 12 THEN r.valor END) AS humanistica'),
                DB::raw('MAX(CASE WHEN r.row_num = 13 THEN r.valor END) AS artistica'),
                DB::raw('MAX(CASE WHEN r.row_num = 14 THEN r.valor END) AS musical'),
                DB::raw('MAX(CASE WHEN r.row_num = 15 THEN r.valor END) AS linguistica')
            )
            ->groupBy('percentil')
            ->orderBy('percentil', 'desc')
            ->get();
        return $results;
    }

    public function getValueBaremoBySum($suma, $id_area)
    {
        $resultados = DB::table('baremo')
            ->select('percentil')
            ->where('id_area', $id_area)
            ->where(function ($query) use ($suma) {
                $query->where('valor', $suma)
                    ->orWhere(function ($query) use ($suma) {
                        $query->whereNull('valor')
                            ->whereRaw($suma . ' BETWEEN limite_inf AND limite_sup');
                    });
            })
            ->first();
        return $resultados;
    }
}
