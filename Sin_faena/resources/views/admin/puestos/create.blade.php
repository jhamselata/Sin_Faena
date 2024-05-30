@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo Puesto</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.puestos.store') }}">
                                @csrf

                                <div class="row">

                                   
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_puesto') ? 'is-invalid' : ''}}" id="nombre_puesto" placeholder="Nombre del puesto laboral" name="nombre_puesto" autofocus value="{{old('nombre_puesto', '')}}" />
                                            @if ($errors->has('nombre_puesto'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_puesto') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                               
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Descripción</label>
                                            <textarea class="form-control {{$errors->has('descripcion_puesto') ? 'is-invalid' : ''}}" id="descripcion_puesto" placeholder="Descripcion del puesto laboral" name="descripcion_puesto" autofocus>{{old('descripcion_puesto', '')}}</textarea>
                                            @if ($errors->has('descripcion_puesto'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_puesto') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>                                 

                                </div>


                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.puestos.index') }}" class="">
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

</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection