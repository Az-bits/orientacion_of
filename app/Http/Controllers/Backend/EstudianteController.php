<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ColegioModel;
use App\Models\EstudianteModel;
use App\Models\PersonaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->title = 'Estudiantes';
        $this->page = 'admin-estudiante';
    }
    public function index()
    {
        /* init::Listar personas */

        $data = EstudianteModel::select('*')
            ->selectRaw("CONCAT_WS(' ', p.nombre, p.paterno, IFNULL(p.materno, '')) as nombre_completo")
            ->selectRaw("CONCAT_WS(' ', p.paterno, IFNULL(p.materno, '')) as apellidos")
            ->from('estudiantes as e')
            ->where('e.estado', '1')
            ->leftJoin('personas as p', 'p.id_persona', '=', 'e.id_persona')
            ->leftJoin('colegios as c', 'c.id_colegio', '=', 'e.id_colegio')
            ->orderBy('e.id_estudiante', 'desc')
            ->get();

        $this->data['colegios'] = ColegioModel::where('estado', '1')->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("estudiante.index");
    }
    public function create()
    {
        /* init::Crear estudiante */
        return $this->render("estudiante.form");
    }

    public function store(Request $request)
    {
        /* init::Guardar estudiante */
        $validator = Validator::make($request->all(), [
            'ci' => 'required|unique:personas,ci',
            'celular' => 'nullable|numeric|digits:8',
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required|max:2',
            'id_colegio' => 'required',
        ], [
            'ci.required' => 'Campo cédula es requerido',
            'id_colegio.required' => 'Campo colegio es requerido',
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
            'nombre' => $request->nombre,
            'paterno' => $apellidos[0],
            'materno' => isset($apellidos[1]) ? $apellidos[1] : '',
            'celular' => $request->celular,
            'genero' => $request->genero,
        ]);
        $estudiante =  DB::table('estudiantes')->insertGetId([
            'id_colegio' => $request->id_colegio,
            'edad' => $request->edad,
            'id_persona' => $persona->id_persona,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if (!$estudiante) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'estudiante' => $estudiante,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show(EstudianteModel $personaModel)
    {
        $id = 1;
        $estudiante = EstudianteModel::find($id);
        if (!$estudiante) {
            $data = [
                'message' => 'Estudiante no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'estudiante' => $estudiante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function edit(EstudianteModel $estudiante)
    {
        /* init::Editar estudiante */
        $this->data['estudiante'] = $estudiante;
        return $this->render('estudiante.edit-form');
    }
    public function update(Request $request, $id)
    {
        $estudiante = EstudianteModel::find($id);
        $persona = PersonaModel::find($estudiante->id_persona);
        if (!$estudiante) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'ci' => [
                'required',
                Rule::unique('personas')->ignore($persona->id_persona, 'id_persona'),
            ],
            'celular' => 'nullable|numeric|digits:8',
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required|max:2',
            'id_colegio' => 'required',

        ], [
            'ci.required' => 'Campo cédula es requerido',
            'id_colegio.required' => 'Campo colegio es requerido',
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

        $personaID = $persona->update([
            'ci' => trim($request->ci),
            'nombre' => $request->nombre,
            'paterno' => $apellidos[0],
            'materno' => isset($apellidos[1]) ? $apellidos[1] : '',
            'celular' => $request->celular,
            'genero' => $request->genero,
        ]);
        $estudiante = DB::table('estudiantes')
            ->where('id_estudiante', $id)
            ->update([
                'id_colegio' => $request->id_colegio,
                'edad' => $request->edad,
                'id_persona' => $persona->id_persona,
            ]);
        // if (!$estudiante) {
        //     $data = [
        //         'message' => 'Error al actualizar',
        //         'status' => 500
        //     ];
        //     return response()->json($data, 500);
        // }
        $data = [
            'message' => 'Estudiante actualizada exitosamente.',
            'estudiante' => $estudiante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id = null)
    {
        /* init::Ajax */
        $estudiante = EstudianteModel::find($id);
        if (!$estudiante) {
            $data = [
                'message' => 'Estudiante no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $estudiante->update(['estado' => '0']);

        $data = [
            'message' => 'Estudiante eliminada exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
