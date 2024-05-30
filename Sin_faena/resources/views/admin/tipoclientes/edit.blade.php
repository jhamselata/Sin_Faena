@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar tipo de cliente</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.tipoclientes.update', $tipocliente->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre_tipoCli" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_tipoCli') ? 'is-invalid' : ''}}" id="nombre_tipoCli" placeholder="Nombre del tipo de cliente" name="nombre_tipoCli" autofocus value="{{old('nombre_tipoCli', $tipocliente->nombre_tipoCli)}}" />
                                            @if ($errors->has('nombre_tipoCli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_tipoCli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion_tipoCli" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_tipoCli') ? 'is-invalid' : ''}}" id="descripcion_tipoCli" placeholder="Descripción de las funciones y características del tipo de cliente" name="descripcion_tipoCli" autofocus>{{old('descripcion_tipoCli', $tipocliente->descripcion_tipoCli)}}</textarea>
                                            @if ($errors->has('descripcion_tipoCli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tipoCli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary" type="submit">Editar</button>
                                <a href="{{ route('admin.tipoclientes.index') }}" class="">
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