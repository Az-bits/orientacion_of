@extends('frontend.app')
@section('content')
    <style>
        footer {
            top: 64rem;
        }

        @media (max-width: 992px) {
            footer {
                top: 90rem;
            }
        }
    </style>
    <div class="loader-container">
        <div class="loader">
            <span>Cargando...</span>
        </div>
    </div>
    <div id="particles-js" class="az-contenedor" style="background: #000;">
        <img src="{{ asset('assets/images/banner6.jpg') }}" alt="" style="top: 0rem;">
        <div class="form-container">
            <form class="form" id="form-main">
                @csrf
                <h3>Datos Personales</h3>
                {{-- <p class="m-0">Para poder realizar el test, introduzca los datos correspondientes.</p> --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="datos-personales-tab" data-bs-toggle="tab"
                            data-bs-target="#datos-personales" type="button" role="tab"
                            aria-controls="datos-personales" aria-selected="true">Datos Personales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="datos-colegio-tab" data-bs-toggle="tab" data-bs-target="#datos-colegio"
                            type="button" role="tab" aria-controls="datos-colegio" aria-selected="false">Datos de
                            Colegio</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="datos-personales" role="tabpanel"
                        aria-labelledby="datos-personales-tab">
                        <div class="row" id="date-student">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ci">Cedula de Identidad</label>
                                    <input name="ci" id="ci" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input name="nombres" id="nombres" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input name="apellidos" id="apellidos" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input name="celular" id="celular" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input name="edad" id="edad" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="genero">Género</label>
                                    <select class="form-select" id="genero" name="genero">
                                        <option disabled selected hidden>[SELECCIONE]</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="mt-3" id="to-datos-colegio" type="button">
                            <span>Siguiente</span>
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path fill="none" d="M0 0h24v24H0V0z" />
                                        <path fill="currentColor" d="M10 17l5-5-5-5v10zm0 0l5-5-5-5v10z" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="tab-pane fade" id="datos-colegio" role="tabpanel" aria-labelledby="datos-colegio-tab">
                        <div class="row" id="data-">
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <select class="form-select" id="departamento" name="departamento">
                                        <option disabled selected hidden>[SELECCIONE]</option>
                                        @foreach ($data['departamentos'] as $item)
                                            <option value="{{ $item->id_departamento }}">{{ $item->departamento }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="provincia">Provincia</label>
                                    <select class="form-select" id="provincia" name="provincia" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="municipio">Municipio</label>
                                    <select class="form-select" id="municipio" name="municipio" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="colegio">Colegio</label>
                                    <select class="form-select" id="colegio" name="colegio" disabled>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="active mt-2" id="btn-submit" data-bs-toggle="tab"
                            data-bs-target="#datos-personales-pane" type="button" role="tab"
                            aria-controls="datos-personales-pane" aria-selected="true">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <span>Registrarse</span>
                        </button>
                    </div>
                </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {

        // })
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                Swal.fire({
                    title: "¡Bienvenido!",
                    text: "Registrarte para poder realizar el test.",
                    icon: "success"
                });

            }, 500);
        });
    </script>
@endsection
