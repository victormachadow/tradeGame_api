<?php

$token = "13b6ac91a2"; // There is a simple token to register new user , for not having problems with strangers requests
$data = file_get_contents('php://input');
$json = json_decode($data, true);
$datEmail = $json["email"];
$datPass = $json["pass"];


//echo $datEmail;
//echo $datPass ;

 
foreach (getallheaders() as $name => $value) { 
    //echo "$name: $value <br>"; 
	 if ($name == "X-API-Key" ){
		 
		$clientoken = $value;
	 }
} 

function geToken()
{
	
	$header = [
		'alg' => 'HS256',
		'typ' => 'JWT'
	 ];
	 $header = json_encode($header);
	 $header = base64_encode($header);
	 
	 $payload = [
		'iss' => 'localhost',
		'name' => 'as4543434dasd',
		'email' => 'asdaaksa'
	 ];
	 $payload = json_encode($payload);
	 $payload = base64_encode($payload);
	 
	 $signature = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
	 $signature = base64_encode($signature);
	 
	 return "$header.$payload.$signature";

}

//echo "Client token is :".$clientoken ;
//echo "Token is :".$token ;

if( $clientoken == $token ) {

	//echo "Acesso permitido";	

	$strcon = mysqli_connect('localhost','victor','victor','tradegame1') or die('Erro ao conectar ao banco de dados');

	$pegaEmail = mysqli_query( $strcon ,"SELECT * FROM user WHERE email = '$datEmail'");
	
	if(mysqli_num_rows($pegaEmail) >= 1){
		
		//echo "Email já existe";

		$publishString = json_encode
        (
          array(
			  'return' => 0 ,
			  
	          )
        );
		echo $publishString;
		
	}
	else {
		
		//echo "Email não existe";

		
		$sql = "INSERT INTO user( email , pass ) VALUES ( '$datEmail' , '$datPass' )";
		$result = mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
			
		//echo "New record has id: " . mysqli_insert_id($con);
		if($result) {
	
		$realToken = geToken(); 
		//echo $realToken;

		$publishString = json_encode
        (
          array(
			  'return' => 1 ,
			   'id' => mysqli_insert_id($strcon),
			   'token' => $realToken
			   
	          )
        );
		echo $publishString;
		mysqli_close($strcon);
		
	    }
		
	}


}
else {

	echo "Acesso negado";
}	



?>