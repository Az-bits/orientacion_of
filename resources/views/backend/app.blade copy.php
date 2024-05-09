<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body>
    @include('backend.layouts.menu')

    <div class="main-panel">
        @include('backend.layouts.header')

        <div class="content">
            <div class="content">
                @yield('content')
            </div>
        </div>

        @include('backend.layouts.footer')
    </div>

</body>

</html>
