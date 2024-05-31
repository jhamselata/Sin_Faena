@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo tipo de informe</h1>
            </div>
        </div>
    </div>
</div>
<!-- Contenido de la pantalla modal y los formularios -->
<main>

    <!-- Formulario de la Pantalla Modal -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="{{ route('admin.tipoinformes.store') }}">
                                @csrf

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre_tipoInforme" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_tipoInforme') ? 'is-invalid' : ''}}" id="nombre_tipoInforme" placeholder="Nombre del tipo informe" name="nombre_tipoInforme" autofocus value="{{old('nombre_tipoInforme', '')}}" />
                                            @if ($errors->has('nombre_tipoInforme'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_tipoInforme') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion_tipoInforme" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_tipoInforme') ? 'is-invalid' : ''}}" id="descripcion_tipoInforme" placeholder="Descripción de las funciones y características del tipo de informe" name="descripcion_tipoInforme" autofocus value="{{old('descripcion_tipoInforme', '')}}"></textarea>
                                            @if ($errors->has('descripcion_tipoInforme'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tipoInforme') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.tipoinformes.index') }}" class="">
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
