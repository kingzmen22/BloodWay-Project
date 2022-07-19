<?php
session_start();
include('../includes/connect.php');
$error = null;

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    $select_query = "Select * from user_details where  user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $fetch = mysqli_fetch_assoc($result);
    $username = $fetch['user_name'];
    $useremail = $fetch['user_email'];
    $userpass = $fetch['user_password'];
}


//SQL_QUERY 

if (isset($_POST['update-profile'])) {
    $profile_username = $_POST['username-profile'];
    // $user_password = $_POST['user_password'];
    // $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    // $conf_user_password = $_POST['conf_user_password'];

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

        //insert query
        $insert_query = "insert into user_details (user_name,user_email,user_password,vkey) values ('$user_username','$user_email','$hash_password','$vkey')";
        $sql_execute = mysqli_query($con, $insert_query);
        // echo "<script>alert('Successfully Registered!')</script>";
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

        .alert {
            height: 30px;
            display: none;
            margin-bottom: 10px;
            padding: .2rem 1rem;
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
            /* flex-direction: row; */
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
    <h2>
        <p class="Title-profile">My Profile</p>
    </h2>
    <div class="allcontainer">
        <!-- signup form -->
        <div class="form-group containform">
            <form class="px-5" action="" method="POST">
                <div class="mb-3 ">
                    <label for="InputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="InputUsername" aria-describedby="emailHelp" name="username-profile" value="<?php echo $username; ?>">

                </div>
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $useremail; ?>" readonly>
                </div>
                <button type="button" class="btn btn-dark" name="update-profile">Update</button>
            </form>
        </div>

        <div class="sidebar">
            <ul id="sidebar-ul">
                <li class="sidebar-li"><a class="sidebar-list" href="">Change Password</a></li>
                <li class="sidebar-li"><a class="sidebar-list" href="">Delete Account</a></li>
                <li class="sidebar-li"><a class="sidebar-list" href="">Reset Account</a></li>
                <li class="sidebar-li"><a class="sidebar-list" href="">Logout</a></li>
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