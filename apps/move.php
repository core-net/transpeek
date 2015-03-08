<?php
	$q = $_GET['q'];
$mark = $_GET['mark'];

	$lat = substr($q, 9, 11);
	$lng = substr($q, 30, 11);

echo $lat."<br>".$lng;

	$con = mysqli_connect('localhost','k0227840_apps','asdfqwer','k0227840_apps'); //anu, username, pass, database
	if (!$con){
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql="INSERT INTO `k0227840_apps`.`koordinat` (`id`, `lat`, `lng`, `marker`) VALUES (NULL, '".$lat."', '".$lng."', '".$mark."');";
	
	$result = mysqli_query($con,$sql);
	
	mysqli_close($con);
?>