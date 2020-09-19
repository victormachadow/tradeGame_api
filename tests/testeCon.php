<?php

$String = "teste";

$publishString = json_encode
(
array(
    'String' => $String,
	 'id' => "1"
	)
);
 
echo $publishString;

?>