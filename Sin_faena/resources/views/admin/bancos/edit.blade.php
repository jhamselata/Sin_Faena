@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Actualizar Banco</h1>
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

                            <form class="form-horizontal" method="post" action="{{ route('admin.bancos.update', $bancos->id) }}">
                                @csrf
                                @method('PUT')


                                <div class="row">

                                    <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">Nombre</label>
                                                <input type="text" class="form-control {{$errors->has('nombre_banco') ? 'is-invalid' : ''}}" id="nombre_banco" placeholder="Nombre del banco" name="nombre_banco" autofocus value="{{old('nombre_banco', $bancos->nombre_banco)}}"/>
                                                @if ($errors->has('nombre_banco'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('nombre_banco') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label required">RNC</label>
                                                <input type="text" class="form-control {{$errors->has('rnc') ? 'is-invalid' : ''}}" id="rnc" placeholder="RNC del banco" name="rnc" autofocus value="{{old('rnc', $bancos->rnc)}}" />
                                                @if ($errors->has('rnc'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('rnc') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>



                                <div class="row">

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Telefono</label>
                                            <input type="text" class="form-control {{$errors->has('telefono_banco') ? 'is-invalid' : ''}}" id="telefono_banco" placeholder="Telefono del banco" name="telefono_banco" autofocus value="{{old('telefono_banco', $bancos->telefono_banco)}}" />
                                            @if ($errors->has('telefono_banco'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('telefono_banco') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="code" class="form-label required">Correo electrónico</label>
                                            <input type="text" class="form-control {{$errors->has('correo') ? 'is-invalid' : ''}}" id="correo" placeholder="Correo electrónico del banco" name="correo" autofocus value="{{old('correo', $bancos->correo)}}" />
                                            @if ($errors->has('correo'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('correo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary" type="submit">Editar</button>
                                <a href="{{ route('admin.bancos.edit', $bancos->id) }}" class="">
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