<?php
session_start();
include('../../includes/connect.php');
$hospName = $date = $hospName = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $conf_email = $_SESSION['user_email'];
    $select_query = "SELECT * from donation_details where dona_id='$id'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $fetch = mysqli_fetch_assoc($result);
    if ($rows_count == 1) {
        $hospName = $fetch['dona_hospName'];
        $date = $fetch['dona_date'];
        $certific = $fetch['dona_certif'];
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
            }
            $update_query = "UPDATE donation_details SET dona_hospName='$donated_hospital',dona_date='$donated_date',dona_certif='$upload_img' WHERE dona_id='$id' ";
            $sql_execute = mysqli_query($con, $update_query);
            if ($sql_execute) {
                $_SESSION['status']="Details updated successfully!";
                $_SESSION['status-mode']="alert-success";
                header('location:../donor_details.php');
            }
            else{
                $_SESSION['status']="Something Went Wrong!";
                $_SESSION['status-mode']="alert-danger";
                header('location:../donor_details.php');
            }
        }
    }
}


?>

<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <meta charset="utf-8" />
    <title>BloodWay Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/alreadyDonor.css" />
    <link rel="stylesheet" href="../../css/modal_bs_custom.css" />
    <link rel="stylesheet" href="../../css/popup_modal.css" />
    <link rel="stylesheet" href="../../css/donation_related_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Donoation related detals -->
    <div class="container-don-rel">
        <div class="card-don-rel">
            <h3 class="head-don-rel">Donation Related Details<i class="bi" id="icon"></i></h3>
            <div class="content-don-rel">
                <p class="sub-heading-don-rel">Update Your Latest Donation Details</p>
                <div class="h3-body-don-rel">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-box-reg">
                            <span class="details-reg">Hospital Name</span>
                            <input type="text" placeholder="Enter hospital name" name="donated_hospital" value="<?php echo $hospName ?>" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Donated Date</span>
                            <input type="date" placeholder="Choose date" name="donated_date" value="<?php echo $date ?>" required>
                        </div>

                        <div class="input-box-reg">
                            <span class="details-reg">Certificate(Optional)</span>
                            <input type="file" class="file-input" name="donated_certificate" value="<?php echo $certific ?>">
                        </div>


                        <div class="button-center-don-rel">
                            <a href="user_login.php" class="butn-a-don-rel"> <button class="butn-don-rel1" name="donated_update"><i class="bi bi-pencil-square"></i> Update</button></a>
                        </div>
                    </form>
                </div>

            </div>

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

<script src="js/script.js"></script>