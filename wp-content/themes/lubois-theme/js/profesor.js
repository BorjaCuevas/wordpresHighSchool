function cargarProfesor(){
    getProfesors();
}

function getProfesors(){
    $.ajax({
        url: "/proyectoajax/index.php",
        data: {
            ruta: 'profesor',
            accion: 'getAllProfesor'
        },
        type: "GET",
        dataType: "json"
    }).done(function(objetoJson) {
        profesors = objetoJson;
        $('.profesor').each(function(){
            profesores($(this), objetoJson)
        });
    });
}

function profesores(that, obj){
    var profesors = obj.info;
    for(var i = 0; i<profesors.length; i++){
        if(that.find('[name="idProfesor"]').val() == profesors[i]['idProfesor']){
            $.each(profesors[i], function(key, value){
                var key2 = '[name="'+key+'"]';
                var destino = that.find(key2);
                if(destino){
                    if(key === 'imagen'){
                        that.find('[name="'+key+'"]').css('background-image', 'url("data:image/jpeg;base64,'+profesors[i][key]+'")');
                    }else if(destino.is('input') || destino.is('select')){
                        that.find(key2).val(profesors[i][key]);
                    }else{
                        that.find(key2).text(profesors[i][key]);
                    }
                }
                    
            });
        }
    }
}