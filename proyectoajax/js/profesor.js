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
                    perpage: 5,
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
            montarPlantilla(objetoJson);
            montarCheckBox(objetoJson);
            btEliminarProfesor();
            inyectarPaginacion();
            paginarProfesor();
            
        });
    });
    
    function btEliminarProfesor(){
        $('.eliminarProfesor').each(function(){
            
           
             
            $(this).on('click', function() {
                 var nombre = $('#iptNombreR').val();
                 if(!confirm('Estas seguro de querer borrar al profesor '+nombre)){
                    return;
                  }
                
                $(this).siblings('[name="idProfesor"]').val();
                $.ajax({
                    url: "index.php",
                    data: {
                        ruta: 'profesor',
                        accion: 'delete',
                        idProfesor: $(this).siblings('[name="idProfesor"]').val()
                    },
                    type: "GET",
                    dataType: "json"
                }).done(function(objetoJson) {
                    montarPlantilla(objetoJson);
                    montarCheckBox(objetoJson);
                    btEliminarProfesor();
                    inyectarPaginacion();
                     paginarProfesor();
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
            precargaImagenes();
            naranja();
            goBack();
        });
    });
    
    function asociarEventos(){
        /*para el registro de un profesor con foto */
 $('#btregister').on('click', function(eve) {
    var f = document.getElementById('register-form');
    var formData = new FormData(f);
    var archivo = document.getElementById('subir-imagen');
    formData.append(archivo, archivo.files[0]);
    if(!validarRegistroProfesor()){
        eve.preventDefault();
    }
    $.ajax({
            url: "index.php?ruta=login&accion=registro",
            data:formData,
            type: 'POST',
            contentType: false,
            processData: false,
            }).done(function(objetoJson){
              location.reload();
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
            inyectarPaginacion();
            paginarProfesor();
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
            inyectarPaginacion();
            paginarProfesor();
                })
            }
        })
    }
    
    
    
    function validarEditarProfesor(){
        
        var nombre = $('#nombre');
        var identificacion = $('#identificacion');
        var contraUno =$('#contraUno');
        var contraDos = $('#contraDos');
        var paso = true;
        
        if(nombre.val().length == 0){
            nombre.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            nombre.next().text('');
        }
        if(identificacion.val().length == 0){
            identificacion.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            identificacion.next().text('');
        }
        
         if(contraUno.val() != contraDos.val()){
            contraUno.next().text('Las contraseñas no coinciden');
            paso = false;
        }else{
            contraUno.next().text('');
        }
         if(contraUno.val().length == 0 || contraDos.val().length == 0){
            contraUno.next().text('No pueden estar vacias');
            paso = false;
        }else{
          
        }
        
        if(paso == false){
            return false;
        }else{
            return true;
        }
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
                
                  if(!validarEditarProfesor()){
                      return;
                  }
                
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
            
             if(!validarEditarProfesor()){
                return;
             }
            
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
                if($('#fotoEditarPerfil').get(0)){
                    document.getElementById('fotoEditarPerfil').src = fr.result;   
                }else if($('#fotoCrearPerfil').get(0)){
                    document.getElementById('fotoCrearPerfil').src = fr.result;
                }
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