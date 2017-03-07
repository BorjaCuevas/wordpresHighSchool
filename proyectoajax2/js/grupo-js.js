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
    
    // inserta en la base de datos 
    function asociarEventos(){
        $('#btn-agregarGrupo').on('click', function(){
            
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
                $('.contenedor-agregarGrupo').find('span').text('Grupo agregado correctamente');
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
                    idGrupo: $(this).parent().prev().prev().prev().prev().val(),
                    
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
            
            // pintar plantilla con el array que recibimos con los grupos
            // var resul = "<ul>";
            
            // var contenido = objetoJson.info;
            
            // for(var i = 0; i < contenido.length; i++ ){
            //     resul += '<li><p class="li-grupo" id="' + contenido[i].idGrupo + '">Curso: ' + contenido[i].curso + ' Aula: ' + contenido[i].aula;
            //     resul += '</p><input type="button" class="btn-borrarGrupo" value="Delete">'; 
            //     resul += '<input type="button" class="btn-editarGrupo" value="Edit"></li>';
            // }
           
            // resul += "</ul>";
            
           
            
            // $('#rellenarPrincipal').append(resul);
             cargarTabla(objetoJson);
            
            //  montarPlantilla(objetoJson);
             agregarEventosGrupo();
             anadirEventosgrup();
        });
        
      
    }
    function cargarTabla(objJSON){
        var arr = objJSON.info;
        var i;
       var resu ='<div class="row clearfix" name="listar" >'+
       
                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                    '<div class="card">'+
                        '<div class="header">'+
                            '<h2>List Group</h2>'+
                            
                        '</div>'+
                        '<div class="body table-responsive" id="rellenarPrincipal">'+
                            '<table class="table table-bordered table-striped table-hover js-basic-example dataTable">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th>#</th>'+
                                        '<th>Curso</th>'+
                                        '<th>Aula</th>'+
                                       
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                             
                               for (i = 0; i < arr.length; i++) {   
                                 resu +='<tr>'+
                                        '<input type="hidden"  id="idGrupo" name="idGrupo" value="'+ arr[i].idGrupo +'">'+
                                        '<th scope="row">'+i+'</th>'+
                                        '<td id="curso" name="curso">'+ arr[i].curso +'</td>'+
                                        '<td id="aula" name="aula">'+ arr[i].aula +'</td>'+
                                        '<td><input type="button" class="btn-borrarGrupo" value="Delete"></td>'+
                                        '<td><input type="button" class="btn-editarGrupo" value="Edit"></td>'+
                                        '</tr>';
                               }   
                     resu +='</tbody>'+
                            '</table>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
            
            $('#rellenarPrincipal').append(resu); 
          
    }
   // ---- pintar las plantillas ----------------

function montarPlantilla2(objJSON){
    
    
    if(objJSON.plantilla){
        var plantilla = JSON.parse(objJSON.plantilla);    
    }
    var contenido = objJSON.info;
    
    rellenarPlantilla2(plantilla, contenido);
}

// -------- rellena las plantillas --------------

function rellenarPlantilla2(plantilla, contenido){
    $('#imprimir').empty();
    if(!contenido){
        var html = $('#imprimir').append(plantilla);
    }else{
        for(var i = 0; i<contenido.length; i++){
            var html = $('#imprimir').append(plantilla);
            var divRellenar = '[name="' + $('#imprimir:first-child').children().attr('name')+'"]';
            var actual =  html.find(divRellenar + ':nth-of-type(' + ( i + 1 ) + ')');
            $.each(contenido[i], function(key, value){
                var key2 = '[name="'+key+'"]';
                var destino = actual.find(key2);
                if(destino){
                    if(key === 'imagen'){
                        actual.find('.a-imagen').css('background-image', 'url("data:image/jpeg;base64,'+contenido[i][key]+'")');
                    }else if(destino.is('input') || destino.is('select')){
                        actual.find(key2).val(contenido[i][key]);
                    }else{
                        actual.find(key2).text(contenido[i][key]);
                    }
                }
            });
        } 
    }
    
} 
    
    
   function anadirEventosgrup(){
        $('.btn-editarGrupo').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'grupo',
                accion: 'abirUpdate',
                idgrupo:$(this).parent().prev().prev().prev().prev().prev().val(),
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
             listarGrupos();
        });
        
       });
    }
   
   function salirGrupo(){
       $('.btn-salirGrupo').on('click', function() {
        listarGrupos();
       });
   } 
    
});