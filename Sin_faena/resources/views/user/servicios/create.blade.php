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
                            <h1 class="mb-6 mx-2 ms-5 mt-5">Servicio Web</h1>
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

                                        <form class="form-horizontal" method="post" action="{{ route('servicios_web.store') }}">
                                            @csrf

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="id_clientServ" class="form-label">Cliente Servicio</label>
                                                        <select class="form-control select2" name="id_clientServ" style="width: 100%;" autofocus>
                                                            @foreach ($clientes_servicio as $cliente)
                                                            <option value="{{ $cliente->id_clientServ }}" {{ old('id_clientServ') == $cliente->id_clientServ ? 'selected' : '' }}>
                                                                {{ $cliente->nombre }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('id_clientServ'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('id_clientServ') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="colores" class="form-label">Colores</label>
                                                        <input type="text" class="form-control" name="colores" id="colores" value="{{ old('colores') }}" />
                                                        @if ($errors->has('colores'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('colores') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="plataformas" class="form-label">Plataformas</label>
                                                        <select name="plataformas" class="form-control" id="plataformas">
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Instagram">Instagram</option>
                                                            <option value="Twitter">Twitter</option>
                                                            <option value="LinkedIn">LinkedIn</option>
                                                            <option value="YouTube">YouTube</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="estilo_diseno" class="form-label">Estilo de Diseño</label>
                                                        <select name="estilo_diseno" class="form-control" id="estilo_diseno">
                                                            <option value="Minimalista">Minimalista</option>
                                                            <option value="Moderno">Moderno</option>
                                                            <option value="Vintage">Vintage</option>
                                                            <option value="Corporativo">Corporativo</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="frecuencia_publicacion" class="form-label">Frecuencia de Publicación</label>
                                                        <select name="frecuencia_publicacion" class="form-control" id="frecuencia_publicacion">
                                                            <option value="Diaria">Diaria</option>
                                                            <option value="Semanal">Semanal</option>
                                                            <option value="Mensual">Mensual</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="formatos_entrega" class="form-label">Formatos de Entrega</label>
                                                        <select name="formatos_entrega" class="form-control" id="formatos_entrega">
                                                            <option value="PDF">PDF</option>
                                                            <option value="JPEG">JPEG</option>
                                                            <option value="PNG">PNG</option>
                                                            <option value="MP4">MP4</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="fecha_aproximada" class="form-label">Fecha Aproximada</label>
                                                        <input type="date" class="form-control date" name="fecha_aproximada" id="fecha_aproximada" value="{{ old('fecha_aproximada') }}" />
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="idea" class="form-label">Idea</label>
                                                        <textarea name="idea" class="form-control" id="idea">{{ old('idea') }}</textarea>
                                                        @if ($errors->has('idea'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('idea') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="mb-3 text-dark">
                                                        <label for="otro" class="form-label">Otro</label>
                                                        <input type="text" class="form-control" name="otro" id="otro" value="{{ old('otro') }}" />
                                                        @if ($errors->has('otro'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('otro') }}</strong>
                                                        </span>
                                                        @endif
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
</body>

</html>
