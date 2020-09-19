<?php

$strcon = mysqli_connect('localhost','victor','victor','dinogold') or die('Erro ao conectar ao banco de dados') ;
$SQL = "SELECT nome , email FROM user ORDER by iduser LIMIT 1,10";
$res = mysqli_query( $strcon , $SQL ) or die("Erro no banco de dados!"); 
//$rows = mysqli_fetch_array($res, MYSQLI_NUM);
//print_r ($res);
$arrayRetorno = array();

while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    
    var_dump($row['email']);
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


?>