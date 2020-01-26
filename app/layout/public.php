<?php
session_start();

if(!isset($_SESSION['initiate']) || !isset($_SESSION['login']) || $_SESSION['is_online']==0){
    setcookie('url', null, -1, '/');
    setcookie('url', 'login.php', 0);
    header("Location: authorization.php");
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
        <link rel="stylesheet" href="../../assets/css/chat.css">
        <title><?php echo "KOMUNIKATOR: ".$_COOKIE['url']; ?></title>
        <script src="../../assets/js/jQuery/jquery-3.4.1.min.js"></script>
        <script src="../../assets/js/jQuery/jquery-3.4.1.min.map"></script>
    </head>
    <body>
        <header id="info-bar">
            <?php print "<b>Twój nick: ".$_SESSION['login']."</b>"; ?>
        </header>
        <div id="sidebar">
            <a id="logo" href="https://example.pl">
                <b>ExamPLE</b>
            </a>
            <nav>
                <ul id="menu">
                    <li class="menu-item">
                        <a href="#">Prywatne wiadomości <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="submenu">
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="#">Ustawienia <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="submenu">
                            <li class="submenu-item"><a href="#">Profil</a></li>
                            <li class="submenu-item"><a href="#">Prywatność</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <footer>
                <p>Wszelkie prawa zastrzeżone. <b>Example</b></p>
            </footer>
        </div>
        <section id="content">
            <?php include "../view/".$_COOKIE['url']; ?>
        </section>
        <div id="online-users">
            <label>Lista Użytkowników</label>
            <ul>
                <li>tomek</li>
                <li>łukasz</li>
                <li>Emil</li>
            </ul>
        </div>
    </body>
</html>
