<?php
    $style = "anonymous";
    $successfullyLogged = false;
    if(isset($_GET['css'])) {
        $style = $_GET['css'];
        echo "<h1>Merci d'avoir choisi le ". $style . "</h1>";
    }
    setcookie("cookie_style", $style, time()+ 300);
?>