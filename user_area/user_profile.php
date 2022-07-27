<?php
session_start();
include('../includes/connect.php');
if (!isset($_SESSION["user_email"])) {
    header('location:common_user_func/error404.php');
}
$user_email = $_SESSION['user_email'];
if (isset($_SESSION['user_email'])) {
    $select_query = "Select * from user_details where  user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $fetch = mysqli_fetch_assoc($result);
    $username = $fetch['user_name'];
    $useremail = $fetch['user_email'];
}

if (isset($_SESSION["user_email"])) {
    $conf_email = $_SESSION['user_email'];
    $select_query_donor_details = "SELECT * from donor_details where donor_email='$conf_email'";
    $select_query_donation_details = "SELECT * from donation_details where dona_email='$conf_email'";
    $result_donor_details = mysqli_query($con, $select_query_donor_details);
    $result_donation_details = mysqli_query($con, $select_query_donation_details);
    $rows_count_donation_details = mysqli_num_rows($result_donation_details);
    $rows_count_donor_details = mysqli_num_rows($result_donor_details);
    $fetchData = mysqli_fetch_assoc($result_donor_details);
}

//SQL_QUERY 

if (isset($_POST['update-profile'])) {
    $profile_username = $_POST['username-profile'];

    //select query
    $select_query = "SELECT * from user_details where user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        // sanitzing data
        $profile_username = $con->real_escape_string($profile_username);

        //update query
        $update_query = "UPDATE user_details SET user_name ='$profile_username' WHERE user_email='$user_email' ";
        $sql_execute = mysqli_query($con, $update_query);
        if ($sql_execute) {
            $_SESSION['error'] = "Username updated Successfully";
            $_SESSION['error-mode'] = "alert-success";
            $_SESSION['user_name'] = $profile_username;
            header('location:user_profile.php');
            exit(0);
        } else {
            $_SESSION['error'] = "Something went wrong!";
            $_SESSION['error-mode'] = "alert-danger";
            header('location:user_profile.php');
            exit(0);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/modal_bs_custom.css" />
    <link rel="stylesheet" href="../css/popup_modal.css" />
    <link rel="stylesheet" href="../css/fullbs5.css">

    <style>
        :root {
            --form-bg: white;
            --text-form: black;
            --white-text: white;
            --atag-color: #031b85;
            --formfield-bg: #ffffff;
            --form-focus-color: #F5F5F5;
            --button-dark: #262626;
            --menubar-bg: #EEEEEE;
            --a-hover: #FAFAFA;
            --menulist-hover: #FAFAFA;
            --button-dark-hover: #000000;
        }

        .dark-theme {
            --form-bg: rgb(21, 32, 43);
            --text-form: white;
            --white-text: rgb(21, 32, 43);
            --atag-color: #ffffff;
            --formfield-bg: #181c28;
            --form-focus-color: #263238;
            --button-dark: #1266F1;
            --menubar-bg: #181c28;
            --a-hover: #1266F1;
            --menulist-hover: #1266F1;
            --button-dark-hover: #0091EA;
        }

        .alert {
            --bs-alert-bg: transparent;
            --bs-alert-padding-x: 1rem;
            --bs-alert-padding-y: 1rem;
            --bs-alert-margin-bottom: 1rem;
            --bs-alert-color: inherit;
            --bs-alert-border-color: transparent;
            --bs-alert-border: 1px solid var(--bs-alert-border-color);
            --bs-alert-border-radius: 0.375rem;
            position: relative;
            padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
            margin-bottom: var(--bs-alert-margin-bottom);
            color: var(--bs-alert-color);
            background-color: var(--bs-alert-bg);
            border: var(--bs-alert-border);
            border-radius: var(--bs-alert-border-radius, 0);
        }

        .alert-danger {
            --bs-alert-color: #842029;
            --bs-alert-bg: #f8d7da;
            --bs-alert-border-color: #f5c2c7;
        }

        .alert-success {
            --bs-alert-color: #0f5132;
            --bs-alert-bg: #d1e7dd;
            --bs-alert-border-color: #badbcc;
        }

        .alert {
            position: relative;
            height: 35px;
            display: block;
            top: 15px;
            margin-bottom: 15px;
            padding: .2rem 1rem;
            width: auto;
            align-items: center;
        }

        .fade {
            transition: opacity .15s linear;
        }

        .form-label,
        .form-check-label,
        .Title-profile {
            color: var(--text-form);
        }

        .Title-profile {
            margin-top: 10px;
            margin-left: 30px;
        }

        body {
            background-color: var(--form-bg);
        }

        a:hover {
            background: var(--nav-element-hover);
            transition: 0.5s;
            color: #ffffff;
            text-decoration: none;
        }

        .form-group {
            margin-top: 30px;
        }

        .form-control:focus {
            color: var(--text-form);
            background-color: var(--form-focus-color);
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        }


        .form-control {
            background-color: var(--formfield-bg);
            color: var(--text-form);
        }

        .containform {
            width: 800px;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: var(--form-focus-color);
            opacity: 1;
        }

        .btn-dark {
            background-color: var(--button-dark);
            width: 30%;
        }

        .btn-dark:hover {
            background-color: var(--button-dark-hover);
            width: 30%;
        }

        .allcontainer {
            display: flex;
            flex-wrap: wrap;
        }

        .sidebar {

            background-color: var(--menubar-bg);
            border-radius: 4px;
            padding: 20px;
            width: 300px;
            text-align: center;
            margin-left: 20px;
            margin-top: 30px;
        }

        .sidebar-list {
            color: var(--text-form);
            margin-top: 10px;
            margin-bottom: 10px;

        }

        .sidebar-list:hover {
            color: #262626;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .sidebar-li {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 18px;
            width: 100%;
            text-decoration: none;

        }

        .sidebar-li:hover {
            background-color: var(--menulist-hover);
            /* color: #ffffff; */
            max-width: 100%;
            text-decoration: none;
            border-radius: 3px;
        }

        .sidebar a:hover {
            text-decoration: none;
            background-color: var(--a-hover);
            color: var(--text-form);
            max-width: 100%;

        }

        .sidebar a {
            padding: 2px;
            max-width: 100%;

        }

        .container {
            margin-left: 30px;
        }

        .cardTitle {
            padding-left: 15px;
            padding-top: 10px;
        }

        .card>hr {
            margin: 0;
        }

        .cardBody {
            padding-left: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .Cardbody-flex {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .status-btn {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin-left: 50px;
        }

        .big-num {
            font-size: 30px;
        }

        .btn-ele1 {
            margin-left: 50px;
            margin-top: 10px;
        }

        .btn-ele2 {
            margin-left: 50px;
            margin-top: 10px;
        }

        @media (max-width: 858px) {
            #sidebar-ul {
                position: static;
                width: 100%;
                height: 100%;
                background: none;
                box-shadow: none;
                backdrop-filter: none;
                top: 80px;
                left: -100%;
                text-align: center;
                transition: all 0.5s;
            }

            .sidebar {
                width: 100%;
                margin-left: 0px;
            }
        }

        @media (max-width: 540px) {
            .container {
                margin-left: 0px;

            }

            .btn-ele1 {
                margin-left: 10px;
                margin-top: 10px;
                font-size: 14px;
            }

            .btn-ele2 {
                margin-left: 20px;
                margin-top: 10px;
                font-size: 14px;
            }
        }
    </style>

</head>

<body>
    <!-- NavBar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>

    <h2>
        <p class="Title-profile">My Profile</p>
    </h2>

    <!-- Validation alert block  -->
    <?php
    if (isset($_SESSION['error'])) { ?>
        <div class="alert <?php echo $_SESSION['error-mode']; ?>">
            <center>
                <?php
                echo $_SESSION['error'];
                ?>
            </center>
        </div>
    <?php
    }
    unset($_SESSION['error']);
    unset($_SESSION['error-mode']);
    ?>

    <div class="container col-lg-6">
        <div class="card">
            <h5 class="cardTitle">Donor Profile</h5>
            <hr>
            <div class="Cardbody-flex">
                <div class="cardBody">
                    <p class="card-text"><strong>Name: </strong><?php echo $fetchData['donor_name']; ?> </p>
                    <p class="card-text"><strong>Blood Group: </strong><?php echo $fetchData['donor_bgrp']; ?></p>
                </div>
                <div class="status-btn">
                    <?php
                    $avail_status = $fetchData['avail_status'];
                    $remain_days = $fetchData['remDays'];
                    if ($rows_count_donor_details == 0){
                        $avail_status=1;
                    }
                    if ($avail_status == 1) {
                        echo  "<p class='btn btn-outline-success btn-ele2'>You can <br> donate blood<br> now!</p>";
                    } else {
                            echo  "<p class='btn btn-outline-warning btn-ele2'>Next donation in <br> <strong class='big-num'> $remain_days </strong> <br> days</p>";
                    }

                    if ($rows_count_donation_details == 0) {
                        echo  "<p class='btn btn-outline-danger btn-ele1'>Blood donated <br><strong class='big-num'> $rows_count_donation_details </strong> <br> times</p>";
                    } else {
                        echo  "<p class='btn btn-outline-info btn-ele1'>Blood donated <br><strong class='big-num'> $rows_count_donation_details </strong> <br> times</p>";
                    }
                    ?>


                </div>
            </div>

        </div>
    </div>


    <div class="allcontainer">
        <!-- signup form -->
        <div class="form-group containform">
            <form class="px-5" action="#" method="POST">
                <div class="mb-3 ">
                    <label for="InputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="InputUsername" name="username-profile" value="<?php echo $username; ?>" required>

                </div>
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $useremail; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-dark" name="update-profile">Update</button>
            </form>
        </div>

        <!-- sidebar -->
        <div class="sidebar">
            <ul id="sidebar-ul">
                <li class="sidebar-li"><a class="sidebar-list" href="changePass.php">Change Password</a></li>
                <li class="sidebar-li"><a class="sidebar-list" href="deleteAccount.php">Delete Account</a></li>
                <li class="sidebar-li"><a class="sidebar-list trigger-btn" href="#logoutModal" data-toggle="modal">Logout</a></li>
            </ul>
        </div>
    </div>
</body>

<!-- dark theme js -->
<script>
    var icon = document.getElementById("icon");

    icon.onclick = function() {
        var SetTheme = document.body;

        SetTheme.classList.toggle("dark-theme");

        var theme;

        if (SetTheme.classList.contains("dark-theme")) {
            console.log("Dark mode");
            theme = "DARK";
        } else {
            console.log("Light mode");
            theme = "LIGHT";
        }

        localStorage.setItem("PageTheme", JSON.stringify(theme));

        if (document.body.classList.contains("dark-theme")) {
            icon.src = "../images/sun.png";
        } else {
            icon.src = "../images/moon.png";
        }
    };

    let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
    console.log(GetTheme);

    if (GetTheme === "DARK") {
        document.body.classList = "dark-theme";
        icon.src = "../images/sun.png";
    }
</script>

</html>