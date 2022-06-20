<?php
session_start();
include('../includes/connect.php');
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <meta charset="utf-8" />
    <title>BloodWay Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<style>

</style>

<body>

    <!-- navbar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>

    <div class="donor-container">
        <h2>You're already a donor</h2>
        <br>
        <h3>Donor Details</h3>
        <div class="dcontainer">
            <div class="dcard__container">
                <div class="dcard">
                    <div class="dcard__content">
                        <h3 class="dcard__header">
                            <?php
                            if (isset($_SESSION['donor_name'])) {
                                $name=$_SESSION['donor_name'];
                                echo $name;
                            };
                            ?>
                        </h3>
                        <p class="dcard__info">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button class="dcard__button">Read now</button>
                    </div>
                </div>
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