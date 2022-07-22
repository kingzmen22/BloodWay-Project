<?php
include('../../includes/connect.php');

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    // $request="A-";

    $query = "SELECT * from donor_details where donor_bgrp='$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title>BloodWay Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/fullbs5.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <table class="table">
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