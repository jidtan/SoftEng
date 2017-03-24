<!DOCTYPE HTML>
<html>
  <head>
    <title>adVenture</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <style>
    header{
      background-image: "wallpaper.jpg";
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 3px;
    }

    tr:nth-child(even) {
        background-color: "duck.jpg";
    }
    </style>

  </head>

  <body onload="codeAddress()">

    <!-- Header -->
      <header id="header">
        <a href="Main.php" class="logo">adVenture</a>
      </header>


    <!-- Google Map -->

       <div id = "inputs">   
          <input id="city_country" type="textbox" value="Cebu, Philippines" placeholder="Location"onfocus="if(this.placeholder  == 'Location') { this.placeholder = ''; } " onblur="if(this.placeholder == '') { this.placeholder = 'Location'; } ">
          <input type="button" value="Locate" onclick="codeAddress()" >
          
          <input id="asking" type="textbox"  value="Question/Phrase/Words"onfocus="if(this.value  == 'Question/Phrase/Words') { this.value = ''; } " onblur="if(this.value == '') { this.value = 'Question/Phrase/Words'; } ">
          <input type="button" value="Submit" onclick="myFunction()">
        </div>


      <div id="myDIV">
      <div>These are the businesses</div>
          <div>
            <table>
              <tr>
                <a>Business Name:</a> <td>Coffee Prince</td>
              </tr>
              <tr>
                <a>Location:</a> <td>Osmena blvd</td>
              </tr>
              <tr>
                <a>Business Name:</a> <td>Starbucks</td>
              </tr>
              <tr>
                <a>Location:</a> <td>Osmena blvd</td>
              </tr>
              <tr>
                <td>Choco na Gatas</td>
              </tr>
            </table>
          </div>
          <input id="btnclose" type="button" value="Close" onclick="closePanel()">
      </div>  

      <div id="mapCanvas"></div>
      
      <div id="infoPanel">
          <b>Closest matching address:</b>
        <div id="address"></div>
        </div>
    <div id="panelbar"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwLwfdkbXWNpjlDmiH77iTvBI3YbCRkyI&libraries=places"
             async defer></script>
    

          


    <!-- Two --><div><br></div>
      <section id="two" class="wrapper style1 special">
        <div class="inner">
          <h2>adVenture</h2>
            <p>adVenture is a website that enables the users to find the right business to be having in that specific area.<br />This system is capable of suggesting and providing the best business for your needs.</p>
        </div>    
      </section>

    <!-- Three -->

      <!-- Footer -->  
      <section id="footer">
        <div class="inner"> 
          <div class="copyright">
            &copy; 2017 <a href="https://templated.co/">adVenture All Rights Reserved</a>
          </div>
        </div>
      </section> 

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <script type="text/javascript">
    var geocoder;
    var map;
    var marker;

    codeAddress = function () {
        geocoder = new google.maps.Geocoder();
      
      var address = document.getElementById('city_country').value;
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom: 16,
                streetViewControl: false,
              mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                  
        },
        center: results[0].geometry.location,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
          map.setCenter(results[0].geometry.location);
          marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              draggable: true,
              title: 'My Title'
          });
          updateMarkerPosition(results[0].geometry.location);
          geocodePosition(results[0].geometry.location);
            
          // Add dragging event listeners.
      google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
      });
          
      google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
      });
      
      google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
          map.panTo(marker.getPosition()); 
      });
      
      google.maps.event.addListener(map, 'click', function(e) {
        updateMarkerPosition(e.latLng);
        geocodePosition(marker.getPosition());
        marker.setPosition(e.latLng);
      map.panTo(marker.getPosition()); 
      closePanel();

      }); 
      
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }

    function geocodePosition(pos) {
      geocoder.geocode({
        latLng: pos
      }, function(responses) {
        if (responses && responses.length > 0) {
          updateMarkerAddress(responses[0].formatted_address);
        } else {
          updateMarkerAddress('Cannot determine address at this location.');
        }
      });
    }

    function updateMarkerStatus(str) {
      document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
      document.getElementById('info').innerHTML = [
        latLng.lat(),
        latLng.lng()
      ].join(', ');
    }

    function updateMarkerAddress(str) {
      document.getElementById('address').innerHTML = str;
    }

function myFunction() {
    var x = document.getElementById('myDIV');
        x.style.display = 'block';
}
function closePanel() {
    var x = document.getElementById('myDIV');
        x.style.display = 'none';
}

          </script>

  </body>
</html>