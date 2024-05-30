@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Detalles del Servicio</h1>
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
                                            <label for="id_tipoServicio" class="form-label">Tipo Servicio</label>
                                            <select class="form-control select2" name="id_tipoServicio" style="width: 100%;" autofocus disabled>
                                                <option value=""></option>
                                                @foreach ($tipo_servicios as $tipo_servicio)
                                                <option value="{{ $tipo_servicio->id }}" {{ (old('id_tipoServicio') ? old('id_tipoServicio') : ($servicio->id_tipoServicio ?? '')) == $tipo_servicio->id ? 'selected' : '' }}>
                                                    {{ $tipo_servicio->nombre_tipoServicio }}
                                                </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('id_tipoServicio'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_tipoServicio') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_servicio') ? 'is-invalid' : ''}}" id="nombre_servicio" placeholder="Nombre del servicio" name="nombre_servicio" autofocus value="{{old('nombre_servicio', $servicio->nombre_servicio)}}" disabled/>
                                                @if ($errors->has('nombre_servicio'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_servicio') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                    </div>
                                        
                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Descripcion</label>
                                                <input type="text" class="form-control {{$errors->has('descripcion_servicio') ? 'is-invalid' : ''}}" id="descripcion_servicio" placeholder="Descripcion del servicio" name="descripcion_servicio" autofocus value="{{old('descripcion_servicio', $servicio->descripcion_servicio)}}" disabled/>
                                                @if ($errors->has('descripcion_servicio'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('descripcion_servicio') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Precio</label>
                                                <input type="text" class="form-control {{$errors->has('precio_servicio') ? 'is-invalid' : ''}}" id="precio_servicio" placeholder="0.00" name="precio_servicio" autofocus value="{{old('precio_servicio', $servicio->precio_servicio)}}" disabled/>
                                                @if ($errors->has('precio_servicio'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('precio_servicio') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Duracion</label>
                                            <input type="text" class="form-control {{$errors->has('duracion_estimada') ? 'is-invalid' : ''}}" id="duracion_estimada" placeholder="Duracion del servicio" name="duracion_estimada" autofocus value="{{old('duracion_estimada', $servicio->duracion_estimada)}}" disabled/>
                                            @if ($errors->has('duracion_estimada'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('duracion_estimada') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('admin.servicios.edit', $servicio->id) }}" class="btn btn-primary">
                                    <i">Editar</i>
                                </a>

                                <a href="{{ route('admin.servicios.index') }}" class="">
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