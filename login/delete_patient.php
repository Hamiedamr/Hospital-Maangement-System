<?php
$conn = mysqli_connect("localhost", "root", "", "hmsdb");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

if (isset($_POST['id'])) {

    $query = "delete from patientstb where id=" . $_POST['id'];
    
   mysqli_query($conn, $query);
     

}
}
?>