<?php
session_start();
$_SESSION['home'] =  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if(isset($_COOKIE['admin'])){
        header("location:".$_SESSION['home'] ."login/admin_panel.php");
    }else {
        header("location:".$_SESSION['home'] ."login/index.php");

    }
   



?>