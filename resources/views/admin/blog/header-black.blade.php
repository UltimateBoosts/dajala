<header class="header black relative">
    <div class="header-container">
        <div class="logo">
            <img src="{{asset('images/logo-negro.png')}}" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{url('home')}}" class="{{ (request()->is('home')) ? 'active' : '' }}">Home</a></li>
                <li><a href="#" class="{{ (request()->is('quienes-somos')) ? 'active' : '' }}">Blog</a> </li>
                <li><a href="{{action('AuthController@logout')}}">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</header>