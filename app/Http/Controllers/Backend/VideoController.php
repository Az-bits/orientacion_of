<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarrerasAreas\AreaModel;
use App\Models\CarrerasAreas\CarreraModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->title = 'Videos';
        $this->page = 'admin-video';
    }
    public function index()
    {
        /* init::Listar videos */

        $data = VideoModel::select('*', DB::raw('DATE(created_at) AS fecha'))->where('estado', '1')->orderBy('id_video', 'desc')->get();
        $this->data['areas'] = AreaModel::where('estado', '1')->orderBy('id_area', 'desc')->get();
        $this->data['carreras'] = CarreraModel::where('estado', '1')->orderBy('id_carrera', 'desc')->get();

        if (request()->ajax()) {
            return response()->json(['data' => $data], 200);
        }
        return $this->render("video.index");
    }
    public function store(Request $request)
    {
        /* init::Guardar video */
        $validator = Validator::make($request->all(), ['enlace' => 'required', 'titulo' => 'required',]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $video = VideoModel::create([
            'id_usuario' => Auth::id(),
            'enlace' => $request->enlace,
            'id_area' => $request->id_area,
            'titulo' => $request->titulo,
            'tipo' => $request->tipo ?? 'N',
            'id_carrera' => $request->id_carrera,
        ]);
        if (!$video) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'video' => $video,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show(VideoModel $videoModel)
    {
        $id = 1;
        $video = VideoModel::find($id);
        if (!$video) {
            $data = [
                'message' => 'Video no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'video' => $video,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function edit(VideoModel $video)
    {
        /* init::Editar video */
        $this->data['video'] = $video;
        return $this->render('video.edit-form');
    }
    public function update(Request $request, $id)
    {
        $video = VideoModel::find($id);
        if (!$video) {
            $data = [
                'message' => 'Video no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), ['enlace' => 'required', 'titulo' => 'required',]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $video = $video->update([
            'id_usuario' => Auth::id(),
            'enlace' => $request->enlace,
            'id_area' => $request->id_area,
            'tipo' => $request->tipo  ?? 'N',
            'titulo' => $request->titulo,
            'id_carrera' => $request->id_carrera,
        ]);
        if (!$video) {
            $data = [
                'message' => 'Error al actualizar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Video actualizada exitosamente.',
            'video' => $video,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id = null)
    {
        /* init::Ajax */
        $video = VideoModel::find($id);
        if (!$video) {
            $data = [
                'message' => 'Video no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $video->update(['estado' => '0']);

        $data = [
            'message' => 'Video eliminado exitosamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
