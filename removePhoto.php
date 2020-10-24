<?php

//$dat = $_POST["id"];

$dat = file_get_contents('php://input');
$json = json_decode($dat , true);
var_dump($json);
$filename = $json["deletefile"];
echo $filename;

//if (array_key_exists("delete_file", $_POST)) {
  //$filename = $_POST["delete_file"];
  
  if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';

  }

/*
$publishString = json_encode
(
array(
    'String' => $dat,
	)
);
echo $publishString;
*/  



 
	

?>