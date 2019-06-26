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
                <form action="" method="GET">
                    <input class="input transparent" type="email" placeholder="Tu correo electrónico" required>
                    <button class="btn button green" type="submit">Contáctame</button>
                </form>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
    @include('footer') 
</body>
</html>