<header>

    <div class="menu-nav">
        <div class="logo"><i></i><span>SinFaena</span></div>

        <ul class="navbar">
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('inicio') }}">Sobre nosotros</a></li>
            <li><a href="{{ route('inicio') }}">Servicios</a></li>
            <li><a href="{{ route('inicio') }}">Contacto</a></li>
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('dashboard') }}" class="otro">Dashboard</a>
                @elseif(auth()->user()->hasRole('empleado'))
                <a href="{{ route('dashboardEmpleado') }}" class="otro">Dashboard</a>
                @elseif(auth()->user()->hasRole('supervisor'))
                <a href="{{ route('dashboardSupervisor') }}" class="otro">Dashboard</a>
                @else
                <a href="" class="otro"></a>
                @endif
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-fw">  {{ Auth::user()->name }}</i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#!" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                @else
                <a href="{{ route('login') }}" class="otro">
                    Iniciar sesión
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="otro">
                    Registrar
                </a>
                @endif
                @endauth
            </nav>
            @endif

            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="main">
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
    </div>

</header>