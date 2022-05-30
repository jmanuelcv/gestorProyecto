@extends('subPlantilla')
 @section('modal')

<!-- Modal -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('newUser') }}">
                    @csrf
                    <div class="form-group  mt-2">
                        <input id="email" type="email" placeholder="Email"
                            class="form-control  border-0 border-bottom rounded-0" name="email"
                             required autocomplete="email"> 
                    </div>
                    <div class="form-group  mt-2">
                        <input placeholder="Contraseña" id="password" type="password" class="form-control border-0 border-bottom rounded-0 "
                            name="password" required>
                    </div>


                    <div class="form-group  mt-2">
                        <select name="rol" required>
                            <option value="Admin">Administrador</option>
                            <option value="RRHH">Recursos humanos</option>
                            <option value="Finanzas">Finanzas</option>
                        </select>
                    </div>

                    <div class="form-group  mt-2">
                        <select name="idPersonal">
                            @foreach ($personal as $persona )

                            <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                            @endforeach
                        </select>

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

@section('cuerpo')

@foreach ($cuerpo as $item )
<div class="col-lg-4">

    <div class="card card-margin">
        <div class="card-header no-border">


        </div>
        <div class="card-body pt-0">
            <div class="widget-49">
                <div class="widget-49-title-wrapper">
                    <div class="widget-49-date-primary">
                        <span class="widget-49-date-day">

                            <a href="{{ route('editar' ,Crypt::encrypt($item->id)) }}">
                                <i class="fa-solid fa-user"></i>
                            </a> </a>
                        </span>
                        <span class="widget-49-date-month"></span>
                    </div>
                    <div class="widget-49-meeting-info">
                        <p class="filtro widget-49-pro-title p-0 m-0"> {{ $item->email }}</p>
                        <span class="widget-49-meeting-time">{{ $item->rol }}</span>
                        <span class="widget-49-meeting-time">
                            @if($item->estado ==1)
                            <i class="fa-solid fa-circle text-success"></i> Activado
                            @else
                            <i class="fa-solid fa-circle text-danger"></i> Desactivado
                            @endif</span>

                    </div>
                </div>

                <div class="widget-49-meeting-action">
                    @if($item->estado ==0)
                    <a href="{{ route('estado' ,[$item->id,'alta']) }}">
                        <i class="fa-solid fa-power-off text-success"></i>
                    </a>
                    @else

                    <a href="{{ route('estado' ,[$item->id,'baja']) }}">
                        <i class="fa-solid fa-power-off text-danger"></i>
                    </a>
                    @endif






                    <a href="{{ route('editar' ,Crypt::encrypt($item->id)) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach











@endsection