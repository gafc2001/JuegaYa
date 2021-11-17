window.addEventListener("DOMContentLoaded",function(){

    let btnCancel = document.getElementById("btn-cancel");
    let latitudeValue = document.getElementById("latitude");
    let longitudeValue = document.getElementById("longitude");


    btnCancel.addEventListener("click",getLocation);
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                console.log(position.coords.accuracy);
                const{latitude,longitude} = position.coords;
                latitudeValue.value = latitude;
                longitudeValue.value = longitude;
                console.log(`https://maps.google.com/?q=${latitude},${longitude}`);
            })
        }
    }
    function location(position){
        
    }
    function onError(err){
        console.log("algo malo paso");
    }

    let options = {
        enableHighAccuracy: true,
        maximumAge        : 30000,
        timeout           : 27000
      };
});