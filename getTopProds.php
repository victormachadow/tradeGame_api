<?php

$str = file_get_contents("topProds.json");
$json = json_decode($str, true); // decode the JSON into an associative array
echo count($json);

/* ( 0 , 100 ) , ( 100 , 200 ) , ( 200 , 300 ) : SELECT * FROM table LIMIT 0, 10 limit first , first+range

 when enter scene prodList: if(begin)then first = 0 end , range = 100 , if(first>=100) then create prevButton
 * Toda vez q entra na pagina prodList por outras diferentes begin é true , begin é falso para operar as paginações *
 if( cont > 100 ) create nextButton 
 
  the nextButton: first = first + range , begin== false
  the prevButton : first = first - range , begin== false
  
 when scene prodlist reload actualPage=actualPage+range

*/
//SELECT * FROM table LIMIT 0, 10  // Sql de paginaçao pega 10 registros a partir da posição 0 

$publishString = json_encode
(
array(
    'String' => $json,
	'id' => "2"
	)
);

 echo $publishString;

 
?>
