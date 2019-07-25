<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    @include('footer') 
</body>
</html>