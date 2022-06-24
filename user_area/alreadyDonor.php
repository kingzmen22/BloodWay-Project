<?php
session_start();
include('../includes/connect.php');
$donor_email = $_SESSION['user_email'];
$select_query = "Select * from donor_details where  donor_email='$donor_email'";
$result = mysqli_query($con, $select_query);
$fetch = $result->fetch_assoc();


$donor_name = $fetch['donor_name'];
$donor_zone = $fetch['donor_zone'];
$donor_group = $fetch['donor_bgrp'];
$donor_dob = $fetch['donor_dob'];
$donor_age = $fetch['donor_age'];
$donor_mobNum = $fetch['donor_mobNum'];
$donor_gender = $fetch['donor_gender'];
$donor_weight = $fetch['donor_weight'];
// $donor_group = $fetch['donor_bgrp'];


$_SESSION['donor_name'] = $donor_name;
$_SESSION['donor_zone'] = $donor_zone;
$_SESSION['donor_bgrp'] = $donor_group;
$_SESSION['donor_dob'] = $donor_dob;
$_SESSION['donor_age'] = $donor_age;
$_SESSION['donor_mobNum'] = $donor_mobNum;
$_SESSION['donor_gender'] = $donor_gender;
$_SESSION['donor_weight'] = $donor_weight;
// $_SESSION['donor_bgrp'] = $donor_group;


if (isset($_SESSION['donor_name'])) {
    $_SESSION['donor_name'];
    $_SESSION['donor_zone'];
    $_SESSION['donor_bgrp'];
    $_SESSION['donor_dob'];
    $_SESSION['donor_age'];
    $_SESSION['donor_mobNum'];
    $_SESSION['donor_gender'];
    $_SESSION['donor_weight'];
    // $_SESSION['donor_bgrp'];
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <meta charset="utf-8" />
    <title>BloodWay Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/alreadyDonor.css" />
    <link rel="stylesheet" href="../css/modal_bs_custom.css" />
    <link rel="stylesheet" href="../css/popup_modal.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
                        <p class="modal-title">Congratulations! You're already a donor</p>
                    </div>
                    <div class="modal-body">
                        <p>You can only register one donor in an account.<br>Registered donor's details are given here.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Donor detals card -->

    <div class="container-redir">
        <div class="card-redir">
            <h3 class="head-redir">Donor Details</h3>
            <div class="content-redir">
                <i class="bt bi bi-file-earmark-person fa-5x"></i>

                <div class="h3-body-redir">
                    <div class="h3-body1-redir">
                        <h3 class="h3-redir">
                            Donor Name:
                            <p class="p-details">
                                <?php
                                echo  ucwords($_SESSION['donor_name']);
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            Blood Group:
                            <p class="p-details">
                                <?php
                                echo  $_SESSION['donor_bgrp'];
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            District/Zone:
                            <p class="p-details">
                                <?php
                                echo $_SESSION['donor_zone'];
                                ?>
                            </p>

                        </h3>
                    </div>


                    <div class="h3-body1-redir">
                        <h3 class="h3-redir">
                            Date of birth:
                            <p class="p-details">
                                <?php
                                echo  $_SESSION['donor_dob'];
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            Age:
                            <p class="p-details">
                                <?php
                                echo  $_SESSION['donor_age'];
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            weight:
                            <p class="p-details">
                                <?php
                                echo $_SESSION['donor_weight'];
                                ?>
                            </p>

                        </h3>
                    </div>

                    <div class="h3-body1-redir">
                        <h3 class="h3-redir">
                            Mobile number:
                            <p class="p-details">
                                <?php
                                echo  $_SESSION['donor_mobNum'];
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            Gender:
                            <p class="p-details">
                                <?php
                                echo  $_SESSION['donor_gender'];
                                ?>
                            </p>

                        </h3>
                        <h3 class="h3-redir">
                            Category:
                            <p class="p-details">
                                <?php
                                echo $_SESSION['donor_zone'];
                                ?>
                            </p>

                        </h3>
                    </div>

                </div>

            </div>
            <div class="button-center-redir">
                <a href="user_login.php" class="butn-a-redir"> <button class="butn-redir1"><i class="bi bi-pencil-square"></i> Edit</button></a>
                <a href="#deleteModal" class="trigger-btn butn-a-redir" data-toggle="modal"> <button class="butn-redir2"><i class="bi bi-trash3"></i> Delete</button></a>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <?php
    include('common_user_func/delete_conf_modal.php');
    ?>


    <!-- footer -->

    <?php
    include('common_user_func/user_footer.php');
    ?>


</body>

<script>
    $(document).ready(function() {
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