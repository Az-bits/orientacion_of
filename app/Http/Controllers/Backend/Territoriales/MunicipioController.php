<?php

namespace App\Http\Controllers\Backend\Territoriales;

use App\Http\Controllers\Controller;
use App\Models\Territoriales\DepartamentoModel;
use App\Models\Territoriales\MunicipioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->title = 'Municipios';
        $this->page = 'admin-municipio';
        $this->pageURL = 'territoriales/admin-municipio';
    }
    public function index()
    {
        $this->data['departamentos'] = DepartamentoModel::where('estado', '1')->get();
        // $data = MunicipioModel::where('estado', '1')->get();
        $data = MunicipioModel::where('m.estado', '1')->from("municipios as m")
            ->join('provincias as p', 'p.id_provincia', '=', 'm.id_provincia')
            ->join('departamentos as d', 'd.id_departamento', '=', 'p.id_departamento')
            ->get();

        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("territoriales/municipio.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'municipio' => 'required|unique:municipios,municipio',
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
        $municipio = MunicipioModel::create([
            'municipio' => $request->municipio,
            'id_provincia' => $request->id_provincia,
        ]);
        if (!$municipio) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'municipio' => $municipio,
            'message' => 'Municipio registrado exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $municipio = MunicipioModel::find($id);
        if (!$municipio) {
            $data = [
                'message' => 'Municipio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'municipio' => [
                'required',
                Rule::unique('municipios')->ignore($municipio->id_municipio, 'id_municipio'),
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
        $municipio->update(['municipio' => $request->municipio,'id_provincia' => $request->id_provincia]);
        if (!$municipio) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Municipio actualizado correctamente.',
            'municipio' => $municipio,
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
        $municipio = MunicipioModel::find($id);
        if (!$municipio) {
            $data = [
                'message' => 'Municipio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $municipio->update(['estado' => '0']);

        $data = [
            'message' => 'Municipio eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
