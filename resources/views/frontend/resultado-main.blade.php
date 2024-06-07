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
    <table class="table-responsive table-bordered mt-5">
        <thead>
            <tr style="border-top: 0">
                <th scope="col">ÁREA</th>
                <th scope="col" class="text-center">ÁREAS Y CARRERAS EXISTENTES EN LA UNIVERSIDAD PÚBLICA DE EL ALTO</th>
            </tr>
        </thead>
        <tbody>
            @if ($data['resultados'])
                @foreach ($data['resultados'] as $main)
                    <tr>
                        {{-- <th scope="row" rowspan="2" style="min-width: 8rem;">{{ $item->area }}</th> --}}
                        <th scope="row" style="min-width: 8rem;">{{ $main['area'] }}</th>
                        <td class="az-info">
                            <h4>{{ $main['area_existente'] }}</h4>
                            <ul>
                                @foreach ($main['carreras'] as $c)
                                    <li><i class="fa-solid fa-caret-right"></i> {{ $c['carrera'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @else
                <h3>En base a tus respuestas aun no puedo recomendarte una carrera.</h3>
            @endif
        </tbody>
    </table>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    {{-- <script>
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
    </script> --}}
@endsection
