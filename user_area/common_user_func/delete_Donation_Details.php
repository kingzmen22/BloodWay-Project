<?php
session_start();
include('../../includes/connect.php');




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conf_email = $_SESSION['user_email'];
    $delete_query = "DELETE from donation_details WHERE dona_id='$id' and dona_email='$conf_email'";
    $sql_exec = mysqli_query($con, $delete_query);
    $conf_email = $_SESSION['user_email'];
    $select_query = "SELECT * from donation_details where dona_email='$conf_email' and dona_date=(SELECT max(dona_date) from donation_details)";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $fetch = mysqli_fetch_array($result);
    $lateset_date = $fetch['dona_date'];

    if ($sql_exec) {
        // unset($_SESSION['donated-date']);
        $_SESSION['donated-date'] = $lateset_date;
        $_SESSION['status'] = "Details deleted Successfully!";
        $_SESSION['status-mode'] = "alert-success";
        header('location:../donor_details.php');
    } else {
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status-mode'] = "alert-danger";
        header('location:../donor_details.php');
    }
}
