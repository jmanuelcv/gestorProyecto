@extends('plantilla')

@section('contenido')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar {{ $datos->nombre}}</h6>
    </div>
    <div class="card-body">


        <form action="{{ route('updateTareas', $datos->id) }}" enctype="multipart/form-data" method="POST">
            @csrf



            <div class="form-group  mt-2">
                <label for="nombre">Nombre completo</label>
                <input type="text " value="{{ $datos->nombre }}" name="nombre" id="nombre" class="form-control border-0 border-bottom rounded-0"
                    required>
            </div>
            <div class="form-group mt-2">
                <label for="emailPersonal">Descripcion</label>
                <textarea type="text"  name="descripcion" id="descripcion"
                    class="form-control border-0 border-bottom rounded-0" >{{ $datos->descripcion }}</textarea>
            </div>




            <div class="form-group mt-2">
                <label for="horasPlanificadas">Horas planificadas</label>
                <input type="number" value="{{ $datos->horasPlanificadas }}" name="horasPlanificadas" id="horasPlanificadas" class="form-control border-0 border-bottom rounded-0"
                    required>
            </div>

           
        
            <div class="form-group  mt-2 ">
                <label for="Inicio">Inicio : {{$datos->fechaInicio }}</label>
                <input type="date" value="{{$datos->fechaInicio }}" class="form-control border-0 border-bottom rounded-0"
                    id="Inicio" name="fechaInicio" >
            </div>
            <div class="form-group  mt-2 ">
                <label for="fin">Fin : {{$datos->fechaFin }}</label>
                <input type="date" value="{{$datos->fechaFin }}" class="form-control border-0 border-bottom rounded-0 mb-4"
                    id="fin" name="fechaFin" >
            </div>

            <div class="form-group  mt-2">
            <label for="usuarios">Usuarios</label>
                        <select name="idUsuario" id="usuarios">
                            @foreach ($usuarios as $usuario )
@if( $usuario->id == $datos->idUsuario )
<option value="{{ $usuario->id }}" selected>{{ $usuario->email }}</option>

@endif



                            <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                            @endforeach
                        </select>

                    </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('tareas') }}">Volver</a>
        </form>
    </div>
</div>



@endsection