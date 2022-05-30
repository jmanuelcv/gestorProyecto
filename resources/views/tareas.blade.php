@extends('subPlantilla')
@if(auth()->user()->rol =="Admin")
@section('modal')

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('nuevaTarea')}}" enctype="multipart/form-data" method="POST">
                    @csrf


                    <div class="form-group  mt-2">

                        <input type="text" placeholder="Nombre de la tarea" name="nombre" id="nombre"
                            class="form-control border-0 border-bottom rounded-0" required>
                    </div>





                    <div class="form-group mt-2">

                        <input type="number" placeholder="Horas planificadas" name="horasPlanificadas"
                            class="form-control border-0 border-bottom rounded-0" required>
                    </div>
                    <div class="form-group  mt-2">
                        <select name="idUsuario">
                            @foreach ($usuarios as $usuario )

                            <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="input-group border-0 border-bottom rounded-0 mt-2">
                        <span class="input-group-text     border-bottom border-0  bg-transparent">Fecha de inicio</span>
                        <input type="date" class="form-control border-0 border-bottom rounded-0" name="fechaInicio"
                            required>


                    </div>
                    <div class="input-group border-0 border-bottom rounded-0 mt-2">
                        <span class="input-group-text     border-bottom border-0  bg-transparent">Fecha de fin</span>
                        <input type="date" class="form-control border-0 border-bottom rounded-0" name="fechaFin"
                            required>


                    </div>
                    <div class="form-group mt-2">

                        <textarea placeholder="Descripción" name="descripcion" id="descripcion"
                            class="form-control border-0 border-bottom rounded-0"></textarea>
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
@endsection
@endif


@section('cuerpo')


<div class="task-list">
    <h2>Tareas asignadas</h2>
   
    @foreach ($cuerpo as $item )
    @if(auth()->user()->rol =="Admin" || (auth()->user()->id==$item->idUsuario && $item->estado == "Abierta") )
    <div class="task high mb-1">
    <p class="filtro h4 ms-2 text-uppercase">{{ $item->nombre }}</p>
        <div class="desc">

            
            <div class="row ">
                <div class="col-12  m-1 ms-2 ">


                    <span
                        class="badge @if($item->estado=='Abierta') bg-success @else bg-danger  @endif bg-success">{{ $item->estado }}</span>
                       
                </div>
                <p class="col-12 m-1 ms-2">Inicio: {{ substr("$item->fechaInicio",0,10) }} Fin:
                    {{ substr("$item->fechaFin",0,10) }} </p>
                <p class="col-12  m-1 ms-2 "> <i class="fa-solid fa-clock"></i> {{ $item->horasPlanificadas }} h
                </p>


            </div>

            <p class="ms-2">{{ $item->descripcion }}</p>

            <div class="  m-1 ms-2 "><i class="fa-solid fa-user"></i>
            @foreach ($usuarios as $usuario )
                @if($item->idUsuario == $usuario->id )



                {{ $usuario->email }}
                @if($item->estado == "Abierta")
                    <a href="{{ route('estadoTarea' ,[$item->id,'cerrar']) }}" class=" ms-4 btn btn-primary btn-sm">Cerrar tarea
                    </a>
                    @else

                    <a href="{{ route('estadoTarea' ,[$item->id,'abrir']) }}" class=" ms-4 btn btn-primary btn-sm">Abrir tarea
                    </a>
                    @endif
                    @if(auth()->user()->rol =="Admin")
                    <a href="{{ route('editarTareas' ,$item->id) }}" class=" ms-4 btn btn-primary btn-sm">Editar tarea   <i class="fa-solid fa-pen"></i></a>
                  
                    <a href="{{ route('eliminarTareas' ,$item->id) }}" class=" ms-4 btn btn-danger btn-sm">Eliminar tarea <i class="fa-solid fa-trash-can"></i></a>
 @endif
                </div>
            @endif
            @endforeach
        </div>
    </div>
    @endif
    @endforeach


</div>





@endsection