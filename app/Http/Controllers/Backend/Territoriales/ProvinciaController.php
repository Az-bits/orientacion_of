<?php

namespace App\Http\Controllers\Backend\Territoriales;

use App\Http\Controllers\Controller;
use App\Models\Territoriales\DepartamentoModel;
use App\Models\Territoriales\ProvinciaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProvinciaController extends Controller
{
    public function __construct()
    {
        $this->title = 'Provincias';
        $this->page = 'admin-provincia';
        $this->pageURL = 'territoriales/admin-provincia';
    }
    public function index()
    {
        $this->data['departamentos'] = DepartamentoModel::where('estado', '1')->get();
        // $data = ProvinciaModel::where('estado', '1')->get();
        $data = ProvinciaModel::where('p.estado', '1')->from("provincias as p")
            ->join('departamentos as d', 'd.id_departamento', '=', 'p.id_departamento')
            ->get();

        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("territoriales/provincia.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provincia' => 'required|unique:provincias,provincia',
            'id_departamento' => 'required',
        ], [
            'id_departamento.required' => 'Departamento requerido.',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $provincia = ProvinciaModel::create([
            'provincia' => $request->provincia,
            'id_departamento' => $request->id_departamento,
        ]);
        if (!$provincia) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'provincia' => $provincia,
            'message' => 'Provincia registrado exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $provincia = ProvinciaModel::find($id);
        if (!$provincia) {
            $data = [
                'message' => 'Provincia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'provincia' => [
                'required',
                Rule::unique('provincias')->ignore($provincia->id_provincia, 'id_provincia'),
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
        $provincia->update(['provincia' => $request->provincia,'id_departamento' => $request->id_departamento]);
        if (!$provincia) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Provincia actualizado correctamente.',
            'provincia' => $provincia,
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
        $provincia = ProvinciaModel::find($id);
        if (!$provincia) {
            $data = [
                'message' => 'Provincia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $provincia->update(['estado' => '0']);

        $data = [
            'message' => 'Provincia eliminada exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
