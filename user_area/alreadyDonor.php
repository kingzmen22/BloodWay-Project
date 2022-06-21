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
    <link rel="stylesheet" href="../css/modal_bs_custom.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        height: auto;
    }
    .w3-card-4 {
        margin: 20px;
    }

    #delete {
        float: right;
        border-radius: 5px;
    }

    #edit {
        border-radius: 5px;
    }
</style>

<body>

    <!-- navbar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>

    <!-- modal for warning -->

    <div class="container-modal">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Congratulations! You're already a donor</h4>
                    </div>
                    <div class="modal-body">
                        <p>You can only register one donor in an account.<br>Registered donor's details are given here.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="w3-card-4">
        <div class="w3-container ">
            <h3>John Doe</h3>
</div>
        <div class="w3-container">
            <p>1 new friend request</p>
            <hr>
            <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
        </div>
        <button class="w3-button w3-green" id="edit"><i class="bi bi-pencil-square"></i> Edit</button>
        <button class="w3-button w3-red" id="delete"> <i class="bi bi-trash"></i> Delete</button>
    </div>


    <!-- footer -->

    <?php
    include('common_user_func/user_footer.php');
    ?>


</body>

<script>
    $(document).ready(function() {
        // Show the Modal on load
        $("#myModal").modal("show");
    });
</script>

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