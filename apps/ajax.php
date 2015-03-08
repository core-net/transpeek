<?php
	$x = $_GET['id'];
	$con = mysqli_connect('localhost','k0227840_apps','asdfqwer','k0227840_apps'); //anu, username, pass, database
	if (!$con){
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql="SELECT * FROM koordinat WHERE marker='".$x."' ORDER BY id DESC LIMIT 0, 1";
	
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) > 0 ){ // >0 fetch array, make?
		$i=0;
		while($data = mysqli_fetch_array($result)) {
			$i++;
			if($i!=mysqli_num_rows($result)) echo $data['lat']." ".$data['lng']."/";
			else echo $data['lat']." ".$data['lng'];
		}
	}
	mysqli_close($con);
?>