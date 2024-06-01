<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PersonaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class PersonaController extends Controller
{
    public function __construct()
    {
        $this->title = 'Personas';
        $this->page = 'admin-persona';
    }
    public function index()
    {
        /* init::Listar personas */

        $data = PersonaModel::select('*')->selectRaw("CONCAT_WS(' ', nombre, paterno, IFNULL(materno, '')) as nombre_completo")->where('estado', '1')->orderBy('id_persona', 'desc')->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("persona.index");
    }
    public function listarPersonaAjax()
    {
        $personas = PersonaModel::where('estado', '1')->get();
        // return response()->json($persona);s

        $persona = PersonaModel::where('estado', '1')->get();
        if ($persona->isEmpty()) {
            $data = [
                'message' => 'No se encontraron registros.',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        $data = [
            'personas' => $personas,
            'status' => 200
        ];
        // return response()->json($persona, 200);
        return response()->json($data, 200);
    }
    public function create()
    {
        /* init::Crear persona */
        return $this->render("persona.form");
    }

    public function store(Request $request)
    {
        /* init::Guardar persona */
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
        $persona = PersonaModel::create([
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
        if (!$persona) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'persona' => $persona,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show(PersonaModel $personaModel)
    {
        $id = 1;
        $persona = PersonaModel::find($id);
        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function edit(PersonaModel $persona)
    {
        /* init::Editar persona */
        $this->data['persona'] = $persona;
        return $this->render('persona.edit-form');
    }
    public function update(Request $request, $id)
    {
        $persona = PersonaModel::find($id);
        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'ci' => [
                'required',
                Rule::unique('personas')->ignore($persona->id_persona, 'id_persona'),
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
        $persona->update([
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
        if (!$persona) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Persona actualizada executad',
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id = null)
    {
        /* init::Ajax */
        $persona = PersonaModel::find($id);
        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $persona->update(['estado' => '0']);

        $data = [
            'message' => 'Persona eliminada exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
