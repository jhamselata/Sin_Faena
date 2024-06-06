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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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
                            <h1 class="mb-6 mx-2 ms-5 mt-5">Cliente Servicio</h1>
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

                                        <form class="form-horizontal" method="post" action="{{ route('cliente_servicio.store') }}">
                                            @csrf

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required autofocus />
                                                        @if ($errors->has('nombre'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('nombre') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="correo" class="form-label">Correo electrónico</label>
                                                        <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" required />
                                                        @if ($errors->has('correo'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('correo') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="telefono" class="form-label">Telefono</label>
                                                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required />
                                                        @if ($errors->has('telefono'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('telefono') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="preferencia_comunicacion" class="form-label">Preferencia de Comunicación</label>
                                                        <select name="preferencia_comunicacion" class="form-control" id="preferencia_comunicacion" required>
                                                            <option value="Reunion Virtual">Reunion Virtual</option>
                                                            <option value="Reunion Presencial">Reunion Presencial</option>
                                                            <option value="Comunicacion por Otra Via">Comunicacion por Otra Via</option>
                                                        </select>
                                                        @if ($errors->has('preferencia_comunicacion'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('preferencia_comunicacion') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="otra_via_comunicacion_row" style="display: none;">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="otra_via_comunicacion" class="form-label">Otra Via de Comunicación</label>
                                                        <input type="text" class="form-control" name="otra_via_comunicacion" id="otra_via_comunicacion" value="{{ old('otra_via_comunicacion') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                            <a href="{{ route('inicio') }}" class="btn btn-danger">Regresar</a>

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
        document.getElementById('preferencia_comunicacion').addEventListener('change', function () {
            var display = this.value === 'Comunicacion por Otra Via' ? 'block' : 'none';
            document.getElementById('otra_via_comunicacion_row').style.display = display;
        });
    </script>
</body>

</html>
