<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EstudianteModel;
use Illuminate\Http\Request;
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

        $data = EstudianteModel::select('*')->selectRaw("CONCAT_WS(' ', nombre, paterno, IFNULL(materno, '')) as nombre_completo")->where('estado', '1')->orderBy('id_persona', 'desc')->get();
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
        // dd($_POST);
        $validator = Validator::make($request->all(), [
            'ci' => 'required|unique:personas,ci',
            'nombre' => 'required',
            'paterno' => 'required',
            'celular' => 'required|numeric|digits:8',
            'genero' => 'required',
            'complemento' => 'max:5',
            'correo' => 'nullable|email',
        ], [
            'ci.required' => 'Campo cedula es requerido',
            'ci.unique' => 'La cedula ya ha sido tomado.',
            'expedido.required' => 'Campo requerido',
            'complemento.max' => 'Máximo 5 caracteres',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $estudiante = EstudianteModel::create([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'ci' => $request->ci,
            'fecha_nac' => $request->fecha_nac,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'expedido' => $request->expedido,
            'genero' => $request->genero,
            'correo' => $request->correo,
            'complemento' => $request->complemento,
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
                Rule::unique('estudiantes')->ignore($estudiante->id_estudiante, 'id_estudiante'),
            ],
            'nombre' => 'required',
            'paterno' => 'required',
            // 'celular' => 'required|numeric|digits:8',
            'genero' => 'required',
            'complemento' => 'max:5',
            'correo' => 'nullable|email',

        ], [
            'ci.required' => 'Campo cedula es requerido',
            'ci.unique' => 'La cedula ya ha sido tomado.',
            'expedido.required' => 'Campo requerido',
            'complemento.max' => 'Máximo 5 caracteres',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $estudiante->update([
            'nombre' => $request->nombre, //eliminar espacios
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'ci' => $request->ci,
            'fecha_nac' => $request->fecha_nac,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'expedido' => $request->expedido,
            'genero' => $request->genero,
            'correo' => $request->correo,
            'complemento' => $request->complemento,
        ]);
        if (!$estudiante) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Estudiante actualizada executad',
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
