@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo Equipo</h1>
            </div>
        </div>
    </div>
</div>
<!-- Contenido de los formularios y las tablas -->
<main>

    <!-- Formulario de la pantalla Modal -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="{{ route('admin.equipos.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_tipoEquipo" class="form-label">Tipo de Equipo</label>
                                            <select class="form-control select" name="id_tipoEquipo" style="width: 100%;" autofocus>
                                                <option value="">Seleccione un tipo</option>
                                                @foreach ($tipoequipos as $tipoequipo)
                                                <option value="{{ $tipoequipo->id }}" {{ old('id_tipoEquipo') == $tipoequipo->id ? 'selected' : '' }}>
                                                    {{ $tipoequipo->nombre_tipoEquipo }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_tipoEquipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_tipoEquipo') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre_equipo" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_equipo') ? 'is-invalid' : ''}}" id="nombre_equipo" placeholder="Nombre del equipo" name="nombre_equipo" autofocus value="{{old('nombre_equipo', '')}}" />
                                            @if ($errors->has('nombre_equipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_equipo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.equipos.index') }}" class="">
                                    <i class="btn btn-danger">Regresar</i>
                                </a>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- Fin de la pantalla modal -->
                <!-- Fin de la carta de la modal -->

            </div>

        </div>
    </div>
</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection