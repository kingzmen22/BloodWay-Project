<?php
include('../../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <meta charset="utf-8" />
    <title>Search for Donor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/fullbs5.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<style>
    .filter-btn {
        display: flex;
        justify-content: center;

    }

    .btn {
        padding-left: 30px;
        padding-right: 30px;
        background-color: #1976D2;
        color: white;
        border: none;
    }

    .bi-funnel {
        margin-right: 4px;
    }
</style>

<?php
if (isset($_POST['fetchZone'])) {
    if (isset($_POST['fetchBG']) && isset($_POST['fetchZone']) && isset($_POST['fetchCateg'])) {
        $request1 = $_POST['fetchBG'];
        $request2 = $_POST['fetchZone'];
        $request3 = $_POST['fetchCateg'];
        $query = "SELECT * 
        from donor_details 
        where donor_bgrp='$request1'and donor_zone='$request2'and donor_category='$request3'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
    
?>
    <table class="table mt-5 table-dark table-hover table-responsive donors-list">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th>SI No.</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Distirct/Zone</th>
                    <th>Status</th>
                    <th>Contact</th>
                </tr>

            <?php
        } else {
            ?>
                <h3 class="mt-5">
                    <center><?php echo "Sorry! No record found."; ?></center>
                </h3>

            <?php
        }

            ?>
            </thead>
            <tbody>
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
<?php
}
}
?>







<!-- For Blood group dropdown -->
<?php
if (isset($_POST['request1'])) {
    $request = $_POST['request1'];
    $query = "SELECT * from donor_details where donor_bgrp='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <table class="table mt-5 table-dark table-hover table-responsive donors-list">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th>SI No.</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Distirct/Zone</th>
                    <th>Status</th>
                    <th>Contact</th>
                </tr>

            <?php
        } else {
            ?>
                <h3 class="mt-5">
                    <center><?php echo "Sorry! No record found"; ?></center>
                </h3>

            <?php
        }

            ?>
            </thead>
            <tbody>
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
<?php
}
?>


<!-- For Zone dropdown -->
<?php
if (isset($_POST['request2'])) {
    $request = $_POST['request2'];
    $query = "SELECT * from donor_details where donor_zone='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <table class="table mt-5 table-dark table-hover table-responsive donors-list">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th>SI No.</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Distirct/Zone</th>
                    <th>Status</th>
                    <th>Contact</th>
                </tr>

            <?php
        } else {
            ?>
                <h3 class="mt-5">
                    <center><?php echo "Sorry! No record found"; ?></center>
                </h3>
            <?php
        }
            ?>
            </thead>
            <tbody>
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
<?php
}
?>

<!-- For Category dropdown -->
<?php
if (isset($_POST['request3'])) {
    $request = $_POST['request3'];

    $query = "SELECT * from donor_details where donor_category='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <table class="table mt-5 table-dark table-hover table-responsive donors-list">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th>SI No.</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Distirct/Zone</th>
                    <th>Status</th>
                    <th>Contact</th>
                </tr>

            <?php
        } else {
            ?>
                <h3 class="mt-5">
                    <center><?php echo "Sorry! No record found"; ?></center>
                </h3>
            <?php
        }
            ?>
            </thead>
            <tbody>
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
<?php
}
?>