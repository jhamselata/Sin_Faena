<div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                            <div class="sb-sidenav-menu">
                                <div class="nav">
        
                                    <a class="nav-link" href="{{ route('dashboard') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                        Inicio
                                    </a>
        
                                    <div class="sb-sidenav-menu-heading">interfaces</div>
        
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Pantallas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
        
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('admin.usuarios.index') }}">Usuarios</a>
                                            <a class="nav-link" href="{{ route('admin.empleados.index') }}">Empleados</a>
                                            <a class="nav-link" href="{{ route('admin.puestos.index') }}">Puestos</a>
                                            <a class="nav-link" href="{{ route('admin.clientes.index') }}">Clientes</a>
                                            <a class="nav-link" href="{{ route('admin.servicios.index') }}">Servicios</a>
                                            <a class="nav-link" href="{{ route('admin.solicitudes.solicitud') }}">Solicitudes</a>
                                            <a class="nav-link" href="{{ route('admin.pedidos.index') }}">Pedidos</a>
                                            <a class="nav-link" href="{{ route('admin.eventos.index') }}">Eventos</a>
                                            <a class="nav-link" href="{{ route('admin.tipoeventos.index') }}">Tipo Eventos</a>
                                            <a class="nav-link" href="{{ route('admin.agendas.agenda') }}">Agenda</a>
                                            <a class="nav-link" href="{{ route('admin.tareas.index') }}">Tareas</a>
                                            <a class="nav-link" href="{{ route('admin.bancos.index') }}">Bancos</a>
                                            <a class="nav-link" href="{{ route('admin.departamentos.index') }}">Departamentos</a>
                                            <a class="nav-link" href="{{ route('admin.tipo_pago.index') }}">Tipos de Pago</a>
                                        </nav>
        
                                    </div>
        
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                        Páginas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
        
                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                Autenticación
                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                            </a>
        
                                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="login.html">Inicio sesión</a>
                                                    <a class="nav-link" href="register.html">Registro</a>
                                                    <a class="nav-link" href="password.html">Olvidar contraseña</a>
                                                    <a class="nav-link" href="#">Página principal - Cliente</a>
                                                    <a class="nav-link" href="#">Formularios - Cliente</a>
                                                </nav>
                                            </div>
        
                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                Errores
                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                            </a>
        
                                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="401.html">401 Pág</a>
                                                    <a class="nav-link" href="404.html">404 Pág</a>
                                                    <a class="nav-link" href="500.html">500 Pág</a>
                                                </nav>
                                            </div>
        
                                        </nav>
                                    </div>
        
                                    <div class="sb-sidenav-menu-heading">Plantillas</div>
                                    <a class="nav-link" href="charts.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Estadísticas
                                    </a>
                                    <a class="nav-link" href="tables.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Tablas
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>