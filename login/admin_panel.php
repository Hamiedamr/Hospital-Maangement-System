<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hmsdb");
$query = "select appointment_id,doctorname,appointment from doctorstb join doctor_appointmentstb on appointment_id = doctor_appointmentstb.id";
        $result = mysqli_query($conn, $query);
        $data =  array();
        if (mysqli_num_rows($result) > 0) {
            //fetch assco like stack so we get data from it using loop
            while ($data[] = mysqli_fetch_assoc($result)) {

            }
            array_pop($data);
            mysqli_free_result($result);

        } else {
            die("<script>alert('Error in Datbase! :(</div>>')");
        }

?>
<?php
if (isset($_COOKIE['admin'])) {
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital Management System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
 <link rel="icon" href="img/icon.png" " type="image/png"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
    #main{
        background-image:url("img/3.jpg");
        background-repeat:no-repeat;
        background-size:cover;
         height:300px;
    }
    .active{
        background-color:#3498DB;
    }

    </style>

</head>
<body>
<?php
if (isset($_SESSION['login_success'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?=$_SESSION['login_success']?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
unset($_SESSION['login_success']);
    }?>

    <div class="jumbotron" id='main'>
    </div>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a id="patient" href="#content" class="list-group-item active" style=";
                ">Patients</a>
                    <a id="patient_details" href="#content" class="list-group-item ">Patient Details</a>
                    <a id="payment" href="#content" class="list-group-item ">Payment/Chechout</a>


                </div>
                <div class="list-group">
                    <a  id="staff" href="#content" class="list-group-item ">Staff</a>
                    <a id="staff_details" href="#content" class="list-group-item ">Staff Details</a>
                    <a id="add_new_staff" href="#content" class="list-group-item ">ِAdd New Staff</a>
                    <a id="remove_staff" href="#content" class="list-group-item ">Remove Staff Member</a>

                </div>
            </div>

            <div id="content" class="col-md-8">
            <div class="card">
                <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <h3>
                    Book an Appointment
                </h3>
                </div>
                <div class="card-body">
                    <form action="func.php" class="form-group" method="post">
                        <label for="">First Name</label>
                        <?php
if (isset($_SESSION['fname_error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['fname_error'] . "</div>";
    }
    unset($_SESSION['fname_error']);
    ?>
                        <input name="firstname" type="text" class="form-control">
                        <label for="">Last Name</label>
                        <?php
if (isset($_SESSION['lname_error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['lname_error'] . "</div>";
    }
    unset($_SESSION['lname_error']);
    ?>
                        <input name="lastname" type="text" class="form-control">
                        <label for="">Email</label>
                        <?php
if (isset($_SESSION['email_error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['email_error'] . "</div>";
    }
    unset($_SESSION['email_error']);
    ?>
                        <input name="email" type="email" class="form-control">
                        <label for="">Contact</label>
                        <?php
if (isset($_SESSION['contact_error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['contact_error'] . "</div>";
    }
    unset($_SESSION['contact_error']);
    ?>
                        <input name="contact" type="text" class="form-control">
                        <label for="">Doctor Appointment</label>
                        <?php
if (isset($_SESSION['appointement_error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['appointement_error'] . "</div>";
    }
    unset($_SESSION['appointement_error']);
    ?>
                       <select name="appointment[]" id="" class="form-control">
                      <?php for ($i = 0; $i < count($data); $i++) {?>
                        <option value=<?=$data[$i]['appointment_id']?>>Dr/<?=$data[$i]['doctorname'] . " " . $data[$i]['appointment']?></option>
                      <?php }?>
                       </select>
                       <button type="submit" class="btn btn-primary form-control" name="patient_submit" >Enter Appointment</button>

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
                        <script>

                                $("#patient").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                    $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"patient"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);
                                        }
                                    });
                                });
                                $("#payment").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"payment"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });
                                $("#staff").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"staff"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });
                                $("#add_new_staff").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"add_new_staff"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });
                                $("#staff_details").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"staff_details"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });
                                $("#patient_details").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"patient_details"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });
                                $("#remove_staff").click(function(){
                                    $("a").removeClass('active');
                                    $(this).addClass('active');
                                      $.ajax({
                                        type:"GET",
                                        url:"ajax.php",
                                        data:{name:"remove_staff"},
                                        success:function(data){
                                              $("#content").empty();
                                            $("#content").append(data);

                                        }
                                    });
                                });

                        </script>
</body>
</html>


                            <?php } else {
    echo "<script>window.location.href = 'http://localhost:8080/hms/'</script>";
}
?>