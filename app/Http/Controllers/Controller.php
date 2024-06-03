<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// use App\Utils\MenuGenerator;
use App\Http\Controllers\MenuGenerator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use App\Utils\MenuGenerator as UtilsMenuGenerator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /* init::developer date */

    protected $developer = 'Edwin Alanoca Ramirez';
    protected $number = '67109724';
    protected $link = 'https://linktr.ee/azbits';
    protected $username = 'azbits';

    /* end::developer date */

    public $data = [];
    public $title = null;
    public $page = null;
    public $pageURL = null;
    public $sistema = 'Sistema Test O.V.';
    public function __construct()
    {
        $this->loadMenus();
    }

    protected function loadMenus()
    {
        // Cargar los menús y almacenarlos en la variable de sesión
        // PersonaController
        // session(['menus' => MenuGenerator::generate()]);
    }
    public function render($view)
    {
        $users = new User();
        $this->data['usuario'] = $users->getUsers(Auth::id());
        // dd($this->data['usuario']);
        // $this->data['notificaciones'] = ContactoModel::whereIn('estado', ['1'])->orderByDesc('fecha_creacion')->get();
        // $this->data['cantidad'] = ContactoModel::whereIn('estado', ['1'])->get()->count();

        // $user =  new UserModel();
        // $user = $user->getUsers(Auth::user()->id);
        // $this->data['rol'] = $user->rol;
        // $this->data['title'] = $this->title;
        // $this->data['page'] = $this->page;
        $menu  = $this->menu();
        $icon  = $this->iconMenu();
        // dd($menu);

        $title = $this->title;
        $data = $this->data;
        $sistema = $this->sistema;
        $page = $this->page;
        $pageURL = $this->pageURL;

        return view('backend.' . $view, compact('data', 'title', 'sistema', 'menu', 'icon', 'page', 'pageURL'));
    }

    protected function menu()
    {
        /* init::Menu del sistemas */
        $data = [
            // "Publicaciones" => [
            //     "Publicaciones" => "90",
            // ],

            // "Software" => [
            //     "Formularios" => "40",
            // ],
            // "Redes" => [
            //     "Formularios" => "60",
            // ],
            // "Mantenimiento" => [
            //     "Formularios" => "70",
            // ],
            // "Cuenta Usuarios" => [
            //     "Formularios" => "80",
            // ],
            // "panel principal" => 'dashboard',
            "estudiantes" => 'admin-estudiante',
            "preguntas" => 'admin-pregunta',
            // "respuestas" => 'admin-respuesta',

            // "administración" => [
            //     "usuarios" => "dashboard",
            //     // "roles" => "admin-persona",
            // ],

            "tests" => [
                // "Sovi 3" => "admin-sovi3",
                "Tests" => "admin-test",
                // "roles" => "admin-persona",
            ],
            "areas carreras" => [
                "carreras" => "admin-carrera",
                "areas existentes" => "admin-area-existente",
                "areas" => "admin-area",
                // "roles" => "admin-persona",
            ],
            "gestión territorial" => [
                "Departamentos" => "admin-departamento",
                "Provincias" => "admin-provincia",
                "Municipios" => "admin-municipio",
                // "roles" => "admin-persona",
            ],
            "baremo" => 'baremo',
            "personas" => 'admin-persona',

            // '<hr>',
            // "login",
            // "marines" => route('dashboard'),
            // "asda" => route('dashboard'),
            // "asd" => route('dashboard'),
            // "maasdsrines" => route('dashboard')
        ];
        return $data;
    }
    protected function iconMenu()
    {
        /* init::Iconos del menu */
        $iconos = [
            // 'titulo vista' =>'icono'
            'panel principal' => 'dashboard',
            'marines' => 'image',
            'estudiantes' => 'group_add',
            'respuestas' => 'fact_check',
            'personas' => 'person',
            'preguntas' => 'task_alt',
            'administración' => 'manage_accounts',
            'areas' => 'library_add',
            'entidades' => 'location_city',
            "tests" => 'app_registration',
            "gestión territorial" => 'public',
            "areas carreras" => 'school',
            "baremo" => 'format_list_numbered'
        ];
        return $iconos;
    }
}
