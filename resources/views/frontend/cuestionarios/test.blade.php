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
            background: #212330 !important;
            border-radius: 0 0 1rem 1rem;
        }

        header {
            margin-bottom: 10rem !important;
        }
    </style>
    @php
        $bg = ['0', '1', '2'];
        // $bg = ['0', '2', '3', '4', '5'];
        $lenght = 100 / count($data['preguntas']);
    @endphp
    <div class="wrapper position-relative overflow-hidden">

        <table>
            <thead>
                <tr>
                    <th>pregunta</th>
                    <th>respuesta</th>
                </tr>
            </thead>
            <tbody>
                <form class="multisteps_form" id="wizard" method="POST" action="{{ route('resultado') }}">
                    @foreach ($data['preguntas'] as $key => $item)
                        @csrf
                        <input type="hidden" value="1" name="id_test">
                        <tr>
                            <td>{{ $item->pregunta }}</td>
                            <td> Agrado<input for="opt_1" type="radio" class="required"
                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]" value="3"></td>
                            <td>
                                Indiferente<input for="opt_1" type="radio" class="required"
                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]" value="2">
                            </td>
                            <td>
                                Desagrado<input for="opt_1" type="radio" class="required"
                                    name="preguntas[{{ $item->id_area }}][{{ $item->id_pregunta }}]" value="1">
                            </td>
                        </tr>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Button</button>
                </form>
            </tbody>
        </table>
    </div>
    {{-- recursos para la plantilla del test` --}}
    {{-- <script src="<?= asset('plantilla-test/') ?>/assets/js/countdown.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/conditionize.flexible.jquery.min.js"></script>
    <script src="<?= asset('plantilla-test/') ?>/assets/js/script.js"></script> --}}
    <script>
        if (window.innerWidth > 1100) {
            // Ejecutar el script solo si el ancho de la ventana es mayor a 1100 píxeles
            window.scrollTo(0, 164.6602020263672);
        }
    </script>
@endsection
