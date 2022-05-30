@extends('plantilla') @section('contenido')






<div class="row mt-2">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @foreach ($clientes as $cliente )
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="heading{{$cliente->entidad}}">
                        <div class="accordion-button  bg-secondary text-white rounded-0 " type="button"
                            data-bs-toggle="collapse" data-bs-target="#{{$cliente->entidad}}" aria-expanded="true"
                            aria-controls="collapseOne">
                            <div class="col-12 p-0 m-0 ">
                            <i class="fa-solid fa-folder me-2"></i>{{$cliente->entidad}}
                            </div>
                        </div>
                    </div>


                    @foreach ($cuerpo as $item )
                    @if($item->idCliente == $cliente->id)
                    <div id="{{$cliente->entidad}}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{$cliente->entidad}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                            <div class="row border-bottom mb-4  pb-3">
                                <div class="col-5">
                                    {{ substr("$item->fecha",0,10)}}
                                </div>
                                <div class="col-4">
                                    {{$item->concepto}}
                                </div>
                                <div class="col-3 text-end">
                                    <a href="{{$item->ruta}}" target="_blank"> <i class="fa fa-eye"
                                            style="font-size:20px"></i></a>
                                    <i class="fa-solid fa-trash-can" data-bs-toggle="modal"
                                        data-bs-target="#m{{$item->id}}"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="m{{$item->id}}" tabindex="-1" aria-labelledby="modal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal"> Factura del cliente <span
                                            class="text-danger  text-uppercase">{{ $cliente->entidad }}</span> con fecha
                                        <span class="text-danger">{{ substr("$item->fecha",0,10) }}</span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>El archivo se va a eliminar de forma <span
                                            class="text-danger text-uppercase">permanente</span></p>
                                    <p>¿Desea Continuar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" href="{{ route('eliminar',$item->id) }}">Confirmar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5 ">
        <!-- formulario crear-->

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nueva factura</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('new') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <input type="text" name="concepto" id="concepto" class="form-control border-0 border-bottom rounded-0" placeholder="Concepto"
                            required>
                    </div>
                    <div class="form-group  mt-2 ">
                        <label for="fecha">Fecha de emisión</label>
                        <input type="date" class="form-control border-0 border-bottom rounded-0" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group  mt-2 ">
                        <input type="file" name="file" class="form-control rounded-0 " id="file" required>
                    </div>
                    <div class="input-group mb-3 mt-2 ">
                        <input type="text" class="form-control  rounded-0" placeholder="Cantidad" name="total" id="total" required>
                        <span class="input-group-text rounded-0">€</span>
                    </div>
                    <div class="form-group mt-2 ">
                        <select name="idCliente">
                            @foreach ($clientes as $cliente )
                            <option value="{{ $cliente->id }}">{{ $cliente->entidad }}</option>
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






    @endsection