<!-- <php echo '<pre>';
    print_r($listar);
    echo '</pre>';
    exit();
    ?> -->



@extends('frontend.app')
@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;family=Lato&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plantilla-test/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plantilla-test/') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('plantilla-test/') }}/assets/css/style.css">
    <style>
        header .container-fluid {
            background: linear-gradient(to left, #ff990014, #111217) !important;
            border-radius: 0 0 1rem 1rem;
        }

        header {
            margin-bottom: 10rem !important;
        }
    </style>
    @php
        $bg = ['0', '2', '3', '4', '5'];
        $lenght = 100 / count($data['preguntas']);
    @endphp
    <div class="wrapper position-relative overflow-hidden">
        <div class="container-md-fluid p-3 p-lg-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="form_logo position-absolute">
                        <a href="{{ route('/') }}">
                            <img src="{{ asset('plantilla-test/assets/images/logo/logo-main.png') }}" alt="image-not-found">
                        </a>
                    </div>
                    <div class="steps_area step_area_fixed d-none d-xl-block">
                        <div class="image_holder">
                            <img class="overflow-hidden"
                                src="<?= asset('plantilla-test/') . '/assets/images/background/bg_' . $bg[array_rand($bg)] . '.png' ?>"
                                alt="image-not-found">
                        </div>
                        <div class="progress_bar step_items position-absolute" style="display: none;">
                            <div class="step d-block text-center bg-white position-relative active current">1</div>
                            <div class="step d-block text-center bg-white position-relative">2
                            </div>
                            <div class="step d-block text-center bg-white position-relative">3
                            </div>
                            <div class="step d-block text-center bg-white position-relative last">4
                            </div>
                            <div class="step d-block text-center bg-white position-relative active current">1</div>
                            <div class="step d-block text-center bg-white position-relative">2
                            </div>
                            <div class="step d-block text-center bg-white position-relative">3
                            </div>
                            <div class="step d-block text-center bg-white position-relative last">4
                            </div>
                        </div>
                        <div class="count_box d-flex flex-row mt-5 rounded-pill position-absolute">
                            <div class="count_clock ps-3">
                                <img src="{{ asset('plantilla-test/assets/images/clock/clock.png') }}"
                                    alt="image-not-fops-5 pt-5und">
                            </div>
                            <div class="count_title">
                                <h4 class="text-white">Test</h4>
                                <span class="text-white">Tiempo</span>
                            </div>
                            <div class="count_number p-3 d-flex justify-content-around align-items-center position-relative overflow-hidden bg-white rounded-pill timer countdown_timer"
                                data-countdown="2022/10/24">
                                <div class="count_hours">
                                    <h3>%H</h3><span class="text-uppercase">hrs</span>
                                </div>
                                <div class="count_min">
                                    <h3>%M</h3><span class="text-uppercase">min</span>
                                </div>
                                <div class="count_sec">
                                    <h3>%S</h3><span class="text-uppercase">seg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 az-section">
                    <form class="multisteps_form" id="wizard" method="POST" action="{{ route('resultado') }}">
                        @csrf
                        <!-- <button type="submit" class="btn btn-primary">Button</button> -->
                        <div class="multisteps_form_panel active">
                            <div class="form_content">
                                <div class="step_content d-block pt-5 pb-2">
                                    <h4 class="text-center">TEST DE ORIENTACIÓN VOCACIONAL {{ $data['title'] }}
                                    </h4>
                                    <div class="question_title d-block justify-content-center">
                                        <img class="d-flex m-auto img-test-logo"
                                            src="<?= asset('plantilla-test/' . 'assets/images/item-img/test.gif') ?>"
                                            alt="">
                                        <h2 class="d-flex m-auto">
                                            <!-- <h5 style="width:80%;margin:auto;max-width:800px;"><br> I) <br> II) <br> </h5> -->
                                            <ol>
                                                <li>Lee atentamente cada pregunta. </li>
                                                <li>Seleciona "SI" si tu respuesta es afirmativa, caso contrario selecciona
                                                    "NO". </li>
                                                <li>Responde a todas las preguntas sin omitir ninguna.</li>
                                            </ol>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <link rel="stylesheet" href="">
                            <div class="form_btn d-flex justify-content-center">
                                <button type="button" class="js-btn-next next_btn  text-uppercase text-white"
                                    id="iniciar">Iniciar test<span> <i class="fas fa-arrow-right"></i></span></button>
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Button</button> --}}
                        @foreach ($data['preguntas'] as $key => $item)
                            <div class="multisteps_form_panel">
                                <div class="form_content">
                                    <div class="step_content d-flex justify-content-between pt-5 pb-2">
                                        <h4>TEST DE ORIENTACIÓN VOCACIONAL {{ $data['title'] }}</h4>
                                        <span
                                            class="text-end text-uppercase">{{ 'pregunta ' . ($key + 1) . ' de ' . count($data['preguntas']) }}</span>
                                    </div>
                                    <div class="step_progress_bar">
                                        <div class="progress rounded-pill">
                                            <div class="progress-bar" style="width:<?= $lenght * ($key + 1) . '%' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="az-time count_box flex-row rounded-pill">
                                            <div class="count_clock ps-3">
                                                <img src="<?= asset('plantilla-test') ?>/assets/images/clock/clock.png"
                                                    alt="image-not-fops-5 pt-5und">
                                            </div>
                                            <div class="count_title">
                                                <span class="text-white">Tiempo</span>
                                            </div>
                                            <div class="count_number p-3 d-flex justify-content-around align-items-center position-relative overflow-hidden bg-white rounded-pill timer countdown_timer"
                                                data-countdown="2022/10/24">
                                                <div class="count_hours">
                                                    <h3>%H</h3><span class="text-uppercase">hrs</span>
                                                </div>
                                                <div class="count_min">
                                                    <h3>%M</h3><span class="text-uppercase">min</span>
                                                </div>
                                                <div class="count_sec">
                                                    <h3>%S</h3><span class="text-uppercase">sec</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="question_title py-5">
                                        <h5>Es de tu interés :</h5>
                                        <h2>{{ $item->pregunta }}</h2>

                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 form_items radio-list az-row">
                                        <div class="col-4">
                                            <label id="opt_1"
                                                class="step_1 d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_25ms">
                                                <div class="step_box_icon">
                                                    <img src="<?= asset('plantilla-test/') ?>/assets/images/item-img/item_4.png"
                                                        alt="image-not-found">
                                                </div>
                                                <span class="step_box_text pt-2">
                                                    Agrado
                                                </span>
                                                <input for="opt_1" type="radio" class="required"
                                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]"
                                                    value="3">
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label id="opt_2"
                                                class="step_1 d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_25ms">
                                                <div class="step_box_icon">
                                                    <img src="<?= asset('plantilla-test/') ?>/assets/images/item-img/item_1.png"
                                                        alt="image-not-found">
                                                </div>
                                                <span class="step_box_text pt-2 d-flex justify-content-center">
                                                    Indiferente
                                                </span>

                                                <input for="opt_2" type="radio" class="required"
                                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]"
                                                    value="2">
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label id="opt_3"
                                                class="step_1 d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_25ms">
                                                <div class="step_box_icon">
                                                    <img src="<?= asset('plantilla-test/') ?>/assets/images/item-img/item_0.png"
                                                        alt="image-not-found">
                                                </div>
                                                <span class="step_box_text pt-2">
                                                    Desagrado
                                                </span>

                                                <input for="opt_3" type="radio" class="required"
                                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]"
                                                    value="1">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form_btn pt-5 d-flex justify-content-between">
                                    @if ($item != $data['preguntas'][0])
                                        <button type="button" class="js-btn-prev prev_btn text-uppercase bg-white"
                                            id="prevBtn"><span><i class="fas fa-arrow-left"></i></span>anterior
                                            <span class="js-btn-prev">pregunta</span>
                                        </button>
                                    @endif
                                    <button type="{{ $item != end($data['preguntas']) ? 'button' : 'submit' }}"
                                        class="js-btn-next next_btn text-uppercase text-white" id="nextBtn">Siguiente
                                        <span class="js-btn-next">pregunta</span> <span><i
                                                class="fas fa-arrow-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- recursos para la plantilla del test` --}}
    <script src="<?= asset('plantilla-test/') ?>/assets/js/countdown.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/conditionize.flexible.jquery.min.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/script.js"></script>
    <script>
        if (window.innerWidth > 1100) {
            // Ejecutar el script solo si el ancho de la ventana es mayor a 1100 píxeles
            window.scrollTo(0, 164.6602020263672);
        }
    </script>
@endsection
