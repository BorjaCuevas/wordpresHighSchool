/* global $ */

(function() {
    var page = 1;
          
    $(document).on('ready', function() {
            $.ajax({
                url: "index.php",
                data: {
                    ruta: 'actividad',
                    accion: 'getActivities'
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson) {
                
                montarPlantilla(objetoJson);
                ordenarActividades();
                montarFotoAc();
                eventoBotonesActividad();
                verActividad();
                goBack();
                inyectarPaginacion();
            paginarActiviadades();
                //  buscador();
            });
        });
    
    // mostrar el nombre de profesor en el sidebar
    $(document).on('ready', function(){
        
            $.ajax({
                url: "index.php",
                data: {
                    ruta: "profesor",
                    accion: "getProfesor",
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson){
                montarUsuario(objetoJson);
            });
    });
    
    function montarUsuario(obj){
        var objeto = obj.info;
        $('.sb-nombreUsuario p').text(obj.info[0].nombre);
        $('.sb-profile-picture div').css('background-image', 'url("data:image/jpeg;base64,'+obj.info[0].imagen+'")');
    }
    
    
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
    
    
}());


