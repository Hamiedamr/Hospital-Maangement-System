<?php
    session_start() ;
    $conn = mysqli_connect("localhost","root","","hmsdb");
    $query = "select appointment_id,doctorname,appointment from doctorstb join doctor_appointmentstb on appointment_id = doctor_appointmentstb.id";
    $result = mysqli_query($conn,$query);
    $data;
    if(mysqli_num_rows($result) > 0){
        //fetch assco like stack so we get data from it using loop
        while($data[] = mysqli_fetch_assoc($result)){

        }
        array_pop($data);
        mysqli_free_result($result);
        // echo"<pre>";
        //     var_dump($data);
        // echo"</pre>";
        // die();
    }else{
        die("<script>alert('<div class='alert alert-danger'>Error in Daatbase! :(</div>>')</script>");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital Management System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
    #main{
        background-image:url("img/3.jpg");
        background-repeat:no-repeat;
        background-size:cover;
         height:300px;
    }

    </style>

</head>
<body>
<?php 
    if(isset($_SESSION['login_success'] )):
?>    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['login_success']?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
<?php
unset($_SESSION['login_success']);
    endif 
?>

    <div class="jumbotron" id='main'>
    </div>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:#3498DB;
                ">Patients</a>
                    <a href="" class="list-group-item ">Patient Details</a>
                    <a href="" class="list-group-item ">Payment/Chechout</a>
                   
                
                </div>
                <div class="list-group">
                    <a href="" class="list-group-item active" style="background-color:#3498DB;
                ">Staff</a>
                    <a href="" class="list-group-item ">Staff Details</a>
                    <a href="" class="list-group-item ">ِAdd New Staff</a>
                    <a href="" class="list-group-item ">Remove Staff Member</a>
                
                </div>
            </div>

            <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="background-color:#3498DB;color:#ffffff;"></div>
                <div class="card-body">
                    <form action="func.php" class="form-group" method="post">
                        <label for="">First Name</label>
                        <input name="firstname" type="text" class="form-control">
                        <label for="">Last Name</label>
                        <input name="lastname" type="text" class="form-control">
                        <label for="">Email</label>
                        <input name="email" type="email" class="form-control">
                        <label for="">Contact</label>
                        <input name="contact" type="text" class="form-control">
                        <label for="">Doctor Appointment</label>
                       <select name="appointment[]" id="" class="form-control">
                      <?php for($i = 0; $i < count($data); $i++){?>
                        <option value=<?=$data[$i]['appointment_id']?>>Dr/<?= $data[$i]['doctorname']." ".$data[$i]['appointment']?></option>
                      <?php }?>
                       </select>
                       <button type="submit" class="btn btn-primary form-control" name="patient_submit" id="ab1">Enter Patient</button>

                    </form>
                
                
                </div>
            </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    
    
    </div>




















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>