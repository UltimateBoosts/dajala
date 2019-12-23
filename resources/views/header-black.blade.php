<header class="header black">
    <div class="header-container">
        <div class="logo">
            <img src="{{asset('images/logo-negro.png')}}" alt="logo">
        </div>
        <div class="open">
            <span class="fas fa-bars"></span>
         </div>
        <nav>
            <div class="clos">
                <span class="fas fa-times"></span>
            </div>
            <ul>
                <li><a href="{{url('home')}}" class="{{ (request()->is('home')) ? 'active' : '' }}">Home</a></li>
                <li><a href="{{url('quienes-somos')}}" class="{{ (request()->is('quienes-somos')) ? 'active' : '' }}">Quiénes Somos</a></li>
                <li><a href="{{url('servicios')}}" class="{{ (request()->is('servicios')) ? 'active' : '' }}">Servicios</a></li>
                <li><a href="{{url('blog')}}" class="{{ (request()->is('blog')) ? 'active' : '' }}">Blog</a> </li>
                <li><a href="{{url('contacto')}}" class="{{ (request()->is('contacto')) ? 'active' : '' }}">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>