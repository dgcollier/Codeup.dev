"use strict";
$(document).ready(function (){

    var startMap = { lat: 40.100855, lng: -97.815502 };

    var mapOptions = {
        zoom: 5,
        center: startMap,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    // Place a draggable marker on the map
    var marker = new google.maps.Marker({
        position: startMap,
        map: map,
        draggable:true,
        title:"Drag me!"
    });

    getForecast();

    function getForecast() {

        var ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
        APPID: "4db5982555b1e564f4d71a35e9eb2b57",
        id:     "4703078",
        units: "imperial"
        });

        ajaxRequest.always(function () {
            console.log("Request sent.");
        });

        ajaxRequest.fail(function(data, error) {
            console.log(error);
            console.log(ajaxRequest.status);
        });

        var weatherBlock;
        var location;

        ajaxRequest.done(function (data, error) {
            console.log("Request successful.")
            var forecasts = data.list;
                // console.log(forecasts);
            var city = data.city.name;
            var country = data.city.country;
                location = $("#locationField");
                location.append(city + ", " + country)
           
            for (var i = 0; i < 3; i++) {
                // console.log(forecasts[i].temp.max);
                // console.log(forecasts[i].temp.min);
                // console.log(forecasts[i].weather[0].description);
                // console.log(forecasts[i].humidity);
                // console.log(forecasts[i].speed);
                // console.log(forecasts[i].pressure);

                var maxTemp = forecasts[i].temp.max;
                var minTemp = forecasts[i].temp.min;
                var conditions = forecasts[i].weather[0].description;
                var humidity = forecasts[i].humidity;
                var windSpeed = forecasts[i].speed;
                var atmPressure = forecasts[i].pressure;

                weatherBlock = $("#day" + i);
                weatherBlock.append("<h3>" + maxTemp + "&#176; / " + minTemp + "&#176;</h3>");
                weatherBlock.append("<p><span class ='boldIt'>Conditions:</span> " + conditions + "</p>");
                weatherBlock.append("<p><span class ='boldIt'>Humidity:</span> " + humidity + "</p>");
                weatherBlock.append("<p><span class ='boldIt'>Wind:</span> " + windSpeed + " mph</p>");
                weatherBlock.append("<p><span class ='boldIt'>Pressure:</span> " + atmPressure   + "</p>");
                $("#day" + i).append(weatherBlock);

            }
        });
    };
});