<?php
include('../../includes/connect.php');

// For Blood group dropdown

if (isset($_POST['request1'])) {
    $request = $_POST['request1'];
    // $request="A-";

    $query = "SELECT * from donor_details where donor_bgrp='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
        <meta charset="utf-8" />
        <title>BloodWay Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/fullbs5.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

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
                <h2 class="mt-5">
                    <center><?php echo "Sorry! No record found"; ?></center>
                </h2>

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
    // $request="A-";

    $query = "SELECT * from donor_details where donor_zone='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
        <meta charset="utf-8" />
        <title>BloodWay Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/fullbs5.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

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
            echo "Sorry! No record Found";
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