<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>
    <!DOCTYPE html>

    <html>

    <head>

        <title> Insert Land Needed </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>

    </head>

    <body>

        <div class="row">
            <!-- row Starts -->

            <div class="col-lg-12">
                <!-- col-lg-12 Starts -->

                <ol class="breadcrumb">
                    <!-- breadcrumb Starts -->

                    <li class="active">

                        <i class="fa fa-dashboard"> </i> Dashboard / Insert Land Needed

                    </li>

                </ol><!-- breadcrumb Ends -->

            </div><!-- col-lg-12 Ends -->

        </div><!-- row Ends -->


        <div class="row">
            <!-- 2 row Starts -->

            <div class="col-lg-12">
                <!-- col-lg-12 Starts -->

                <div class="panel panel-default">
                    <!-- panel panel-default Starts -->

                    <div class="panel-heading">
                        <!-- panel-heading Starts -->

                        <h3 class="panel-title">

                            <i class="fa fa-map-signs fa-2x fa-fx"></i> Insert Land Needed

                        </h3>

                    </div><!-- panel-heading Ends -->

                    <div class="panel-body">
                        <!-- panel-body Starts -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Customer Name </label>
                                <div class="col-md-6">
                                    <input type="text" name="l_need_cus_name" class="form-control" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label">Phone Number </label>
                                <div class="col-md-6">
                                    <!-- col-md-6 Starts -->
                                    <input name="l_need_cus_number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="0" maxlength="10" placeholder="Ex: 0123456789" required />
                                </div><!-- col-md-6 Ends -->
                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Sale Type </label>

                                <div class="col-md-6">

                                    <select name="l_need_sale_type" class="form-control" required>

                                        <option> Select Sale Type</option>
                                        <option value="Rent"> Rent</option>
                                        <option value="Lease"> Lease</option>
                                        <option value="Sale"> Sale</option>

                                    </select>

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Location - City </label>

                                <div class="col-md-6">
                                    <input type="text" name="l_need_city" class="form-control" required>
                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Land Size </label>

                                <div class="col-md-6">

                                    <input type="number" name="l_need_land_qty" class="form-control" pattern="^[0.00-9.99]" step="0.01" min="1.00" required>

                                </div>

                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Perch Price </label>

                                <div class="col-md-6">

                                    <input type="number" name="l_need_max_per_price" class="form-control" placeholder="LKR" pattern="^[0.00-9.99]" step="0.01" min="1.00">

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Total Price</label>

                                <div class="col-md-6">

                                    <input type="number" name="l_need_tot_price" class="form-control" placeholder="LKR" pattern="^[0.00-9.99]" step="0.01" min="1.00">

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Status </label>

                                <div class="col-md-6">
                                    <select name="l_need_status" class="form-control" disabled>
                                        <option value="Pending" selected> Pending</option>
                                        <option value="On-hold"> On-hold</option>
                                        <option value="Completed"> Completed</option>
                                    </select>

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"> Land Description </label>

                                <div class="col-md-6">

                                    <textarea name="l_need_desc" class="form-control" rows="6" cols="19"></textarea>

                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">

                                    <input type="submit" name="submit" value="Insert Land Needed" class="btn btn-primary form-control">

                                </div>

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
                        <p style="font-size: 110%" class="text-center">Needed Property has been inserted successfully!</p>

                    </div>
                    <form method="post">
                        <div style="text-align: center" class="modal-footer text-center center-block">
                            <button type="button" class="btn btn-success" onclick="window.open('index.php?view_land_needed','_self')">OK
                            </button>
                        </div>
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

        if (isset($_POST['submit'])) {
            echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
            echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
            echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
            echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

            echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

            $l_need_cus_name = $_POST['l_need_cus_name'];
            $l_need_cus_number = $_POST['l_need_cus_number'];
            $l_need_sale_type = $_POST['l_need_sale_type'];
            $l_need_city = $_POST['l_need_city'];
            $l_need_land_qty = $_POST['l_need_land_qty'];
            $l_need_max_per_price = $_POST['l_need_max_per_price'];
            $l_need_tot_price = $_POST['l_need_tot_price'];
            $l_need_status = 'Pending';
            $l_need_desc = $_POST['l_need_desc'];

            $creater = $_SESSION['admin_name'];

            $chk_customer = "select * from customersn WHERE name='" . $l_need_cus_name . "'";
            // $chk_owner = "select * from owners WHERE name='".$hou_owner_name."' AND phone='".$ho_owner_number."'";
            $run_chk_customer = mysqli_query($con, $chk_customer);
            $customer_count = mysqli_num_rows($run_chk_customer);
            echo ("<script>console.log('count :" . $customer_count . "');</script>");
            // echo ("<script>console.log('owner id: " . $run_chk_owner . "');</script>");
            if ($customer_count < 1) {
                $insert_customer = "insert into customersn (name,phone) values ('$l_need_cus_name','$l_need_cus_number')";
                $run_customer = mysqli_query($con, $insert_customer);
            }

            $get_customer = "select cus_id from customersn WHERE name='" . $l_need_cus_name . "'";
            $run_customer = mysqli_query($con, $get_customer);
            while ($row_customer = mysqli_fetch_array($run_customer)) {
                $cus_id = $row_customer['cus_id'];
                $cus_name = $row_customer['name'];
                // echo "<option value='$ow_id'>$ow_name</option>";
            }

            $insert_land = "INSERT INTO land_needs(cus_id, sale_type, city, qty, perch_price, tot_price, description, need_status, creater) VALUES ('$cus_id','$l_need_sale_type','$l_need_city','$l_need_land_qty','$l_need_max_per_price','$l_need_tot_price','$l_need_desc','$l_need_status', '$creater')";


            $run_land = mysqli_query($con, $insert_land);

            if ($run_land) {

                echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";
            }
        }

        ?>

<?php } ?>