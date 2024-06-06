@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nuevo Cliente</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.clientes.store') }}">
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
                                        <label for="id_tipoCliente" class="form-label">Tipo Cliente</label>
                                        <select class="form-control select2" name="id_tipoCliente" style="width: 100%;" autofocus>
                                            <option value="">Seleccione un tipo de cliente</option>
                                            @foreach ($tipo_clientes as $tipo_cliente)
                                            <option value="{{ $tipo_cliente->id }}" {{ old('id_tipoCliente') == $tipo_cliente->id ? 'selected' : '' }}>
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
                                            <input type="text" class="form-control {{$errors->has('nombre_cli') ? 'is-invalid' : ''}}" id="nombre_cli" placeholder="Nombre del cliente" name="nombre_cli" autofocus value="{{old('nombre_cli', '')}}" />
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
                                            <input type="text" class="form-control {{$errors->has('apellido_cli') ? 'is-invalid' : ''}}" id="apellido_cli" placeholder="Apellido del cliente" name="apellido_cli" autofocus value="{{old('apellido_cli', '')}}" />
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
                                            <input type="text" class="form-control {{$errors->has('rnc_cli') ? 'is-invalid' : ''}}" id="rnc_cli" placeholder="RNC del cliente" name="rnc_cli" autofocus value="{{old('rnc_cli', '')}}" />
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
                                            <label for="code" class="form-label required">Teléfono</label>
                                            <input type="text" class="form-control {{$errors->has('telefono_cli') ? 'is-invalid' : ''}}" id="telefono" placeholder="Telefono del cliente" name="telefono_cli" autofocus value="{{old('telefono_cli', '')}}" />
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
                                            <select class="form-control {{ $errors->has('estado_cli') ? 'is-invalid' : '' }}" name="estado_cli" id="estado_cli" required autofocus>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Cliente::STATUS as $status)
                                                <option value="{{ $status }}" {{ old('estado_cli') == $status ? 'selected' : '' }}>{{ $status }}</option>
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

                                <div class="row">
    
                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="preferencia_comunicacion" class="form-label">Comunicación</label>
                                                <select class="form-control {{ $errors->has('preferencia_comunicacion') ? 'is-invalid' : '' }}" name="preferencia_comunicacion" id="preferencia_comunicacion" required autofocus>
                                                    <option value="">Seleccione el medio de su preferencia</option>
                                                    @foreach(App\Models\Cliente::COMUNICATION as $comunications)
                                                    <option value="{{ $comunications }}" {{ old('preferencia_comunicacion') == $comunications ? 'selected' : '' }}>{{ $comunications }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('preferencia_comunicacion'))
                                                <div class="text-danger">
                                                    {{ $errors->first('preferencia_comunicacion') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Otro medio</label>
                                                <input type="text" class="form-control {{$errors->has('otra_via_comunicacion') ? 'is-invalid' : ''}}" id="otra_via_comunicacion" placeholder="En caso de otro medio" name="otra_via_comunicacion" autofocus value="{{old('otra_via_comunicacion', '')}}" />
                                                @if ($errors->has('otra_via_comunicacion'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('otra_via_comunicacion') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                <button class="btn btn-primary" type="submit">Guardar</button>
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