<?php

//$data = POST["name"];

$data = file_get_contents('php://input');
echo $data;
//$json = json_decode($data, true);
//$dat = $json["deletefile"];

//if (array_key_exists("delete_file", $_POST)) {
  //$filename = $_POST["delete_file"];
  /*
  $filename = $dat
  if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    //echo 'Could not delete '.$filename.', file does not exist';
  $String = "Arquivo não existe";
  $publishString = json_encode
(
array(
    'String' => $String,
	)
);
echo $publishString;
  }
 */ 
	

?>