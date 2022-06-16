<?php
session_start();
include('./includes/connect.php');
?>

<header>
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i id="ham-menu-icon" class="fas fa-bars"></i>
        </label>
        <a id="logo-a-tag" href="index.php">
            <img id="logo-home" src="images/logotransparent.png" alt="" />
        </a>
        <img src="images/moon.png" id="icon" alt="dark mode"  data-toggle="tooltip" title="Dark Mode" />
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="user_area/reg_form.php">Be A Donor</a></li>
            <li><a href="findADonor.php">Find A Donor</a></li>

            <li>
                <a href="#">More <i class="fas fa-caret-down"></i></a>
                <ul>
                    <li><a href="contact_us.php">Contact</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                </ul>
            </li>
            <?php
            if (!isset($_SESSION['user_name'])) {
              echo  "<li><a href='user_area/user_login.php'>Login</a></li>";
            }
            else{
                echo  "<li><a href='user_area/user_logout.php'>Logout</a></li>";
            }
            ?>
            
        </ul>
    </nav>
</header>
