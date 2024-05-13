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
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-control select2" name="id_usuario" style="width: 100%;" autofocus disabled>
                                                <option value=""></option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ (old('id_usuario') ? old('id_usuario') : ($cliente->id_usuario ?? '')) == $user->id ? 'selected' : '' }}>
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
                                            <label for="id_tipoCliente" class="form-label">Tipo Cliente</label>
                                            <select class="form-control select2" name="id_tipoCliente" style="width: 100%;" autofocus disabled>
                                                <option value=""></option>
                                                @foreach ($tipo_clientes as $tipo_cliente)
                                                <option value="{{ $tipo_cliente->id }}" {{ (old('id_tipoCliente') ? old('id_tipoCliente') : ($cliente->id_tipoCliente ?? '')) == $tipo_cliente->id ? 'selected' : '' }}>
                                                    {{ $tipo_cliente->nombre_tipoCli }}
                                                </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('id_tipoCliente'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_tipoCliente') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_cli') ? 'is-invalid' : ''}}" id="nombre_cli" placeholder="Nombre del cliente" name="nombre_cli" autofocus value="{{old('nombre_cli', $cliente->nombre_cli)}}" disabled/>
                                                @if ($errors->has('nombre_cli'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_cli') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                    </div>
                                        
                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Apellido</label>
                                                <input type="text" class="form-control {{$errors->has('apellido_cli') ? 'is-invalid' : ''}}" id="apellido_cli" placeholder="Apellido del cliente" name="apellido_cli" autofocus value="{{old('apellido_cli', $cliente->apellido_cli)}}" disabled/>
                                                @if ($errors->has('apellido_cli'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('apellido_cli') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">RNC</label>
                                                <input type="text" class="form-control {{$errors->has('rnc_cli') ? 'is-invalid' : ''}}" id="rnc_cli" placeholder="RNC del cliente" name="rnc_cli" autofocus value="{{old('rnc_cli', $cliente->rnc_cli)}}" disabled/>
                                                @if ($errors->has('rnc_cli'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('rnc_cli') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Telefono</label>
                                            <input type="text" class="form-control {{$errors->has('telefono_cli') ? 'is-invalid' : ''}}" id="telefono_cli" placeholder="Telefono del cliente" name="telefono_cli" autofocus value="{{old('telefono_cli', $cliente->telefono_cli)}}" disabled/>
                                            @if ($errors->has('telefono_cli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('telefono_cli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estado_cli" class="form-label">Estado</label>
                                            <select class="form-control {{ $errors->has('estado_cli') ? 'is-invalid' : '' }}" name="estado_cli" id="estado_cli" required autofocus disabled>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Cliente::STATUS as $status)
                                                <option value="{{ $status }}" {{ (old('estado_cli') ? old('estado_cli') : $cliente->estado_cli ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('estado_cli'))
                                            <div class="text-danger">
                                                {{ $errors->first('estado_cli') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary">
                                    <i">Editar</i>
                                </a>

                                <a href="{{ route('admin.clientes.index') }}" class="">
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