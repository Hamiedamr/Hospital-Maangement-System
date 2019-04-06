<?php
$conn = mysqli_connect("localhost", "root", "", "hmsdb");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    if (isset($_GET['name'])) {
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
        //Booking Form
        if ($_GET['name'] == "patient") {
            ?>
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
                       <button type="submit" class="btn btn-primary form-control" name="patient_submit" id="ab1">Enter Appointment</button>

                    </form>


                </div>
            </div>
            <?php
}else if($_GET['name'] == "payment"){
?>
    <div class="card">
    <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <h3>
                    Payment
                </h3>
                </div>
    </div>

<?php
}else if($_GET['name'] == "patient_details"){

    $query = "select patientstb.contact,patientstb.id,first_name,last_name,doctorname,appointment from patientstb join doctor_appointmentstb on patientstb.appointment_id = doctor_appointmentstb.id join doctorstb on doctorstb.appointment_id = doctor_appointmentstb.id";

        $result = mysqli_query($conn, $query);
        // die(var_dump($result));
        $data =  array();
        if (mysqli_num_rows($result) > 0) {
            //fetch assoc like stack so we get data from it using loop
            while ($data[] = mysqli_fetch_assoc($result)) {

            }
            array_pop($data);
//             echo"<pre>";var_dump($data);echo"</pre>";
//  die();
        } else {
            die("<script>alert('Error in Datbase! :(')</script>");
        }
?>
    <div class="card">
    <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <h3>
                    Paitents Details
                </h3>
    </div>
    <div class="card-body">
            <table class="table">
        <thead>
       
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Appointment</th>
            <th scope="col">Doctor Name</th>
            </tr>
      
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($data); $i++) {?>
            <tr>
            <th scope="row"><?= $data[$i]['id']?></th>
            <td><?= $data[$i]['first_name']?></td>
            <td><?= $data[$i]['last_name']?></td>
            <td><?= $data[$i]['contact']?></td>
            <td><?= $data[$i]['appointment']?></td>
            <td><?= $data[$i]['doctorname']?></td>
            </tr>
    <?php }?>
        </tbody>
        </table>
    </div>
</div>

    <?php
}

    }
}

?>