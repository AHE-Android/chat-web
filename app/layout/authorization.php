<?php
session_start();

if(!isset($_SESSION['initiate'])){
    session_regenerate_id();
    $newSessionID = session_id();
    session_write_close();
    session_id($newSessionID);
    session_start();
    $_SESSION['initiate'] = 1;
}

require_once '../../vendor/autoload.php';
require_once '../service/Firestore.php';
require_once '../service/DevTools.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
		<link rel="stylesheet" href="../../assets/css/main.css">
        <title><?php echo "KOMUNIKATOR: ".$_COOKIE['url']; ?></title>
    </head>
    <body>
        <section id="content">
            <?php include "../view/".$_COOKIE['url']; ?>
        </section>
    </body>
</html>
