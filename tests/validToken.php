<?php

//$token = $_POST['token'];
/*
$dataTok = file_get_contents('php://input');
$jsonTok = json_decode($dataTok, true);
$token = $jsonTok['token'];
*/

$data = file_get_contents('php://input');
$jsonData = json_decode($data, true);


foreach (getallheaders() as $name => $value) { 
   echo "$name: $value <br>"; 
   if ($name == "X-API-Key" ){
      
     $token = $value;
   }
} 

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
   
}else{
   echo 'invalid';
}
?>