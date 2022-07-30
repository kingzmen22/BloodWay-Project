<?php
session_start();

$_SESSION['admin_username'];
$_SESSION['admin_email'];
?>

<head>
    <link rel="stylesheet" href="../css/fullbs5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    nav {
        display: flex;
        height: 70px;
        color: white;
        justify-content: space-between;
    }

    .dashboard-title {
        padding: 25px;
        font-size: 20px;
    }

    .admin_name {
        display: flex;
        margin-right: 15px;
    }

    .name {
        font-size: 16px;
        padding-top: 30px;
    }

    .logout_btn {
        margin-left: 20px;
        margin-top: 20px;
        margin-bottom: 0px;
    }
</style>

<nav class="bg-primary">
    <h2 class="dashboard-title">Admin Dashboard</h2>

    <div class="admin_name">
        <h5 class="name"> <i class="bi bi-person-circle"></i> <?php echo $_SESSION['admin_username']; ?> </h5>
        <p> <a href="" class="btn btn-light logout_btn">Logout</a></p>
    </div>

</nav>

<div class="container">
    <div class="card">
        
    </div>
</div>