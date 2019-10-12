<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>

    <?php

        if (isset($_GET['edit_land_needed'])) {
            $edit_id = $_GET['edit_land_needed'];
            $get_land_need = "select * from land_needs where lnd_need_id='$edit_id'";
            $run_land_need = mysqli_query($con, $get_land_need);
            $row_land_need = mysqli_fetch_array($run_land_need);
            $l_need_id = $row_land_need['lnd_need_id'];
            $l_need_cus_id = $row_land_need['cus_id'];
            $l_need_city = $row_land_need['city'];
            $l_need_s_type = $row_land_need['sale_type'];
            $l_land_qty = $row_land_need['qty'];
            $l_need_perch_price = $row_land_need['perch_price'];
            $l_need_tot_price = $row_land_need['tot_price'];
            $l_need_desc = $row_land_need['description'];
            $l_need_status = $row_land_need['need_status'];
            $l_need_creater = $row_land_need['creater'];


            $get_cus_name = "select * from customersn where cus_id='$l_need_cus_id'";
            $run_cus_name = mysqli_query($con, $get_cus_name);
            $row_cus_name = mysqli_fetch_array($run_cus_name);
            $cus_name = $row_cus_name['name'];
            $cus_number = $row_cus_name['phone'];
        }


        ?>

    <!DOCTYPE html>

    <html>

    <head>

        <title> Edit Needed House</title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>

    </head>

    <body>

        <div class="row">
            <!-- 1  row Starts -->

            <div class="col-lg-12">
                <!-- col-lg-12 Starts -->

                <ol class="breadcrumb">
                    <!-- breadcrumb Starts -->

                    <li class="active">

                        <i class="fa fa-dashboard"></i> Dashboard / Edit Needed Land Details

                    </li>


                </ol><!-- breadcrumb Ends -->

            </div><!-- col-lg-12 Ends -->

        </div><!-- 1  row Ends -->

        <div class="row">
            <!-- 2 row Starts -->

            <div class="col-lg-12">
                <!-- col-lg-12 Starts -->

                <div class="panel panel-default">
                    <!-- panel panel-default Starts -->

                    <div class="panel-heading">
                        <!-- panel-heading Starts -->

                        <h3 class="panel-title">

                            <i class="fa fa-map-signs fa-2x fa-fw"></i> Edit Needed Land Details

                        </h3>


                    </div><!-- panel-heading Ends -->


                    <div class="panel-body">
                        <!-- panel-body Starts -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->

                            <!-- form-group Starts -->
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Customer </label>
                                <div class="col-md-6">
                                    <select name="customer_id" class="form-control">
                                        <option value="<?php echo $l_need_cus_id; ?>"><?php echo $cus_name; ?> </option>
                                        <?php
                                            $get_l_cus = "SELECT * FROM customersn WHERE cus_id != '" . $l_need_cus_id . "'";
                                            $run_l_cus = mysqli_query($con, $get_l_cus);
                                            while ($row_l_cus = mysqli_fetch_array($run_l_cus)) {
                                                $l_cus_id = $row_l_cus['cus_id'];
                                                $l_cus_name = $row_l_cus['name'];
                                                echo "<option value='$l_cus_id' >$l_cus_name</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Location - City </label>
                                <div class="col-md-6">
                                    <input type="text" name="l_need_city" class="form-control" placeholder="City Only" value="<?php echo $l_need_city ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Sale Type </label>
                                <div class="col-md-6">
                                    <select name="l_need_s_type" class="form-control">
                                        <?php
                                            if (strcmp($l_need_s_type, 'Rent') == 0) {
                                                echo "<option value=\"Rent\" selected>Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($l_need_s_type, 'Lease') == 0) {
                                                echo "<option value=\"Lease\" selected>Lease</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($l_need_s_type, 'Sale') == 0) {
                                                echo "<option value=\"Sale\" selected>Sale</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Land Size </label>

                                <div class="col-md-6">

                                    <input type="number" name="l_land_qty" class="form-control" pattern="^[1-9]" min="1" step="1" value="<?php echo $l_land_qty ?>" required>

                                </div>

                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Perch Price </label>

                                <div class="col-md-6">

                                    <input type="number" name="l_need_perch_price" class="form-control" placeholder="LKR" pattern="^[0.00-9.99]" min="0" value="<?php echo $l_need_perch_price ?>">

                                </div>

                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Total Price</label>

                                <div class="col-md-6">

                                    <input type="number" name="l_need_tot_price" class="form-control" placeholder="LKR" pattern="^[0.00-9.99]" min="0" value="<?php echo $l_need_tot_price ?>">

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Status </label>

                                <div class="col-md-6">
                                    <select name="l_need_status" class="form-control">
                                        <?php
                                            if (strcmp($l_need_status, 'Pending') == 0) {
                                                echo "<option value=\"Pending\" selected> Pending</option>";
                                                echo "<option value=\"On-hold\"> On-hold</option>";
                                                echo "<option value=\"Completed\"> Completed</option>";
                                            }
                                            if (strcmp($l_need_status, 'On-hold') == 0) {
                                                echo "<option value=\"On-hold\" selected> On-hold</option>";
                                                echo "<option value=\"Pending\"> Pending</option>";
                                                echo "<option value=\"Completed\"> Completed</option>";
                                            }
                                            if (strcmp($l_need_status, 'Completed') == 0) {
                                                echo "<option value=\"Completed\" selected> Completed</option>";
                                                echo "<option value=\"Pending\"> Pending</option>";
                                                echo "<option value=\"On-hold\"> On-hold</option>";
                                            }
                                            ?>
                                    </select>

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Creater </label>
                                <div class="col-md-6">
                                    <input type="text" name="l_need_creater" class="form-control" title="Will be updated with last editor" value="<?php echo $l_need_creater ?>" disabled>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Extra Details </label>
                                <div class="col-md-6">
                                    <textarea name="l_need_desc" class="form-control" rows="6" cols="19">
                                    <?php echo $l_need_desc; ?>
                                </textarea>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <!-- col-md-6 Starts -->
                                    <input type="submit" name="update" value="Update Record" class="btn btn-primary form-control">
                                </div><!-- col-md-6 Ends -->
                            </div><!-- form-group Ends -->


                        </form><!-- form-horizontal Ends -->

                    </div><!-- panel-body Ends -->

                </div><!-- panel panel-default Ends -->

            </div><!-- col-lg-12 Ends -->


        </div><!-- 2 row Ends -->

        <!-- Success Modal -->
        <div class="modal fade" id="suModal" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="window.open('index.php?view_land_needed','_self')">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%" class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">Record has been edited successfully!</p>

                    </div>
                    <form method="post">
                        <div style="text-align: center" class="modal-footer text-center center-block">
                            <button type="button" class="btn btn-success" onclick="window.open('index.php?view_land_needed','_self')">OK
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Success Modal -->

        <!--Loading-->
        <div class="modal load-modal" id="loadingModal" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="container"></div>
                    <div class="modal-body text-center center-block">
                        <i style="font-size: 800%" class="fa fa-spinner fa-pulse fa-5x"></i>
                        <br><br>
                        <h4 class="text-center load-text">Please wait...</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--Loading-->

    </body>

    </html>

    <?php

        if (isset($_POST['update'])) {

            echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
            echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
            echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
            echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

            echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

            $l_n_cus_id = $_POST['customer_id'];
            $l_n_city = $_POST['l_need_city'];
            $l_n_s_type = $_POST['l_need_s_type'];
            $l_n_land_size = $_POST['l_land_qty'];
            $l_n_perch_price = $_POST['l_need_perch_price'];
            $l_n_tot_price = $_POST['l_need_tot_price'];
            $l_n_desc = $_POST['l_need_desc'];
            $l_n_status = $_POST['l_need_status'];

            $creater = $_SESSION['admin_name'];

            $get_cus_l_n = "SELECT name FROM customersn WHERE cus_id='" . $l_n_cus_id . "'";
            $run_cus_l_N = mysqli_query($con, $get_cus_l_n);
            while ($row_customer_l_n = mysqli_fetch_array($run_cus_l_N)) {
                $cus_name_l_n = $row_customer_l_n['name'];
                // echo "<option value='$ow_id'>$ow_name</option>";
            }

            $update_l_need = "UPDATE land_needs SET cus_id='$l_n_cus_id', city='$l_n_city', sale_type='$l_n_s_type', qty='$l_n_land_size', perch_price='$l_n_perch_price', tot_price='$l_n_tot_price', description='$l_n_desc', need_status='$l_n_status', creater='$creater' where lnd_need_id='$l_need_id'";

            $run_l_need = mysqli_query($con, $update_l_need);

            if ($run_l_need) {

                echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";
            }
        }


        ?>


<?php } ?>