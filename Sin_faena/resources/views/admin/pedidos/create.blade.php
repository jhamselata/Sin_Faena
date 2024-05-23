@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo Pedido</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.pedidos.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-control select2" name="id_usuario" style="width: 100%;" autofocus>
                                                <option value="">Seleccione un usuario</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('id_usuario') == $user->id ? 'selected' : '' }}>
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
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <textarea name="descripcion_pedido" class="form-control" autofocus>{{old('descripcion_pedido', '')}}</textarea>
                                            @if ($errors->has('descripcion_pedido'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_pedido') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="fecha_pedido" class="form-label">Fecha entrega: </label>
                                            <input type="date" class="form-control date" name="fecha_pedido" id="fecha_pedido" value="{{ old('fecha_pedido')}}" required autofocus />
                                        </div>
                                    </div>


                                </div>


                                <div class="row">


                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="servicios" class="form-label">Servicios:</label>
                                            <select name="servicios[]" class="form-control" id="servicios" multiple>
                                                @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estado_pedido" class="form-label">Estado</label>
                                            <select class="form-control {{ $errors->has('estado_pedido') ? 'is-invalid' : '' }}" name="estado_pedido" id="estado_pedido" required autofocus>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Pedido::STATUS as $status)
                                                <option value="{{ $status }}" {{ old('estado_pedido') == $status ? 'selected' : '' }}>{{ $status }}</option>
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

                                <button class="btn btn-primary" type="submit">Guardar</button>
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