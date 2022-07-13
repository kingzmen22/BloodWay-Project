<?php
include('../includes/connect.php');
include('external_php/donor_session_create.php');
$sql_execute = null;
$donated_hospital = $donated_date = $donated_certificate = $temp_donated_certificate = "";

if (!isset($_SESSION["user_email"])) {
    header('location:common_user_func/error404.php');
}

if (!isset($_SESSION["donor_name"])) {
    header('location:donor_details_redirect.php');
}

if (isset($_SESSION["user_email"])) {
    $conf_email = $_SESSION['user_email'];
    $select_query = "Select * from donation_details where  dona_email='$conf_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
}


if (isset($_POST['donated_update'])) {
    $donated_hospital = test_input($_POST['donated_hospital']);
    $donated_date = test_input($_POST['donated_date']);

    $donated_certificate = $_FILES['donated_certificate'];
    $imgname = $donated_certificate['name'];
    $imgtmpname = $donated_certificate['tmp_name'];

    $donated_hospital = $con->real_escape_string($donated_hospital);
    $donated_date = $con->real_escape_string($donated_date);

    $filenmesep = explode('.', $imgname);
    $fileext = strtolower(end($filenmesep));
    $extn = array('jpeg', 'jpg', 'png');
    if (in_array($fileext, $extn)) {
        $upload_img = "../user_area/dona_certif_imgs/" . $imgname;
        move_uploaded_file($imgtmpname, $upload_img);
        $insert_query = "insert into donation_details (dona_email,dona_hospName,dona_date,dona_certif) values ('$conf_email','$donated_hospital','$donated_date','$upload_img')";
        $sql_execute = mysqli_query($con, $insert_query);
        header('location:donor_details.php');
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
<style>
    :root {
        --dropdown-bg: #f9f9f9;
        --dropdown-text: black;
    }

    .dark-theme {
        --dropdown-bg: rgb(21, 32, 43);
        --dropdown-text: white;
    }

    .alert-success {
        color: #ffffff;
        background-color: #00C851;
        border-color: #00C851;
    }

    .alert {
        position: relative;
        padding: 15px 5px;
        border: 1px solid transparent;
        text-align: center;
    }

    .alert-dismissible .close {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        padding: 0.75rem 1.25rem;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    button.close {
        padding: 0;
        background-color: transparent;
        border: 0;
    }

    .close {
        float: right;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #4df;
        opacity: .5;
    }

    .table td,
    .table th {
        color: var(--dropdown-text);
        padding: 12px 15px;
        border: 1px solid #ccc;
        text-align: center;
        font-size: 16px;
        background-color: var(--dropdown-bg);
    }

    .fullscreen_toggle {
        border: none;
        padding: 6px;
        border-radius: 4px;
        background-color: #1264e3;
        font-weight: 600;
        color: white;
        margin-right: 0px;
        width: 60%;
    }

    .delete_toggle {
        border: none;
        padding: 6px;
        border-radius: 4px;
        background-color: #ff4444;
        font-weight: 600;
        color: white;
        margin-right: 0px;
        width: 20%;
    }

    .edit_toggle {
        border: none;
        padding: 6px;
        border-radius: 4px;
        background-color: #00c851;
        font-weight: 600;
        color: white;
        margin-right: 0px;
        width: 20%;
    }

    .fullscreen_toggle:hover {
        background-color: #0d47a1;
    }

    .delete_toggle:hover {
        background-color: #CC0000;
    }

    .edit_toggle:hover {
        background-color: #007E33;
    }
</style>

<body>

    <!-- navbar -->
    <?php
    include('common_user_func/user_navbar.php');
    ?>


    <!-- Donor detals card -->

    <div class="container-redir">
        <?php
        // if ($sql_execute) {
        //     $ele = '<div class="alert alert-success alert-dismissible">
        // <button type="button" class="close" data-dismiss="alert">&times;</button>
        //     <strong>Success!</strong> The latest donation details have been updated.
        //   </div>';
        //     echo $ele;
        // }
        ?>
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

    <!-- delete modal for donor detaisl-->
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-box-reg">
                            <span class="details-reg">Hospital Name</span>
                            <input type="text" placeholder="Enter hospital name" name="donated_hospital" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Donated Date</span>
                            <input type="date" placeholder="Choose date" name="donated_date" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Certificate(Optional)</span>
                            <input type="file" class="file-input" placeholder="Browse image" name="donated_certificate">
                        </div>


                        <div class="button-center-don-rel">
                            <a href="user_login.php" class="butn-a-don-rel"> <button class="butn-don-rel1" name="donated_update"><i class="bi bi-pencil-square"></i> Update</button></a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <!-- Donation History -->
    <div class="container-don-rel">
        <div class="card-don-rel">
            <h3 class="head-don-rel">Donation History</h3>
            <div class="content-don-rel">
                <div class="h3-body-don-rel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hospital</th>
                                <th>Certificate</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fetchData = mysqli_fetch_assoc($result)) : ?>

                                <tr>
                                    <td><?php echo $fetchData['dona_date']; ?></td>
                                    <td> <?php echo $fetchData['dona_hospName']; ?></td>
                                    <td><a href='common_user_func\certif_show.php?certif=<?php echo $fetchData['dona_id']; ?>' class='butn-a-don-rel'> <button class='butn-don-rel1 fullscreen_toggle' name='donated_update'><i class='bi bi-arrows-fullscreen'></i> View Certificate</button></a></td>
                                    <td>
                                        <a href='common_user_func\edit_donation_details.php?edit=<?php echo $fetchData['dona_id']; ?>' class='butn-a-don-rel'><button class='butn-don-rel1 edit_toggle' name='donated_update'><i class='bi bi-pencil-square'></i></button></a>
                                        <a href='common_user_func\delete_donation_details.php?delete=<?php echo $fetchData['dona_id']; ?>' class='butn-a-don-rel'><button class='butn-don-rel1 delete_toggle' name='donated_update'><i class='bi bi-trash3'></i></button></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <!-- <?php
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