@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar empleado</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.empleados.update', $empleado->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">


                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-control select2" name="id_usuario" style="width: 100%;" autofocus>
                                                <option value=""></option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ (old('id_usuario') ? old('id_usuario') : ($empleado->id_usuario ?? '')) == $user->id ? 'selected' : '' }}>
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
                                            <label for="code" class="form-label required">Nombre</label>
                                            <input type="text" class="form-control {{$errors->has('nombre_emp') ? 'is-invalid' : ''}}" id="nombre_emp" placeholder="Nombre del empleado" name="nombre_emp" autofocus value="{{old('nombre_emp', $empleado->nombre_emp)}}" />
                                            @if ($errors->has('nombre_empa'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_emp') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Apellido</label>
                                            <input type="text" class="form-control {{$errors->has('apellido_emp') ? 'is-invalid' : ''}}" id="apellido_emp" placeholder="Apellido del empleado" name="apellido_emp" autofocus value="{{old('apellido_emp', $empleado->apellido_emp)}}" />
                                            @if ($errors->has('apellido_emp'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('apellido_emp') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Cedula</label>
                                            <input type="text" class="form-control {{$errors->has('cedula') ? 'is-invalid' : ''}}" id="cedula" placeholder="Cedula del empleado" name="cedula" autofocus value="{{old('cedula', $empleado->cedula)}}" />
                                            @if ($errors->has('cedula'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('cedula') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Telefono</label>
                                            <input type="text" class="form-control {{$errors->has('telefono') ? 'is-invalid' : ''}}" id="telefono" placeholder="Telefono del empleado" name="telefono" autofocus value="{{old('telefono', $empleado->telefono)}}" />
                                            @if ($errors->has('telefono'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('telefono') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>




                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_depto" class="form-label">Departamento</label>
                                            <select class="form-control select2" name="id_depto" style="width: 100%;" autofocus>
                                                <option value=""></option>
                                                @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}" {{ (old('id_depto') ? old('id_depto') : ($empleado->id_depto ?? '')) == $departamento->id ? 'selected' : '' }}>
                                                    {{ $departamento->nombre_depto }}
                                                </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('id_depto'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_depto') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_puesto" class="form-label">Puesto</label>
                                            <select class="form-control select2" name="id_puesto" style="width: 100%;" autofocus>
                                                <option value=""></option>
                                                @foreach ($puestos as $puesto)
                                                <option value="{{ $puesto->id }}" {{ (old('id_puesto') ? old('id_puesto') : ($empleado->id_puesto ?? '')) == $puesto->id ? 'selected' : '' }}>
                                                    {{ $puesto->nombre_puesto }}
                                                </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('id_puesto'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_puesto') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estado_emp" class="form-label">Estado</label>
                                            <select class="form-control {{ $errors->has('estado_emp') ? 'is-invalid' : '' }}" name="estado_emp" id="estado_emp" required autofocus>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Empleado::STATUS as $status)
                                                <option value="{{ $status }}" {{ (old('estado_emp') ? old('estado_emp') : $empleado->estado_emp ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('estado_emp'))
                                            <div class="text-danger">
                                                {{ $errors->first('estado_emp') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Editar</button>
                                <a href="{{ route('admin.empleados.index') }}" class="">
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