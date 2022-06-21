

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        .dropbtn {
            background-color: blue;
            color: white;
            padding: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }




        .dropbtn1 {
            background-color: blue;
            color: white;
            padding: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .dropdown1 {
            position: relative;
            display: inline-block;
            width: 20px;
            margin: 0;
        }

        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content1 a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content1 a:hover {
            background-color: #f1f1f1
        }

        .dropdown1:hover .dropdown-content1 {
            display: block;
        }

        .dropdown1:hover .dropbtn1 {
            background-color: #3e8e41;
        }
    </style>
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
            
            <a href="#">Donor Details</a>
            <a href="#">My Profile</a>
            <a href="#">Settings</a>
            <a href="./user_area/user_logout.php">Logout</a>

        </div>
    </div>
</body>

</html>