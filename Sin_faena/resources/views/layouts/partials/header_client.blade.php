<header>
    <div class="menu-nav">
        <div class="logo"><i></i><span>SinFaena</span></div>

        <ul class="navbar">
            <li><a href="inicio">Inicio</a></li>
            <li><a href="nosotros">Sobre nosotros</a></li>
            <li><a href="productos">Servicios</a></li>
            <li><a href="contacto">Contacto</a></li>
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link notification-bell bx bxs-bell dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        @if(isset($notificaciones) && $notificaciones->whereNull('read_at')->count() > 0)
                        <span class="notification-count">{{ $notificaciones->whereNull('read_at')->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @isset($notificaciones)
                        @forelse($notificaciones as $notificacion)
                        <li>
                            <div class="dropdown-item">
                                {{ $notificacion->mensaje }}
                                @if(is_null($notificacion->read_at))
                                <form action="{{ route('notificaciones.marcarComoLeida', $notificacion->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Marcar como leída</button>
                                </form>
                                @endif
                            </div>
                        </li>
                        @empty
                        <li><a class="dropdown-item" href="#">No hay nuevas notificaciones</a></li>
                        @endforelse
                        @else
                        <li><a class="dropdown-item" href="#">No hay nuevas notificaciones</a></li>
                        @endisset
                    </ul>
                </li>
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
                            <i class="fas fa-user fa-fw"> {{ Auth::user()->name }} </i>
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



<section class="banner">

    <div class="banner-text">
        <h5>Sin Faena | Marketing</h5>
        <h1>Con creatividad, se resuelve</h1>
        <a href="" class="btn-neon1">Síguenos</a>
    </div>
</section>