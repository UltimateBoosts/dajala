<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <title>Contáctanos</title>
</head>

<body class="contact">
    @include('header-white') 
    <section class="subscribe section">
        <div class="container">
            <h2>Déjanos tu email</h2>
            <div class="text">
                <p>Te contactaremos lo más pronto posible</p>
                <form action="{{action('ContactController@sendEmail')}}" method="POST">
                    @csrf
                    <input class="input transparent" type="email" name="email" placeholder="Tu correo electrónico" required>
                    <textarea id="" cols="20" rows="10" name="message" placeholder="Tu mensaje"></textarea>
                    <button class="btn button green" type="submit">Contáctame</button>
                </form>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}  
                </div><br />
                @endif
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @include('footer') 
</body>
</html>