<?php

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

$strcon = mysqli_connect('localhost','victor','victor','tradegame') or die('Erro ao conectar ao banco de dados');

?>