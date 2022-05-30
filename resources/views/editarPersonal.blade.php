@extends('plantilla')

@section('contenido')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar datos del empleado</h6>
    </div>
    <div class="card-body">


        <form action="{{ route('updateEmployee', $datos->id) }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group  mt-2">
                <label for="nombre">Nombre completo</label>
                <input type="text " value="{{ $datos->nombre }}" name="nombre" id="nombre" class="form-control border-0 border-bottom rounded-0"
                     required>
            
</div>
            <div class="form-group mt-2">
                <label for="emailPersonal">Email personal</label>
                <input type="text" value="{{ $datos->emailPersonal }}" name="emailPersonal" id="emailPersonal"
                    class="form-control border-0 border-bottom rounded-0" required>
            </div>




            <div class="form-group mt-2">
                <label for="direccion">Dirección</label>
                <input type="text" value="{{ $datos->direccion }}" name="direccion" id="direccion" class="form-control border-0 border-bottom rounded-0"
                    required>
            </div>

            <div class="form-group mt-2">
                <label for="telefono">Teléfono</label>
                <input type="text" value="{{ $datos->telefono }}" name="telefono" id="telefono" class="form-control border-0 border-bottom rounded-0"
                    required>
            </div>
            <div class="form-group  mt-2 ">
                <label for="fechaContrato">Fecha de contrato</label>
                <input type="date" value="{{date('Y-m-d', strtotime($datos->fechaContrato )) }}" class="form-control border-0 border-bottom rounded-0 mb-2"
                    id="fechaContrato" name="fechaContrato" required>
            </div>
            <a class="btn btn-secondary" href="{{ route('empleados') }}">Volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
      
        </form>
    </div>
</div>
@endsection