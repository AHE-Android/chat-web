<?php
session_start();

if(!isset($_SESSION['initiate']) || !isset($_SESSION['login']) || $_SESSION['is_online']==0){
    header("Location: ../view/login.php");
}

//require '../../vendor/autoload.php';
require_once '../service/DevTools.php';
require_once '../service/Firestore.php';

$fs = new Firestore('channels');
//dump($fs->getDocument('1579432790'));

//dump($fs->getDocument('1579432790')->text);
//dump($fs->getWhere('messages', '>', 1000));
//dump($fs->newDocument(time(), ['text'=>'Witaj w KOMUNIKATORZE', 'login'=>'WEB_API']));
//dump($fs->newCollection('channels', 'Example'));
dump($fs->dropDocument('Example'));

// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;

// $serviceAccount = ServiceAccount::fromJsonFile('../../ahechat-91c01be9bd8b.json');

// $firebase = (new Factory)
//   ->withServiceAccount($serviceAccount)
//   ->withDatabaseUri('https://ahechat.firebaseio.com');

// $db = $firebase->createDatabase();

// $snap = $db->getReference('messages')
//     ->getSnapshot();

// // $ref = $db->getReference('messages');
// // $snap = $ref->getSnapshot();
// // $val = $snap->getValue('text');



// var_dump($val);

// echo "Value: ".$val."</br>";

echo 'Welcome to chat';
?>