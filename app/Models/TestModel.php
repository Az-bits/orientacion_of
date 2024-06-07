<?php

namespace App\Models;

use App\Models\CarrerasAreas\AreaModel;
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

    public function getResultados($resultado)
    {
        $rows = [];
        if ($resultado['pctl_cal']  >= 75) {
            $rows = array_merge($this->verArea(1), $rows);
        }
        if ($resultado['pctl_cie']  >= 75) {
            $rows = array_merge($this->verArea(2), $rows);
        }
        if ($resultado['pctl_dis']  >= 75) {
            $rows = array_merge($this->verArea(3), $rows);
        }
        if ($resultado['pctl_tec']  >= 75) {
            $rows = array_merge($this->verArea(4), $rows);
        }
        if ($resultado['pctl_geo']  >= 75) {
            $rows = array_merge($this->verArea(5), $rows);
        }
        if ($resultado['pctl_nat']  >= 75) {
            $rows = array_merge($this->verArea(6), $rows);
        }
        if ($resultado['pctl_san']  >= 75) {
            $rows = array_merge($this->verArea(7), $rows);
        }
        if ($resultado['pctl_asi']  >= 75) {
            $rows = array_merge($this->verArea(8), $rows);
        }
        if ($resultado['pctl_jur']  >= 75) {
            $rows = array_merge($this->verArea(9), $rows);
        }
        if ($resultado['pctl_eco']  >= 75) {
            $rows = array_merge($this->verArea(10), $rows);
        }
        if ($resultado['pctl_com']  >= 75) {
            $rows = array_merge($this->verArea(11), $rows);
        }
        if ($resultado['pctl_hum']  >= 75) {
            $rows = array_merge($this->verArea(12), $rows);
        }
        if ($resultado['pctl_art']  >= 75) {
            $rows = array_merge($this->verArea(13), $rows);
        }
        if ($resultado['pctl_mus']  >= 75) {
            $rows = array_merge($this->verArea(14), $rows);
        }
        if ($resultado['pctl_lin']  >= 75) {
            $rows = array_merge($this->verArea(15), $rows);
        }
        return $this->getFormatData($rows);
    }
    public function verArea($id)
    {
        //Obtenemos las areas y carreras para sugerir
        $data = [];
        $data = AreaModel::select('c.carrera as carrera', 'areas.nombre as area', 'ae.nombre as area_existente', 'direccion', 'celular', 'link')->leftJoin('carreras as c', 'areas.id_area', '=', 'c.id_area')
            ->join('areas_existentes as ae', 'ae.id_area_existente', '=', 'c.id_area_existente')
            ->where('areas.id_area', $id)
            ->get();
        return $data->isEmpty() ? [] : [$data];
    }
    public function getFormatData($rows)
    {
        $data = [];
        foreach ($rows as  $a) {
            $area = $a[0]['area'];
            $area_existente = $a[0]['area_existente'];
            $carreras = [];
            foreach ($a as $c) {
                $carrera = [
                    'carrera' => $c['carrera'],
                    'link' => $c['link'],
                    'celular' => $c['celular'],
                    'direccion' => $c['direccion'],
                ];
                $carreras[] = $carrera;
            }
            $row = [
                'area' => $area,
                'area_existente' => $area_existente,
                'carreras' => $carreras
            ];
            $data[] = $row;
        }
        return $data;
    }
}
