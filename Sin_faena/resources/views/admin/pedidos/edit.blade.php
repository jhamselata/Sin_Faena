@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar pedido</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.pedidos.update', $pedido->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">


                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-control select2" name="id_usuario" style="width: 100%;" autofocus>
                                                <option value=""></option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ (old('id_usuario') ? old('id_usuario') : ($pedido->id_usuario ?? '')) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('id_usuario'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_usuario') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion" class="form-label">Descripcion </label>
                                            <textarea name="descripcion_pedido" class="form-control" autofocus>{{old('descripcion_pedido', $pedido->descripcion_pedido)}}</textarea>
                                            @if ($errors->has('descripcion_pedido'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_pedido') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="fecha_pedido" class="form-label">Fecha pedido: </label>

                                            @php
                                            $fechaPedido = old('fecha_pedido', isset($pedido) ? $pedido->fecha_pedido : null);

                                            if ($fechaPedido && is_string($fechaPedido)) {
                                            $fechaPedido = \Carbon\Carbon::parse($fechaPedido)->format('Y-m-d');
                                            }
                                            @endphp

                                            <input type="date" class="form-control date" name="fecha_pedido" id="fecha_pedido" value="{{ $fechaPedido }}" required autofocus />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <label for="servicios">Servicios:</label>
                                    <select name="servicios[]" id="servicios" multiple>
                                        @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio->id }}" {{ in_array($servicio->id, $pedido->servicios->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $servicio->nombre_servicio }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estado_pedido" class="form-label">Estado</label>
                                            <select class="form-control {{ $errors->has('estado_pedido') ? 'is-invalid' : '' }}" name="estado_pedido" id="estado_pedido" required autofocus>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Pedido::STATUS as $status)
                                                <option value="{{ $status }}" {{ (old('estado_pedido') ? old('estado_pedido') : $pedido->estado_pedido ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('estado_pedido'))
                                            <div class="text-danger">
                                                {{ $errors->first('estado_pedido') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="plataformas" class="form-label">Plataformas</label>
                                            <select class="form-control {{ $errors->has('plataformas') ? 'is-invalid' : '' }}" name="plataformas" id="plataformas" required autofocus>
                                                <option value="">Seleccione una plataforma</option>
                                                @foreach(App\Models\Pedido::PLATFORM as $platforms)
                                                <option value="{{ $platforms }}" {{ (old('plataformas') ? old('plataformas') : $pedido->platforms ?? '') == $platforms ? 'selected' : '' }}>{{ $platforms }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('plataformas'))
                                            <div class="text-danger">
                                                {{ $errors->first('plataformas') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estilo_diseno" class="form-label">Estilo de diseño</label>
                                            <select class="form-control {{ $errors->has('estilo_diseno') ? 'is-invalid' : '' }}" name="estilo_diseno" id="estilo_diseno" required autofocus>
                                                <option value="">Seleccione un estilo</option>
                                                @foreach(App\Models\Pedido::DESING as $desings)
                                                <option value="{{ $desings }}" {{ (old('estilo_diseno') ? old('estilo_diseno') : $pedido->estilo_diseno ?? '') == $desings ? 'selected' : '' }}>{{ $desings }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('estilo_diseno'))
                                            <div class="text-danger">
                                                {{ $errors->first('estilo_diseno') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="frecuencia_publicacion" class="form-label">Frecuencia de publicación</label>
                                            <select class="form-control {{ $errors->has('frecuencia_publicacion') ? 'is-invalid' : '' }}" name="frecuencia_publicacion" id="frecuencia_publicacion" required autofocus>
                                                <option value="">Seleccione la frecuencia de publicación</option>
                                                @foreach(App\Models\Pedido::FRECUENCY as $frecuencys)
                                                <option value="{{ $frecuencys }}" {{ (old('frecuencia_publicacion') ? old('frecuencia_publicacion') : $pedido->platforms ?? '') == $frecuencys ? 'selected' : '' }}>{{ $frecuencys }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('frecuencia_publicacion'))
                                            <div class="text-danger">
                                                {{ $errors->first('frecuencia_publicacion') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="formato_entrega" class="form-label">Formato de entrega</label>
                                            <select class="form-control {{ $errors->has('formato_entrega') ? 'is-invalid' : '' }}" name="formato_entrega" id="formato_entrega" required autofocus>
                                                <option value="">Seleccione un formato</option>
                                                @foreach(App\Models\Pedido::FORMAT as $formats)
                                                <option value="{{ $formats }}" {{ (old('formato_entrega') ? old('formato_entrega') : $pedido->formato_entrega ?? '') == $formats ? 'selected' : '' }}>{{ $formats }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('formato_entrega'))
                                            <div class="text-danger">
                                                {{ $errors->first('formato_entrega') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <button class="btn btn-primary" type="submit">Editar</button>
                                <a href="{{ route('admin.pedidos.index') }}" class="">
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