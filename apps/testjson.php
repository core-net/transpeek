<html>
	<head>
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function () {
				$.ajax({url: "test.json", success: function(result){
			    	
			    	$c = 0;
			    	for(key in result.result) {
			    		$("#contain").append(result.result[key].name + "<br/>");
			    		$c++;

			    		if($c == 3) break;
			    	}
			    }});
			});
		</script>
	</head>

	<body>
		<div id="contain"></div>
	</body>
</html>