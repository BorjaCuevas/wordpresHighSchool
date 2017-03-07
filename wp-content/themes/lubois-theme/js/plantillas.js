// ---- pintar las plantillas ----------------

function montarPlantilla(objJSON){
    
    
    if(objJSON.plantilla){
        var plantilla = JSON.parse(objJSON.plantilla);    
    }
    var contenido = objJSON.info;
    
    rellenarPlantilla(plantilla, contenido);
}

// -------- rellena las plantillas --------------

function rellenarPlantilla(plantilla, contenido){
    $('#rellenarPrincipal').empty();
    if(!contenido){
        var html = $('#rellenarPrincipal').append(plantilla);
    }else{
        for(var i = 0; i<contenido.length; i++){
            var html = $('#rellenarPrincipal').append(plantilla);
            var divRellenar = '[name="' + $('#rellenarPrincipal:first-child').children().attr('name')+'"]';
            var actual =  html.find(divRellenar + ':nth-of-type(' + ( i + 1 ) + ')');
            $.each(contenido[i], function(key, value){
                var key2 = '[name="'+key+'"]';
                var destino = actual.find(key2);
                if(destino){
                    if(key === 'imagen'){
                        actual.find('[name="'+key+'"]').css('background-image', 'url("data:image/jpeg;base64,'+contenido[i][key]+'")');
                    }else if(destino.is('input') || destino.is('select')){
                        actual.find(key2).val(contenido[i][key]);
                    }else{
                        actual.find(key2).text(contenido[i][key]);
                    }
                }
            });
        }
    cargarProfesor();
    }
    
}