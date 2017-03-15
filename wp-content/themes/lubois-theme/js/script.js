/* global $ */

(function() {
    var page = 1;
    
    $(document).on('ready', function() {
            $.ajax({
                url: "https://proyectoies-imochon7.c9users.io/proyectoajax/index.php",
                data: {
                    ruta: 'actividad',
                    accion: 'getActivitiesWP'
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson) {
                montarPlantilla(objetoJson);
                dinamicaPlantillaActividades();
                orderActividades();
                ultimasActividades(objetoJson);
                ordenarActividades();
                dinamicaPlantillaActividades();
                montarMapa();
                calendario(objetoJson);
                verActividad();
            });
        });
    
    $(document).on('ready',  function() {
       
        var elementos = $('.sidebar-nav').children('li'); 
        
        $.each( elementos, sidebarSelectedItem );
       
        // quita y pone la clase par el elemento del ul seleccionado
        function sidebarSelectedItem() {
            
            $(this).on('click', function() {
                
                $.each( elementos, function(){
                    $(this).removeClass('seleccionado');    
                });
                
                $(this).addClass('seleccionado'); 
            });
        }
    });
    
    
    $(document).ready(function(){
    
        // scroll lento
        $('#ancla-about').on('click', function(e){
            e.preventDefault();
            var dondeir = '#about-us';
            var offset = $(dondeir).offset().top;
            $('html, body').animate({ scrollTop: offset }, 1500);
        });
    });
    
    
}());


