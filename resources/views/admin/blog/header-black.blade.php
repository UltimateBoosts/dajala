<header class="header black relative">
    <div class="header-container">
        <div class="logo">
            <img src="{{asset('images/logo-negro.png')}}" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{url('admin/blog')}}" class="{{ (request()->is('admin/blog')) ? 'active' : '' }}">Administrador</a></li>
                <li><a href="{{url('blog')}}" class="{{ (request()->is('blog')) ? 'active' : '' }}">Blog</a> </li>
                <li><a href="{{action('AuthController@logout')}}">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</header>