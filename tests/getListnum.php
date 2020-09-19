<?php

$str = file_get_contents("topProds.json");
$json = json_decode($str, true); // decode the JSON into an associative array

$nItens = count($json);

$publishString = json_encode
(
array(
    'count' => $json,
	
	)
);

 echo $publishString;

 
 

?>
