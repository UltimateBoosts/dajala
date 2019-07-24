<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://npmcdn.com/flickity@2/dist/flickity.css" rel="stylesheet">
    <title>Quiénes Somos</title>
</head>

<body>
    @include('header-white')
    <section class="section about">
        <div class="back">
            <img src="{{ asset('images/about.jpg') }}" alt="">
        </div>
        <div class="container">
            <div class="item">
                <h2>¿QUIÉNES SOMOS?</h2>
                <div class="text">
                    <p><b>DAJALA “CERROS Y CORDILLERAS”</b> es una Fundación
                        Ambiental sin ánimo de lucro. Constituida para la defensa, protección,
                        promoción y estímulo del mejoramiento del ambiente en cuanto a la
                        reforestación de “cerros y cordilleras”, cuencas y microcuencas y espacios que
                        lo requieran, con radio de acción a nivel nacional e internacional. <br> <strong>NIT: 901276023-2 </strong></p>
                </div>
            </div>
        </div>
        <div class="container mision">
            <div class="item">
                <h2>MISIÓN</h2>
                <div class="text">
                    <p>Trabajamos por la reforestación de cerros, cordilleras, cuencas,
                        microcuencas y/o espacios que lo requieran, nacional e internacionalmente.
                        Promovemos campañas y ejecutamos proyectos en defensa del ambiente en
                        sus componentes.</p>
                </div>
            </div>
            <div class="item">
                <h2>VISIÓN</h2>
                <div class="text">
                    <p>En el 2030 seremos una institución abanderada en la defensa,
                        protección y promoción del ambiente. Será guardiana de la reforestación
                        adecuada de cerros, cordilleras, cuencas, microcuencas y/o espacios que lo
                        requieran en el país y en el mundo, y que apunten a preservar la especie
                        humana y a mitigar las consecuencias del cambio climático.</p>
                </div>
            </div>
        </div>
        <div class="final">
            <h2 class="title">NUESTROS VALORES</h2>
            <div class="slidesx">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">SOLIDARIDAD</h5>
                        <p class="card-text">Actuamos en defensa de nuestra vida, primordialmente en
                            función de las mayorías que sufren las consecuencias de la afectación al
                            ambiente. </p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">OPORTUNIDAD</h5>
                        <p class="card-text">Las consecuencias de los problemas ambientales las vemos
                            a diario. Las medidas de prevención de las mismas deben ser inmediatas.
                            Debemos actuar ya.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">TRABAJO EN EQUIPO</h5>
                        <p class="card-text">La solución de la crisis ambiental requiere el concurso
                            de múltiples personas y organizaciones estatales o privadas. Realizaremos
                            actividades con aquellas que tengan una finalidad ambiental.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">INTERÉS GENERAL</h5>
                        <p class="card-text">Sus acciones se orientan a preservar el interés general
                            bajo los lineamientos ambientales que propendan por la defensa de lo colectivo.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">COMPROMISO</h5>
                        <p class="card-text">La interacción del ser humano con el ambiente es continua, de
                            hecho, somos parte él. Por eso el compromiso es adelantar actividades para el
                            mejoramiento de: aire, agua, suelo, fauna, flora, minerales y ser humano.</p>
                    </div>
                </div>
            </div>
            <div class="background"></div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="https://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>