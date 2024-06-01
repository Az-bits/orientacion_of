<?php

namespace App\Http\Controllers\Backend\CarrerasAreas;

use App\Http\Controllers\Controller;
use App\Models\CarrerasAreas\AreaExistenteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AreaExistenteController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->title = 'Areas Existentes en la UPEA';
        $this->page = 'admin-area-existente';
        $this->pageURL = 'carreras-areas\admin-area-existente';
    }
    public function index()
    {
        // $this->data = AreaExistenteModel::where('', '1')->get();
        $data = AreaExistenteModel::where('estado', '1')->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("carreras-areas.area-existente.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:areas,nombre',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $area = AreaExistenteModel::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        if (!$area) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'area' => $area,
            'message' => 'Area registrada exitosamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $area = AreaExistenteModel::find($id);
        if (!$area) {
            $data = [
                'message' => 'Area no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                Rule::unique('areas')->ignore($area->id_area, 'id_area'),
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
        $area->update(['nombre' => $request->nombre, 'descripcion' => $request->descripcion]);
        if (!$area) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Area actualizada correctamente.',
            'area' => $area,
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
        $area = AreaExistenteModel::find($id);
        if (!$area) {
            $data = [
                'message' => 'Area no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $area->update(['estado' => '0']);

        $data = [
            'message' => 'Area eliminada exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
