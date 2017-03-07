/* global $ */

/*-------------------------------------- DEFINIR UBICACIÓN EN CREAR ACTIVIDAD ---------------------------------------------------------*/


(function(){
    $(document).on('ready', function() {
        load_map();
    })
 
var map;
 
function load_map() {
    var myLatlng = new google.maps.LatLng(37.161905, -3.591712);
    var myOptions = {
        zoom: 5,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
}
 
$('#search').on('click', function() {
    load_map();
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#address').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});
})();

function geocodeResult(results, status) {
        // Verificamos el estatus
        if (status == 'OK') {
            // Si hay resultados encontrados, centramos y repintamos el mapa
            // esto para eliminar cualquier pin antes puesto
            var mapOptions = {
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
            // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
            map.fitBounds(results[0].geometry.viewport);
            // Dibujamos un marcador con la ubicación del primer resultado obtenido
            var markerOptions = { position: results[0].geometry.location }
            var marker = new google.maps.Marker(markerOptions);
            marker.setMap(map);
            // Guardamos los resultados
            $('#lugar').val(results[0].geometry.location);
        } else {
            // En caso de no haber resultados o que haya ocurrido un error
            // lanzamos un mensaje con el error
            alert("Geocoding no tuvo éxito debido a: " + status);
        }
    }



/*-------------------------------------- DEVUELVE UBICACIÓN EN LA VISTA DE ACTIVIDADES ---------------------------------------------------------*/

//------------- montar el mapa con la ubicación dada -------------------



function montarMapa(){
    
    (function(){
        load_map();
    var map;
     
    function load_map() {
        var myLatlng = new google.maps.LatLng(37.179026, -3.599169);
        var myOptions = {
            zoom: 5,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    };
     
    $('#search').on('click', function() {
        
        // Obtenemos la dirección y la asignamos a una variable
        var address = $('#address').val();
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocodeResult);
    });
     
    
})();
};

function buscar(){
    // Obtenemos la dirección y la asignamos a una variable
        var address = $('#address').val();
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocodeResult);
}