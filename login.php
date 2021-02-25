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
   
   $realToken = geToken();

	$strcon = mysqli_connect('localhost','victor','victor','tradegame1') or die('Erro ao conectar ao banco de dados');

  $SQL = "SELECT  id , name , email , pass
  FROM user
  WHERE email = '$datEmail' "; 
  $result_id = mysqli_query( $strcon , $SQL ) or die("Erro no banco de dados!"); 
  $total = mysqli_num_rows($result_id); 
  $dados = mysqli_fetch_array($result_id); 

  if(!strcmp( $datPass , $dados["pass"])) 
  {

   $publishString = json_encode
        (
          array(
			  'return' => 1 ,
			   'id' => $dados["id"],
			   'token' => $realToken
			   
	          )
        );
		echo $publishString;
		mysqli_close($strcon);
 

  }


}
else {

   $publishString = json_encode
   (
   array(
       'String' => "0",
      )
   );
		echo $publishString;
		mysqli_close($strcon);

	
}	


?>