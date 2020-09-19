<?php

//echo $_GET['var'];
var_dump($_GET);

$publishString = json_encode
(
array(
    'String' => $_GET ,
	)
);


 echo $publishString;
 
 

?>