<?php
session_start();
include('../includes/connect.php');

if (!isset($_SESSION["user_email"])) {
  // when user is not logged in you cant search a donor
  // so redirecting to login page
  header('location:findaDonor_login_redirect.php');
}

if (isset($_SESSION["user_email"])) {
  $conf_email = $_SESSION['user_email'];
  $select_query = "Select * from donor_details";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
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
  <link rel="stylesheet" href="../css/style_signup.css" />
  <link rel="stylesheet" href="../css/fullbs5.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
  /* body {
    background-color: white;
  } */
</style>
</head>

<body>
  <!-- NavBar -->
  <?php
  include('common_user_func/user_navbar.php');
  ?>

  <!-- searchbar -->
  <h3 class="mt-3 mx-3">
    Search for donors here
  </h3>

  <div class="container">
    <div class="row align-items-start mt-3 ">
      <div class="col">
        <label class="">Blood Group</label>
        <form action="" method="get">
          <select class="form-select" id="fetchBG" name="fetchBG">
            <option value="" disabled="" selected="">Select</option>
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
        </form>
      </div>

      <div class="col">
        <label class="">Distirct/Zone</label>
        <form action="" method="get">
          <select class="form-select">
            <option value="" selected>Select</option>
            <option value="Ernakulam">Ernakulam</option>
            <option value="Thrissur">Thrissur</option>
          </select>
        </form>
      </div>
      <h6 class="mt-2">
        <center>-------OR-------</center>
      </h6>
      <div class="col">
        <input id="search" type="text" class="form-control" placeholder="Search for Names...." data-tables="donors-list">
      </div>

    </div>
  </div>



  <!-- table -->
  <?php

  if ($rows_count < 1) { ?>
    <h4 class="norecord-findon">No records found!</h4>
  <?php
  } else { ?>
    <div class="container">
      <table class="table mt-5 table-dark table-hover table-responsive donors-list">
        <thead>
          <tr>
            <th>SI No.</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Distirct/Zone</th>
            <th>Status</th>
            <th>Contact</th>
          </tr>
        </thead>

        <tbody id="tab">
          <?php
          $si_no = 1;
          while ($fetchData = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <th><?php echo $si_no; ?></th>
              <td><?php echo $fetchData['donor_name']; ?></td>
              <td><?php echo $fetchData['donor_bgrp']; ?></td>
              <td><?php echo $fetchData['donor_zone']; ?></td>
            </tr>
          <?php $si_no++;
          endwhile; ?>
        </tbody>

      </table>
    </div>
  <?php } ?>
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

<!-- jquery script for searchbar  -->
<script>
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#tab tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<!-- jquery for blood group dropdown -->

<script>
  $(document).ready(function() {
    $("#fetchBG").on('change', function() {
      var value1 = $(this).val();
      $.ajax({
        url: "external_php/dd_fetch.php",
        type: "POST",
        data: 'request=' + value1,
        success: function(data) {
          $(".container").html(data);
        }
      });
    });
  });
</script>

</html>