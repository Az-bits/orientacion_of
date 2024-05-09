<?php

namespace App\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuGenerator extends Controller
{
    public static function generate()
    {
        $ion = Auth::user(); // Suponiendo que estás utilizando el sistema de autenticación de Laravel

        $data = [];

        // if ($ion->user('members')) {
        //     $data["members"]["Te perdiste!!!"] = "00000";
        // }

        // if ($ion->in_group('admin')) {
        $data = [
            "Publicaciones" => [
                "Publicaciones" => "90",
            ],

            "Software" => [
                "Formularios" => "40",
            ],
            "Redes" => [
                "Formularios" => "60",
            ],
            "Mantenimiento" => [
                "Formularios" => "70",
            ],
            "Cuenta Usuarios" => [
                "Formularios" => "80",
            ],
            "Administración" => [
                "Usuarios" => "21",
                "Grupos de usuario" => "22",
                "Mantenimiento" => "23",
            ],
        ];
        // }

        // if ($ion->in_group('mantenimiento')) {
        $data = [
            "Mantenimiento" => [
                "Solicitudes" => "70",
                "Revisiónes" => "80",
            ],
        ];
        // }

        return $data;
    }
}
