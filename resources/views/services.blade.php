<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Servicios</title>
</head>

<body>
    <section class="services">
        <div class="main">
            @include('header-white') 
            <div class="container">
                <h2>Nuestros Servicios</h2>
                <div class="services-items">
                @foreach($data as $service)
                <div class="services-items-item">
                    <div class="services-items-item-back">
                        <img src="{{asset('images/services/'.$service['image'])}}" alt="">
                    </div>
                        <h3>{{$service["titulo"]}}</h3>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>