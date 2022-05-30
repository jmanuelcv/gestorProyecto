   $(document).ready(function () {
    $(function () {
      $('.example-popover').popover({
        container: 'body'
      })
    }) 

    $("[data-toggle=tooltip").tooltip();
  
    $('body').on('click', 'th', function(){  
        $('#target').show();
        $(".mensaje").text($(this).text());
})
     
  
    $("table").tablesorter(); 
    
        $('select').selectize({
            sortField: 'text'
        });
    
      //buscar
        $('#FiltrarContenido').keyup(function(){
           var nombres = $('.filtro');
           var buscando = $(this).val();
           var item='';
           for( var i = 0; i < nombres.length; i++ ){
               item = $(nombres[i]).html().toLowerCase();
                for(var x = 0; x < item.length; x++ ){
                    if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                        $(nombres[i]).parents('.card,.task').show(); 
                      
                    }else{
                         $(nombres[i]).parents('.card,.task').hide();
                         
                    }
                }
           }
     
        });
      });

   
  
                    
           
  
  
  
   
                
  