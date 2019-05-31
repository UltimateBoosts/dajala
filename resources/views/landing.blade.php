<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dajala cerros y cordilleras</title>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dajala</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Blog</a> </li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="slide">
        <div class="slide-item">
            <img src="{{asset('images/fondo2.jpg')}}" alt="">
            <div class="slide-item-content">
                <div class="slide-item-content-text">
                    <h1><small>Nuestro objetivo #1</small> El medio ambiente </h1>
                    <p class="big">
                    Encuentra con nosotros una oportunidad única para ayudar al planeta
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>