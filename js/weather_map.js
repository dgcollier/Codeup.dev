"use strict";
$(document).ready(function (){

    //
    var startMap = { lat: 35.606522, lng: -99.671073 };

    var mapOptions = {
        zoom: 5,
        center: startMap,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var kerrville = { lat: 30.039643, lng: -99.154235}

    // Place a draggable marker on the map
    var marker = new google.maps.Marker({
        position: kerrville,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        title:"Drag me!"
    });

    var ajaxRequest;
    var weatherBlock;
    var location;

    getForecast();

    function getForecast() {

        ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=30.039643&lon=-99.154235&cnt=3", {
            APPID: "4db5982555b1e564f4d71a35e9eb2b57",
            units: "imperial" 
        });

        ajaxRequest.always(function () {
            console.log("Request sent.");
        });

        ajaxRequest.fail(function (error) {
            console.log(error);
            console.log(ajaxRequest.status);
        });


        ajaxRequest.done(function (data) {
            // console.log(data);
            console.log("Request successful.")
            var forecasts = data.list;
                // console.log(forecasts);  
            var city = data.city.name;
            var country = data.city.country;
                location = $("#locationField");
                location.append(city + ", " + country)
           
            for (var i = 0; i < 3; i++) {

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
            };
        });
    };

    google.maps.event.addListener(marker, 'dragend', function (event) {
        var newLatLng = $.makeArray(this.getPosition());
        var newLat = newLatLng[0].A;
        var newLng = newLatLng[0].F;
        console.log(newLatLng);

        ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + newLat + "&lon=" + newLng + "&cnt=3", {
            APPID: "4db5982555b1e564f4d71a35e9eb2b57",
            units: "imperial" 
        });

        mapOptions = {
        zoom: 5,
        center: startMap,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

        ajaxRequest.always(function () {
        console.log("Request re-sent.");
        });

        ajaxRequest.fail(function (error) {
            console.log(error);
            console.log(ajaxRequest.status);
        });

        ajaxRequest.done(function (data) {
            console.log("Request successful.")
            // console.log(data);

            var forecasts = data.list;
                // console.log(forecasts);
            var city = data.city.name;
            var country = data.city.country;
                location = $("#locationField");
                location.text("");
                location.append(city + ", " + country)
           
            for (var i = 0; i < 3; i++) {

                var maxTemp = forecasts[i].temp.max;
                var minTemp = forecasts[i].temp.min;
                var conditions = forecasts[i].weather[0].description;
                var humidity = forecasts[i].humidity;
                var windSpeed = forecasts[i].speed;
                var atmPressure = forecasts[i].pressure;

                weatherBlock = $("#day" + i);
                weatherBlock.text("");

                weatherBlock.append("<h3>" + maxTemp + "&#176; / " + minTemp + "&#176;</h3>");
                weatherBlock.append("<p><span class ='boldIt'>Conditions:</span> " + conditions + "</p>");
                weatherBlock.append("<p><span class ='boldIt'>Humidity:</span> " + humidity + "</p>");
                weatherBlock.append("<p><span class ='boldIt'>Wind:</span> " + windSpeed + " mph</p>");
                weatherBlock.append("<p><span class ='boldIt'>Pressure:</span> " + atmPressure   + "</p>");
                $("#day" + i).append(weatherBlock);
            };
        });
    });
});