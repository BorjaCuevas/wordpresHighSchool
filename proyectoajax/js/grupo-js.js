/*global $*/

$(document).ready(function(){
    
    // mostrar la plantilla para introducir grupo
    $('#sb-agregarGrupo').parent('li').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'grupo',
                accion: 'index',
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            montarPlantilla(objetoJson);
            asociarEventos();
            goBack();
        });
    });
    
    function validarRegistroGrupo(){
        var curso = $('#curso');
        var aula = $('#aula');
        var paso = true;
        if(curso.val().length == 0){
            curso.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            curso.next().text('');
        }
        if(aula.val().length == 0){
            aula.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            aula.next().text('');
        }
        
        if(paso == false){
            return false;
        }else{
            return true;
        }
        
    }
    // inserta en la base de datos 
    function asociarEventos(){
        $('#btn-agregarGrupo').on('click', function(eve){
            if(!validarRegistroGrupo()){
                return;
            }
            $('.contenedor-agregarGrupo').find('span').text('');
            
            $.ajax({
                url: "index.php",
                data: {
                    ruta: 'grupo',
                    accion: 'create',
                    curso: $('#curso').val(),
                    aula: $('#aula').val(),
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson) {
                
                $('#curso').val('');
                $('#aula').val('');
                $('.mensaje').text('Grupo agregado correctamente');
            });
        });
    }
   
    // listar grupos 
    $('#sb-listarGrupo').parent('li').on('click', listarGrupos);
    
   //borrar grupo 
   function agregarEventosGrupo(){
       $('.btn-borrarGrupo').on('click', function(){
          // alert('Borrando!');
            $.ajax({
                url: "index.php",
                data: {
                    ruta: 'grupo',
                    accion: 'delete',
                    idGrupo: $(this).parent().prev().prev().val(),
                    
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson) {
                
            });
            listarGrupos();
        });
   
   }
        
   // listar grupos
    function listarGrupos(){
        
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'grupo',
                accion: 'getGroups',
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            
            $('#rellenarPrincipal').empty();
            
            montarPlantilla(objetoJson);
            agregarEventosGrupo();
              anadirEventosgrup();
              inyectarPaginacion();
              paginarGrupos();
        });
        
      
    }
    
       function paginarGrupos(){
            var prev = {
                    start: 0,
                    stop: 0
                };


                var content = $('.group-list');

                var Paging = $(".paging").paging(content.length, {
                    onSelect: function() {

                        var data = this.slice;

                        content.slice(prev[0], prev[1]).css('display', 'none');
                        content.slice(data[0], data[1]).fadeIn("slow");

                        prev = data;

                        return true; // locate!
                    },
                    onFormat: function(type) {

                        switch (type) {

                            case 'block':

                                if (!this.active)
                                    return '<span class="disabled">' + this.value + '</span>';
                                else if (this.value != this.page)
                                    return '<em><a href="#' + this.value + '">' + this.value + '</a></em>';
                                return '<span class="current">' + this.value + '</span>';

                            case 'right':
                            case 'left':

                                if (!this.active) {
                                    return '';
                                }
                                return '<a href="#' + this.value + '">' + this.value + '</a>';

                            case 'next':

                                if (this.active) {
                                    return '<a href="#' + this.value + '" class="next">Next &raquo;</a>';
                                }
                                return '<span class="disabled">Next &raquo;</span>';

                            case 'prev':

                                if (this.active) {
                                    return '<a href="#' + this.value + '" class="prev">&laquo; Previous</a>';
                                }
                                return '<span class="disabled">&laquo; Previous</span>';

                            case 'first':

                                if (this.active) {
                                    return '<a href="#' + this.value + '" class="first">|&lt;</a>';
                                }
                                return '<span class="disabled">|&lt;</span>';

                            case 'last':

                                if (this.active) {
                                    return '<a href="#' + this.value + '" class="prev">&gt;|</a>';
                                }
                                return '<span class="disabled">&gt;|</span>';

                            case 'fill':
                                if (this.active) {
                                    return "...";
                                }
                        }
                        return ""; // return nothing for missing branches
                    },
                    format: '[< ncnnn! >]',
                    perpage: 6,
                    lapping: 0,
                    page: null // we await hashchange() event
                });


                $(window).hashchange(function() {

                    if (window.location.hash)
                        Paging.setPage(window.location.hash.substr(1));
                    else
                        Paging.setPage(1); // we dropped "page" support and need to run it by hand
                });

                $(window).hashchange();
   }
   function inyectarPaginacion(){
        var pag ='  <div class="paging"> </div>';
        if($('#paginacion').length){
            $('#paginacion').remove();
        }
        $('#rellenarPrincipal').append('<div id="paginacion"></div>');
        $('#paginacion').append(pag);
   }
    
   function anadirEventosgrup(){
        $('.btn-editarGrupo').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'grupo',
                accion: 'abirUpdate',
                idgrupo:$(this).parent().prev().prev().val(),
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            montarPlantilla(objetoJson);
            updateGrupo();
            salirGrupo();
           // asociarEventos();
        });
    });
          }
    function updateGrupo(){
    
     $('.btn-editarGrupFinal').on('click', function() {
         $.ajax({
            url: "index.php",
            data: {
                ruta: 'grupo',
                accion: 'update',
                idgrupo: $('#idGrupo').val(),
                curso: $('#curso').val(),
                aula: $('#aula').val(),
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            montarPlantilla(objetoJson);
            location.reload();
        });
       });
    }
   
   function salirGrupo(){
       $('.btn-salirGrupo').on('click', function() {
        listarGrupos();
       });
   } 
    
});