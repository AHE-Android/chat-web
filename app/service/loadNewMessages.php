<?php
require_once '../../vendor/autoload.php';
require_once 'Firestore.php';
$fs = new Firestore('messages');

// $i++;
// var_dump(++$i); echo "<br/><br/>";
echo "<pre>";
//var_dump($fs->getDocument('1579952912')); echo "<br/><br/>";
// var_dump($fs->getWhere('time', '>', '0'));
$lastMsg = $fs->getLast(2);
var_dump($lastMsg);
echo "</pre>";
// var_dump($fs->orderBy('time', 'ASC')->endAt([2]));

// $messages = $fs->getDocuments();
// $lastTime = $_POST['time'];


// echo "<br/><br/>".$lastTime."<br/><br/>";

// foreach ($messages as $msg){
// 	//echo "ID: ";
// 	echo "<pre>"; var_dump($msg['time']); echo "</pre><br/><br/>";
// 	//echo "<b>&lt;".$msg['login']."&gt;</b>: ".$msg['text']." //".$msg['time']."<br/>";
// }

?>