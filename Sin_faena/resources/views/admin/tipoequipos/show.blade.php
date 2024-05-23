@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar Cliente</h1>
            </div>
        </div>
    </div>
</div>
<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

    <!-- MODAL FORM -->
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
                                            <label for="nombre_tipoEquipo" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_tipoEquipo') ? 'is-invalid' : ''}}" id="nombre_tipoEquipo" placeholder="Nombre del tipo de equipo" name="nombre_tipoEquipo" autofocus value="{{old('nombre_tipoEquipo', $tipoequipo->nombre_tipoEquipo)}}" readonly />
                                            @if ($errors->has('nombre_tipoEquipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_tipoEquipo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion_tipoEquipo" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_tipoEquipo') ? 'is-invalid' : ''}}" id="descripcion_tipoEquipo" placeholder="Descripción de las funciones y características del tipo de equipo" name="descripcion_tipoEquipo" autofocus readonly> {{old('descripcion_tipoEquipo', $tipoequipo->descripcion_tipoEquipo)}} </textarea>
                                            @if ($errors->has('descripcion_tipoEquipo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tipoEquipo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('admin.tipoequipos.edit', $tipoequipo->id) }}" class="btn btn-primary">
                                    <i>Editar</i>
                                </a>

                                <a href="{{ route('admin.tipoequipos.index') }}" class="">
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
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection