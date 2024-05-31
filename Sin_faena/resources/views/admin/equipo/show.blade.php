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

    <!-- Formulario de la pantalla modal -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                        <label for="id_tipoEquipo" class="form-label">Tipo de equipo</label>
                                            @foreach ($tipoequipos as $tipoequipo)
                                            @if ($tipoequipo->id === $equipo->id_tipoEquipo)
                                            <input type="text" class="form-control" {{$errors->has('id_tipoEquipo') ? 'is-invalid' : ''}}" id="id_tipoEquipo" placeholder="Tipo del equipo" name="id_tipoEquipo" autofocus value="{{ $tipoequipo->nombre_tipoEquipo }}" disabled>
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
                                            <input type="text" class="form-control {{$errors->has('nombre_equipo') ? 'is-invalid' : ''}}" id="nombre_equipo" placeholder="Nombre del equipo" name="nombre_equipo" autofocus value="{{old('nombre_equipo', $equipo->nombre_equipo)}}" disabled/>
                                            @if ($errors->has('nombre_equipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_equipo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('admin.equipos.edit', $equipo->id) }}" class="btn btn-primary">
                                    <i">Editar</i>
                                </a>

                                <a href="{{ route('admin.equipos.index') }}" class="">
                                    <i class="btn btn-danger">Regresar</i>
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Fin del formulario de la pantalla modal -->
                <!-- Fin de la targeta de la tabla -->

            </div>

        </div>
    </div>
</main>
<!-- Fin del contenido de los formularios y las tablas -->
@endsection