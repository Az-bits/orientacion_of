<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Territoriales\ProvinciaController;
use App\Http\Controllers\FrontendController;
use App\Models\BaremoModel;
use App\Models\CarrerasAreas\AreaModel;
use App\Models\ColegioModel;
use App\Models\EstudianteModel;
use App\Models\PersonaModel;
use App\Models\PreguntaModel;
use App\Models\ResultadoModel;
use App\Models\Territoriales\DepartamentoModel;
use App\Models\Territoriales\MunicipioModel;
use App\Models\Territoriales\ProvinciaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TestController extends FrontendController
{
    public function __construct()
    {
        $this->title = 'Preguntas';
        $this->page = '';
        $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
    }
    public function index()
    {
        $this->page = 'admin-test';
        $this->data['title'] = 'CUESTIONARIO DE INTERESES PROFESIONALES';
        $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
        // var_dump($this->data['preguntas'][0]);
        return $this->render('cuestionarios.test');
    }
    public function main()
    {
        $this->page = '';
        // $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
        // var_dump($this->data['preguntas'][0]);
        return $this->render('index');
    }
    public function historialEstudiante()
    {
        return $this->render('historial');
    }
    public function registrarEstudiante(Request $request)
    {
        $this->page = '';
        // echo 'registrarse';
        $data = DepartamentoModel::get();
        $this->data['departamentos'] = $data;

        // $data = PersonaModel::select('*')->selectRaw("CONCAT_WS(' ', nombre, paterno, IFNULL(materno, '')) as nombre_completo")->where('estado', '1')->orderBy('id_persona', 'desc')->get();
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'ci' => 'required|unique:personas,ci',
                'celular' => 'required|numeric|digits:8',
                'nombres' => 'required',
                'apellidos' => 'required',
                'edad' => 'required|max:2',
                // 'colegio' => 'required',
            ], [
                'ci.required' => 'Campo cédula es requerido',
                'ci.unique' => 'La cédula ya ha sido registrado anteriormente.',
            ]);
            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de los datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }
            $apellidos = explode(' ', $request->apellidos);
            $persona = PersonaModel::create([
                'ci' => trim($request->ci),
                'nombre' => $request->nombres,
                'paterno' => $apellidos[0],
                'materno' => isset($apellidos[1]) ? $apellidos[1] : '',
                'celular' => $request->celular,
                'genero' => $request->genero,
            ]);
            $estudiante =  DB::table('estudiantes')->insertGetId([
                'id_colegio' => $request->colegio,
                'edad' => $request->edad,
                'id_persona' => $persona->id_persona,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // return  $estudiante;
            // $this->render('cuestionarios.test', ['message' => 'Registro exitoso']);
            Session::put('id_estudiante', $estudiante);
            return response()->json(["message" => "Registro exitoso"], 200);
        }
        return $this->render("registrarse");
    }
    public function registrarRespuesta(Request $request)
    {
        $idEstudiante = Session::get('id_estudiante');
        $this->data['estudiante'] = EstudianteModel::select('*')
            ->selectRaw("CONCAT_WS(' ', p.nombre, p.paterno, IFNULL(p.materno, '')) as nombre_completo")
            ->selectRaw("CONCAT_WS(' ', p.paterno, IFNULL(p.materno, '')) as apellidos")
            ->from('estudiantes as e')
            ->where('e.estado', '1')
            ->where('e.id_estudiante', (int)$idEstudiante)
            ->leftJoin('personas as p', 'p.id_persona', '=', 'e.id_persona')
            ->leftJoin('colegios as c', 'c.id_colegio', '=', 'e.id_colegio')
            ->orderBy('e.id_estudiante', 'desc')
            ->first();
        $baremo = new BaremoModel();

        // echo $this->data['estudiante'];
        // die($this->data['estudiante']->nombre);

        $sum_cal = array_sum($request->preguntas[1]);
        $sum_cie = array_sum($request->preguntas[2]);
        $sum_dis = array_sum($request->preguntas[3]);
        $sum_tec = array_sum($request->preguntas[4]);
        $sum_geo = array_sum($request->preguntas[5]);
        $sum_nat = array_sum($request->preguntas[6]);
        $sum_san = array_sum($request->preguntas[7]);
        $sum_asi = array_sum($request->preguntas[8]);
        $sum_jur = array_sum($request->preguntas[9]);
        $sum_eco = array_sum($request->preguntas[10]);
        $sum_com = array_sum($request->preguntas[11]);
        $sum_hum = array_sum($request->preguntas[12]);
        $sum_art = array_sum($request->preguntas[13]);
        $sum_mus = array_sum($request->preguntas[14]);
        $sum_lin = array_sum($request->preguntas[15]);

        $resultado = ResultadoModel::create([
            'id_estudiante' => $request->id_estudiante ?? 12,
            'tiempo' => $request->tiempo,
            'id_test' => $request->id_test,
            'pts_cal' => $sum_cal,
            'pts_cie' => $sum_cie,
            'pts_dis' => $sum_dis,
            'pts_tec' => $sum_tec,
            'pts_geo' => $sum_geo,
            'pts_nat' => $sum_nat,
            'pts_san' => $sum_san,
            'pts_asi' => $sum_asi,
            'pts_jur' => $sum_jur,
            'pts_eco' => $sum_eco,
            'pts_com' => $sum_com,
            'pts_hum' => $sum_hum,
            'pts_art' => $sum_art,
            'pts_mus' => $sum_mus,
            'pts_lin' => $sum_lin,
            "pctl_cal" => $baremo->getValueBaremoBySum($sum_cal, 1)->percentil ?? 0,
            "pctl_cie" => $baremo->getValueBaremoBySum($sum_cie, 2)->percentil ?? 0,
            "pctl_dis" => $baremo->getValueBaremoBySum($sum_dis, 3)->percentil ?? 0,
            "pctl_tec" => $baremo->getValueBaremoBySum($sum_tec, 4)->percentil ?? 0,
            "pctl_geo" => $baremo->getValueBaremoBySum($sum_geo, 5)->percentil ?? 0,
            "pctl_nat" => $baremo->getValueBaremoBySum($sum_nat, 6)->percentil ?? 0,
            "pctl_san" => $baremo->getValueBaremoBySum($sum_san, 7)->percentil ?? 0,
            "pctl_asi" => $baremo->getValueBaremoBySum($sum_asi, 8)->percentil ?? 0,
            "pctl_jur" => $baremo->getValueBaremoBySum($sum_jur, 9)->percentil ?? 0,
            "pctl_eco" => $baremo->getValueBaremoBySum($sum_eco, 10)->percentil ?? 0,
            "pctl_com" => $baremo->getValueBaremoBySum($sum_com, 11)->percentil ?? 0,
            "pctl_hum" => $baremo->getValueBaremoBySum($sum_hum, 12)->percentil ?? 0,
            "pctl_art" => $baremo->getValueBaremoBySum($sum_art, 13)->percentil ?? 0,
            "pctl_mus" => $baremo->getValueBaremoBySum($sum_mus, 14)->percentil ?? 0,
            "pctl_lin" => $baremo->getValueBaremoBySum($sum_lin, 15)->percentil ?? 0,
        ]);


        // var_dump($resultado['pctl_cal']);
        // $respuesta
        // $this->data['$resultado'] = [90, 40, 80, 60, 75, 70, 75, 70, 50, 60, 80, 70, 70, 60, 50];
        $this->data['$resultado'] = $resultado;
        $this->data['graficoData'] = [
            $resultado["pctl_cal"],
            $resultado["pctl_cie"],
            $resultado["pctl_dis"],
            $resultado["pctl_tec"],
            $resultado["pctl_geo"],
            $resultado["pctl_nat"],
            $resultado["pctl_san"],
            $resultado["pctl_asi"],
            $resultado["pctl_jur"],
            $resultado["pctl_eco"],
            $resultado["pctl_com"],
            $resultado["pctl_hum"],
            $resultado["pctl_art"],
            $resultado["pctl_mus"],
            $resultado["pctl_lin"],
        ];
        $dataRes = [];
        // foreach ($this->data['graficoData']  as $key => $value) {
        //     $dataRes = $cual
        // }

        if ($this->data['$resultado']['pctl_cal']  >= 75) {
            $dataRes = array_merge($this->verArea(1), $dataRes);
        }
        // if ($this->data['$resultado']['pctl_cie']  >= 75) {
        //     $dataRes = array_merge($this->verArea(2), $dataRes);
        // }
        if ($this->data['$resultado']['pctl_dis']  >= 75) {
            $dataRes = array_merge($this->verArea(3), $dataRes);
        }
        if ($this->data['$resultado']['pctl_tec']  >= 75) {
            $dataRes = array_merge($this->verArea(4), $dataRes);
        }
        if ($this->data['$resultado']['pctl_geo']  >= 75) {
            $dataRes = array_merge($this->verArea(5), $dataRes);
        }
        if ($this->data['$resultado']['pctl_nat']  >= 75) {
            $dataRes = array_merge($this->verArea(6), $dataRes);
        }
        if ($this->data['$resultado']['pctl_san']  >= 75) {
            $dataRes = array_merge($this->verArea(7), $dataRes);
        }
        if ($this->data['$resultado']['pctl_asi']  >= 75) {
            $dataRes = array_merge($this->verArea(8), $dataRes);
        }
        if ($this->data['$resultado']['pctl_jur']  >= 75) {
            $dataRes = array_merge($this->verArea(9), $dataRes);
        }
        if ($this->data['$resultado']['pctl_eco']  >= 75) {
            $dataRes = array_merge($this->verArea(10), $dataRes);
        }
        if ($this->data['$resultado']['pctl_com']  >= 75) {
            $dataRes = array_merge($this->verArea(11), $dataRes);
        }
        if ($this->data['$resultado']['pctl_hum']  >= 75) {
            $dataRes = array_merge($this->verArea(12), $dataRes);
        }
        if ($this->data['$resultado']['pctl_art']  >= 75) {
            $dataRes = array_merge($this->verArea(13), $dataRes);
        }
        if ($this->data['$resultado']['pctl_mus']  >= 75) {
            $dataRes = array_merge($this->verArea(14), $dataRes);
        }
        if ($this->data['$resultado']['pctl_lin']  >= 75) {
            $dataRes = array_merge($this->verArea(15), $dataRes);
        }
        $this->data['sugerencias'] = $dataRes;
        // var_dump($dataRes);
        // foreach ($this->data['sugerencias'] as $key => $value) {
        //     # code...

        //     foreach ($value as $key => $v) {
        //         echo $v->carrera;
        //     }
        // }

        // var_dump($this->data['sugerencias']);




        return $this->render('resultado');
    }
    public function verArea($id)
    {
        $dataRes = [];
        $dataRes = AreaModel::select('c.carrera as carrera', 'areas.nombre as area', 'ae.nombre as area_existente')->leftJoin('carreras as c', 'areas.id_area', '=', 'c.id_area')
            ->join('areas_existentes as ae', 'ae.id_area_existente', '=', 'c.id_area_existente')
            ->where('areas.id_area', $id)
            ->get();
        // $data = [
        //     // $dataRes['area'] => ['area_existente' => [$dataRes['area_existente'], []]]
        //     $dataRes['area'] => [$this->getCarreras($dataRes)]
        // ];
        // var_dump()
        return [$dataRes];
    }
    public function getCarreras($data)
    {
        $d = [];
        foreach ($data as $key => $value) {
            // # code...
            $d = array_merge($value['carrera'], $d);
        }
        return $d;
    }
    public function getSelects($tipo = null, $id = null)
    {
        // if (request()->ajax()) {
        $data = [];
        switch ($tipo) {
            case 'provincias':
                $data = ProvinciaModel::where('id_departamento', $id)->get();
                break;
            case 'municipios':
                $data = MunicipioModel::where('id_provincia', $id)->get();
                break;
            case 'colegios':
                $data = ColegioModel::where('id_municipio', $id)->get();
                break;
            default:
                break;
        }
        // var_dump($data);
        return response()->json($data, 200);
        // }
        // $this->render("registrarse");
    }
    public function buscarEstudiante($string)
    {
        if (request()->ajax()) {
            $estudiante = new PersonaModel();
            $est = $estudiante->getEstudiante($string);
            if ($est) {
                Session::put('id_estudiante', $est->id_estudiante);
            }
            return  response()->json($est ? 1 : 0, 200);
        }
    }
}
