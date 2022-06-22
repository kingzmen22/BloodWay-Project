<?php
session_start();
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8" />
    <title>BloodWay Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<style>
    :root {
        --container-redir-bg: whitesmoke;
        --content-redir-bg: white;
    }

    .dark-theme {
        --container-redir-bg: rgb(35, 36, 53);
        --content-redir-bg: whitesmoke;
    }

    .container-redir {
        width: 100%;
        background-color: var(--container-redir-bg);

    }

    .card-redir {
        padding: 10px;
    }

    .head-redir {
        text-align: center;
        background-color: #ff4444;
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
        border-radius: 4px;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .content-redir {
        text-align: center;
        background-color: var(--content-redir-bg);
        padding-top: 10px;
        padding-bottom: 10px;
        color: black;
        border-radius: 4px;
        margin-bottom: 21px;
    }

    .butn-redir1 {
        border: none;
        padding: 12px;
        border-radius: 25px;
        background-color: #1264e3;
        font-weight: 600;
        color: white;
        margin-right: 15px;
    }

    .butn-redir2 {
        border: none;
        padding: 12px;
        border-radius: 25px;
        background-color: #ff4444;
        font-weight: 600;
        color: white;
        margin-left: 15px;
    }

    .button-center-redir {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .butn-a-redir:hover {
        background-color: var(--container-redir-bg);
    }

    .butn-redir1:hover {
        font-weight: 600;
        background-color: #044cb8;
    }

    .butn-redir2:hover {
        font-weight: 600;
        background-color: #CC0000;
    }
</style>

<body>

    <!-- navbar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>


    <div class="container-redir">
        <div class="card-redir">
            <h2 class="head-redir">Login to Search for a donor !</h2>
            <h3 class="content-redir">You have to login to your account to search for a donor.<br>If you are new here, Signup to continue</h3>
            <div class="button-center-redir">
                <a href="user_login.php" class="butn-a-redir"> <button class="butn-redir1"><i class="bi bi-box-arrow-in-right"> </i> Click to login</button></a>
                <a href="user_signup.php" class="butn-a-redir"> <button class="butn-redir2"><i class="bi bi-box-arrow-in-right"> </i> Click to signup</button></a>
            </div>
        </div>
    </div>

    <!-- footer -->

    <?php
    include('common_user_func/user_footer.php');
    ?>


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


<script src="js/script.js"></script>