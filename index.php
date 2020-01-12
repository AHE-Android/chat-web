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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <title>KOMUNIKATOR: logowanie</title>
    </head>
    <body>
        <?php
        if(isset($_GET['action']) && $_GET['action']=='logout'){
            $_SESSION['is_online'] = 0;
            session_destroy();
            echo "Zostałeś pomyślnie wylogowany.";
        }
        if(isset($_SESSION['is_online'])){
            if($_SESSION['is_online']==1 && (time()-$_SESSION['time']>10*60)){
                $_SESSION['is_online']=0;
                session_destroy();
                echo "Sesja zakończona, zbyt długa nieczynność.";
            }
            if($_SESSION['is_online']==1 && ($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT'])){
                $_SESSION['is_online']=0;
                session_destroy();
                echo "Prosimy o ponowne zalogowanie się.";
            }
        } else $_SESSION['is_online']=0;

        if((isset($_POST['login']) && isset($_POST['password'])) || $_SESSION['is_online']==1){
            if((!empty($_POST['login']) && !empty($_POST['password'])) || $_SESSION['is_online']==1){
                if($_SESSION['is_online']==0){
                    $login      = filter_var($_POST['login'],   FILTER_SANITIZE_STRING);
                    $password   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
                }
                if(($login=="login" && $password=="password") || $_SESSION['is_online']==1){
                    if($_SESSION['is_online']==0)
                        $_SESSION['login']=$login;

                    include("chat.php");
                    $_SESSION['is_online']=1;
                    $_SESSION['time']=time();
                    $_SESSION['user_agent']=$_SERVER['HTTP_USER_AGENT'];
                } else
                    echo "Podałeś niepoprawny login lub hasło. Spróbuj ponownie.";
            } else
                echo "Nie podałeś loginu lub hasła. Spróbuj ponownie.";
        }

        if($_SESSION['is_online']==0)
        {
        ?>
        <form action="index.php" method="post">
            <label>Login: <input type="text" name="login" maxlength="20"/></label>
            <label>Hasło: <input type="password" name="password" maxlength="40"/></label>
            <input type="submit" value="Zaloguj"/>
        </form>
        <?php } ?>
    </body>
</html>