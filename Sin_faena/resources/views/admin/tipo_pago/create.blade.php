@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo tipo de pago</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.tipo_pago.store') }}">
                                @csrf

                                <div class="row">

                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_tipoPago') ? 'is-invalid' : ''}}" id="nombre_tipoPago" placeholder="Nombre del tipo de pago" name="nombre_tipoPago" autofocus value="{{old('nombre_tipoPago', '')}}" />
                                                @if ($errors->has('nombre_tipoPago'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_tipoPago') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                    </div>

                                </div>

                                <div class="row">

                                <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_tipoPago') ? 'is-invalid' : ''}}" id="descripcion_tipoPago" placeholder="Descripcion del tipo de pago" name="descripcion_tipoPago" autofocus value="{{old('descripcion_tipoPago', '')}}"></textarea>
                                            @if ($errors->has('descripcion_tipoPago'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tipoPago') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.tipo_pago.index') }}" class="">
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
