@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar tipo de servicio</h1>
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
                                            <label for="nombre_tipoServicio" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_tipoServicio') ? 'is-invalid' : ''}}" id="nombre_tipoServicio" placeholder="Nombre del tipo de servicio" name="nombre_tipoServicio" autofocus value="{{old('nombre_tipoServicio', $tiposervicios->nombre_tipoServicio)}}" readonly />
                                            @if ($errors->has('nombre_tipoServicio'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_tipoServicio') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion_tipoServicio" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_tipoServicio') ? 'is-invalid' : ''}}" id="descripcion_tipoServicio" placeholder="Descripción de las funciones y características del tipo de servicio" name="descripcion_tipoServicio" autofocus readonly> {{old('descripcion_tipoServicio', $tiposervicios->descripcion_tipoServicio)}} </textarea>
                                            @if ($errors->has('descripcion_tipoServicio'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tipoServicio') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('admin.tiposervicios.edit', $tiposervicios->id) }}" class="btn btn-primary">
                                    <i>Editar</i>
                                </a>

                                <a href="{{ route('admin.tiposervicios.index') }}" class="">
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