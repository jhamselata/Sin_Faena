@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Nueva tarea</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.tareas.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Titulo</label>
                                            <input type="text" class="form-control {{$errors->has('titulo_tarea') ? 'is-invalid' : ''}}" id="titulo_tarea" placeholder="titulo de la tarea" name="titulo_tarea" autofocus value="{{old('titulo_tarea', '')}}" />
                                            @if ($errors->has('titulo_tarea'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('titulo_tarea') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_usuario" class="form-label">Empleado</label>
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
                                            <label for="nombre" class="form-label">Descripcion </label>
                                            <textarea name="descripcion_tarea" class="form-control" autofocus>{{old('descripcion_tarea', '')}}</textarea>
                                            @if ($errors->has('descripcion_tarea'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_tarea') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="comenzar_tarea" class="form-label">Fecha inicio: </label>
                                            <input type="date" class="form-control date" name="comenzar_tarea" id="comenzar_tarea" value="{{ old('comenzar_tarea')}}" required autofocus />
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="terminar_tarea" class="form-label">Fecha final: </label>
                                            <input type="date" class="form-control date" name="terminar_tarea" value="{{ old('terminar_tarea') }}" required autofocus />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="prioridad_tarea" class="form-label">Prioridad</label>
                                            <select class="form-control {{ $errors->has('prioridad_tarea') ? 'is-invalid' : '' }}" name="prioridad_tarea" id="prioridad_tarea" required autofocus>
                                                <option value="">Seleccione la prioridad</option>
                                                @foreach(App\Models\Tarea::PRIORITY as $priorities)
                                                <option value="{{ $priorities }}" {{ old('prioridad_tarea') == $priorities ? 'selected' : '' }}>{{ $priorities }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('prioridad_tarea'))
                                            <div class="text-danger">
                                                {{ $errors->first('prioridad_tarea') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="estado_tarea" class="form-label">Estado</label>
                                            <select class="form-control {{ $errors->has('estado_tarea') ? 'is-invalid' : '' }}" name="estado_tarea" id="estado_tarea" required autofocus>
                                                <option value="">Seleccione un estado</option>
                                                @foreach(App\Models\Tarea::STATUS as $status)
                                                <option value="{{ $status }}" {{ old('estado_tarea') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('estado_tarea'))
                                            <div class="text-danger">
                                                {{ $errors->first('estado_tarea') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a href="{{ route('admin.tareas.index') }}" class="">
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