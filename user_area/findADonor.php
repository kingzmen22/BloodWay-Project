<?php
session_start();
include('../includes/connect.php');

if (!isset($_SESSION["user_email"])) {
    // when user is not logged in you cant search a donor
    // so redirecting to login page
    header('location:findaDonor_login_redirect.php');
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<style>
  body {
    background-color: white;
  }
</style>
</head>

<body>
  <!-- NavBar -->
  <?php
include('common_user_func/user_navbar.php');
?>


  <div class="table-container">
    <table class="table">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Blood Group</th>
          <th>District/Zone</th>
          <th>Email</th>
          <th>Mob No.</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="S.No">1</td>
          <td data-label="Name">Dinesh</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">2</td>
          <td data-label="Name">Kamal</td>
          <td data-label="Age">23</td>
          <td data-label="Marks%">70%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">3</td>
          <td data-label="Name">Neha</td>
          <td data-label="Age">20</td>
          <td data-label="Marks%">90%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">4</td>
          <td data-label="Name">Priya</td>
          <td data-label="Age">30</td>
          <td data-label="Marks%">30%</td>
          <td data-label="Staus">Failed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>
        <tr>
          <td data-label="S.No">1</td>
          <td data-label="Name">Dinesh</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">2</td>
          <td data-label="Name">Kamal</td>
          <td data-label="Age">23</td>
          <td data-label="Marks%">70%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">3</td>
          <td data-label="Name">Neha</td>
          <td data-label="Age">20</td>
          <td data-label="Marks%">90%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">4</td>
          <td data-label="Name">Priya</td>
          <td data-label="Age">30</td>
          <td data-label="Marks%">30%</td>
          <td data-label="Staus">Failed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>
        <tr>
          <td data-label="S.No">1</td>
          <td data-label="Name">Dinesh</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">2</td>
          <td data-label="Name">Kamal</td>
          <td data-label="Age">23</td>
          <td data-label="Marks%">70%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">3</td>
          <td data-label="Name">Neha</td>
          <td data-label="Age">20</td>
          <td data-label="Marks%">90%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">4</td>
          <td data-label="Name">Priya</td>
          <td data-label="Age">30</td>
          <td data-label="Marks%">30%</td>
          <td data-label="Staus">Failed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>
        <tr>
          <td data-label="S.No">1</td>
          <td data-label="Name">Dinesh</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">2</td>
          <td data-label="Name">Kamal</td>
          <td data-label="Age">23</td>
          <td data-label="Marks%">70%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">3</td>
          <td data-label="Name">Neha</td>
          <td data-label="Age">20</td>
          <td data-label="Marks%">90%</td>
          <td data-label="Staus">Passed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>

        <tr>
          <td data-label="S.No">4</td>
          <td data-label="Name">Priya</td>
          <td data-label="Age">30</td>
          <td data-label="Marks%">30%</td>
          <td data-label="Staus">Failed</td>
          <td data-label="Age">34</td>
          <td data-label="Marks%">50%</td>
          <td data-label="Staus">Passed</td>
        </tr>
      </tbody>
    </table>
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



</html>