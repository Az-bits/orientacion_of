@extends('frontend.app')
@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css">

    <style>
        footer {
            top: 63rem;
        }
    </style>
    <div class="loader-container">
        <div class="loader">
            <span>Cargando...</span>
        </div>
    </div>
    <div id="particles-js" class="az-resultados az-contenedor" style="background: #000;">
        <h3 class="title">Hola <b style="color:cyan;">EDWIN </b> estos
            son los resultados de tu Test de
            Orientación Vocacional, estas son las posibles carreras que puedes estudiar.<br>Complementa los resultados
            realizando el Test de Aptitudes Diferentes</h3>
        <img src="https://orientacionvocacionaledu.upea.bo/assets_/form/img/fondo.jpg" alt="">
        {{-- <h3>Hola <b style="color:cyan;">EDWIN </b> estos son los resultados de tu Test de Orientación Vocacional, estas
            son las posibles carreras que puedes estudiar.<br>Complementa los resultados realizando el Test de Aptitudes
            Diferentes</h3> --}}
        <div class="form-container az-table">
            <div class="table-container" id="scrollable-container">
                <table class=" table-bordered">
                    <thead>
                        <tr style="border-top: 0">
                            <th scope="col">ÁREA</th>
                            <th scope="col" class="text-center">ÁREAS Y CARRERAS EXISTENTES EN LA UNIVERSIDAD PÚBLICA DE
                                EL
                                ALTO</th>
                            <th scope="col" class="text-center">DIRECCIÓN, CONTACTOS Y CONVOCATORIAS</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row" style="min-width: 8rem;">Humanística</th>
                            <td class="az-info">
                                <h4>Área Ciencias de la Educación</h4>
                                <ul>
                                    <li><i class="fa-solid fa-caret-right"></i> Carrera Ciencias de la Educación</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Educación Parvularia</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Psicomotricidad</li>
                                </ul>
                            </td>
                            <td>Av. sucre A, edif. Área ciencias de la educación, primer piso
                                www.educacion.upea.edu.bo
                                Número: 222222222
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Humanística</th>
                            <td class="az-info">
                                <h4>Área Ciencias de la Educación</h4>
                                <ul>
                                    <li><i class="fa-solid fa-caret-right"></i> Carrera Ciencias de la Educación</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Educación Parvularia</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Psicomotricidad</li>
                                </ul>
                            </td>
                            <td>Av. sucre A, edif. Área ciencias de la educación, primer piso
                                www.educacion.upea.edu.bo
                                Número: 222222222
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Humanística</th>
                            <td class="az-info">
                                <h4>Área Ciencias de la Educación</h4>
                                <ul>
                                    <li><i class="fa-solid fa-caret-right"></i> Carrera Ciencias de la Educación</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Educación Parvularia</li>
                                    <li><i class="fa-solid fa-caret-right"></i> Psicomotricidad</li>
                                </ul>
                            </td>
                            <td>Av. sucre A, edif. Área ciencias de la educación, primer piso
                                www.educacion.upea.edu.bo
                                Número: 222222222
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-container" style="width: 14rem;  top: 17rem; left: 4rem;">
            <button type="button" class="btn btn-primary" style="font-size: 11px">Exportar como PDF</button>
            <button type="button" class="btn btn-primary" style="font-size: 11px">Finalizar</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script>
    <script>
        // Inicializa Perfect Scrollbar
        const ps = new PerfectScrollbar('#scrollable-container');
    </script>
@endsection
