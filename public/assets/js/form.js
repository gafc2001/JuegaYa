window.addEventListener("DOMContentLoaded", function () {

    const btnMap = document.getElementById("btn-map");
    const latitudeValue = document.getElementById("latitude");
    const longitudeValue = document.getElementById("longitude");
    const select = document.getElementById("select");
    const mapContainer = document.getElementById("map-container");
    const map = document.getElementById("map"); 
    

    btnMap.addEventListener("click", getLocation);
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(locationSuccess,locationError,options);
        }
    }
    function locationSuccess(position) {
        const { latitude, longitude } = position.coords;
        latitudeValue.value = latitude;
        longitudeValue.value = longitude;
        showMap();
        map.setAttribute('src',getUrlMap(latitude,longitude));
    }
    function locationError(err) {
        console.log("algo malo paso");
    }

    let options = {
        enableHighAccuracy: true,
        maximumAge: 30000,
        timeout: 27000
    };
    function getUrlMap(latitude, longitude){
        const url = `https://www.google.com/maps?q=${latitude},${longitude}&hl=es;z%3D14&amp&output=embed`;
        return url;
    }
    async function showMap(){
        setTimeout(function(){
            mapContainer.style.display = "block";
            setTimeout(function(){
                map.style.transform = "translateY(0)";
            },1001);
        },1000);
    }
    NiceSelect.bind(select, { searchable: true });
});