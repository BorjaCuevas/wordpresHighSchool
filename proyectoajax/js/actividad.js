
//---- nueva actividad grupos -----
$('#nuevaActividad').parent('li').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'actividad',
                accion: 'index'
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            obtenerGrupos();
            montarPlantilla(objetoJson);
            montarMapa();
            eventoNuevaActividad();
            precargaImagenesActividad();
            goBack();
            naranja();
        });
    });
    function montarFotoAc(){
        $('.a-imagen').each(function(){
            if($(this).css('background-image') == 'none'){
                $(this).css('background-image', 'url("/proyectoajax/img/activity-default.jpg")');
            }
        })
        
    }
    
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
        
        $('textarea').on('focus', function() {
            $(this).addClass('naranja');   
        });
    }
    
    // obtiene los grupos y rellena el select
    function obtenerGrupos() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupo',
                accion: 'getGroups'
            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            var contenido = objetoJson.info;
            rellenarConGrupos(contenido);
        });
    }
    
    // rellenar las options
    function rellenarConGrupos(contenido){
        if($('[name="grupo"]').is('datalist')){
            for(var i = 0; i < contenido.length; i++){
                $('.na-grupo').next().append('<option value="' + contenido[i].curso + '"/>');
            }
        }else{
            for(var i = 0; i < contenido.length; i++){
                $('.na-grupo').append('<option value="' + contenido[i].curso + '">' + contenido[i].curso + '</option>');
            }
        }
    }
    
    function validarRegistroActividad(){
        
         var paso = true;
         var titulo = $('#titulo');
         var fecha = $('#fecha');
         var grupos = $('#grupos');
         var departamento = $('#actvDepart');
         var textarea = $('#textarea');
         var oraIni = $('#oraIni');
         var oraFin = $('#oraFin');
         var address = $('#address');
        
         if(titulo.val().length == 0){
            titulo.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            titulo.next().text('');
        }
         if(fecha.val().length == 0){
            fecha.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            fecha.next().text('');
        }
        //  if(grupos.value == "Group"){
        //     fecha.next().text('Selecciona un grupo');
        //     paso = false;
        // }else{
        //     grupos.next().text('');
        // }
         if(departamento.val() == 'defecto'){
            departamento.next().text('Debes selecionar Departamento');
            paso = false;
        }else{
            departamento.next().text('');
        }
         if(textarea.val() == ''){
            textarea.next().text('No puede estar en blanco');
            paso = false;
        }else{
            textarea.next().text('');
        }
         if(oraIni.val().length == 0){
            oraIni.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            oraIni.next().text('');
        }
         if(oraFin.val().length == 0){
            oraFin.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            oraFin.next().text('');
        }
        if(address.val().length == 0){
            address.next().text('No puede estar en Blanco');
            paso = false;
        }else{
            address.next().text('');
        }
        
         if(paso == false){
            return false;
        }else{
            return true;
        }
    }
    
    
    

    function eventoNuevaActividad(){
      
        $('#btn-nueva-actividad').on('click', function() {
            
             if(!validarRegistroActividad()){
                      return;
               }
            
            var f = document.getElementById('nueva-actividad');
            var formData = new FormData(f);
            var archivo = document.getElementById('imagen-actividad');
            formData.append(archivo, archivo.files[0]);
           
                $.ajax({
                    url: "index.php?ruta=actividad&accion=create",
                    data:formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    }).done(function(objetoJson){
                        location.reload();
                         
                    });
        });
    }


    
//---- plantilla de obtener actividades ------
    $('#btObtenerActividades').parent('li').on('click', function() {
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
            verActividad();
            eventoBotonesActividad();
            montarFotoAc();
            inyectarPaginacion();
            paginarActiviadades();
        });
    });
   
        function paginarActiviadades(){
            var prev = {
                    start: 0,
                    stop: 0
                };


                var content = $('.actividadt');

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

// ------- asociar eventos a los botones de las actividades
function eventoBotonesActividad(){
    var actividades = $('.actividad');
    actividades.each(function(){
        $(this).find('.a-editar').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'actividad',
                accion: 'joinActivityTemplate',
                idActividad: $(this).closest('.a-info').find('.idActividad').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            obtenerGrupos();
            montarPlantilla(objetoJson);
            editActivity();
            montarMapa();
            //buscador();
            goBack();
        }).fail(function(objetoJson){
            alert(objetoJson);
        });
    });
    // eliminar actividad
    $(this).find('.a-eliminar').on('click', function() {
        
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'actividad',
                accion: 'delete',
                idActividad: $(this).closest('.a-info').find('.idActividad').val(),
                // password: $('#iptPassword').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            location.reload();
        });
    });
    
    })
}

function selectGrupos(objetoJson) {
    var salida;
    for(var i = 0; i<objetoJson; i++){
        var curso = objetoJson.curso;
        var aula = objetoJson.aula;
        salida += '<option> '+curso+aula+'</option>';
    }
    $('#grupo').append(salida);
}

function editActivity(){
    
    $('.btn-nueva-actividad').on('click', function(){
        var f = document.getElementById('nueva-actividad');
        var formData = new FormData(f);
        var archivo = document.getElementById('imagen-actividad');
        formData.append(archivo, archivo.files[0]);
       
        $.ajax({
            url: "index.php?ruta=actividad&accion=update",
            data:formData,
            type: 'POST',
            contentType: false,
            processData: false,
        }).done(function(objetoJson){
            location.reload();
            
        });
    });
};


// mostrar una actividad
function verActividad() {

    // al hacer click en el titulo de una actividad
    $('.a-titulo').on('click', function(){
        
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'actividad',
                accion: 'getActivity',
                idActividad: $(this).closest('.a-info').find('.idActividad').val() 
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson){
            obtenerGrupos();
            montarPlantilla(objetoJson);
            montarMapa();
            buscar();
            goBack();
        });
    });
}

// para volver a la lista de actividades desde ver actividad
function goBack() {
    
    // al hacer click en el boton con la clase back
    $('.back').on('click', function() {
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
            verActividad();
            montarFotoAc(objetoJson);
        });
    });
}

    function precargaImagenesActividad(){
        document.getElementById('imagen-actividad').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
    
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                $('#imagen-muestra-actividad').css({'background-image': fr.result});
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
    
    function buscador(){
        var divv= '<label for="search">Buscador</label><input id="search" name="search" placeholder="Start typing here" type="text" data-list=".default_list" autocomplete="off">';
        $('#rellenarPrincipal').children('div:first-child').before(divv);      
    }
    

    function ordenarActividades(){
        var div = $('<div class="ordenacion"></div>');
        div.append('<label> What are you looking for? <input type="text" class="buscador" placeholder="Type here..."></label>');
        div.append( '<div class="order-chk"><label> Choose ordenation: </label><label> By Name <input type="radio" name="ordenacion" value="nombre" checked/></label><label> By Date <input type="radio" name="ordenacion" value="fecha"></label></div>' );
        div.append('<label> By Departament: <select id="actvDepart" class="na-departamento na-select" name="departamento">'
        +'<option value="" class="select-default-option">Select department...</option>'
        +'<option value="Computing">Computing</option>'
        +'<option value="Sports">Sports</option>'
        +'<option value="Languajes">Languajes</option>'
        +'<option value="Science">Science</option>'
        +'<option value="Art">Art</option>'
        +'<option value="History">History</option>'
        +'<option value="Literature">Literature</option>'
        +'<option value="Math">Math</option>'
        +'</select>')
        
        $('#rellenarPrincipal').css({'display': 'flex', 'flex-direction': 'column'});
        
        $('#rellenarPrincipal').children('div:first-child').before(div);
        
        $('#rellenarPrincipal').find('[name="ordenacion"]').on('click', function(){
            var campoOrden = $(this).val();
            if(campoOrden == 'nombre'){
                ordenarPorNombre();
            }else{
                ordenarPorFecha();
            }
        });
        
        $('#rellenarPrincipal').find('select').on('change', function(){
            ordenarPorDepartamento($(this).val());
        })
        
        $('#rellenarPrincipal').find('.buscador').on('focus', function(){
            buscarActividad();
        })
        
    }
    
    
    
    function ordenarPorNombre(){
        //ordenarPorDepartamento();
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        actividades.each(function(){
            nombres.push($(this).find('.a-titulo').text());
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('.a-titulo').text()){
                    $(this).css('order', i);
                } 
            })
        }
        verActividad();
        eventoBotonesActividad();
        montarFotoAc();
        
    }
    
    function ordenarPorFecha(){
        //ordenarPorDepartamento();
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        actividades.each(function(){
            nombres.push($(this).find('.a-fecha').text());
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('.a-fecha').text()){
                    $(this).css('order', i);
                } 
            })
        }
        verActividad();
        eventoBotonesActividad();
        montarFotoAc();
    }
    
    function ordenarPorDepartamento(departamento){
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        if(departamento != ""){
            actividades.each(function(){
                nombres.push($(this).find('.a-titulo').text());
                $(this).hide();
            })
            nombres.sort();
            
            for(var i = 0; i<nombres.length; i++){
                actividades.each(function(){
                    if(departamento == $(this).find('.a-departamento').text()){
                        $(this).show();
                    } 
                })
            }
        }else{
            actividades.each(function(){
                $(this).show();
            })
        }
        
    }
    
    function buscarActividad(){
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        
        actividades.each(function(){
            $(this).show();
        })
                
        $('#buscador').find('.buscador').on('keyup', function(){
            var that = $(this).val().toLocaleUpperCase();
            
            actividades.each(function(){
                $(this).hide();
            })
            
            if(that != ""){
                actividades.each(function(){
                    if(!$(this).find('.a-titulo').text().toLocaleUpperCase().indexOf(that) || !$(this).find('.a-descripcion').text().toLocaleUpperCase().indexOf(that)){
                        $(this).show();
                    }
                })
            }else{
                actividades.each(function(){
                    $(this).show();
                })
            }
             
        })
    }
    
    function selectRestart(){
        document.getElementsByClassName('select-default-option')[0].setAttribute('selected', 'selected');
        $('#actvDepart .select-default-option').prop('checked', true);
        $('#actvDepart .select-default-option') .attr('checked', 'checked');
    }
    
    // paginacion actividades
    function paginarActividad() {
        var prev = {
                    start: 0,
                    stop: 0
                };

        var content = $('.actividad');

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

