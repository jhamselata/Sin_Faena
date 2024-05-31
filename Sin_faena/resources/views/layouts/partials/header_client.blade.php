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
                    <a class="nav-link notification-bell bx bxs-bell" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        @if($notificaciones->whereNull('read_at')->count() > 0)
                        <span class="notification-count">{{ $notificaciones->whereNull('read_at')->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse($notificaciones as $notificacion)
                        <li>
                            <a class="dropdown-item" href="#">
                                {{ $notificacion->mensaje }}
                                @if(is_null($notificacion->read_at))
                                <form action="{{ route('notificaciones.marcarComoLeida', $notificacion->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Marcar como leída</button>
                                </form>
                                @endif
                            </a>
                        </li>
                        @empty
                        <li><a class="dropdown-item" href="#">No hay nuevas notificaciones</a></li>
                        @endforelse
                    </ul>
                </li>
                <a href="{{ route('login') }}" class="otro">
                    Dashboard
                </a>
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

        </ul>

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