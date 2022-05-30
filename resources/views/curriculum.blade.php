@extends('subPlantilla')

@section('cuerpo')

@foreach ($cuerpo as $item )
<div class="col-lg-4">

    <div class="card card-margin">
        <div class="card-header no-border">

            <p class="filtro card-title">{{ $item->nombre }}</p>
        </div>
        <div class="card-body pt-0">
            <div class="widget-49">
                <div class="widget-49-title-wrapper">
                    <div class="widget-49-date-primary">
                        <span class="widget-49-date-day">

                            <a href="{{ $item ->ruta }}" target="_blank">
                                <i class="fa-solid fa-file"></i></a>
                        </span>
                        <span class="widget-49-date-month"></span>
                    </div>
                    <div class="widget-49-meeting-info">
                        <span class="widget-49-pro-title">{{ $item->email }}</span>
                        <span class="widget-49-meeting-time">{{ $item->telefono }}</span>
                        <span class="widget-49-meeting-time"> {{ substr("$item->fecha",0,10)}}</span>

                    </div>
                </div>

                <div class="widget-49-meeting-action">

                    <a href="{{ $item ->ruta }}" class="btn btn-sm btn-flash-border-primary" target="_blank" download>
                        Descargar <i class="fa-solid fa-download"></i>
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#{{ $item->nombre }}">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal confirmacion eliminar -->
<div class="modal fade" id="{{ $item->nombre }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cv - {{ $item->nombre }} - {{ $item->fecha }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El archivo se va a eliminar de forma permanente</p>
                <p>¿Desea Continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{ route('eliminarCv',$item->id) }}">Confirmar</a>

            </div>
        </div>
    </div>
</div>
@endforeach


@endsection