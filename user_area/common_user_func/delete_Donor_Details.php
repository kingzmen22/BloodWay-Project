<?php
session_start();

// code to connect to the db
$con=mysqli_connect('localhost','root','','bloodwaybase');
if(!$con){
    die(mysqli_error(new $con));
}

// delet query
$donor_email = $_SESSION['user_email'];

$delete_query = "delete from donor_details where  donor_email='$donor_email'";
$result = mysqli_query($con,$delete_query);

header('location:../reg_form.php')
?>