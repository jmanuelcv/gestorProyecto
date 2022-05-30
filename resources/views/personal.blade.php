@extends('subPlantilla')

@section('modal')

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('newEmployee') }}" enctype="multipart/form-data" method="POST" >
                @csrf 
              
            
                <div class="form-group  mt-2">
               
                    <input type="text" placeholder="nombre" name="nombre" id="nombre"
                        class="form-control border-0 border-bottom rounded-0"  required>
                </div>

                
                <div class="form-group mt-2">
                  
                    <input type="text"  placeholder="Email" name="emailPersonal" id="emailPersonal"
                        class="form-control border-0 border-bottom rounded-0"  required>
                </div>

           
        
                <div class="form-group mt-2">
                
                    <input type="text"  placeholder="direccion" name="direccion" id="direccion"
                        class="form-control border-0 border-bottom rounded-0"  required>
                </div>

                <div class="form-group mt-2">
                   
                    <input type="text"  placeholder="telefono" name="telefono" id="telefono"
                        class="form-control border-0 border-bottom rounded-0"  required>
                </div>
               
                <div class="input-group border-0 border-bottom rounded-0 mt-2">
  <span class="input-group-text     border-bottom border-0  bg-transparent" >Fecha de contrato</span>
  <input type="date"  class="form-control border-0 border-bottom rounded-0"  id="fechaContrato"placeholder="" name="fechaContrato"required>


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
          
                <p class="filtro card-title h5">{{ $item->nombre }}</p>
            </div>
            <div class="card-body pt-0">
                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        <div class="widget-49-date-primary">
                            <span class="widget-49-date-day">
                            <a     href="{{ route('editarEmployee' ,Crypt::encrypt($item->id)) }}">
                            <i class="fa-solid fa-user-tie"></i>
</a>                           </a>

</span>
                            <span class="widget-49-date-month"></span>
                        </div>
                        <div id="info" class="widget-49-meeting-info">
                            <span class="widget-49-pro-title"><i class="fa-solid fa-envelope"></i>  {{ $item->emailPersonal }}</span>
                            <span class="widget-49-meeting-time"> <i class="fa-solid fa-phone"></i>  {{ $item->telefono }}</span>
                            <span class="widget-49-meeting-time"> <i class="fa-solid fa-location-dot"></i>  {{ $item->direccion }}</span>
                            <span class="widget-49-meeting-time"> <i class="fa-solid fa-calendar-days"></i> {{ substr("$item->fechaContrato",0,10)}}</span>
                        </div>
                    </div>
         
                    <div class="widget-49-meeting-action">
                       
         
            <a   class="btn btn-sm btn-flash-border-primary"  href="{{ route('editarEmployee' ,Crypt::encrypt($item->id)) }}">Editar <i class="fa-solid fa-pen-to-square"></i>
          </a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#e{{$item->id}}">
            Eliminar  <i class="fa-solid fa-trash-can" ></i>
            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
        
<!-- Modal confirmacion eliminar -->
<div class="modal fade" id="e{{ $item->id }}" tabindex="-1" aria-labelledby="Modal{{ $item->emailPersonal }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal{{ $item->emailPersonal }}">Eliminar {{ $item->nombre }}  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<p>El archivo se va a eliminar de forma permanente</p> <p>¿Desea Continuar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a  class="btn btn-primary"  href="{{ route('eliminarEmployee' ,$item->id) }}">Confirmar</a> 

      </div>
    </div>
  </div>
</div>
    @endforeach
 



@endsection
