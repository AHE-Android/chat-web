<?php

function dump($value, $exit=0){
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	if($exit == 1){
		exit;
	}
}

function pr($text, $exit=0)
{
  echo "<pre>";
  print_r($text);
  echo "</pre>";
  if ($exit == 1){
    exit;
  }
}

?>