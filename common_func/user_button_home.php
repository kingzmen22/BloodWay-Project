

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/user_button.css">

</head>

<body>

    <div class="dropdown">
        <button class="dropbtn"><i class="bi bi-person-circle"></i> <?php
        echo  $_SESSION['user_name'];
        ?></button>
    </div>


    <div class="dropdown1">
        <button class="dropbtn1"><i class="bi bi-caret-down"></i></button>

        <div class="dropdown-content1" style="right:0;">
            
            <a href="./user_area/donor_details.php">Donor Details</a>
            <a href="#">My Profile</a>
            <a href="./user_area/user_logout.php">Logout</a>

        </div>
    </div>


      <!-- hidden in desktop view and visible in mobile view -->

    <div class="dropdown-resp">
        <button class="dropbtn-resp"><i class="bi bi-person-circle"></i> <?php
                                                                    echo  $_SESSION['user_name'];
                                                                    ?></button>
    </div>


    <div class="dropdown1-resp">
        <button class="dropbtn1-resp"><i class="bi bi-caret-up"></i></button>

        <div class="dropdown-content1-resp" style="right:0;">

            <a href="#">Donor Details</a>
            <a href="#">My Profile</a>
            <a href="#">Settings</a>
            <a href="./user_area/user_logout.php">Logout</a>

        </div>
    </div>
</body>

</html>