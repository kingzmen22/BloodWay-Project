<?php
session_start();
include('../includes/connect.php');
$donor_name = $donor_email = $donor_dob = $donor_age = $donor_mobnum = $donor_zone = "";
$donor_bgrp = $donor_weight = $donor_gender = $donor_category = "";
$error = "";
$flag = true;
if (isset($_SESSION["user_email"])) {
  // if the user register a donor one time user cant register another donor. 
  //so redirected to a error showing page
  $conf_email = $_SESSION['user_email'];
  $select_query = "Select * from donor_details where  donor_email='$conf_email'";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
  if ($rows_count > 0) {
    header('location:alreadyDonor.php');
  }
} else {
  // when user is not logged in you cant register a donor so redirecting to login page
  header('location:regform_login_redirect.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $donor_name = test_input($_POST['donor_name']);
  $donor_email = test_input($_SESSION['user_email']);
  $donor_dob = test_input($_POST['donor_dob']);
  $donor_age = test_input($_POST['donor_age']);
  $donor_mobnum = test_input($_POST['donor_mobnum']);
  $donor_zone = test_input($_POST['donor_zone']);
  $donor_bgrp = test_input($_POST['donor_bgrp']);
  $donor_weight = test_input($_POST['donor_weight']);
  $donor_gender = test_input($_POST['donor_gender']);
  $donor_category = test_input($_POST['donor_category']);

  // input validation
  $donor_mobnu = strlen($_POST["donor_mobnum"]);
  $length = strlen($donor_mobnu);
  // name error
  if (!preg_match("/^[a-zA-Z-' ]*$/", $donor_name)) {
    $flag = false;
    $error = "Only alphabets and whitespace are allowed.";
  } else if (!preg_match('/^[0-9]{10}+$/', $donor_mobnum)) {
    $flag = false;
    $error = "Invalid mobile number.";
  } else {
    $flag = true;
  }



  if ($flag) {
    //select query

    $select_query = "Select * from donor_details where  donor_email='$donor_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);


    if ($rows_count > 0) {
      $error = "Donor with same email id already exist!";
      // session variables created
      $fetch = $result->fetch_assoc();
      $donor_name1 = $fetch['donor_name'];
      $_SESSION['donorname'] = $donor_name1;
    } else {
      // sanitzing data
      $donor_name = $con->real_escape_string($donor_name);
      $donor_email = $con->real_escape_string($donor_email);
      $donor_dob = $con->real_escape_string($donor_dob);
      $donor_age = $con->real_escape_string($donor_age);
      $donor_zone = $con->real_escape_string($donor_zone);
      $donor_bgrp = $con->real_escape_string($donor_bgrp);
      $donor_weight = $con->real_escape_string($donor_weight);
      $donor_gender = $con->real_escape_string($donor_gender);
      $donor_category = $con->real_escape_string($donor_category);
      //insert query

      $insert_query = "insert into donor_details (donor_name,donor_email,donor_dob,donor_age,donor_mobNum,donor_zone,donor_bgrp,donor_gender,donor_weight,donor_category) values ('$donor_name','$donor_email','$donor_dob','$donor_age','$donor_mobnum','$donor_zone','$donor_bgrp','$donor_gender','$donor_weight','$donor_category')";
      $sql_execute = mysqli_query($con, $insert_query);
      echo "<script>alert('Successfully Registered!')</script>";
      header('location:reg_form.php');
    }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <style>
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

    .alert {
      position: relative;
      height: 35px;
      display: none;
      top: 15px;
      margin-bottom: 15px;
      padding: .2rem 1rem;
      width: auto;
      align-items: center;
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

  <!-- navbar -->
  <?php
  include('common_user_func/user_navbar.php');
  ?>

  <!-- reg_form -->

  <div class="container-reg">
    <div class="title">Registration</div>
    <div class="alert alert-danger">
      <center><?php echo $error ?></center>
    </div>
    <div class="content-reg">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="user-details-reg">
          <div class="input-box-reg">
            <span class="details-reg">Full Name</span>
            <input type="text" placeholder="Enter your name" name="donor_name" required>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="donor_mobnum"  required>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">Date of Birth</span>
            <input type="date" placeholder="Enter your DOB" name="donor_dob"  required>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">Age</span>
            <input type="number" min="18" max="60" placeholder="Enter your Age" name="donor_age"  required>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">District/Zone</span>
            <select name="donor_zone" id="zone-dist" name="donor_zone" required>
              <option value="" selected>Select</option>
              <option value="Ernakulam">Ernakulam</option>
              <option value="Thrissur">Thrissur</option>
            </select>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">Blood Group</span>
            <select name="donor_bgrp" id="blood-grp"  required>
              <option value="" selected>Select</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="Bombay blood group">Bombay blood group</option>
            </select>
          </div>


          <div class="input-box-reg">
            <span class="details-reg">Gender</span>
            <select name="donor_gender" id="zone-dist" name="donor_zone"  required>
              <option value="" selected>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">Category</span>
            <select name="donor_category" id="don_cat"  required>
              <option value="" selected>Select</option>
              <option value="Nss Volunteer">Nss Volunteer</option>
              <option value="Student">Student</option>
              <option value="College Staff">College Staff</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="input-box-reg">
            <span class="details-reg">Weight</span>
            <input type="number" min="55" placeholder="Enter your weight" name="donor_weight"  required>
          </div>

        </div>

        <div class="button-reg">
          <input type="submit" value="Register" name="donor_reg">
        </div>
      </form>
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