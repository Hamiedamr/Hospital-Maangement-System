<?php
define("home_path",'/hms/');


    if(isset($_COOKIE['admin'])){
        header("location:".home_path."login/admin_panel.php");
    }else {
        header("location:".home_path."login/index.php");

    }
    // echo (var_dump($_COOKIE['admin']));



?>