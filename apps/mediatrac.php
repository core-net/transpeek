<?php
//define variables
$url = "https://api.bigdataindonesia.com/poi/";
$method = "nearby"; // You can change with another method (textsearch/area/specific/nearby)
$output = "json"; // You can change with another output (json / xml)

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$rad = $_GET['rad'];

//define paramaters
$paramters = array (
"lat" => $lat,
"lng" => $lng,
"rad" => $rad,
);

function https_build_query($data, $prefix='', $sep='', $key='') {
   $ret = array();
   foreach ((array)$data as $k => $v) {
       if (is_int($k) && $prefix != null) $k = urlencode($prefix . $k);
       if (!empty($key)) $k = $key.'['.urlencode($k).']';
       
       if (is_array($v) || is_object($v))
           array_push($ret, http_build_query($v, '', $sep, $k));
       else    array_push($ret, $k.'='.urlencode($v));
   }
 
   if (empty($sep)) $sep = ini_get('arg_separator.output');
   return implode($sep, $ret);
}

$send_params = https_build_query($paramters);

//combine url request
$send_url = $url."".$method."/".$output."?".$send_params;

// set config key
$config = array(
"key" => "36520667764b1e1d78fc7b41b04eb91d",
);

// sending API Request
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $send_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $config);
curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
ob_start();
curl_exec ($ch);
curl_close ($ch);
$result = ob_get_contents();
ob_end_clean();

echo $result;

$file_path= "test.json";
// Open the file to get existing content
$current = file_get_contents($file_path);
// Append a new person to the file


$data_to_write.= $result;
// Write the contents back to the file
file_put_contents($file_path, $data_to_write);
?> 