<?php
include('external_php/donor_session_create.php');

if (!isset($_SESSION["user_email"])) {
    header('location:common_user_func/error404.php');
}

if (!isset($_SESSION["donor_name"])) {
    header('location:donor_details_redirect.php');
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
    <link rel="stylesheet" href="../css/donation_related_details.css">
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
                                echo $_SESSION['donor_category'];
                                ?>
                            </p>

                        </h3>
                    </div>

                </div>

            </div>
            <div class="button-center-redir">
                <a href="./common_user_func/edit_donor_details.php" class="butn-a-redir"> <button class="butn-redir1"><i class="bi bi-pencil-square"></i> Edit</button></a>
                <a href="#deleteModal" class="trigger-btn butn-a-redir" data-toggle="modal"> <button class="butn-redir2"><i class="bi bi-trash3"></i> Delete</button></a>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <?php
    include('common_user_func/delete_conf_modal.php');
    ?>

    <!-- Donoation related detals -->
    <div class="container-don-rel">
        <div class="card-don-rel">
            <h3 class="head-don-rel">Donation Related Details</h3>
            <div class="content-don-rel">
                <p class="sub-heading-don-rel">Update Your Latest Donation Details</p>
                <div class="h3-body-don-rel">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="input-box-reg">
                            <span class="details-reg">Hospital Name</span>
                            <input type="text" placeholder="Enter hospital name" name="donated-hospital" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Donated Date</span>
                            <input type="date" placeholder="Choose date" name="donated-date" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Certificate(Optional)</span>
                            <input type="file" class="file-input" placeholder="Browse image" name="donated-certificate">
                        </div>

                 
                        <div class="button-center-don-rel">
                            <a href="user_login.php" class="butn-a-don-rel"> <button class="butn-don-rel1"><i class="bi bi-pencil-square"></i> Update</button></a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <!-- footer -->
    <!-- 
    <?php
    include('common_user_func/user_footer.php');
    ?> -->


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