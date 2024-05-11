<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->title = 'Tests';
        $this->page = 'admin-test';
    }
    public function index()
    {
        $data = TestModel::where('estado', '1')->get();
        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("test.index");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test' => 'required|unique:tests,test',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $test = TestModel::create([
            'test' => $request->test,
            'id_usuario' => Auth::id(),
        ]);
        if (!$test) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'test' => $test,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id = null)
    {
        $test = TestModel::find($id);
        if (!$test) {
            $data = [
                'message' => 'Test no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'test' => [
                'required',
                Rule::unique('tests')->ignore($test->id_test, 'id_test'),
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
        $test->update([
            'test' => $request->test,
            'id_usuario' => Auth::id(),
        ]);
        if (!$test) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Test actualizado correctamente.',
            'test' => $test,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id = null)
    {
        //
        $test = TestModel::find($id);
        if (!$test) {
            $data = [
                'message' => 'Test no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $test->update(['estado' => '0']);

        $data = [
            'message' => 'Test eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function baremo($id = null){
        return $this->render('baremo');
    }
}
