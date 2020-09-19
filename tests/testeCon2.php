<?php

$String = "PORRA";

$publishString = json_encode
(
array(
    'String' => $String,
	'id' => "2"
	)
);
 
echo $publishString;

?>