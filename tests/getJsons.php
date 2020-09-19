
<?php

$str = file_get_contents("prodsPaginated.json");
$json = json_decode($str, true); // decode the JSON into an associative array
echo count($json);

$publishString = json_encode
(
array(
    'data' => $json[0] ,
    
	)
);

 echo $publishString;

 
 

?>
