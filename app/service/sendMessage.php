<?php
session_start();

require_once '../../vendor/autoload.php';
require_once 'Firestore.php';

use Google\Cloud\Core\Timestamp;
$fs = new Firestore('messages');

$fs->newDocument(time(), [
	'login'=>$_SESSION['login'], 
	'text'=>$_POST['message'],
	'time'=>new Timestamp(new DateTime())
]);
?>