@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar Departamento</h1>
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
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_depto') ? 'is-invalid' : ''}}" id="nombre_depto" placeholder="Nombre del departamento" name="nombre_depto" autofocus value="{{old('nombre_depto', $departamento->nombre_depto)}}" disabled/>
                                                @if ($errors->has('nombre_depto'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_depto') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Descripción</label>
                                            <textarea type="text" class="form-control {{$errors->has('descripcion_depto') ? 'is-invalid' : ''}}" id="descripcion_depto" placeholder="Descripción del departamento" name="descripcion_depto" autofocus disabled>{{old('descripcion_depto', $departamento->descripcion_depto)}}</textarea>
                                            @if ($errors->has('descripcion_depto'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('descripcion_depto') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('admin.departamentos.edit', $departamento->id) }}" class="btn btn-primary">
                                    <i">Editar</i>
                                </a>

                                <a href="{{ route('admin.departamentos.index') }}" class="">
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