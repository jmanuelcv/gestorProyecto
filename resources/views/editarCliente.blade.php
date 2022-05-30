@extends("plantilla")

@section('contenido')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar datos del cliente</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('updateCustomer', $datos->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group  mt-2">
                <label for="entidad">Entidad</label>
                <input type="text " value="{{ $datos->entidad }}" name="entidad" id="entidad" class="form-control border-0 border-bottom rounded-0 "
                    required>
            </div>
            <div class="form-group mt-2">
                <label for="emailPersonal">Email</label>
                <input type="email" value="{{ $datos->email }}" name="email" id="email" class="form-control border-0 border-bottom rounded-0 " required>
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
            <a class="btn btn-secondary" href="{{  route('clientes') }}">Volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            
        </form>
    </div>
</div>

@endsection