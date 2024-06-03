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
    <div id="particles-js" class="az-resultados az-contenedor" style="background: #000;">
        <h3 class="title">Hola <b style="color:cyan;">{{ $data['estudiante']->nombre ?? '' }}</b> estos
            son los resultados de tu Test de
            Orientación Vocacional, estas son las posibles carreras que puedes estudiar.<br>Complementa los resultados
            realizando el Test de Aptitudes Diferentes</h3>
        {{-- <img src="https://orientacionvocacionaledu.upea.bo/assets_/form/img/fondo.jpg" alt=""> --}}
        {{-- <h3>Hola <b style="color:cyan;">EDWIN </b> estos son los resultados de tu Test de Orientación Vocacional, estas
            son las posibles carreras que puedes estudiar.<br>Complementa los resultados realizando el Test de Aptitudes
            Diferentes</h3> --}}
        <div class="form-container az-table">
            <div class="table-container" id="scrollable-container">
                <table class="table-responsive table-bordered">
                    <thead>
                        <tr style="border-top: 0">
                            <th scope="col">ÁREA</th>
                            <th scope="col" class="text-center">CARRERA</th>
                            <th>ÁREA UPEA</th>
                            {{-- <th scope="col" class="text-center">DIRECCIÓN, CONTACTOS Y CONVOCATORIAS</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data['sugerencias'])
                            @foreach ($data['sugerencias'] as $itemMain)
                                @foreach ($itemMain as $item)
                                    <tr>
                                        <th scope="row" style="min-width: 8rem;">{{ $item->area }}</th>
                                        <td class="az-info">
                                            {{-- <h4>Área Ciencias de la Educación</h4>
                                    <ul>
                                        <li><i class="fa-solid fa-caret-right"></i> Carrera Ciencias de la Educación</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Educación Parvularia</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Psicomotricidad</li>
                                    </ul> --}}
                                            {{ $item->carrera }}
                                        </td>
                                        <td>{{ $item->area_existente }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            <h3>En base a tus respuestas aun no puedo recomendarte una carrera.</h3>
                        @endif
                    </tbody>
                </table>
                <div id="contentToExport" style="position: none;">
                    <canvas id="myChart" style="width: 100% !important; height: 300px !important;"></canvas>
                </div>
            </div>

        </div>
        <div class="form-container" style="width: 14rem;  top: 73rem !important; left: 9rem; ">
            <button type="button" id="downloadPDF" class="btn btn-primary" style="font-size: 11px">Exportar como
                PDF</button>
            <a href="{{ route('/') }}" class="btn btn-primary" style="font-size: 11px">Finalizar</a>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script>
        // Inicializa Perfect Scrollbar
        // const ps = new PerfectScrollbar('#scrollable-container');
        var ctx = document.getElementById('myChart').getContext('2d');

        // Configura el gráfico
        var myChart = new Chart(ctx, {
            type: 'line', // Tipo de gráfico
            data: {
                labels: ['Calculo', 'Científica', 'Diseño', 'Tecnología', 'Geoastronómica', 'Naturalista',
                    'Sanitaria',
                    'Asistencial', 'Jurídica', 'Económica', 'Comunicacional', 'Humanística', 'Artística',
                    'Musical', 'Lingüística'
                ], // Etiquetas de los ejes X
                datasets: [{
                    label: 'Dataset 1',
                    data: {!! json_encode($data['graficoData']) !!},
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    yAxisID: 'y-axis-1'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                            type: 'linear',
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: 100,
                                stepSize: 10
                            }
                        },
                        {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',
                            gridLines: {
                                drawOnChartArea: false,
                            },
                        },
                    ],
                },
            }
        });
        document.getElementById('downloadPDF').addEventListener('click', function() {
            html2canvas(document.getElementById('myChart')).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                $.ajax({
                    url: '/generar-pdf',
                    type: 'POST',
                    data: {
                        image: imgData,
                        _token: '{{ csrf_token() }}'

                    },
                    success: function(response) {
                        window.location.href = 'generate_pdf.php?image=' + response.image;
                    }
                });
            });
        });
    </script>
    </script>
@endsection
