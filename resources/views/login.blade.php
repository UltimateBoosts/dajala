<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <section class="construccion">
        <img src="{{asset('images/fondo.jpg')}}" alt="">
        <div class="content">
            <div class="card">
            <form class="login" role="form" method="post" action="{{action('AuthController@login')}}">
                    @csrf
                    <input class="input transparent" type="text" name="user" id="" placeholder="Usuario" required>
                    <input class="input transparent" type="password" name="password" id="" placeholder="Contraseña" required>
                    <input class="btn button green" type="submit" value="Ingresar">
                    <a href="{{url('home')}}">Volver</a>
                </form>
                @if (count($errors) > 0)
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
</body>

</html>