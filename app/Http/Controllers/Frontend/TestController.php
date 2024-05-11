<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Models\PreguntaModel;
use Illuminate\Http\Request;

class TestController extends FrontendController
{
    public function __construct()
    {
        $this->title = 'Preguntas';
        $this->page = 'admin-pregunta';
    }
    public function index()
    {
        $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
        // var_dump($this->data['preguntas'][0]);
        return $this->render('cuestionarios.test');
    }
    public function main()
    {
        // $this->data['preguntas'] = PreguntaModel::where('estado', '1')->get();
        // var_dump($this->data['preguntas'][0]);
        return $this->render('template.index');
    }
}
