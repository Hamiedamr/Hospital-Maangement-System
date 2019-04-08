<?php
session_start() ;
define("home_path",'/hms/');
    $conn = mysqli_connect("localhost","root","","hmsdb");
    //login
    if(isset($_POST['login_submit'])){
        $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $query = "select username,password from logintb where username='$username' and password = '$password'";

        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if($rows  == 1){
            $_SESSION['login_success'] = "Successfully Login!"; 
            setcookie("admin",$username,time()+300,home_path);
            header("Location:admin_panel.php");
        }
        else{
            $_SESSION['login_error'] = "Invalid username or password"; 
            header("Location:index.php");
        }

    }
    //Appointments
    if(isset($_POST['patient_submit'])){
        $first_name = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $contact = preg_replace('/[^0-9]/', '', $_POST['contact']);
        $appointment = "";
        $department="";
        foreach($_POST['appointment'] as $value){
            $appointment = $value;
        }
        foreach($_POST['department'] as $value){
            $department = $value;
        }
        if(empty($first_name)){
            $_SESSION['fname_error'] = "Invalid first name";
            header("location:admin_panel.php");
        }
        elseif(empty($last_name)){
            $_SESSION['lname_error'] = "Invalid last name";
            header("location:admin_panel.php");

        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['email_error'] = "Invalid email";
            header("location:admin_panel.php");
        }
        elseif(strlen($contact) < 9){
            $_SESSION['contact_error'] = "Invalid contact";
            header("location:admin_panel.php");

        }elseif(strlen($appointment) == 0){
            $_SESSION['appointment_error'] = "Pick an appointment!";
            header("location:admin_panel.php");

        }elseif(strlen($department) == 0){
            $_SESSION['department_error'] = "Pick an department!";
            header("location:admin_panel.php");

        }else{
            $query = "insert into patientstb (first_name,last_name,email,contact,appointment_id,doctor_department)  values('$first_name','$last_name','$email','$contact',$appointment,'$department')";
            if(mysqli_query($conn,$query)){
                echo '<script>
                var r = confirm("Appointment has been added :)!");
                if (r == true) {
                    window.location.replace("http://localhost:8080/hms/login/admin_panel.php");
                  } else {
                    window.location.replace("http://localhost:8080/hms/login/admin_panel.php");
                  }
                
                </script>';
                
            }else{
                echo '<script>
                var r = confirm("Something is wrong :(!");
                if (r == true) {
                    window.location.replace("http://localhost:8080/hms/login/admin_panel.php");
                  } else {
                    window.location.replace("http://localhost:8080/hms/login/admin_panel.php");
                  }
                
                </script>';
            }
            echo '<script>window.location.replace("http://localhost:8080/hms/login/admin_panel.php") </script>';
        }
        

    }


?>