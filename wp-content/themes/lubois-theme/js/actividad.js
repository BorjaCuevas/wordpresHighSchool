    function buscador(){
        var divv= '<label for="search">Buscador</label><input id="search" name="search" placeholder="Start typing here" type="text" data-list=".default_list" autocomplete="off">';
        $('#rellenarPrincipal').children('div:first-child').before(divv);      
    }
    

    function ordenarActividades(){
        $('#ordenacion').find('[name="ordenacion"]').on('click', function(){
            var campoOrden = $(this).val();
            if(campoOrden == 'nombre'){
                ordenarPorNombre();
            }else{
                ordenarPorFecha();
            }
        });
        
        $('#ordenacion').find('select').on('change', function(){
            ordenarPorDepartamento($(this).val());
        })
        
        $('#buscador').find('.buscador').on('focus', function(){
            buscarActividad();
        })
        
    }
    
    
    
    function ordenarPorNombre(){
        //ordenarPorDepartamento();
        var actividades = $('#rellenarPrincipal').find('[name="actividad"]');
        var nombres = new Array();
        
        actividades.each(function(){
            nombres.push($(this).find('[name="titulo"]').text().toLowerCase());
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('[name="titulo"]').text().toLocaleLowerCase()){
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
            nombres.push($(this).find('[name="fecha"]').text());
        })
        nombres.sort();
        
        for(var i = 0; i<nombres.length; i++){
            actividades.each(function(){
                if(nombres[i] == $(this).find('[name="fecha"]').text()){
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
                nombres.push($(this).find('[name="titulo"]').text());
                $(this).hide();
            })
            nombres.sort();
            
            for(var i = 0; i<nombres.length; i++){
                actividades.each(function(){
                    if(departamento == $(this).find('[name="departamento"]').text()){
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
                    if(!$(this).find('[name="titulo"]').text().toLocaleUpperCase().indexOf(that) || !$(this).find('[name="descripcion"]').text().toLocaleUpperCase().indexOf(that)){
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
    
    
    function ultimasActividades(objJSON){
        var contenido = objJSON.info;
        var html = $('#ultimas-actividades');
            var plantilla = '<div class="col-sm-12" name="ultima-actividad"><img class="img-sidebar" src="" name="imagen"/><span name="titulo"></span><br/>'
            +'<div class="entry-meta small muted"><span>On <a href="#" name="fecha"></a></span><span>At <a href="#" name="lugar"></a></span> </div></div>';
        
        for(var i = 0; i<6; i++){
            html.append(plantilla);
            var divRellenar = '[name="' + $('#ultimas-actividades:first-child').children().attr('name')+'"]';
            var actual =  html.find(divRellenar + ':nth-of-type(' + ( i + 1 ) + ')');
            $.each(contenido[i], function(key, value){
                var key2 = '[name="'+key+'"]';
                var destino = actual.find(key2);
                if(destino){
                    if(key === 'imagen'){
                        actual.find('[name="'+key+'"]').attr('src', 'data:image/jpeg;base64, '+contenido[i][key]+'');
                    }else if(destino.is('input') || destino.is('select')){
                        actual.find(key2).val(contenido[i][key]);
                    }else{
                        actual.find(key2).text(contenido[i][key]);
                    }
                }
            });
        } 
    }
    
    function dinamicaPlantillaActividades(){
        $(".dinamic").on("click", function(e){
            var click = $(this).attr('name');
            e.preventDefault();
            $(this).closest(".media").find('.tab-content').children().each(function(){
                if($(this).attr('name') != click){
                    $(this).removeClass('active').removeClass('in');
                }
            })
            $(this).closest(".media").find('.tab-content').find('[name="'+$(this).attr('name')+'"]').addClass('active in');
        })
    }
    
    function orderActividades(){
        var i = 0;
        $('#rellenarPrincipal').find('[name="actividad"]').each(function(){
            $(this).css('order', i);
            i++;
        })
    }
    
    
