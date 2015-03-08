<html>
  <head>
    <style>
        #map-canvas { 
            height: 100%; 
            width: 80%;
            float: left;
        }

        html {
          height: 100%;
          font-family: arial;
        }
        #irenengigo2{
            padding-bottom: 10px;
        }
        #panel {
            height: 95%;
            width: 15%;
            margin-left: 2%;
            padding: 1%;
            float:left;
            background-color: #eee
        }
        #submenu{
            width: 95%;
            color: white;
            background-color: #3498db;
            padding: 2%;
        }
        #contain { 
            font-size : 8pt;
        }


    </style>
    <link rel="shortcut icon" href="http://transpeek.com/wp-content/uploads/2015/03/ico-01.png">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="jquery.min.js"></script>

    <title>APPS Transpeek</title>

    <script>
    $(document).ready(function () {
        var rad = function(x) {
          return x * Math.PI / 180;
        };

        var getDistance = function(lat1, lng1, lat2, lng2) {
          var R = 6378137; // Earth’s mean radius in meter
          var dLat = rad(lat2 - lat1);
          var dLong = rad(lng2 - lng1);
          var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(rad(lat1)) * Math.cos(rad(lat2)) *
            Math.sin(dLong / 2) * Math.sin(dLong / 2);
          var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
          var d = R * c;
          return d; // returns the distance in meter
        };


        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                $("#irene").html("Geolocation is not supported by this browser.");
            }
        }

        var latc = 0;
        var lngc = 0;

        function showPosition(position) {
            latc = position.coords.latitude;
            lngc = position.coords.longitude;

            //latc = "-6.3639841";
            //lngc = "106.8287603";

            $("#irenengigo2").html(+ latc + " " + lngc)
        }

        getLocation();

        function initialize() {
            temp2 = $("#irenengigo1").html().split(" ");
            //temp3 = $("#irenengigo2").html().split(" ");

            lat1 = temp2[0];
            lng1 = temp2[1];

            //lat2 = temp3[0];
            //lng2 = temp3[1];


            //$("#jarak").html(getDistance(latc, lngc, lat1, lng1));




            $.ajax({url: "test.json", success: function(result){
                $c = 0;
                for(key in result.result) {
                    $("#contain").append(result.result[key].name);
                    $c++;
                    if($c == 3) break;
                    else $("#contain").append(", ");
                }
            }});


            var myLatLng = new google.maps.LatLng( lat1, lng1 ),
                myOptions = {
                    zoom: 16,
                    center: myLatLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                    },
                map = new google.maps.Map( document.getElementById( 'map-canvas' ), myOptions );
                marker1 = new google.maps.Marker( {position: myLatLng, map: map} );
                //marker2 = new google.maps.Marker( {position: new google.maps.LatLng( latc, lngc ), map: map} );
                //marker2.setAnimation(google.maps.Animation.BOUNCE);


            marker1.setMap( map );
            //marker2.setMap( map );

            setInterval(function(){ 
                $.ajax({url: "ajax.php?id="+1, success: function(result){
                    temp = result.split("/");
                    temp2 = temp[0].split(" ");
                    //temp3 = temp[1].split(" ");
                    $("#irenengigo1").html(temp[0]);
                    //$("#irenengigo2").html(temp[1]);
                }});

                temp2 = $("#irenengigo1").html().split(" ");
                //temp3 = $("#irenengigo2").html().split(" ");

                lat1 = temp2[0];
                lng1 = temp2[1];

                //lat2 = temp3[0];
                //lng2 = temp3[1];

                //$("#jarak").html(getDistance(latc, lngc, lat1, lng1));

                moveBus( map, marker1, lat1, lng1 );
                //moveBus( map, marker2, latc, lngc ); 

                //c++;
                getLocation();
            }, 2000);
                
                
        }

        function moveBus( map, marker, lat, lng ) {
            marker.setPosition( new google.maps.LatLng( lat, lng ) );
            //map.panTo( new google.maps.LatLng( lat, lng ) );
        };

        var temp = new Array();
        var temp2 = new Array();
        var temp3 = new Array();

        $.ajax({url: "ajax.php?id="+1, success: function(result){
            temp = result.split("/");
            temp2 = temp[0].split(" ");
            //temp3 = temp[1].split(" ");
            $("#irenengigo1").html(temp[0]);
            //$("#irenengigo2").html(temp[1]);
        }});


        setTimeout(function(){ 
            initialize();
        }, 2000);
    });
    </script>
  </head>

  <body>
    <div class="container">
        <div id="map-canvas"></div>
        <div id="panel">
            <!--<div id="submenu">your location</div>
            <div id="irenengigo2" style="margin-top:10px;"></div>-->
            <!--<div id="jarak"></div>-->
            <div id="submenu"><span style="font-size:15pt;font-weight:bold;">Angkutan 1:</span> <div id="irenengigo1"></div><span style="font-size:10pt;font-weight:bold;">Places nearby:</span><div id="contain"></div></div>

        </div>
    </div>
  </body>
</html>