@extends('layouts.admin')
    @section('content')
                <!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
                <main>

                    <div class="container-fluid px-4">
                        <h1 class="mt-5">Pedido</h1>
                        <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
                                  <button type="button" class="btn btn-secondary">
                                    Inicio
                                  </button>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                                    Registrar
                                  </button>
                                  <button type="button" class="btn btn-warning">
                                    Reporte
                                  </button>
                        </div>


                    <!-- MODAL FORM -->
                        <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Formulario de Pedido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form id="guardaCobros" class="form-horizontal" role="form" method="POST"
                                    action="#" name="guardarCobros">

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="code" class="form-label">Id del Cobro: </label>
                                                <input type="text" class="form-control" id="code"
                                                    placeholder="Id del cobro" name="code" autofocus
                                                    readonly />
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="nombre" class="form-label">ID_Prestamo: </label>
                                                <input type="text" class="form-control" id="nombre" name="Prestamo" placeholder="Ingresar el ID_Prestamo" autofocus />
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="mb-3 text-dark">
                                                <label for="nombre" class="form-label">ID_Empleado: </label>
                                                <input type="text" class="form-control" name="Empleado" placeholder="Ingresar el ID_Empleado" autofocus />
                                            </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre" class="form-label">Fecha: </label>
                                            <input type="date" class="form-control" name="Fecha" autofocus />
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion" class="form-label">Monto a cobrar: </label>
                                            <input type="text" class="form-control" name="MontoC" placeholder="0.00" autofocus />
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre" class="form-label">Dirección: </label>
                                            <input type="text" class="form-control" name="Direccion" placeholder="Ingresar dirección de cobro" autofocus />
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="descripcion" class="form-label">Monto pagado: </label>
                                            <input type="text" class="form-control" name="MontoP" placeholder="0.00" autofocus />
                                        </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            onclick="Limpiar('guarda')">Limpiar</button>
                                        <button id="guardaDatos" class="btn btn-primary" name="guardarDatos"
                                            onclick="return confirmacion(this.id)"
                                            type="submit">Guardar</button>
                                    </div>

                                </form>
                                </div>

                            </div>
                            </div>
                        </div>
                    <!-- FIN - MODAL FORM -->


                        <!-- CARD DE LA TABLA -->
                        <div class="card mb-4">

                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Datos
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>DNI</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>DNI</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                        <!-- FIN - CARD DE LA TABLA -->

                    </div>
                </main>
                <!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->

                @endsection