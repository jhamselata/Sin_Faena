@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Detalles del tipo evento</h1>
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
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_tipoEvento') ? 'is-invalid' : ''}}" id="nombre_tipoEvento" placeholder="Nombre del tipo evento" name="nombre_tipoEvento" autofocus value="{{old('nombre_tipoEvento', $tipoeventos->nombre_tipoEvento)}}" disabled/>
                                                @if ($errors->has('nombre_tipoEvento'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_tipoEvento') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                    </div>
                                        
                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Descripcion</label>
                                                <textarea class="form-control {{$errors->has('descripcion_tipoEvento') ? 'is-invalid' : ''}}" id="descripcion_tipoEvento" placeholder="Descripcion del tipo de evento" name="descripcion_tipoEvento" autofocus disabled>{{old('descripcion_tipoEvento', $tipoeventos->descripcion_tipoEvento)}}</textarea>
                                                @if ($errors->has('descripcion_tipoEvento'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('descripcion_tipoEvento') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>

                                <a href="{{ route('admin.tipoeventos.edit', $tipoeventos->id) }}" class="btn btn-primary">
                                    <i">Editar</i>
                                </a>

                                <a href="{{ route('admin.tipoeventos.index') }}" class="">
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
    </div>
    </div>
    </div>
</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection