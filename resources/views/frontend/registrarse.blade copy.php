<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('frontend/css/global.styles.css') }}">

</head>

<body>
    <div class="loader-container">
        <div class="loader">
            <span>Cargando...</span>
        </div>
    </div>
    <div id="particles-js" class="az-contenedor" style="background: #000;
    ">
        <img src="https://orientacionvocacionaledu.upea.bo/assets_/form/img/fondo.jpg" alt="">
        <div class="form-container">
            <form class="form" id="form-main">
                @csrf
                <h3>Datos Personales</h3>
                {{-- <p class="m-0">Para poder realizar el test, introduzca los datos correspondientes.</p> --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="display: none;">
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="datos-personales-tab" data-bs-toggle="tab"
                            data-bs-target="#datos-personales" type="button" role="tab"
                            aria-controls="datos-personales" aria-selected="true">Datos Personales</button>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="datos-colegio-tab" data-bs-toggle="tab" data-bs-target="#datos-colegio" type="button" role="tab" aria-controls="datos-colegio" aria-selected="false">Datos de Colegio</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="datos-personales" role="tabpanel" aria-labelledby="datos-personales-tab">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
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
                        <button class="active mt-2" id="btn-submit" data-bs-toggle="tab" data-bs-target="#datos-personales-pane" type="button" role="tab" aria-controls="datos-personales-pane" aria-selected="true">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
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


    <script src="{{ asset('material-dashboard/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/assets/js/plugins/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script src="{{ asset('frontend/js/global.scripts.js') }}"></script>

    <script src="https://vincentgarreau.com/particles.js/assets/_build/js/lib/particles.js"></script>
    <script>
        particlesJS({
            "particles": {
                "number": {
                    "value": 43,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
    {{-- <script>
        $('#ci').val('12345');
        $('#nombres').val('Edwin');
        $('#apellidos').val('Alanoca Ramirez');
        $('#celular').val('12345678');
        $('#edad').val('24');
        $('#genero').val('M');
    </script> --}}
    <script>
        $(document).ready(function() {
            let status = false;
            let selectDepartamento = $('#departamento');
            let cedula = $('#ci');
            let selectProvincia = $('#provincia');
            let selectMunicipio = $('#municipio');
            let selectColegio = $('#colegio');
            // Configuración de las reglas de validación una vez al cargar la página
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            selectDepartamento.change(function() {
                let idDepartamento = $(this).val();
                ajaxData(selectProvincia, 'provincias', idDepartamento, 'id_provincia', 'provincia');
            });
            selectProvincia.change(function() {
                let idMunicipio = $(this).val();
                ajaxData(selectMunicipio, 'municipios', idMunicipio, 'id_municipio', 'municipio');
            });
            selectMunicipio.change(function() {
                let idColegio = $(this).val();
                ajaxData(selectColegio, 'colegios', idColegio, 'id_colegio', 'colegio');
            });
            cedula.change(function() {
                $.ajax({
                    url: `/buscarEstudiante/${$(this).val()}`,
                    method: 'GET', // O 'GET' dependiendo de tu necesidad
                    success: function(r) {
                        console.log(r);
                        $("form#form-main :input").each(function() {
                            let e = $(this);
                            let name = $(this).attr("name");
                            if (e.prop("tagName") == "SELECT") {
                                e.val(r[name]).trigger("change");
                            } else {
                                e.val(r[name]);

                            }
                        });
                        // console.log('Respuesta del servidor:', response);
                        // select.prop('disabled', false)
                        // changeSelect(response, select, respId, respName);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la petición AJAX:', error);
                    }
                });
            });
            $("#form-main").validate({
                rules: {
                    ci: {
                        required: true,
                    },
                    // nombreCompleto: "required",
                    // edad: {
                    //     required: true,
                    //     digits: true, // Permite solo números
                    //     maxlength: 2,
                    // },
                    // celular: {
                    //     required: true,
                    //     digits: true, // Permite solo números
                    //     minlength: 8,
                    //     maxlength: 8,
                    // },
                    // genero: "required",
                    departamento: "required",


                    // ci: "required",
                    // ci: "required",
                    // Aquí puedes agregar más reglas de validación según sea necesario
                },
                messages: {
                    ci: {
                        required: "Campo requerido",
                        // regex: "Por favor, introduce solo caracteres alfabéticos"
                    },
                    nombreCompleto: "Campo requerido",
                    edad: {
                        required: "Campo requerido",
                        digits: "Por favor, introduce solo números",
                        maxlength: "El edad debe tener maximo 2 dígitos"
                    },
                    celular: {
                        required: "Campo requerido",
                        digits: "Por favor, introduce solo números",
                        minlength: "El celular debe tener exactamente 8 dígitos",
                        maxlength: "El celular debe tener exactamente 8 dígitos"
                    },
                    genero: "Campo requerido",
                    departamento: "Campo requerido",
                    // Aquí puedes agregar mensajes de error personalizados para cada regla de validación
                }
            });
            // Evento de clic en #to-datos-colegio para activar la validación del formulario
            $('#to-datos-colegio').click(function() {
                if ($("#form-main").valid()) {
                    $('#datos-colegio-tab').tab('show');
                    $('#datos-colegio-tab').addClass('active');
                    $('#datos-personales-tab').removeClass('active');
                }
            });
            $('#btn-submit').click(function() {
                if ($("#form-main").valid()) {
                    // console.log('submit');
                    $.ajax({
                        url: `/registrarse`,
                        method: 'POST', // O 'GET' dependiendo de tu necesidad
                        data: $("#form-main").serialize(),
                        success: function(response) {
                            // console.log('Respuesta del servidor:', response);
                            // select.prop('disabled', false)
                            // changeSelect(response, select, respId, respName);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la petición AJAX:', error);
                        }
                    });
                }
            });

            function ajaxData(select, tabla, id, respId, respName) {
                $.ajax({
                    url: `/getSelect/${tabla}/${id}`,
                    method: 'GET', // O 'GET' dependiendo de tu necesidad
                    success: function(response) {
                        // console.log('Respuesta del servidor:', response);
                        select.prop('disabled', false)
                        changeSelect(response, select, respId, respName);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la petición AJAX:', error);
                    }
                });
            }

            function changeSelect($data, $select, id, name) {
                $select.empty();
                $select.append('<option selected disabled hidden>[SELECCIONE]</option>');
                $.each($data, function(key, value) {
                    $select.append('<option value="' + value[id] + '">' + value[name] +
                        '</option>');
                });

            }
        });
    </script>
    <script></script>
</body>

</html>