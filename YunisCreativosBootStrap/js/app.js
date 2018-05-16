function weather() {

  var location = document.getElementById("location");
  var apiKey = 'f536d4c3330c0a1391370d1443cee848'; // PLEASE SIGN UP FOR YOUR OWN API KEY
  var url = 'https://api.forecast.io/forecast/';

  navigator.geolocation.getCurrentPosition(success, error);

  function success(position) {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;

    

     $.getJSON(url + apiKey + "/" + latitude + "," + longitude + "?callback=?", function(data) {
      $('#temp').html((data.currently.temperature-32)*5/9 | 0 + '° C' );
      $('#minutely').html(data.minutely.summary);
    });
  }

  function error() {
    location.innerHTML = "No se pudo determinar tu ubicación";
  }

  
}

weather();