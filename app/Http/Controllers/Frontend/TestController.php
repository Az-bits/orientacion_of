<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Models\BaremoModel;
use App\Models\ColegioModel;
use App\Models\DepartamentoModel;
use App\Models\MunicipioModel;
use App\Models\PersonaModel;
use App\Models\PreguntaModel;
use App\Models\ProvinciaModel;
use App\Models\ResultadoModel;
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
        $this->data['title'] = 'SOVI 3';
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
                'edad' => 'max:2',
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
                'ci' => $request->ci,
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
        $baremo = new BaremoModel();

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
            "pctl_cal" => $baremo->getValueBaremoBySum($sum_cal, 1)->percentil,
            "pctl_cie" => $baremo->getValueBaremoBySum($sum_cie, 2)->percentil,
            "pctl_dis" => $baremo->getValueBaremoBySum($sum_dis, 3)->percentil,
            "pctl_tec" => $baremo->getValueBaremoBySum($sum_tec, 4)->percentil,
            "pctl_geo" => $baremo->getValueBaremoBySum($sum_geo, 5)->percentil,
            "pctl_nat" => $baremo->getValueBaremoBySum($sum_nat, 6)->percentil,
            "pctl_san" => $baremo->getValueBaremoBySum($sum_san, 7)->percentil,
            "pctl_asi" => $baremo->getValueBaremoBySum($sum_asi, 8)->percentil,
            "pctl_jur" => $baremo->getValueBaremoBySum($sum_jur, 9)->percentil,
            "pctl_eco" => $baremo->getValueBaremoBySum($sum_eco, 10)->percentil,
            "pctl_com" => $baremo->getValueBaremoBySum($sum_com, 11)->percentil,
            "pctl_hum" => $baremo->getValueBaremoBySum($sum_hum, 12)->percentil,
            "pctl_art" => $baremo->getValueBaremoBySum($sum_art, 13)->percentil,
            "pctl_mus" => $baremo->getValueBaremoBySum($sum_mus, 14)->percentil,
            "pctl_lin" => $baremo->getValueBaremoBySum($sum_lin, 15)->percentil,
        ]);

        var_dump($resultado);


        // $baremo =  new BaremoModel();
        // $this->data['baremo'] = $baremo>getBaremo();
        // // dd($this->data['baremo']);
        // return $this->render('test.baremo');
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
            $estudiante  = new PersonaModel();
            Session::put('id_estudiante', $estudiante);
            return  response()->json($estudiante->getEstudiante($string), 200);
        }
    }
}
