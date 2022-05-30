@extends('subPlantilla')
@section('modal')

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('newCustomer') }}" enctype="multipart/form-data" method="POST">
                    @csrf


                    <div class="form-group  mt-2">
                        <input type="text" name="entidad" id="entidad" class="form-control border-0 border-bottom rounded-0" placeholder="Entidad"
                            required>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" name="email" id="email" class="form-control border-0 border-bottom rounded-0" placeholder="Email" required>
                    </div>




                    <div class="form-group mt-2">
                        <input type="text" name="direccion" id="direccion" class="form-control border-0 border-bottom rounded-0" placeholder="Dirección"
                            required>
                    </div>

                    <div class="form-group mt-2">
                        <input type="text" name="telefono" id="telefono" class="form-control border-0 border-bottom rounded-0" placeholder="Teléfono"
                            required>
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
                            <a class="nav-link " href="{{ route('editarCliente' ,Crypt::encrypt($item->id)) }}">
                                <i class="fa-solid fa-briefcase "></i>
                            </a>

                        </span>
                        <span class="widget-49-date-month"></span>
                    </div>
                    <div class="widget-49-meeting-info">
                        <p class="filtro p-0 m-0">{{ $item->entidad }}</p>


                        <span class="widget-49-meeting-time"><i class="fa-solid fa-calendar-days"></i> {{ substr("$item->fecha",0,10)}}</span>
                    </div>
                </div>

                <div class="widget-49-meeting-action">


                    <a class="btn btn-sm btn-flash-border-primary"
                        href="{{ route('editarCliente' ,Crypt::encrypt($item->id)) }}">Editar <i class="fa-solid fa-pen-to-square"></i></a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#{{ $item->entidad }}">
                        Eliminar<i class="fa-solid fa-trash-can"></i>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>









<!-- Modal confirmacion eliminar -->
<div class="modal fade" id="{{ $item->entidad }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar {{ $item->entidad }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El archivo se va a eliminar de forma permanente</p>
                <p>¿Desea Continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{ route('eliminarCustomer' ,$item->id) }}">Confirmar</a>

            </div>
        </div>
    </div>
</div>
@endforeach



@endsection