<?php
session_start();

if(!isset($_SESSION['initiate']) || !isset($_SESSION['login']) || $_SESSION['is_online']==0){
    header("Location: ../view/login.php");
}

require '../../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
  ->withServiceAccount('../../ahechat-91c01be9bd8b.json')
  ->withDatabaseUri('https://ahechat.firebaseio.com');

$database = $factory->createDatabase();



echo 'Welcome to chat';
?>