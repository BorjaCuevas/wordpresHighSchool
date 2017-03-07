(function() {
    
    // funcion color para los select
    function naranja(){
        
        $('select').on('change', function() {
            $(this).addClass('naranja');   
        });
        
        $('input').on('focus', function() {
            if( $(this).attr('type') != 'button'  ) {
                $(this).addClass('naranja');       
            }
        });
    }

   function paginarProfesor(){
            var prev = {
                    start: 0,
                    stop: 0
                };


                var content = $('.profesor');

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
                    perpage: 2,
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
    
    // listar profesores
    $('#sb-listarProfesores').parent('li').on("click", function(){
      $.ajax({
            url: "index.php",
            data: {
                ruta: 'profesor',
                accion: 'getAllProfesor',
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            cargarProfesores(objetoJson);
            // montarPlantilla(objetoJson);
            montarCheckBox(objetoJson);
            btEliminarProfesor();
            inyectarPaginacion();
            paginarProfesor();
            
        });
    });
    
    
    function cargarProfesores(objJSON){
        $('#rellenarPrincipal').empty();
        var arr = objJSON.info;
        var i;
        var resu ='<div class="row clearfix" name="listar" >'+
       
                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                    '<div class="card">'+
                        '<div class="header">'+
                            '<h2>List Teacher</h2>'+
                            
                        '</div>'+
                        '<div class="body table-responsive" id="rellenarPrincipal">'+
                            '<table class="table">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th>#</th>'+
                                        '<th>User name</th>'+
                                        '<th>Identification</th>'+
                                        '<td>Privileges</td>'
                                        
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                             
                              for (i = 0; i < arr.length; i++) {   
                                 resu +='<tr name="profesor" class="profesor">'+
                                        '<input type="hidden"  id="idProfesor" name="idProfesor" value="'+ arr[i].idProfesor +'">'+
                                        '<th scope="row">'+i+'</th>'+
                                        '<td id="iptNombreR" name="nombre">'+ arr[i].nombre +'</td>'+
                                        '<td id="aula" name="dni">'+ arr[i].dni +'</td>'+
                                        '<td><input type="checkbox" id="md_checkbox_1" name="admin" data-checked="1" class="chk-col-red" checked /></td>'+
                                        '<td><input type="button" name="eliminar" value="delete" class="eliminarProfesor boton-delete-lp"/></td>'+
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
    
    
    
    
    
    
    
    
    
    
    function btEliminarProfesor(){
        $('.eliminarProfesor').each(function(){
            $(this).on('click', function() {
                $(this).siblings('[name="idProfesor"]').val();
                $.ajax({
                    url: "index.php",
                    data: {
                        ruta: 'profesor',
                        accion: 'delete',
                        idProfesor: $(this).parent().prev().prev().prev().prev().prev().val(),
                    },
                    type: "GET",
                    dataType: "json"
                }).done(function(objetoJson) {
                    montarPlantilla(objetoJson);
                    montarCheckBox(objetoJson);
                    btEliminarProfesor();
                });
            });
        });
    }
    
    // agregar profesor
    $('#sb-agregarProfesores').parent('li').on("click", function(){
       $.ajax({
            url: "index.php",
            data: {
                ruta: 'profesor',
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            montarPlantilla(objetoJson);
            asociarEventos();
             validateNewProfesor();
            naranja();
            goBack();
        });
    });
    
    function asociarEventos(){
        /*para el registro de un profesor con foto */
 $('#btregister').on('click', function() {
    var f = document.getElementById('register-form');
    var formData = new FormData(f);
    var archivo = document.getElementById('imagen');
    formData.append(archivo, archivo.files[0]);
    
    $.ajax({
            url: "index.php?ruta=login&accion=registro",
            data:formData,
            type: 'POST',
            contentType: false,
            processData: false,
            }).done(function(objetoJson){
                alert(objetoJson);
            })
       
});
    }
    
    function montarCheckBox(obj){
        var contenido = obj.info;
        var rellenar = $('#rellenarPrincipal');
        for(var i = 0; i<contenido.length; i++){
            var divRellenar = '[name="' + $('#rellenarPrincipal:first-child').children().attr('name')+'"]';
            var actual =  rellenar.find(divRellenar + ':nth-of-type(' + ( i + 1 ) + ')');
            var label = actual.find('.switch');
            if(contenido[i]['tipo'] == 1){
                label.remove();
                actual.append($('<label class="switch"><input type="checkbox" name="admin" data-checked="2" ><div class="slider round"></div></label>'));
            }else{
                label.remove();
                actual.append($('<label class="switch"><input type="checkbox" name="admin" data-checked="1" checked><div class="slider round"></div></label>'));
            }
            eventosTipo(actual);
        }
    }
    
    function eventosTipo(linea){
        var boton = linea.find('input[name="admin"]');
        var id = linea.find('[name="idProfesor"]').val();
        boton.on('change', function(){
            var input = linea.find('input[name="admin"]');
            if(input.data('checked') == "1"){
                 $.ajax({
                    url: "index.php",
                    data: {
                        ruta: 'profesor',
                        accion: 'setTipoProfesor',
                        id: id,
                        tipo: '1', 
                    },
                    type: "GET",
                    dataType: "json"
                }).done(function(objetoJson){
                    montarPlantilla(objetoJson);
                    montarCheckBox(objetoJson);
                })
            }else if(input.data('checked') == "2"){
                $.ajax({
                    url: "index.php",
                    data: {
                        ruta: 'profesor',
                        accion: 'setTipoProfesor',
                        id: id,
                        tipo: '2', 
                    },
                    type: "GET",
                    dataType: "json"
                }).done(function(objetoJson){
                    montarPlantilla(objetoJson);
                    montarCheckBox(objetoJson);
                    
                })
            }
        })
    }
    
    
    
    
    
    
    
    // boton sidebar edit profile
    $('#modificarUsuario').parent('li').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'profesor',
                accion: 'getProfesor',
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            montarPlantilla(objetoJson);
            asignarBotonEventoEditar();
            precargaImagenes();
            $('#editar-profesor-form .ep-boton').on('click', function() {
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
                    eventoBotonesActividad();
                    montarFotoAc(objetoJson);
                });
            });
        });
    });
    
    //
    function asignarBotonEventoEditar() {
        
        $('#btn-editar-profesor-submit').on('click', function() {
            var f = document.getElementById('editar-profesor-form');
            var formData = new FormData(f);
            var archivo = document.getElementById('subir-imagen');
            formData.append(archivo, archivo.files[0]);
           
                $.ajax({
                    url: "index.php?ruta=profesor&accion=updateProfesor",
                    data:formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    }).done(function(objetoJson){
                        location.reload();
                    });
            
        });
    }
    
    function precargaImagenes(){
        document.getElementById('subir-imagen').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
    
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('fotoEditarPerfil').src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }
    
        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }
    }
   

})();