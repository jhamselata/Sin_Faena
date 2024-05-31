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
                                                        <select class="form-control select2" name="id_usuario" style="width: 100%;" autofocus readonly>
                                                            @foreach ($users as $user)
                                                            <option value="{{ $user->id }}" {{ old('id_usuario') == $user->id ? 'selected' : '' }}>
                                                                {{ $user->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
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
                                                            <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
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

</body>

</html>