<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>404 - not found</title>
</head>

<body>
    <header class="header black">
        <div class="header-container">
            <div class="logo">
                <img src="{{asset('images/logo-negro.png')}}" alt="logo">
            </div>
            <nav>
                <ul>
                    <li><a href="{{url('landing')}}">Home</a></li>
                    <li><a href="#">Dajala</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Blog</a> </li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="section about">
        <div class="container">
            <h2>404</h2>
            <p>La pagina solicitada no fue encontrada</p>
            <a class="btn button green" href="{{url('landing')}}">Volver</a>
        </div>
        <div class="background"></div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>