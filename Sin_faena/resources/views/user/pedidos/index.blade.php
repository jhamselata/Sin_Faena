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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
                            <h1 class="mb-6 mx-2 ms-5 mt-5">Nuevo Cliente</h1>
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

                                        <form class="form-horizontal" method="post" action="{{ route('user.pedidos.store') }}">
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



                                            </div>

                                            <div class="row">

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">Nombre</label>
                                                        <input type="text" class="form-control {{$errors->has('nombre_cli') ? 'is-invalid' : ''}}" id="nombre_cli" placeholder="Nombre del cliente" name="nombre_cli" autofocus value="{{old('nombre_cli', '')}}" />
                                                        @if ($errors->has('nombre_cli'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('nombre_cli') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">Apellido</label>
                                                        <input type="text" class="form-control {{$errors->has('apellido_cli') ? 'is-invalid' : ''}}" id="apellido_cli" placeholder="Apellido del cliente" name="apellido_cli" autofocus value="{{old('apellido_cli', '')}}" />
                                                        @if ($errors->has('apellido_cli'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('apellido_cli') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">RNC</label>
                                                        <input type="text" class="form-control {{$errors->has('rnc_cli') ? 'is-invalid' : ''}}" id="rnc_cli" placeholder="RNC del cliente (Si aplica)" name="rnc_cli" autofocus value="{{old('rnc_cli', '')}}" />
                                                        @if ($errors->has('rnc_cli'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('rnc_cli') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">Teléfono</label>
                                                        <input type="text" class="form-control {{$errors->has('telefono_cli') ? 'is-invalid' : ''}}" id="telefono" placeholder="Telefono del cliente" name="telefono_cli" autofocus value="{{old('telefono_cli', '')}}" />
                                                        @if ($errors->has('telefono_cli'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('telefono_cli') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="preferencia_comunicacion" class="form-label">Comunicación</label>
                                                        <select class="form-control {{ $errors->has('preferencia_comunicacion') ? 'is-invalid' : '' }}" name="preferencia_comunicacion" id="preferencia_comunicacion" required autofocus>
                                                            <option value="">Seleccione el medio de su preferencia</option>
                                                            @foreach(App\Models\Cliente::COMUNICATION as $comunications)
                                                            <option value="{{ $comunications }}" {{ old('preferencia_comunicacion') == $comunications ? 'selected' : '' }}>{{ $comunications }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('preferencia_comunicacion'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('preferencia_comunicacion') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="code" class="form-label required">Otro medio</label>
                                                        <input type="text" class="form-control {{$errors->has('otra_via_comunicacion') ? 'is-invalid' : ''}}" id="otra_via_comunicacion" placeholder="En caso de otro medio (Si aplica)" name="otra_via_comunicacion" autofocus value="{{old('otra_via_comunicacion', '')}}" />
                                                        @if ($errors->has('otra_via_comunicacion'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('otra_via_comunicacion') }}</strong>
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
        });
    </script>



    <form id="logoutform" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
    </form>

</body>

</html>