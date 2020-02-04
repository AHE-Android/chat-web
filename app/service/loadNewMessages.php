<?php
require_once '../../vendor/autoload.php';
require_once 'Firestore.php';
$fs = new Firestore('messages');

use Google\Cloud\Core\Timestamp;

$datetime = new Timestamp(new DateTime($_POST['time']));

$messages = $fs->getWhere('time', '>', $datetime);
foreach($messages as &$msg)
	$msg['time'] = (string)$msg['time'];

$datetime = end($messages);

$date = [
	"time"=>$datetime["time"],
	"msg"=>$messages
];

echo json_encode($date);
?>