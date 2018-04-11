window.addEventListener('load', function(){

    var latitude_form = document.forms['addplace']['latitude'];
    var longitude_form = document.forms['addplace']['longitude'];

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(fillPosition);
    }

    function fillPosition(position) {
        latitude_form.value = Number((position.coords.latitude).toFixed(4));
        longitude_form.value = Number((position.coords.longitude).toFixed(4));
    }

});