<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker animations with <code>setTimeout()</code></title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      // If you're adding a number of markers, you may want to drop them on the map
      // consecutively rather than all at once. This example shows how to use
      // window.setTimeout() to space your markers' animation.

      var neighborhoods = [
        {lat: 52.511, lng: 13.447},
        {lat: 52.549, lng: 13.422},
        {lat: 52.497, lng: 13.396},
        {lat: 52.517, lng: 13.394}
      ];

      var markers = [];
      var map;
	  
	
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 52.520, lng: 13.410},
		  icon: image
            
        });
		
		var image = {
          url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
		var delay=2000; //1 second
			setTimeout(function() {
				drop();
			}, delay);	
      }

      function drop() {
        clearMarkers();
        for (var i = 0; i < neighborhoods.length; i++) {
          addMarkerWithTimeout(neighborhoods[i], i * 300);
        }
      }

      function addMarkerWithTimeout(position, timeout) {
		
		var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '</br>'+
            '</div>';
		var pinLocation="http://candorstep.com/dev/assets/img/map/pinLocation.png";	
	   var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
	   window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
			icon: new google.maps.MarkerImage(pinLocation),
			title: 'This is the location',
			animation: google.maps.Animation.DROP
          }));
        }, timeout);
      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbrg8coho0ucUMP_-MuoRxCNK3ZqNanIE&callback=initMap">
    </script>
  </body>
</html>