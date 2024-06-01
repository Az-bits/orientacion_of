<?php

namespace App\Http\Controllers\Backend\CarrerasAreas;

use App\Http\Controllers\Controller;
use App\Models\CarrerasAreas\AreaExistenteModel;
use App\Models\CarrerasAreas\AreaModel;
use App\Models\CarrerasAreas\CarreraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CarreraController extends Controller
{
    public function __construct()
    {
        $this->title = 'Carreras';
        $this->page = 'admin-carrera';
        $this->pageURL = 'carreras-areas/admin-carrera';
    }
    public function index()
    {
        $this->data['areas'] = AreaModel::where('estado', '1')->get();
        $this->data['areas_upea'] = AreaExistenteModel::where('estado', '1')->get();
        // $data = CarreraModel::where('estado', '1')->get();
        $data = CarreraModel::select('*', 'ae.nombre as area_existente', 'a.nombre as area', "c.estado as estado", "c.id_area")->where('c.estado', '1')->from('carreras as c')
            ->leftJoin('areas_existentes as ae', 'ae.id_area_existente', '=', 'c.id_area_existente')
            ->leftJoin('areas as a', 'a.id_area', '=', 'c.id_area')
            ->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("carreras-areas.carrera.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'carrera' => 'required|unique:carreras,carrera',
            'link' => 'required',
            'id_area_existente' => 'required',
            'id_area' => 'required',
            'celular' => 'numeric|digits:8',
            'direccion' => 'required',
        ], [
            'id_area_existente.required' => 'El campo area es obligatorio.',
            'id_area.required' => 'El campo area es obligatorio.',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $carrera = CarreraModel::create([
            'carrera' => $request->carrera,
            'link' => $request->link,
            'id_area_existente' => $request->id_area_existente,
            'id_area' => $request->id_area,
            'celular' => $request->celular,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
        ]);
        if (!$carrera) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'carrera' => $carrera,
            'message' => 'Carrera registrada exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $carrera = CarreraModel::find($id);
        if (!$carrera) {
            $data = [
                'message' => 'Carrera no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'carrera' => [
                'required',
                Rule::unique('carreras')->ignore($carrera->id_carrera, 'id_carrera'),
            ],
            'link' => 'required',
            'id_area_existente' => 'required',
            'id_area' => 'required',
            'celular' => 'numeric|digits:8',
            'direccion' => 'required',
        ], [
            'id_area_existente.required' => 'El campo area es obligatorio.',
            'id_area.required' => 'El campo area es obligatorio.',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $carrera->update([
            'carrera' => $request->carrera,
            'link' => $request->link,
            'id_area_existente' => $request->id_area_existente,
            'id_area' => $request->id_area,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'descripcion' => $request->descripcion,

        ]);
        if (!$carrera) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Carrera actualizada correctamente.',
            'carrera' => $carrera,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id = null)
    {
        //
        $carrera = CarreraModel::find($id);
        if (!$carrera) {
            $data = [
                'message' => 'Carrera no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $carrera->update(['estado' => '0']);

        $data = [
            'message' => 'Carrera eliminada exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
