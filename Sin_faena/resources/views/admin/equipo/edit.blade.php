@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar equipo</h1>
            </div>
        </div>
    </div>
</div>
<!-- Contenido de los formularios y las tablas -->
<main>

    <!-- Pantalla modal con el formulario -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="{{ route('admin.equipos.update', $equipo->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_tipoEquipo" class="form-label">Tipo de equipo</label>
                                            @foreach ($tipoequipos as $tipoequipo)
                                            @if ($tipoequipo->id === $equipo->id_tipoEquipo)
                                            <input type="text" class="form-control" {{$errors->has('id_tipoEquipo') ? 'is-invalid' : ''}}" id="id_tipoEquipo" placeholder="Tipo del equipo" name="id_tipoEquipo" autofocus value="{{ $tipoequipo->nombre_tipoEquipo }}">
                                            @endif
                                            @endforeach

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
                                            <input type="text" class="form-control {{$errors->has('nombre_equipo') ? 'is-invalid' : ''}}" id="nombre_equipo" placeholder="Nombre del equipo" name="nombre_equipo" autofocus value="{{old('nombre_equipo', $equipo->nombre_equipo)}}" />
                                            @if ($errors->has('nombre_equipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_equipo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Editar</button>
                                <a href="{{ route('admin.equipos.index') }}" class="">
                                    <i class="btn btn-danger">Regresar</i>
                                </a>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- Fin del formulario de la pantalla modal -->
                <!-- Fin de la targeta de la tabla -->
</main>
<!-- Fin del contenido de los formularios y las tablas -->
@endsection