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
use App\Models\TestModel;
use App\Models\VideoModel;
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
        return $this->render('cuestionarios.test');
    }
    public function pruebas()
    {
        $this->page = 'admin-test';
        $this->data['title'] = 'CUESTIONARIO DE INTERESES PROFESIONALES';
        $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
        return $this->render('cuestionarios.test-prueba');
    }
    public function main()
    {
        $this->page = '';
        $this->data['videos'] = VideoModel::where('estado', '1')->where('tipo', 'T')->get();
        return $this->render('index');
    }
    public function historialEstudiante()
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

        $this->data['respuestas'] =  ResultadoModel::where('id_estudiante', $idEstudiante)
            ->leftJoin('tests as t', 't.id_test', '=', 'resultados.id_test')
            ->orderBy('id_respuesta', 'desc')
            ->get();
        // dd($this->data['respuestas'][0]);    
        return $this->render('historial');
    }
    public function registrarEstudiante(Request $request)
    {
        $this->page = '';
        $data = DepartamentoModel::get();
        $this->data['departamentos'] = $data;
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
            Session::put('id_estudiante', $estudiante);
            return response()->json(["message" => "Registro exitoso"], 200);
        }
        return $this->render("registrarse");
    }
    public function registrarRespuesta(Request $request)
    {
        $this->page = 'resultado';
        //Seleccionamos estudiante
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
        $test = new TestModel();

        //obtenemos las sumas por area
        $resultado = '';
        if (!$request->id_respuesta) {
            $sum_cal = array_sum($request->preguntas[1] ?? 0);
            $sum_cie = array_sum($request->preguntas[2] ?? 0);
            $sum_dis = array_sum($request->preguntas[3] ?? 0);
            $sum_tec = array_sum($request->preguntas[4] ?? 0);
            $sum_geo = array_sum($request->preguntas[5] ?? 0);
            $sum_nat = array_sum($request->preguntas[6] ?? 0);
            $sum_san = array_sum($request->preguntas[7] ?? 0);
            $sum_asi = array_sum($request->preguntas[8] ?? 0);
            $sum_jur = array_sum($request->preguntas[9] ?? 0);
            $sum_eco = array_sum($request->preguntas[10] ?? 0);
            $sum_com = array_sum($request->preguntas[11] ?? 0);
            $sum_hum = array_sum($request->preguntas[12] ?? 0);
            $sum_art = array_sum($request->preguntas[13] ?? 0);
            $sum_mus = array_sum($request->preguntas[14] ?? 0);
            $sum_lin = array_sum($request->preguntas[15] ?? 0);
            //Guardamos los resultados obtenidos
            $resultado = ResultadoModel::create([
                'id_estudiante' => $idEstudiante ?? null,
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
        } else {
            $resultado =  ResultadoModel::where('id_respuesta', $request->id_respuesta)->first();
        }
        //Preparamos los datos el gráfico
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
        // dd($resultado);
        // dd($resultado->id_resultado);
        Session::put('id_respuesta', $resultado->id_resultado);
        //Preparamos los datos para mostrar los resultados
        $this->data['resultados'] = $test->getResultados($resultado);

        return $this->render('resultado');
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
                $data = ColegioModel::where('id_municipio', $id)->orderBy('id_colegio', 'desc')->get();
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
