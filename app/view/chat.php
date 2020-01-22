<?php
session_start();

if(!isset($_SESSION['initiate']) || !isset($_SESSION['login']) || $_SESSION['is_online']==0){
    header("Location: ../view/login.php");
}

use Google\Cloud\Firestore\FirestoreClient;


$fs = new Firestore('messages');


// $collectionReference = $fs->collection('users');
// $documentReference = $collectionReference->document('tomek');
// $snapshot = $documentReference->snapshot();

$messages = $fs->getDocuments();

foreach ($messages as $msg){
	echo "<b>&lt;".$msg['login']."&gt;</b>: ".$msg['text']." //".$msg['time']."<br/>";
}

echo "<br/><br/>";

//echo $fs->getDocuments()[0]['text'];

//echo "Witaj: ".$fs->getDocument('emil')['password'];

//echo "Hello " . $snapshot['password'];


//dump($fs->collection('messages')->document('1579432790')->snapshot()->data(), 1);


//dump($fs->getDocument('1579432790')->get(), 1);
//dump($fs->getWhere('time', '>', time()-1*7*24*60*60)); //time we must change to timestamp like google
//dump($fs->newDocument(time(), ['text'=>'Witaj w KOMUNIKATORZE', 'login'=>'WEB_API']));
//dump($fs->newCollection('channels', 'Example'));
//dump($fs->dropDocument('Example'));



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