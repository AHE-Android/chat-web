<?php
require_once '../../vendor/autoload.php';
require_once 'Firestore.php';
$fs = new Firestore('messages');

// if(!isset($_POST['message'])){ return '$_POST["message"] dont\'t exist'; }

// $fs->newDocument(time(), [
// 	'login'=>"LOGIN", 
// 	'text'=>$_POST['message'],
// 	'time'=>time()
// ]);
echo "<pre>";
$lastMsg = $fs->getLast(2);
var_dump($lastMsg);
echo "</pre>";
?>