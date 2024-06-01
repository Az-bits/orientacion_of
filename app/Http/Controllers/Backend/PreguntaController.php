<?php

namespace App\Http\Controllers\Backend;

use App\Models\PreguntaModel;
use App\Http\Controllers\Controller;
use App\Models\CarrerasAreas\AreaModel;
use App\Models\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->title = 'Preguntas';
        $this->page = 'admin-pregunta';
    }
    public function index()
    {
        $this->data['areas'] = AreaModel::where('estado', '1')->get();
        $this->data['tests'] = TestModel::where('estado', '1')->get();
        $this->data['persist_id_test'] = '';
        $this->data['persist_id_area'] = '';
        $data = PreguntaModel::where('preguntas.estado', '1')
            ->join('areas', 'preguntas.id_area', '=', 'areas.id_area')
            ->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("pregunta.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pregunta' => 'required|unique:preguntas,pregunta',
            'id_test' => 'required',
            'id_area' => 'required'
        ], [
            'id_test.required' => 'El campo test es obligatorio.',
            'id_area.required' => 'El campo area es obligatorio.'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $pregunta = PreguntaModel::create([
            'pregunta' => $request->pregunta,
            'id_usuario' => Auth::id(),
            'id_test' => $request->id_test,
            'id_area' => $request->id_area,
        ]);
        if (!$pregunta) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'pregunta' => $pregunta,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $pregunta = PreguntaModel::find($id);
        if (!$pregunta) {
            $data = [
                'message' => 'Test no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'pregunta' => [
                'required',
                Rule::unique('preguntas')->ignore($pregunta->id_pregunta, 'id_pregunta'),
            ],
            'id_test' => 'required',
            'id_area' => 'required'
        ], [
            'id_test.required' => 'El campo test es obligatorio.',
            'id_area.required' => 'El campo area es obligatorio.'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $pregunta->update([
            'pregunta' => $request->pregunta,
            'id_usuario' => Auth::id(),
            'id_test' => $request->id_test,
            'id_area' => $request->id_area,
        ]);
        if (!$pregunta) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Test actualizado correctamente.',
            'pregunta' => $pregunta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id = null)
    {
        //
        $pregunta = PreguntaModel::find($id);
        if (!$pregunta) {
            $data = [
                'message' => 'Test no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $pregunta->update(['estado' => '0']);

        $data = [
            'message' => 'Test eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
