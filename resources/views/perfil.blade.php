@extends('plantilla')



@section('contenido')

    <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Cambiar contraseña <i class="fa-solid fa-lock"></i>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('password') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Nueva contraseña</label>
                                    <input type="password" class="form-control" name="password1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Repita la nueva contraseña</label>
                                    <input type="password" class="form-control" name="password2">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 shadow">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row  border-0 border-bottom rounded-0 mb-4">
                    <div class="col-sm-6">
                        <p class="display-6 mb-4">Datos personales </p>

                    </div>
                    <div class="col-sm-6 ">

                        <i class="fa-solid fa-circle-info float-end" data-toggle="tooltip" data-placement="bottom"
                            title="Para actualizar la información póngase en contacto con un administrador."></i>
                    </div>


                    <div class="col-sm-3">
                        <p class="mb-0">Nombre completo</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $datos->nombre }}</p>
                    </div>
                </div>
                
                <div class="row  border-0 border-bottom rounded-0 mb-4">
                    <div class="col-sm-3">
                        <p class="mb-0">Email corporativo</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                
                <div class="row  border-0 border-bottom rounded-0  mb-4">
                    <div class="col-sm-3">
                        <p class="mb-0 ">Email personal</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$datos->emailPersonal}} </p>
                    </div>
                </div>
                
                <div class="row  border-0 border-bottom rounded-0 mb-4">
                    <div class="col-sm-3">
                        <p class="mb-0">Teléfono</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$datos->telefono}}</p>
                    </div>
                </div>
                
                <div class="row  border-0 border-bottom rounded-0 mb-4">
                    <div class="col-sm-3">
                        <p class="mb-0">Dirección</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$datos->direccion}}</p>
                    </div>
                </div>
                
                <div class="row  border-0 border-bottom rounded-0 mb-4">
                    <div class="col-sm-3">
                        <p class="mb-0">Rol

                        </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            @switch(auth()->user()->rol)
                            @case("Admin")
                            Administrador
                            @break
                            @case("RRHH")
                            Recursos Humanos
                            @break
                            @case("Finanzas")
                            Finanzas
                            @break




                            @endswitch</p>
                    </div>
                </div>
                

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-key"></i>
                    Cambiar contraseña </button>

            </div>
        </div>



    @endsection