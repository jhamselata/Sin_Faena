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
                                            <input type="date" class="form-control date" name="fecha_pedido" id="fecha_pedido" value="{{ old('fecha_pedido', $pedido->fecha_pedido)}}" required autofocus />
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