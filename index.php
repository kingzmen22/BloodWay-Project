<?php
include('./includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <meta charset="utf-8" />
  <title>BloodWay Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/style_signup.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>
  <!-- NavBar -->

  <?php
  include('common_func/navbar.php');
  ?>

  <!-- image slider -->
  <div>
    <div class="slider">
      <div class="slide active">
        <img src="images/slide_pic1.png" alt="">
        <div class="info">
          <h2>Every blood donor is a lifesaver</h2>
          <p>Blood donation is a service to humankind. By donating blood, you help someone in need, and it can very well save a precious life.</p>
        </div>
      </div>
      <div class="slide">
        <img src="images/slide_pic2.png" alt="">
        <div class="info">
          <h2>Be a blood donor, be a Hero - A real one.</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="images/slide_pic3.png" alt="">
        <div class="info">
          <h2>Donate Blood, Make the stranger become friend</h2>
          <p>The blood you donate gives someone another chance at life. One day that someone may be a close relative, a friend, a loved one—or even you.</p>
        </div>
      </div>
      <div class="slide">
        <img src="images/slide_pic1.png" alt="">
        <div class="info">
          <h2>Mountain River</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="images/slide_pic2.png" alt="">
        <div class="info">
          <h2>Egypt Pyramids</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="navigation">
        <i class="fas fa-chevron-left prev-btn"></i>
        <i class="fas fa-chevron-right next-btn"></i>
      </div>
      <div class="navigation-visibility">
        <div class="slide-icon active"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
      </div>
    </div>
  </div>

<!-- FAQ -->



  <!-- footer -->

  <?php
  include('common_func/footer.php');
  ?>

</body>

<!-- scripts -->

<script src="js/script.js"></script>
<script src="js/dark_theme.js"></script>
<script src="js/imageSlider.js"></script>

</html>