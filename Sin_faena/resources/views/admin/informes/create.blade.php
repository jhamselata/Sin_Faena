@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo Informe</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.informes.store') }}">
                                @csrf

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="fecha_informe" class="form-label">Fecha: </label>
                                            <input type="date" class="form-control date" name="fecha_informe" id="fecha_informe" value="{{ old('fecha_informe')}}" required autofocus />
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_remitente" class="form-label">Remitente</label>
                                            <select class="form-control select2" name="id_remitente" style="width: 100%;" autofocus>
                                                <option value="">Seleccione el remitente</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('id_remitente') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_remitente'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_remitente') }}</strong>
                                            </span>
                                            @endif
    
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_destinatario" class="form-label">Destinatario</label>
                                            <select class="form-control select2" name="id_destinatario" style="width: 100%;" autofocus>
                                                <option value="">Seleccione el destinatario</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('id_destinatario') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_destinatario'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_destinatario') }}</strong>
                                            </span>
                                            @endif
    
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_tipoInforme" class="form-label">Tipo de Informe</label>
                                            <select class="form-control select2" name="id_tipoInforme" style="width: 100%;" autofocus>
                                                <option value="">Seleccione un tipo de informe</option>
                                                @foreach ($tipo_informes as $tipo_informe)
                                                <option value="{{ $tipo_informe->id }}" {{ old('id_tipoInforme') == $tipo_informe->id ? 'selected' : '' }}>
                                                    {{ $tipo_informe->nombre_tipoInforme }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_tipoInforme'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_tipoInforme') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Título</label>
                                            <input type="text" class="form-control {{$errors->has('titulo_informe') ? 'is-invalid' : ''}}" id="titulo_informe" placeholder="Título del informe" name="titulo_informe" autofocus value="{{old('titulo_informe', '')}}" />
                                            @if ($errors->has('titulo_informe'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('titulo_informe') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Descripción</label>
                                            <input type="textarea" class="form-control {{$errors->has('descripcion_informe') ? 'is-invalid' : ''}}" id="descripcion_informe" placeholder="Descripcion del informe" name="descripcion_informe" autofocus value="{{old('descripcion_informe', '')}}" />
                                            @if ($errors->has('descripcion_informe'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_informe') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.informes.index') }}" class="">
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