<?php

$token = "13b6ac91a2"; // There is a simple token to register new user , for not having problems with strangers requests
$data = file_get_contents('php://input');
$json = json_decode($data, true);
$datEmail = $json["email"];
$datName = $json["pass"];


echo $datEmail;
echo $datName ;

 
foreach (getallheaders() as $name => $value) { 
    echo "$name: $value <br>"; 
	 if ($name == "X-API-Key" ){
		 
		$clientoken = $value;
	 }
} 

echo "Client token is :".$clientoken ;
echo "Token is :".$token ;

if( $clientoken == $token ) {

	echo "Acesso permitido";	

	$strcon = mysqli_connect('localhost','victor','victor','tradegame1') or die('Erro ao conectar ao banco de dados');

	$pegaEmail = mysqli_query( $strcon ,"SELECT * FROM user WHERE email = '$datEmail'");
	
	if(mysqli_num_rows($pegaEmail) >= 1){
		
		echo "Email já existe";
		
	}
	else {
		
		echo "Email não existe";
		
	}


}
else {

	echo "Acesso negado";

}	



?>