<script src="jquery.min.js"></script>
<script>
	$(document).ready(function() {
		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else { 
		    	$("#irene").html("Geolocation is not supported by this browser.");
		    }
		}

		function showPosition(position) {
			$("#irene").html("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
			$.ajax({url: "submit.php?lat="+position.coords.latitude+"&lng="+position.coords.longitude+"&mark=1", success: function(result){
	           
	        }});		   
		}
		getLocation();
		setInterval(function() { getLocation();}, 5000);
	});
</script>

<div id="irene"></div>