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

<body>

  <!-- navbar -->
  <?php
  include('common_user_func/user_navbar.php');
  ?>

  <!-- reg_form -->

  <div class="container-reg">
    <div class="title">Registration</div>
    <div class="content-reg">
      <form action="#">
        <div class="user-details-reg">
          <div class="input-box-reg">
            <span class="details-reg">Full Name</span>
            <input type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">Age</span>
            <input type="text" placeholder="Enter your Age" required>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">District/Zone</span>
            <select name="zone" id="zone-dist" required>
              <option value="0">Select</option>
              <option value="1">Ernakulam</option>
              <option value="2">Thrissur</option>
            </select>
          </div>
          <div class="input-box-reg">
            <span class="details-reg">Blood Group</span>
            <select name="blood_grp" id="blood-grp" required>
              <option value="0">Select</option>
              <option value="1">A+</option>
              <option value="2">A-</option>
              <option value="3">AB+</option>
              <option value="4">AB-</option>
              <option value="5">B+</option>
              <option value="6">B-</option>
              <option value="7">O+</option>
              <option value="8">O-</option>
            </select>
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button-reg">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

  <!-- footer -->

  <footer>
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <i class="fab fa-slack"></i>
          <span class="logo_name">BloodWay</span>
        </div>
        <div class="media-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="link-boxes">
        <ul class="box">
          <li><a href="#">Home</a></li>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Feedback</a></li>
        </ul>
      </div>
    </div>
    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">Copyright © 2022 <a href="#">BloodWay.</a>All rights reserved</span>
        <span class="policy_terms">
          <a href="#">Privacy policy</a>
          <a href="#">Terms & condition</a>
        </span>
      </div>
    </div>
  </footer>


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