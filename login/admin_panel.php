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

<?php include("../header.php");?>
<link rel="stylesheet" href="css/admin_panel.css">


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
            <div class="col-md-2 pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
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

                    </div>
                </div>
                <nav class="navbar navbar-dark bg-primary active" >
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" style="color:#ffffff !important;">
                    <span class="fa fa-align-justify" style="color:#ffffff !important;"></span>
                    <span >Menu</span>
                    </button>
                </nav>
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
 <script src="js/admin_panel.js"></script>
</body>
</html>


                            <?php } else {
    echo "<script>window.location.href = 'http://localhost:8080/hms/'</script>";
}
?>