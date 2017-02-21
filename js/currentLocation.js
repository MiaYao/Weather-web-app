function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
              lat = position.coords.latitude;
              lng = position.coords.longitude;

              if('null' !=lat && 'null' != lng){
                window.location.href = "index.php?lat=" + lat + "&lng=" + lng;
              }
            });
        } else { 
            alert("Geolocation is not supported by this browser.");
        }
        
}

