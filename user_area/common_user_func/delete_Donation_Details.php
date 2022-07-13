<?php
session_start();
include('../../includes/connect.php');

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conf_email = $_SESSION['user_email'];
    $delete_query = "DELETE from donation_details WHERE dona_id='$id' and dona_email='$conf_email'";
    $sql_exec = mysqli_query($con, $delete_query);
    if($sql_exec){
        header('location:../donor_details.php');
    }
}
