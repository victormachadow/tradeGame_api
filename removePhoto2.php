<?php


  $filename = $_SERVER['DOCUMENT_ROOT'] . "/tradeGame_api/upload/1_1.jpg";
  if (file_exists($filename)) {
    unlink($filename);
	unlink();
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }


?>