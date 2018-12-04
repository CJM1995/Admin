<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['delete_owner'])) {

        $delete_id = $_GET['delete_owner'];

        $delete_owner = "delete from owners where owner_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_owner);

        if ($run_delete) {

            echo "<script>alert('One Owner Has been deleted')</script>";

            echo "<script>window.open('index.php?view_owners','_self')</script>";

        }

    }

    ?>

<?php } ?>