 $ (function (){ 
     var apiData;
   var C = true;

   
function displayTemp(F,C){
     
    return Math.round (F) + '&deg; C';
      }
   
 
   function render(data,C){
     var currentWeather=data.weather[0].main;
     var wind_speed=data.wind.speed;
     var currentTemp=displayTemp(data.main.temp,C);
     var humidity = data.main.humidity;
     var pressure = data.main.pressure;
     var icon = data.weather[0].icon;
      $('#wind_speed').html(wind_speed+" mPs");
      $('#currentWeather').html(currentWeather); 
      $('#currentTemp').html(currentTemp);
      $('#humidity').html(humidity+"%");
      $('#pressure').html(pressure+' mBar');
     
    
     $('#currentTemp').prepend('<img src='+ icon+'>');
   }
    $.getJSON('https://freegeoip.net/json/').done(function(location){  
     //console.log(location); works
 $('#country').html(location.country_name);   
 $('#city').html(location.city);
 $('#latitude').html(location.latitude);   
 $('#longitude').html(location.longitude); 
 $('#region_code').html(location.region_code);
 $('#country_name').html(location.country_name);  
 
      
   var weaApi='https://fcc-weather-api.glitch.me/api/current?lat='+location.latitude+'&lon='+location.longitude+'&units=imperial&appid=06986e2720ce0175dc6f87d8b897dffdf';
    $.getJSON(weaApi,function(data){
        apiData=data;
        render(apiData,C);
     //   console.log(apiData); // works
        $('#toggle').click(function(){
          C=!C
          render(data,C);
          
        })
      var id = data.weather[0].id,
      bgIndex,
      backgroundId=[299,499,599,699,799,800,906];
      backgroundId.push(id);
      bgIndex=backgroundId.sort().indexOf(id);
      
     // console.log(backgroundId);
      $('body').css('background-image','url('+backgroundImg[bgIndex]+')');
    });
                });
 });