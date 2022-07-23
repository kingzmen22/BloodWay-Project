<?php
session_start();
include('../includes/connect.php');
if (!isset($_SESSION["user_email"])) {
    header('location:common_user_func/error404.php');
}
$user_email = $_SESSION['user_email'];

//SQL_QUERY 

if (isset($_POST['update-pass'])) {
    $oldPassword = $_POST['oldpass-profile'];
    // $hash_oldPassword = password_hash($oldPassword, PASSWORD_DEFAULT);
    $new_password = $_POST['pass-profile'];
    $conf_new_password = $_POST['conf-pass-profile'];


    //select query
    $select_query = "SELECT * from user_details where user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $fetch = mysqli_fetch_assoc($result);
    $userpassword = $fetch['user_password'];

    if ($rows_count > 0) {

        if (password_verify($oldPassword, $userpassword)) {
            if ($new_password == $conf_new_password) {

                $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $conf_user_password = $con->real_escape_string($conf_user_password);
                //update query
                $update_query = "UPDATE user_details SET user_password ='$hash_new_password' WHERE user_email='$user_email' ";
                $sql_execute = mysqli_query($con, $update_query);
                if ($sql_execute) {
                    $_SESSION['error'] = "Password changed Successfully!";
                    $_SESSION['error-mode'] = "alert-success";
                    header('location:user_profile.php');
                    exit(0);
                } else {
                    $_SESSION['error'] = "Something went wrong!";
                    $_SESSION['error-mode'] = "alert-danger";
                    header('location:changePass.php');
                    exit(0);
                }
            } else {
                $_SESSION['error'] = "Passwords do not match!";
                $_SESSION['error-mode'] = "alert-danger";
                header('location:changePass.php');
                exit(0);
            }
        } else {
            $_SESSION['error'] = "Current password is wrong!";
            $_SESSION['error-mode'] = "alert-danger";
            header('location:changePass.php');
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
    <title>Change password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

        .form-label,
        .form-check-label,
        .Title-profile {
            color: var(--text-form);
        }

        .Title-profile {
            margin-top: 25px;
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
            max-width: 850px;
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
        }

        @media (max-width: 640px) {
            .btn-dark {
                background-color: var(--button-dark);
                width: 40%;
            }
        }
    </style>

</head>

<body>

    <h2>
        <p class="Title-profile">Change Your Password</p>
    </h2>
    <h6><i class="zz" id="icon"></i></h6>

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

    <!-- Change Password form -->
    <div class="form-group containform">
        <form class="px-5" action="" method="POST">
            <div class="mb-3 ">
                <label for="InputOldPass" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="InputOldPass" aria-describedby="passHelp" name="oldpass-profile" placeholder="Enter your current password" required>
            </div>
            <div class="mb-3 ">
                <label for="InputPass1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="InputPass1" aria-describedby="passHelp" name="pass-profile" placeholder="Enter your new password" required>
            </div>
            <div class="mb-3 ">
                <label for="InputPass2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="InputPass2" aria-describedby="passHelp" name="conf-pass-profile" placeholder="Confirm your new password" required>
            </div>
            <button type="submit" class="btn btn-dark mt-2" name="update-pass">Change Password</button>
        </form>
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