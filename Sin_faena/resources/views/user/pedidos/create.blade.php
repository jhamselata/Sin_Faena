<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Conexión con pluggins-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!--Favicon-->
    <!-- <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon"> -->

    <!--Vinculación de archivos-->
    <link href="{{ asset('css/estilo.css')}}" rel="stylesheet" />

    <!--Nombre del sitio-->
    <title>SinFaena</title>
</head>

<body>

    @include('layouts.partials.header_client2')

    <!-- FIN - HEADER -->

    <!-- BARRA LATERAL DE NAVEGACION -->
    <section>
        <div class="content-wrapper mt-5">
            <div class="content-header mt-5">
                <div class="container-fluid mt-5">
                    <div class="row mb-9 ms-5 mt-5">
                        <div class="col-sm-6 ms-5 mt-5">
                            <h1 class="mb-6 mx-2 ms-5 mt-5">Nuevo Pedido</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
            <main>

                <!-- MODAL FORM -->
                <div class="container mb-5">
                    <div class="container-fluid mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-5">
                                    <div class="card-body">

                                        <form class="form-horizontal" method="post" action="{{ route('user.pedidos.clientStore') }}">
                                            @csrf

                                            <div class="row">

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="id_usuario" class="form-label">Usuario</label>
                                                        <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
<input class="form-control" style="width: 100%;" value="{{ auth()->user()->name }}" readonly>
                                                        @if ($errors->has('id_usuario'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('id_usuario') }}</strong>
                                                        </span>
                                                        @endif
            
                                                    </div>
                                                </div>
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="fecha_pedido" class="form-label">Fecha entrega: </label>
                                                        <input type="date" class="form-control date" name="fecha_pedido" id="fecha_pedido" value="{{ old('fecha_pedido')}}" required autofocus />
                                                    </div>
                                                </div>

            
                                            </div>
            
                                            <div class="row">
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="servicios" class="form-label">Servicios:</label>
                                                        <select name="servicios[]" class="form-control" id="servicios" multiple>
                                                            @foreach ($servicios as $servicio)
                                                            <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }} - ${{ $servicio->precio_servicio }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="descripcion" class="form-label">Descripcion</label>
                                                        <textarea name="descripcion_pedido" class="form-control" autofocus>{{old('descripcion_pedido', '')}}</textarea>
                                                        @if ($errors->has('descripcion_pedido'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('descripcion_pedido') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
            
                                            </div>
            
                                            <div class="row">
            
                                                <div class="col-sm" id="plataformas-container">
                                                    <div class="mb-3 text-dark">
                                                        <label for="plataformas" class="form-label">Plataformas</label>
                                                        <select class="form-control {{ $errors->has('plataformas') ? 'is-invalid' : '' }}" name="plataformas" id="plataformas" required autofocus>
                                                            <option value="">Seleccione una plataforma</option>
                                                            @foreach(App\Models\Pedido::PLATFORM as $platforms)
                                                            <option value="{{ $platforms }}" {{ old('plataformas') == $platforms ? 'selected' : '' }}>{{ $platforms }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('plataformas'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('plataformas') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="estilo_diseno" class="form-label">Estilo de diseño</label>
                                                        <select class="form-control {{ $errors->has('estilo_diseno') ? 'is-invalid' : '' }}" name="estilo_diseno" id="estilo_diseno" required autofocus>
                                                            <option value="">Seleccione un estilo</option>
                                                            @foreach(App\Models\Pedido::DESING as $desings)
                                                            <option value="{{ $desings }}" {{ old('estilo_diseno') == $desings ? 'selected' : '' }}>{{ $desings }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('estilo_diseno'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('estilo_diseno') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
            
                                            </div>
            
                                            <div class="row">
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="frecuencia_publicacion" class="form-label">Frecuencia de publicación</label>
                                                        <select class="form-control {{ $errors->has('frecuencia_publicacion') ? 'is-invalid' : '' }}" name="frecuencia_publicacion" id="frecuencia_publicacion" required autofocus>
                                                            <option value="">Seleccione la frecuencia de publicación</option>
                                                            @foreach(App\Models\Pedido::FRECUENCY as $frecuencys)
                                                            <option value="{{ $frecuencys }}" {{ old('frecuencia_publicacion') == $frecuencys ? 'selected' : '' }}>{{ $frecuencys }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('frecuencia_publicacion'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('frecuencia_publicacion') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
            
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="formato_entrega" class="form-label">Formato de entrega</label>
                                                        <select class="form-control {{ $errors->has('formato_entrega') ? 'is-invalid' : '' }}" name="formato_entrega" id="formato_entrega" required autofocus>
                                                            <option value="">Seleccione el formato</option>
                                                            @foreach(App\Models\Pedido::FORMAT as $formats)
                                                            <option value="{{ $formats }}" {{ old('formato_entrega') == $formats ? 'selected' : '' }}>{{ $formats }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('formato_entrega'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('formato_entrega') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
            
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">Colores</label>
                                                        <input type="text" class="form-control {{$errors->has('colores') ? 'is-invalid' : ''}}" id="colores" placeholder="Colores de preferencia" name="colores" autofocus value="{{old('colores', '')}}" />
                                                        @if ($errors->has('colores'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('colores') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="credenciales" class="form-label">Credenciales</label>
                                                        <textarea name="credenciales" class="form-control" placeholder="Correo electrónico ; Contraseña" autofocus>{{old('credenciales', '')}}</textarea>
                                                        @if ($errors->has('credenciales'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('credenciales') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
            
                                           

                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                            <a href="{{ route('inicio') }}" class="">
                                                <i class="btn btn-danger">Regresar</i>
                                            </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- FIN - MODAL FORM -->
                            <!-- FIN - CARD DE LA TABLA -->

                        </div>

                    </div>
                </div>
            </main>
        </div>
    </section>

    @include('layouts.partials.footer_client')

    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('.dropdown-toggle');

            dropdownToggle.addEventListener('click', function() {
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });

            // Función para mostrar/ocultar elementos
            function toggleElements() {
                const selectedServices = document.getElementById('servicios').selectedOptions;
                const selectedValues = Array.from(selectedServices).map(option => option.value);

                // Mostrar u ocultar el contenedor de plataformas basado en los servicios seleccionados
                const plataformasContainer = document.getElementById('plataformas-container');
                if (selectedValues.includes('1')) { // Cambia '1' por el ID del servicio que deseas verificar
                    plataformasContainer.style.display = 'block';
                } else {
                    plataformasContainer.style.display = 'none';
                }
            }

            // Escuchar cambios en el combo de servicios
            const serviciosSelect = document.getElementById('servicios');
            serviciosSelect.addEventListener('change', toggleElements);

            // Inicialmente ocultar el contenedor de plataformas
            toggleElements();
        });
    </script>



    <form id="logoutform" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
    </form>

</body>

</html>

