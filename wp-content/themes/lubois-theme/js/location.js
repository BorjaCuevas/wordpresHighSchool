/* global $ */

function montarMapa(){
    
    (function(){
        load_map();
    var map;
     
    function load_map() {
        var myLatlng = new google.maps.LatLng(37.179026, -3.599169);
        var myOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        $('.analistic-02').on('click', function(){
            actually = $(this).closest('.media').find('.na-map');
            buscar();
        })
        $('.map-canvas').each(function(){
            map = new google.maps.Map($(this).get(0), myOptions);
        })
        
    };
    
})();
};

function buscar(){
    // Obtenemos la dirección y la asignamos a una variable
        var address = actually.find('[name="lugar"]').text();
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocoding);
}

function geocoding(results, status){
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(actually.find('.map-canvas').get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
    } else {
        if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
            setTimeout(function(){
                buscar();
            }, 2000);
            alert('Over_query_limit');
        }else if(status == google.maps.GeocoderStatus.ZERO_RESULTS){
            actually.find('[name="lugar"]').text('Granada');
            setTimeout(function(){
                buscar();
            }, 2000);
        }else{
            alert('Error because: ' + status);
        }
    }
};
