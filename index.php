<?php
session_start();

if(!isset($_SESSION['initiate']) || $_SESSION['is_online']==0){
    session_regenerate_id();
    $newSessionID = session_id();
    session_write_close();
    session_id($newSessionID);
    session_start();
    $_SESSION['initiate'] = 1;

    //if(!isset($_COOKIE['url']))
    setcookie('url', null, -1, '/');
    setcookie('url', 'login.php', 0);
    header("Location: app/layout/public.php");
} else {
    setcookie('url', null, -1, '/');
    setcookie('url', 'chat.php', 0);
    header("Location: app/layout/public.php");
}

?>