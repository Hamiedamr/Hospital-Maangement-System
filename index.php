<?php


    if(isset($_COOKIE['admin'])){
        header("location:./login/admin_panel.php");
    }else {
        header("location:./login/index.php");

    }
   



?>