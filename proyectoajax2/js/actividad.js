
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
            // rellenarSelect(contenido);
            rellenarDatalist(contenido);
            // alert(objetoJson.info[0].curso);
        });
    }
    
    // rellenar las options de un select
    function rellenarSelect(contenido) {
         for(var i = 0; i < contenido.length; i++){
            $('.na-grupo').append('<option value="' + contenido[i].curso + '">' + contenido[i].curso + '</option>');
        }
    }
    
    function rellenarDatalist(contenido){
        for(var i = 0; i < contenido.length; i++){
            $('.na-grupo').next().append('<option value="' + contenido[i].curso + '"/>');
        }
    }

    function eventoNuevaActividad(){
        //---- plantilla de añadir actividad ------
        // $('#btn-nueva-actividad').on('click', function() {
        //     $.ajax({
        //         url: "index.php",
        //         data: {
        //             ruta: 'actividad',
        //             accion: 'create',
        //             grupo: $('#grupo').val(),
        //             departamento: $('#actvDepart').val(),
        //             titulo: $('#titulo').val(), 
        //             descripcion: $('#descripcion').val(),
        //             fecha: $('#fecha').val(), 
        //             lugar: $('#lugar').val(),
        //             horaInicio: $('#horaInicio').val(), 
        //             horaFinal: $('#horaFinal').val()
        //         },
        //         type: "GET",
        //         dataType: "json"
        //     }).done(function(objetoJson) {
        //         login(objetoJson);
        //     });
        // });
        $('#btn-nueva-actividad').on('click', function() {
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
function obtenerActividade(){
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
           // montarPlantilla(objetoJson);
            cargarActividades(objetoJson);
            ordenarActividades();
            verActividad();
            eventoBotonesActividad();
            montarFotoAc();
        });
    });
}
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
           // montarPlantilla(objetoJson);
            cargarActividades(objetoJson);
            ordenarActividades();
            verActividad();
            eventoBotonesActividad();
            montarFotoAc();
        });
    });
   function cargarActividades(objJSON){
        $('#rellenarPrincipal').empty();
        var arr = objJSON.info;
        var i;
        var resu ='<div class="row clearfix" name="listar" >'+
       
                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                    '<div class="card">'+
                        '<div class="header">'+
                            '<h2>List Activities</h2>'+
                            
                        '</div>'+
                        '<div class="body table-responsive" id="rellenarPrincipal">'+
                            '<table class="table">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th>#</th>'+
                                        '<th>Titulo</th>'+
                                        
                                        
                                    '</tr>'+
                                '</thead>'+
                                '<tbody name="actividad" class="actividad">';
                             
                              for (i = 0; i < arr.length; i++) {   
                                 resu +='<tr name="profesor" class="profesor">'+
                                          '<input type="hidden" class="idGrupo" name="idGrupo"  />'+
                                          '<input type="hidden" class="idActividad" name="idActividad" value="'+arr[i].idActividad+'" />'+
                                       
                                        '<th scope="row">'+i+'</th>'+
                                        '<td id="iptNombreR" name="nombre"><a name="titulo" class="a-titulo" href="#">'+ arr[i].titulo +'</a></td>'+
                                        '<td id="aula" name="dni"></td>'+
                                        '<td><input type="button" name="a-editar"    value="editar" class="a-editar boton-delete-lp"/></td>'+
                                        '<td><input type="button" name="a-eliminar"  value="delete" class="a-eliminar eliminarProfesor boton-delete-lp"/></td>'+
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
    
//---- plantilla de modificar actividad ------
    // $('#btModificarActividad').on('click', function() {
    //     $.ajax({
    //         url: "index.php",
    //         data: {
    //             ruta: 'actividad',
    //             accion: 'update',
    //             grupo: $('#grupo').val(),
    //             departamento: $('#actvDepart').val(),
    //             titulo: $('#titulo').val(), 
    //             descripcion: $('#descripcion').val(),
    //             fecha: $('#fecha').val(), 
    //             lugar: $('#lugar').val(),
    //             horaInicio: $('#horaInicio').val(), 
    //             horaFinal: $('#horaFinal').val()
    //         },
    //         type: "GET",
    //         dataType: "json"
    //     }).done(function(objetoJson) {
    //         login(objetoJson);
    //     });
    // });
    

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
                idActividad:  $(this).parent().prev().prev().prev().prev().prev().val(),
                // password: $('#iptPassword').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            
            montarPlantilla(objetoJson);
            obtenerActividade();
            //accionesActividad();
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
            montarPlantilla(objetoJson);
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
        div.append('<label> What are you looking for? <input type="text" class="buscador"></label>');
        div.append('<p> Choose what you want to se first: </p>');
        div.append('<label> By Name: <input type="radio" name="ordenacion" value="nombre" checked/></label>');
        div.append('<label> By Date: <input type="radio" name="ordenacion" value="fecha"></label>');
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
        selectRestart();
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        actividades.each(function(){
            nombres.push($(this).find('.a-titulo').text());
            $(this).remove();
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('.a-titulo').text()){
                    $('#rellenarPrincipal').append($(this));
                    $(this).show();
                } 
            })
        }
        verActividad();
        eventoBotonesActividad();
        montarFotoAc();
        
    }
    
    function ordenarPorFecha(){
        selectRestart()
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        actividades.each(function(){
            nombres.push($(this).find('.a-fecha').text());
            $(this).remove();
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('.a-fecha').text()){
                    $('#rellenarPrincipal').append($(this));
                    $(this).show();
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
        
        actividades.each(function(){
            nombres.push($(this).find('.a-titulo').text());
            $(this).hide();
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('.a-titulo').text() && departamento == $(this).find('.a-departamento').text()){
                    $(this).show();
                } 
            })
        }
    }
    
    function buscarActividad(){
        selectRestart();
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        
        actividades.each(function(){
            $(this).show();
        })
                
        $('#rellenarPrincipal').find('.buscador').on('keyup', function(){
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

