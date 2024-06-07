@extends('frontend.app')
@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css">

    <style>
        /* footer {top: 90rem;} */
        .az-contenedor {
            position: static;
            height: auto;
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
                    <div class="col-md-12">
                        <h3 class="title">
                            ¡Hola <b style="color:cyan;">{{ $data['estudiante']->nombre ?? '' }}</b>! Estos son los
                            resultados de tu Test de Orientación Vocacional. Basándonos en tus intereses, estas son algunas
                            de las carreras que podrías considerar estudiar.
                        </h3>

                    </div>
                    <div class="col-md-12">
                        <div class="form-container az-table">
                            <div class="table-container" id="scrollable-container">
                                @if ($data['resultados'])
                                    <table class="table-responsive table-bordered">
                                        <thead>
                                            <tr style="border-top: 0">
                                                <th scope="col">ÁREA</th>
                                                <th scope="col" class="text-center">ÁREAS Y CARRERAS EXISTENTES EN LA
                                                    UNIVERSIDAD PÚBLICA DE EL ALTO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['resultados'] as $main)
                                                <tr>
                                                    {{-- <th scope="row" rowspan="2" style="min-width: 8rem;">{{ $item->area }}</th> --}}
                                                    <th scope="row" style="min-width: 8rem;">{{ $main['area'] }}</th>
                                                    <td class="az-info">
                                                        <h4>{{ $main['area_existente'] }}</h4>
                                                        <ul>
                                                            @foreach ($main['carreras'] as $c)
                                                                <li><i class="fa-solid fa-caret-right"></i>
                                                                    {{ $c['carrera'] }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div id="contentToExport" style="position: none;">
                                        <canvas id="myChart"
                                            style="width: 100% !important; height: 300px !important;"></canvas>
                                    </div>
                                @else
                                    <h3>Seguimos trabajando en encontrar la carrera perfecta para ti.</h3>
                                    <p>
                                        Nuestro sistema necesita un poco más de información para hacer una recomendación
                                        precisa.
                                        Por favor,
                                        vuelve a realizar el test para que podamos ofrecerte sugerencias personalizadas
                                        según tus
                                        intereses.
                                        ¡Estamos aquí para ayudarte a encontrar la carrera ideal para ti!
                                    </p>
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
            <div class="col-md-12">
                <div class="form-container az-footer">
                    <a href="{{ route('test', 'sovi3') }}" class="btn btn-next mt-2" style="font-size: 11px">Volver a
                        realizar el
                        test</a>
                    @if ($data['resultados'])
                        <form action="{{ route('test1') }}" id="pdfForm" method="POST">
                            @csrf
                            <input type="hidden" name="image" id="image">
                            <input type="hidden" name="id_estudiante" id="id_estudiante"
                                value="{{ Session::get('id_estudiante') }}">
                            <input type="hidden" name="id_respuesta" id="id_respuesta"
                                value="{{ Session::get('id_respuesta') }}">
                            <button type="button" id="downloadPDF" class="btn btn-primary" style="font-size: 11px">Exportar
                                como PDF</button>
                        </form>
                    @endif
                    <a href="{{ route('/') }}" class="btn btn-primary" style="font-size: 11px">Finalizar</a>
                </div>
            </div>
        </div>

    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.1.0"></script>

    <script>
        if ({!! json_encode(!!$data['resultados']) !!}) {
            var ctx = document.getElementById('myChart').getContext('2d');
            var image;
            var chart = new Chart(ctx, {
                type: 'line', // Tipo de gráfico
                data: {
                    labels: ['Calculo', 'Científica', 'Diseño', 'Tecnología', 'Geoastronómica', 'Naturalista',
                        'Sanitaria',
                        'Asistencial', 'Jurídica', 'Económica', 'Comunicacional', 'Humanística', 'Artística',
                        'Musical', 'Lingüística'
                    ], // Etiquetas de los ejes X
                    datasets: [{
                        label: 'Resultados',
                        data: {!! json_encode($data['graficoData']) !!},
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        yAxisID: 'y-axis-1'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    annotation: {
                        annotations: [{
                            type: 'line',
                            mode: 'vertical',
                            scaleID: 'y-axis-1',
                            value: 100, // Posición en el eje y
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            label: {
                                enabled: true,
                                content: 'Meta 75',
                                position: 'top'
                            }
                        }]
                    }
                }
            });
            setTimeout(function() {
                image = chart.toBase64Image();
                document.getElementById('image').value = image;
            }, 1000);
            document.getElementById('downloadPDF').addEventListener('click', function() {
                var form = document.getElementById("pdfForm");
                var url = form.action;
                form.setAttribute("target", "_blank");
                form.submit();
                form.removeAttribute("target");
            });
        }
    </script>
@endsection
