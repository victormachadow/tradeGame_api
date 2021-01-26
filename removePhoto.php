<?php

/*
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

$dataTok = file_get_contents('php://input');
$jsonTok = json_decode($dataTok, true);
$token = $jsonTok['token'];

echo $token;

$part = explode(".",$token);
$header = $part[0];
$payload = $part[1];
$signature = $part[2];

echo "this is :".$payload;

$valid = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
$valid = base64_encode($valid);

echo "Valid is :".$valid;

if($signature == $valid){
   echo "valid";
   echo "Id is : ".$jsonTok['id'];

 // Valida token e consome api aqui //






}else{
   echo 'invalid';
}

 
	

?>