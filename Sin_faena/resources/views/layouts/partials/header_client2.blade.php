

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
                                    <a
                                        href="{{ route('login') }}"
                                        class=""
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="otro"
                                    >
                                        Iniciar sesión
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="otro"
                                        >
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