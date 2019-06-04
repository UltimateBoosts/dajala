<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Inicio</title>
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
    <section class="section about">
        <div class="container">
            <h2>Que ofrecemos</h2>
            <div class="text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quibusdam, nostrum nemo sequi aspernatur numquam esse quod dolor?</p>
            </div>
        </div>
        <img src="{{asset('images/cordillera-2.png')}}" alt="">
    </section>
    <section class="section services">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="services-items">
                <div class="services-items-item">
                    <img src="{{asset('images/svg/plant-1.svg')}}" alt="">
                    <h3>Titulo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis saepe quia rem dolores ipsum facilis distinctio voluptate doloremque dolor nostrum?</p>
                </div>
                <div class="services-items-item">
                    <img src="{{asset('images/svg/leaf.svg')}}" alt="">
                    <h3>Titulo</h3>

                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis saepe quia rem dolores ipsum facilis distinctio voluptate doloremque dolor nostrum?</p>
                </div>
                <div class="services-items-item">
                    <img src="{{asset('images/svg/plant.svg')}}" alt="">
                    <h3>Titulo</h3>

                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis saepe quia rem dolores ipsum facilis distinctio voluptate doloremque dolor nostrum?</p>
                </div>
                <div class="services-items-item">

                    <img src="{{asset('images/svg/tree.svg')}}" alt="">
                    <h3>Titulo</h3>

                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis saepe quia rem dolores ipsum facilis distinctio voluptate doloremque dolor nostrum?</p>
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe section">
        <div class="container">
            <h2>Dejanos tu email</h2>
            <div class="text">
                <p>Te contactaremos lo mas pronto posible</p>
                <form action="" method="GET">
                    <input class="input transparent" type="email" placeholder="Tu correo electronico" required>
                    <button class="btn button green" type="submit">Contactame</button>
                </form>
            </div>
        </div>
    </section>
    <footer class="section social">
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
    </footer>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>