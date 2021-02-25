<?php


$data = file_get_contents('php://input');

foreach (getallheaders() as $name => $value) { 
   //echo "$name: $value <br>"; 
   if ($name == "X-API-Key" ){
      
     $token = $value;
   }
} 

//echo $token;

$part = explode(".",$token);
$header = $part[0];
$payload = $part[1];
$signature = $part[2];

//echo "this is :".$payload;

$valid = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
$valid = base64_encode($valid);

//echo "Valid is :".$valid;

if($signature == $valid){
   //echo "valid";

   $strcon = mysqli_connect('localhost','victor','victor','tradegame1') or die('Erro ao conectar ao banco de dados');

$SQL = "SELECT id , title , code , city , valuee , price , amount FROM products ORDER by id LIMIT 0,10";
$res = mysqli_query( $strcon , $SQL ) or die("Erro no banco de dados!"); 
//$rows = mysqli_fetch_array($res, MYSQLI_NUM);
//print_r ($res);
$arrayRetorno = array();

while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    
    //var_dump($row['title']);
    //echo $row;
    //$String = (string)$row;
    //$arrayRetorno.push($row)
    array_push( $arrayRetorno, $row );

}
//print_r($arrayRetorno);


$publishString = json_encode
(
$arrayRetorno
);

echo $publishString;

   
}else{
   echo 'invalid';
}
   


/* ( 0 , 100 ) , ( 100 , 200 ) , ( 200 , 300 ) : SELECT * FROM table LIMIT 0, 10 limit first , first+range

 when enter scene prodList: if(begin)then first = 0 end , range = 100 , if(first>=100) then create prevButton
 * Toda vez q entra na pagina prodList por outras diferentes begin é true , begin é falso para operar as paginações *
 if( cont > 100 ) create nextButton 
 
  the nextButton: first = first + range , begin== false
  the prevButton : first = first - range , begin== false
  
 when scene prodlist reload actualPage=actualPage+range

*/
//SELECT * FROM table LIMIT 0, 10  // Sql de paginaçao pega 10 registros a partir da posição 0



?>
