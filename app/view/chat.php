<?php
session_start();

if(!isset($_SESSION['initiate']) || !isset($_SESSION['login']) || $_SESSION['is_online']==0){
    header("Location: ../view/login.php");
}

echo 'Welcome to chat';
?>