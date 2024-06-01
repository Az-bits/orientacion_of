<?php

namespace App\Http\Controllers\Backend\Territoriales;

use App\Http\Controllers\Controller;
use App\Models\Territoriales\DepartamentoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->title = 'Departamentos';
        $this->page = 'admin-departamento';
        $this->pageURL = 'territoriales/admin-departamento';
    }
    public function index()
    {
        // $this->data = DepartamentoModel::where('', '1')->get();
        $data = DepartamentoModel::where('estado', '1')->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("territoriales/departamento.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'departamento' => 'required|unique:departamentos,departamento',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $departamento = DepartamentoModel::create([
            'departamento' => $request->departamento,
            'sigla' => $request->sigla,
        ]);
        if (!$departamento) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'departamento' => $departamento,
            'message' => 'Departamento registrado exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $departamento = DepartamentoModel::find($id);
        if (!$departamento) {
            $data = [
                'message' => 'Departamento no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'departamento' => [
                'required',
                Rule::unique('departamentos')->ignore($departamento->id_departamento, 'id_departamento'),
            ],
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $departamento->update(['departamento' => $request->departamento, 'sigla' => $request->sigla]);
        if (!$departamento) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Departamento actualizado correctamente.',
            'departamento' => $departamento,
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
        $departamento = DepartamentoModel::find($id);
        if (!$departamento) {
            $data = [
                'message' => 'Departamento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $departamento->update(['estado' => '0']);

        $data = [
            'message' => 'Departamento eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
