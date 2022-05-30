@extends('plantilla')

@section('contenido')




<div class="col-xl-8 col-lg-7 ">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar usuario</h6>
        </div>
        <div class="card-body">

            <form action="{{ route('update', $datos->id) }}" enctype="multipart/form-data" method="POST">
                @csrf



                <div class="form-group mt-2">
                    <label for="email">Email corporativo</label>
                    <input type="text" value="{{ $datos->email }}" name="email" id="email" class="form-control border-0 border-bottom rounded-0">
                </div>


                <div class="form-group  mt-2">
                   <p>Rol actual: {{ $datos->rol }}</p>
                    
                    <select class="nuevoRol " name="rol">
                        <option value="" selected>Seleccione un nuevo rol</option>
                        <option value="Admin">Administrador</option>
                        <option value="RRHH">Recursos humanos</option>
                        <option value="Finanzas">Finanzas</option>
                    </select>
                </div>

                <div class="form-group mt-2 ">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control border-0 border-bottom rounded-0">
                </div>



                <br>
                <a class="btn btn-secondary" href="{{ route('usuarios') }}">Volver</a>
                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>

</div>



@endsection