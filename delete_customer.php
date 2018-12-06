<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
    echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
    echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
    echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
    echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

    ?>

    <?php
    if (isset($_GET['delete_customer'])) {
        $delete_id = $_GET['delete_customer'];
    }
    ?>

    <?php echo "<script type=\"text/javascript\">
        $(window).load(function(){
            $('#myModal').modal('show');
        });
        </script>"; ?>

    <!-- Delete Modal -->
    <div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="window.open('index.php?view_customers','_self')">
                            &times;
                        </button>
                        <h2 class="modal-title text-center text-danger">Are you sure?</h2>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%"
                           class="text-center text-danger center-block fa fa-times-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">Do you really want to delete this record? This
                            process cannot be undone.</p>
                        <input name="del_id" type="hidden" value="<?php echo $delete_id ?>">

                    </div>
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <input type="submit" name="close" value="Close"
                               class="btn btn-default" onclick="window.open('index.php?view_customers','_self')">
                        <input type="submit" name="delete" value="Delete"
                               class="btn btn-danger" onclick=$('#myModal').modal('hide');>
                        <!--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>-->

                    </div>
                </div>
        </div>
    </div>
    <!-- Delete Modal -->


    <!-- Success Modal -->
    <div class="modal fade" id="suModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Record has been deleted!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <input type="submit" name="ok" value="OK"
                               class="btn btn-success">
                    </div>
            </div>

        </div>
        </form>
    </div>
    <!-- Success Modal -->

    <!-- Warning Modal -->
    <div class="modal fade" id="waModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-warning center-block fa fa-exclamation-circle fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">This operation is not possible because there are purchase records from this customer.</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <input type="submit" name="no" value="OK"
                               class="btn btn-warning">
                    </div>
            </div>

        </div>
        </form>
    </div>
    <!-- Warning Modal -->

    <?php

    if (isset($_POST['delete'])) {
        $del_id = $_POST['del_id'];

        $result_lp = mysqli_query($con, "SELECT COUNT(lp_id) AS lp_count FROM land_purchases WHERE cus_id='$del_id'");
        $row = mysqli_fetch_array($result_lp);
        $lp_count = $row['lp_count'];

        $result_wp = mysqli_query($con, "SELECT COUNT(wp_id) AS wp_count FROM warehouse_purchases WHERE cus_id='$del_id'");
        $row = mysqli_fetch_array($result_wp);
        $wp_count = $row['wp_count'];

        $result_hp = mysqli_query($con, "SELECT COUNT(hp_id) AS hp_count FROM house_purchases WHERE cus_id='$del_id'");
        $row = mysqli_fetch_array($result_hp);
        $hp_count = $row['hp_count'];

        $delete_customer = "delete from customersn where cus_id='$del_id'";

        if($lp_count==0 && $wp_count==0 && $hp_count==0){
            $run_delete = mysqli_query($con, $delete_customer);
        }
        else{
            echo "<script type=\"text/javascript\">
            $(window).load(function(){
                $('#myModal').modal('hide');
            });

            $('#waModal').modal('show');
        </script>";
        }
        //$run_delete = mysqli_query($con, $delete_house);
        if ($run_delete) {

            echo "<script type=\"text/javascript\">
            $(window).load(function(){
                $('#myModal').modal('hide');
            });

            $('#suModal').modal('show');
        </script>";
        }
    }
    if (isset($_POST['ok'])) {
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }

    if (isset($_POST['close'])) {
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }

    if (isset($_POST['no'])) {
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
    ?>


<?php } ?>