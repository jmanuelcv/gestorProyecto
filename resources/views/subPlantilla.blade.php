@extends('plantilla')
@section('contenido')
<!-- 
<div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Buscar</span>
        </div>
        <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese el termino que desea buscar..."  aria-describedby="basic-addon1">
      </div> -->




<nav class="bd-subnavbar mt-4 py-2" aria-label="Secondary navigation">
    <div class="container-xxl d-flex align-items-md-center">

        <button type="button" class="btn btn-primary mb-3 me-auto" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop" data-toggle="tooltip" data-placement="bottom"
            title="Esta función se encientra disponible solo para ciertos usuarios">
            Agregar <i class="fa-solid fa-plus"></i>
        </button>
        <div class=" ms-3">
            <div class="input-group mb-3">
              
                
                <input id="FiltrarContenido" type="text" class="form-control border-0 border-bottom rounded-0"
                    placeholder="Buscar..." aria-describedby="basic-addon1">
                    <span class="input-group-text border-0 border-bottom rounded-0 bg-transparent " id="basic-addon1"><i class="fa-solid fa-magnifying-glass text-secondary"></i></span>

            </div>
        </div>
    </div>
</nav>







@yield('modal')


<div class="row" id="BusquedaRapida">
    @yield('cuerpo')
</div>


@endsection