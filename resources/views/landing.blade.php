<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://npmcdn.com/flickity@2/dist/flickity.css" rel="stylesheet">
    <link href="https://unpkg.com/flickity-fade@1/flickity-fade.css" rel="stylesheet">

    <title>Inicio</title>
</head>

<body>
    @include('header-white')
    <section class="slide">
        <div class="slides">
            <div class="slide-item">
                <img src="{{asset('images/fondo4.jpg')}}" alt="">
            </div>
            <div class="slide-item">
                <img src="{{asset('images/fondo3.jpg')}}" alt="">
            </div>
        </div>
        <div class="slide-item fix">
            <div class="slide-item-content">
                <div class="slide-item-content-text">
                    <h1> <small>“LA TIERRA NO LA HEMOS HEREDADO DE LOS PADRES, LA HEMOS TOMADO EN
                            PRÉSTAMO A NUESTROS HIJOS”</small> </h1>
                    <p class="cuotation">- UNESCO</p>

                </div>
            </div>
        </div>
    </section>


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
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>