/**
 * Created by Эзиз on 28.02.2016.
 */
$(document).ready(function(){
    var lang    = parseFloat($('#map').attr('lang'));
    var lat     = parseFloat($('#map').attr('lat'));
    var zoom    = parseFloat($('#map').attr('zoom'));
    var marker_url  = $('#map').attr('marker');

    function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: lat, lng: lang},
            zoom: zoom
        });
        var markerLatLng = new google.maps.LatLng(lat, lang);
        var marker = new google.maps.Marker({
            position: markerLatLng,
            icon: marker_url
        });

        marker.setMap(map);
    }
    initMap();
    //Инициализация слайдера главной страницы
    $(".carousel-inner").find('.item').filter(':first').addClass('active');
});
