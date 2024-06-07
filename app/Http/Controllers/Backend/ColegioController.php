<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ColegioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColegioController extends Controller
{
    public function __construct()
    {
        $this->title = 'Colegios';
        $this->page = 'admin-colegio';
    }
    public function index()
    {
        // $this->data['departamentos'] = DepartamentoModel::where('estado', '1')->get();
        // $data = ColegioModel::where('estado', '1')->get();
        $data = ColegioModel::where('c.estado', '1')->from("colegios as c")
            // ->join('provincias as p', 'p.id_provincia', '=', 'm.id_provincia')
            // ->join('departamentos as d', 'd.id_departamento', '=', 'p.id_departamento')
            ->get();

        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("colegio.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'colegio' => 'required|unique:colegios,colegio',
            'id_provincia' => 'required',
        ], [
            'id_provincia.required' => 'Provincia requerida.',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $colegio = ColegioModel::create([
            'colegio' => $request->colegio,
            'id_provincia' => $request->id_provincia,
        ]);
        if (!$colegio) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'colegio' => $colegio,
            'message' => 'Colegio registrado exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $colegio = ColegioModel::find($id);
        if (!$colegio) {
            $data = [
                'message' => 'Colegio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'colegio' => [
                'required',
                Rule::unique('colegios')->ignore($colegio->id_colegio, 'id_colegio'),
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
        $colegio->update(['colegio' => $request->colegio, 'id_provincia' => $request->id_provincia]);
        if (!$colegio) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Colegio actualizado correctamente.',
            'colegio' => $colegio,
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
        $colegio = ColegioModel::find($id);
        if (!$colegio) {
            $data = [
                'message' => 'Colegio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $colegio->update(['estado' => '0']);

        $data = [
            'message' => 'Colegio eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
