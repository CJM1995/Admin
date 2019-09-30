<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>

    <?php

        if (isset($_GET['edit_land'])) {
            $edit_id = $_GET['edit_land'];
            $get_land = "select * from lands where land_id='$edit_id'";
            $run_land = mysqli_query($con, $get_land);
            $row_land = mysqli_fetch_array($run_land);
            $land_id = $row_land['land_id'];
            $land_code = $row_land['code'];
            $land_o_id = $row_land['owner_id'];
            $land_address = $row_land['address'];
            $land_city = $row_land['city'];
            $land_s_type = $row_land['sale_type'];
            $land_t_qty = $row_land['total_qty'];
            $land_a_qty = $row_land['available_qty'];
            $land_prz = $row_land['perch_prz'];
            $land_desc = $row_land['description'];
            $land_ava = $row_land['availability'];
            $land_img1 = $row_land['land_img1'];
            $land_img2 = $row_land['land_img2'];
            $land_img3 = $row_land['land_img3'];
            $land_creater = $row_house['creater'];


            $get_o_name = "select * from owners where owner_id='$land_o_id'";
            $run_o_name = mysqli_query($con, $get_o_name);
            $row_o_name = mysqli_fetch_array($run_o_name);
            $o_name = $row_o_name['name'];

            $pre_not_available = (float) $land_t_qty - (float) $land_a_qty;
        }


        ?>

    <!DOCTYPE html>

    <html>

    <head>

        <title> Edit Products </title>


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

                        <i class="fa fa-dashboard"></i> Dashboard / Edit Land Details

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

                            <i class="fa fa-map-signs fa-2x fa-fw"></i> Edit Land Details

                        </h3>


                    </div><!-- panel-heading Ends -->


                    <div class="panel-body">
                        <!-- panel-body Starts -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Land Code </label>
                                <div class="col-md-6">
                                    <input type="text" name="land_code" class="form-control" placeholder="Ex: H-M-001, H001" value="<?php echo $land_code ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Owner </label>
                                <div class="col-md-6">
                                    <select name="owner_id" class="form-control">
                                        <option value="<?php echo $land_o_id; ?>"> <?php echo $o_name; ?> </option>
                                        <?php
                                            $get_l_ow = "select * from owners";
                                            $run_l_ow = mysqli_query($con, $get_l_ow);
                                            while ($row_l_ow = mysqli_fetch_array($run_l_ow)) {
                                                $l_ow_id = $row_l_ow['owner_id'];
                                                $l_ow_name = $row_l_ow['name'];
                                                echo "<option value='$l_ow_id' >$l_ow_name</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Location </label>
                                <div class="col-md-6">
                                    <input type="text" name="land_address" class="form-control" value="<?php echo $land_address ?>" required>
                                    <input style="margin-top: 5px" type="text" name="land_city" class="form-control" placeholder="City Only" value="<?php echo $land_city ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Sale Type </label>
                                <div class="col-md-6">
                                    <select name="land_s_type" class="form-control">
                                        <?php
                                            if (strcmp($land_s_type, 'Rent') == 0) {
                                                echo "<option value=\"Rent\" selected> Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($land_s_type, 'Lease') == 0) {
                                                echo "<option value=\"Lease\" selected> Lease</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($land_s_type, 'Sale') == 0) {
                                                echo "<option value=\"Sale\" selected> Sale</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <?php
                                if (strcmp($land_ava, 'Available') == 0) {
                                    echo "<div class=\"form-group\"><!-- form-group Starts -->
                                    <label class=\"col-md-3 control-label\"> Total Qty. </label>
                                    <div class=\"col-md-6\">
                                        <input type=\"number\" name=\"land_t_qty\" class=\"form-control\" pattern=\"^[1.0-9.9]\" min=\"$pre_not_available\"
                                       step=\"1\" value=\"$land_t_qty\" data-tippy='This value cannot be less than $pre_not_available' data-tippy-arrow=\"true\" data-tippy-size=\"large\">
                                    </div>
                                  </div><!-- form-group Ends -->";

                                    echo "<div class=\"form-group\"><!-- form-group Starts -->
                                    <label class=\"col-md-3 control-label\"> Available Qty. </label>
                                    <div class=\"col-md-6\">
                                        <input type=\"number\" name=\"land_a_qty\" class=\"form-control\" pattern=\"^[1.0-9.9]\" min=\"0\"
                                       step=\"1\" value=\"$land_a_qty\" data-tippy='This will be auto updated' data-tippy-arrow=\"true\" data-tippy-size=\"large\">
                                    </div>
                                  </div><!-- form-group Ends -->";
                                }
                                ?>

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Perch Price </label>
                                <div class="col-md-6">
                                    <input type="number" name="land_prz" class="form-control" pattern="^[0.00-9.99]" min="1" step="1" placeholder="LKR" value="<?php echo $land_prz ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Availability </label>
                                <div class="col-md-6">
                                    <select name="land_ava" class="form-control">
                                        <?php
                                            if (strcmp($land_ava, 'Available') == 0) {
                                                echo "<option value=\"Available\" selected>Available</option>";
                                                echo "<option value=\"Not - available\">Not - available</option>";
                                            } else {
                                                echo "<option value=\"Available\">Available</option>";
                                                echo "<option value=\"Not - available\" selected>Not - available</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Creater </label>
                                <div class="col-md-6">
                                    <input type="text" name="land_creater" class="form-control" title="Will be updated with last editor" value="<?php echo $house_creater ?>" disabled>
                                </div>
                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Land Image 1 </label>
                                <div class="col-md-6">
                                    <input type="file" name="land_img1" class="form-control">
                                    <br><img src="land_images/<?php echo $land_img1; ?>" width="70" height="70">
                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Land Image 2 </label>
                                <div class="col-md-6">
                                    <input type="file" name="land_img2" class="form-control">
                                    <br><img src="land_images/<?php echo $land_img2; ?>" width="70" height="70">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Land Image 3 </label>
                                <div class="col-md-6">
                                    <input type="file" name="land_img3" class="form-control">
                                    <br><img src="land_images/<?php echo $land_img3; ?>" width="70" height="70">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Land Description </label>
                                <div class="col-md-6">
                                    <textarea name="land_desc" class="form-control" rows="6" cols="19">
                                    <?php echo $land_desc; ?>
                                </textarea>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <!-- col-md-6 Starts -->
                                    <input type="submit" name="update" value="Update Land" class="btn btn-primary form-control">
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
                        <button type="button" class="close" onclick="window.open('index.php?view_lands','_self')">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%" class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">Land has been edited successfully!</p>

                    </div>
                    <form method="post">
                        <div style="text-align: center" class="modal-footer text-center center-block">
                            <button type="button" class="btn btn-success" onclick="window.open('index.php?view_lands','_self')">OK
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

        if (isset($_POST['update'])) {
            echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
            echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
            echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
            echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

            echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

            $ld_code = $_POST['land_code'];
            $ld_owner_id = $_POST['owner_id'];
            $ld_address = $_POST['land_address'];
            $ld_city = $_POST['land_city'];
            $ld_s_type = $_POST['land_s_type'];
            $ld_t_qty = $_POST['land_t_qty'];
            $ld_a_qty = $_POST['land_a_qty'];
            $ld_prz = $_POST['land_prz'];
            $ld_desc = $_POST['land_desc'];

            $creater = $_SESSION['admin_name'];
            // echo "<script> alert('creater $creater !') </script>";

            $ld_img1 = $_FILES['land_img1']['name'];
            $ld_img2 = $_FILES['land_img2']['name'];
            $ld_img3 = $_FILES['land_img3']['name'];

            $temp_name1 = $_FILES['land_img1']['tmp_name'];
            $temp_name2 = $_FILES['land_img2']['tmp_name'];
            $temp_name3 = $_FILES['land_img3']['tmp_name'];

            move_uploaded_file($temp_name1, "land_images/$ld_img1");
            move_uploaded_file($temp_name2, "land_images/$ld_img2");
            move_uploaded_file($temp_name3, "land_images/$ld_img3");

            $tot_prz = (float) $ld_t_qty * (float) $ld_prz;

            if (strcmp($land_ava, 'Available') == 0) {
                $pre_total = (float) $land_t_qty;
                $pre_ava = (float) $land_a_qty;
                $pre_not_ava = $pre_total - $pre_ava;
                $n_total = $ld_t_qty;

                if (($ld_t_qty > $ld_a_qty) || ($ld_t_qty == $ld_a_qty)) {
                    if (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img2']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img2']['name'] == "")) {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc',land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc',land_img2='$ld_img2', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif (($_FILES['$ld_img2']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc',land_img1='$ld_img1', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif ($_FILES['$ld_img3']['name'] == "") {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc',land_img1='$ld_img1',land_img2='$ld_img2', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif ($_FILES['$ld_img2']['name'] == "") {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1',land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } elseif ($_FILES['$ld_img1']['name'] == "") {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc', land_img2='$ld_img2', land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    } else {
                        $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', total_qty='$n_total', available_qty='$ld_a_qty',  perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1', land_img2='$ld_img2', land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                    }

                    $run_land = mysqli_query($con, $update_land);

                    if ($run_land) {
                        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";
                    }
                } else {
                    echo "<script> alert('This value cannot be more than $n_total(Total Quantity)!') </script>";
                    echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                  </script>";
                }
            } else {
                if (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img2']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', total_price='$tot_prz', creater='$creater' where land_id='$house_id'";
                } elseif (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img2']['name'] == "")) {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } elseif (($_FILES['$ld_img1']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img2='$ld_img2', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } elseif (($_FILES['$ld_img2']['name'] == "") && ($_FILES['$ld_img3']['name'] == "")) {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } elseif ($_FILES['$ld_img3']['name'] == "") {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1',land_img2='$ld_img2', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } elseif ($_FILES['$ld_img2']['name'] == "") {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1',land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } elseif ($_FILES['$ld_img1']['name'] == "") {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img2='$ld_img2', land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                } else {
                    $update_land = "update lands set code='$ld_code',owner_id='$ld_owner_id', address='$ld_address', city='$ld_city', sale_type='$ld_s_type', perch_prz='$ld_prz', description='$ld_desc', land_img1='$ld_img1', land_img2='$ld_img2', land_img3='$ld_img3', total_price='$tot_prz', creater='$creater' where land_id='$land_id'";
                }


                $run_land = mysqli_query($con, $update_land);

                if ($run_land) {
                    echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";
                }
            }
        }


        ?>


<?php } ?>