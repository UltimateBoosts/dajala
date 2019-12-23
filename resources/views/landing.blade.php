<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://npmcdn.com/flickity@2/dist/flickity.css" rel="stylesheet">
    <link href="https://unpkg.com/flickity-fade@1/flickity-fade.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="355">
    <meta property="og:image:height" content="217">
    <title>Inicio</title>
</head>

<body>
    @include('header-white')
    <section class="slide">
        <div class="slides">
            <div class="slide-item">
                <img src="{{asset('images/fondo5.jpg')}}" alt="">
            </div>
            <div class="slide-item">
                <img src="{{asset('images/fondo3.jpg')}}" alt="">
            </div>
        </div>
        <div class="slide-item fix">
            <div class="slide-item-content">
                <div class="slide-item-content-text">
                    <h1> <small>“LA TIERRA NO LA HEMOS HEREDADO DE LOS PADRES, LA HEMOS TOMADO EN
                            PRÉSTAMO DE NUESTROS HIJOS”</small> </h1>
                    <p class="cuotation">UNESCO</p>

                </div>
            </div>
        </div>
    </section>

    @include('footer') 
    <!-- <footer class="section social">
        <div class="container">
            <img src="{{asset('images/logo-negro.png')}}" alt="">
            <div class="text">
                <p>Siguenos en nuestras redes sociales</p>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a class="fab fa-facebook-f" href="#"></a></li>
                <li class="list-inline-item"><a class="fab fa-twitter" href="#"></a></li>
                <li class="list-inline-item"><a class="fas fa-envelope" href="#"></a></li>
            </ul>
        </div>
    </footer> -->
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="https://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>