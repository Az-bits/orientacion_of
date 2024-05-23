<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orientacion Vocacional</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google-fonts-include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&family=Oswald:wght@700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/plantilla-test/assets/images/logo/ov-logo.ico') }}" />
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="{{ asset('plantilla-test/assets/css/bootstrap.min.css') }}">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="{{ asset('plantilla-test/assets/css/style.css') }}">
</head>

<body>
    <div id="wrapper">
        <div class="container">
            <div class="row text-center">
                <div class="check_mark_img">
                    <img src="{{ asset('plantilla-test/assets/images/checkmark.png') }}" alt="image_not_found">
                </div>
                <div class="sub_title">
                    <span>Su propuesta ha sido recibida</span>
                </div>
                <div class="title pt-1">
                    <h3>gracias por dar respuesta</h3>
                    <h3>El resultado todavía se encuentra en desarrollo.</h3>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <a href="{{ route('/') }}" class="btn btn-success btn-xl">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap-js include -->
    <script src="{{ asset('plantilla-test/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
