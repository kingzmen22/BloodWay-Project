<?php
include('error_redirect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/donation_related_details.css">
  <link rel="stylesheet" href="../../css/style.css" />
  <title>Document</title>
</head>
<style>
  .user-details-reg .input-box-reg input {
    width: 350px;

}
.user-details-reg .input-box-reg select {
  width: 350px;
}
</style>
<body>

  <div class="container-don-rel">
    <div class="card-don-rel">
      <h3 class="head-don-rel">Update Donor Details<i class="bi" id="icon"></i></h3>
      <div class="content-don-rel">
        <p class="sub-heading-don-rel">Update Your Details</p>
        <div class="h3-body-don-rel">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="user-details-reg">
              <div class="input-box-reg">
                <span class="details-reg">Full Name</span>
                <input type="text" placeholder="Enter your name" name="donor_name" required>
              </div>

              <div class="input-box-reg">
                <span class="details-reg">Phone Number</span>
                <input type="text" placeholder="Enter your number" name="donor_mobnum" required>
              </div>

              <div class="input-box-reg">
                <span class="details-reg">Date of Birth</span>
                <input type="date" placeholder="Enter your DOB" name="donor_dob" required>
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
                <select name="donor_bgrp" id="blood-grp" required>
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
                <select name="donor_gender" id="zone-dist" name="donor_zone" required>
                  <option value="" selected>Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>

              <div class="input-box-reg">
                <span class="details-reg">Category</span>
                <select name="donor_category" id="don_cat" required>
                  <option value="" selected>Select</option>
                  <option value="Nss Volunteer">Nss Volunteer</option>
                  <option value="Student">Student</option>
                  <option value="College Staff">College Staff</option>
                  <option value="Other">Other</option>
                </select>
              </div>

              <div class="input-box-reg">
                <span class="details-reg">Weight</span>
                <input type="number" placeholder="Enter your weight" name="donor_weight" required>
              </div>

            </div>

            <div class="button-reg">
              <input type="submit" value="Register" name="donor_reg">
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>

</body>

</html>

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