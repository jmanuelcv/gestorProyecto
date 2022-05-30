@extends('plantilla')

@section('contenido')
<script>

///sort table function 
$(document).ready(function() 
    { 
        
       




let datos=[];
let sum = 0;
let clientes=[];





@foreach ($tp5 as $tp)
 datos.push({{  $tp->count}});
 clientes.push('{{   $tp->entidad }}');
@endforeach

for (let i = 0; i < datos.length; i++) {
    sum += datos[i];
}

console.log(sum);
console.log(datos)
let porcentaje=[];

datos.forEach(element => {
    
    
    porcentaje.push( Math.round(element/sum*100));
});
console.log(porcentaje)



//linear conf
let m=[]
let v=[]
 @foreach ($datos as $dato)
 m.push('{{  substr("$dato->fecha",0,10) }}');
 v.push({{   $dato->total }});
 @endforeach

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels:m,
    datasets: [{ 
        data:v ,
        label: "Ingresos",
       
        borderColor: "#B58DB6",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Ingresos'
    }
  }
});







let color
let arrayColor=[];
const setBg = () => {
  const randomColor = Math.floor(Math.random()*16777215).toString(16);
/*   
RANDOM BGC 
document.body.style.backgroundColor = "#" + randomColor; */
 return color = "#" + randomColor;
}
for (let index = 0; index < datos.length; index++) {
   arrayColor.push(setBg())
    
}
console.log(arrayColor)

 new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: clientes,
      datasets: [{
     
        backgroundColor: arrayColor,
        data: porcentaje,
        fill: false
      }]
    },
  
    
    
});
    } 
);

</script>

  <div class="container  mt-5">
  
    <div class="row ">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card  shadow h-100 p-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Ingresos (Mes)</div>



                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <p class="m-0">{{$totalMes}}€</p>
                       </div>
                      </div>
                    
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Annual) Card Example -->
      <div class=" col-xl-4 col-md-6 mb-4">
          <div class="card  shadow h-100 p-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Ingresos totales</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">

                          <p class="m-0">{{$total}}€</p>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>

      <!-- Tasks Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card shadow h-100 p-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nuevos clientes
                          </div>                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <p class="m-0">{{$clientesMes}}</p>
                          </div>

                      </div>
                      
                  </div>
              </div>
          </div>
      </div>

    </div>
 <div class="row">

  <div class="col-xl-8 col-lg-7 ">

      <!-- Area Chart -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Evolución de ingresos </h6>
          </div>
          <div class="card-body">
              <div class="chart-area">
                <canvas id="line-chart" ></canvas>
              </div>
           
          </div>
      </div>


  </div>

  <!-- Donut Chart -->
  <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Porcetanje de ingresos por cliente (%)</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
              <div class="chart-pie pt-4">
                <canvas   id="pie-chart"     class="text-center" ></canvas> 
               </div>
          
          </div>
      </div>
  </div>
</div>
<h2 class="display-5">Todos los datos</h2>
<div class="table-responsive">
<div class="toast"  id="target" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <p class="col-2 m-0">Filtro:  </p>
  
    <strong class="me-auto mensaje col-8"></strong>
  </div>

</div>
    <table  class="table table-striped table-sm" id="myTable">
      <thead>
        <tr>
          <th scope="col"><i class="fa fa-sort"></i> Total</th>
          <th scope="col"><i class="fa fa-sort"></i> Entidad</th>
        
          <th scope="col"><i class="fa fa-sort"></i> Fecha</th>
          <th scope="col"><i class="fa fa-sort"></i> Ver</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($datos as $dato)
       
           
        <tr>
          <td>{{ $dato->total}}</td>
          <td>{{ $dato->entidad}}</td>
      
          <td>{{ substr("$dato->fecha",0,10)  }}</td>
          <td><a href="{{ $dato ->ruta }}"  target="_blank" ><i class="fa fa-eye">  
            
   </i>       </a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>

    

@endsection