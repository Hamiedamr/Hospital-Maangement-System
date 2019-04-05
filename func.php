<?php
session_start() ;
    $conn = mysqli_connect("localhost","root","","hmsdb");
    if(isset($_POST['login_submit'])):
        $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $query = "select username,password from logintb where username='$username' and password = '$password'";

        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if($rows  == 1){
            $_SESSION['login_success'] = "Successfully Login!"; 

            header("Location:admin_panel.php");
        }
        else{
            $_SESSION['login_error'] = "Invalid username or password"; 
            header("Location:index.php");
        }
    endif


?>