@extends('frontend.app')
@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css">

    <style>
        footer {
            top: 90rem;
        }
    </style>
    <div class="loader-container">
        <div class="loader">
            <span>Cargando...</span>
        </div>
    </div>
    <div class="az-contenedor az-resultados" style="background: #000;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <img src="{{ asset('assets/images/banner6.jpg') }}" alt="" style="top: 0rem; z-index: 1;">
                    <div class="col-md-12">
                        <h3 class="title">Hola <b style="color:cyan;">{{ $data['estudiante']->nombre }}</b>, estos son su
                            historial de pruebas realizadas recientemente:</h3>
                    </div>
                    <div class="col-md-12" style="z-index: 99;">
                        <div class="form-container az-table">
                            <div class="table-container" id="scrollable-container">
                                @if (!$data['respuestas']->isEmpty())
                                    <table class="table-responsive table-bordered">
                                        <thead>
                                            <tr style="border-top: 0">
                                                <th scope="col">Test</th>
                                                <th scope="col" class="text-center">Fecha</th>
                                                <th scope="col" class="text-center">Hora</th>
                                                <th scope="col" class="text-center">Tiempo</th>
                                                <th scope="col" class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['respuestas'] as $main)
                                                <tr style="padding: 1rem">
                                                    <th scope="row" style="min-width: 8rem;">{{ $main['test'] }}</th>
                                                    <td class="az-info">
                                                        <h5 class="az-h5">
                                                            {{ date('Y-m-d', strtotime($main['created_at'])) }}</h5>
                                                    </td>
                                                    <td class="az-info">
                                                        <h5 class="az-h5">
                                                            {{ date('H:i:s', strtotime($main['created_at'])) }}</h5>
                                                    </td>
                                                    <td class="az-info">
                                                        <h5 class="az-h5">
                                                            {{ $main['tiempo'] }}</h5>
                                                    </td>
                                                    <td class="az-info">
                                                        <form action="{{ route('resultado') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_respuesta"
                                                                value={{ $main['id_respuesta'] }}>
                                                            <button type="submit"
                                                                class="btn btn-primary text-center">Ver</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h3>Aún no has realizado ningún test.</h3>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>

                {{-- <img src="https://orientacionvocacionaledu.upea.bo/assets_/form/img/fondo.jpg" alt=""> --}}
                {{-- <h3>Hola <b style="color:cyan;">EDWIN </b> estos son los resultados de tu Test de Orientación Vocacional, estas
                son las posibles carreras que puedes estudiar.<br>Complementa los resultados realizando el Test de Aptitudes
                Diferentes</h3> --}}
            </div>
        </div>
        <div id="particles-js" style=" display: none;position: absolute ; width: 100%; height: 100vh;"></div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script>
    <script>
        // Inicializa Perfect Scrollbar
    </script>
@endsection
