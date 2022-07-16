<?php
session_start();
include('../includes/connect.php');
$error = null;

$select_query = "Select * from user_details where  user_email='$user_email'";
$result = mysqli_query($con, $select_query);
// $fetch= mysqli;



//SQL_QUERY 

if (isset($_POST['user_signup'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];

    //select query

    $select_query = "Select * from user_details where  user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        $error = "Email you entered already exist!";
    } else if ($user_password != $conf_user_password) {
        $error = "Passwords do not match!";
    } else {
        // sanitzing data
        $user_username = $con->real_escape_string($user_username);
        $user_email = $con->real_escape_string($user_email);
        $user_password = $con->real_escape_string($user_password);
        $conf_user_password = $con->real_escape_string($conf_user_password);

        // verification key generating

        $vkey = password_hash($user_username, PASSWORD_DEFAULT);

        //insert query

        $insert_query = "insert into user_details (user_name,user_email,user_password,vkey) values ('$user_username','$user_email','$hash_password','$vkey')";
        $sql_execute = mysqli_query($con, $insert_query);
        // echo "<script>alert('Successfully Registered!')</script>";

        // account verification email sending

        $to = $user_email;
        $subject = "BloodWay Account Verification";
        $message = "<a href='http://localhost/user_area/email_verify.php?vkey=$vkey'>Verify Account</a>";
        $headers = "From: bloodwaynss@gmail.com  \r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "<script>alert('Email sent succesfully to $to')</script>";
            header('location: thankyou_page.php');
        } else {
            echo "<script>alert('Failed to send email!')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Account</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fullbs5.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

    <style>
        :root {
            --form-bg: white;
            --text-form: black;
            --white-text: white;
            --atag-color: #031b85;
            --formfield-bg: #ffffff;
            --form-focus-color: #F5F5F5;
        }

        .dark-theme {
            --form-bg: rgb(21, 32, 43);
            --text-form: white;
            --white-text: rgb(21, 32, 43);
            --atag-color: #ffffff;
            --formfield-bg: #181c28;
            --form-focus-color: #263238;
        }

        .form-label,
        .form-check-label,
        .Title-profile {
            color: var(--text-form);
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

        .signup-form form a:hover {
            background-color: #ffffff;
        }

        .alert {
            height: 30px;
            display: none;
            margin-bottom: 10px;
            padding: .2rem 1rem;
        }

        .form-group {
            margin-top: 10px;
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
            width: 100%;
            padding-right: 70px;
            padding-left: 70px;
        }
    </style>


</head>
<?php
if ($error != null) {
?>
    <style>
        .alert {
            display: block;
        }
    </style>
<?php
}
?>

<body>
    <!-- NavBar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>


    <!-- <nav>
    
</nav> -->

    <!-- signup form -->
    <div class="form-group containform">
        <h2>
            <center class="Title-profile">My Profile</center>
        </h2>
        <form class="px-5">
            <div class="mb-3 ">
                <label for="InputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="InputUsername" aria-describedby="emailHelp">

            </div>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <a href="">Change Password</a>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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