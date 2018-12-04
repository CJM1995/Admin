<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['edit_house'])) {
        $edit_id = $_GET['edit_house'];
        $get_house = "select * from houses where house_id='$edit_id'";
        $run_house = mysqli_query($con, $get_house);
        $row_house = mysqli_fetch_array($run_house);
        $house_id = $row_house['house_id'];
        $house_code = $row_house['code'];
        $house_o_id = $row_house['owner_id'];
        $house_address = $row_house['address'];
        $house_city = $row_house['city'];
        $house_s_type = $row_house['sale_type'];
        $house_beds = $row_house['bedrooms'];
        $house_ac_beds = $row_house['ac_rooms'];
        $house_baths = $row_house['bathrooms'];
        $house_floor = $row_house['floor'];
        $house_prz = $row_house['base_price'];
        $house_desc = $row_house['description'];
        $house_ava = $row_house['availability'];
        $house_img1 = $row_house['house_img1'];
        $house_img2 = $row_house['house_img2'];
        $house_img3 = $row_house['house_img3'];


        $get_o_name = "select * from owners where owner_id='$house_o_id'";
        $run_o_name = mysqli_query($con, $get_o_name);
        $row_o_name = mysqli_fetch_array($run_o_name);
        $o_name = $row_o_name['name'];
    }


    ?>

    <!DOCTYPE html>

    <html>

    <head>

        <title> Edit Products </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>

    </head>

    <body>

    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit House Details

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-home fa-2x fa-fw"></i> Edit House Details

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> House Code </label>
                            <div class="col-md-6">
                                <input type="text" name="ho_code" class="form-control" placeholder="Ex: H-M-001, H001"
                                       value="<?php echo $house_code ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Owner </label>
                            <div class="col-md-6">
                                <select name="owner_id" class="form-control">
                                    <option value="<?php echo $house_o_id; ?>"> <?php echo $o_name; ?> </option>
                                    <?php
                                    $get_h_ow = "select * from owners";
                                    $run_h_ow = mysqli_query($con, $get_h_ow);
                                    while ($row_h_ow = mysqli_fetch_array($run_h_ow)) {
                                        $h_ow_id = $row_h_ow['owner_id'];
                                        $h_ow_name = $row_h_ow['name'];
                                        echo "<option value='$h_ow_id' >$h_ow_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Location </label>
                            <div class="col-md-6">
                                <input type="text" name="ho_address" class="form-control"
                                       value="<?php echo $house_address ?>" required>
                                <input style="margin-top: 5px" type="text" name="ho_city" class="form-control"
                                       placeholder="City Only" value="<?php echo $house_city ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Sale Type </label>
                            <div class="col-md-6">
                                <select name="ho_s_type" class="form-control">
                                    <?php
                                    if (strcmp($house_s_type, 'Rent') == 0) {
                                        echo "<option value=\"Rent\" selected> Rent</option>";
                                        echo "<option value=\"Lease\"> Lease</option>";
                                        echo "<option value=\"Sale\"> Sale</option>";
                                    }
                                    if (strcmp($house_s_type, 'Lease') == 0) {
                                        echo "<option value=\"Lease\" selected> Lease</option>";
                                        echo "<option value=\"Rent\"> Rent</option>";
                                        echo "<option value=\"Sale\"> Sale</option>";
                                    }
                                    if (strcmp($house_s_type, 'Sale') == 0) {
                                        echo "<option value=\"Sale\" selected> Sale</option>";
                                        echo "<option value=\"Rent\"> Rent</option>";
                                        echo "<option value=\"Lease\"> Lease</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Bedrooms </label>
                            <div class="col-md-6">
                                <input type="number" name="ho_beds" class="form-control" pattern="^[1-9]" min="1"
                                       step="1" value="<?php echo $house_beds ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> A/C Bedrooms </label>
                            <div class="col-md-6">
                                <input type="number" name="ho_ac_beds" class="form-control" pattern="^[0-9]" min="0"
                                       step="1" value="<?php echo $house_ac_beds ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Bathrooms </label>
                            <div class="col-md-6">
                                <input type="number" name="ho_baths" class="form-control" pattern="^[1-9]" min="1"
                                       step="1" value="<?php echo $house_baths ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Floor Material </label>
                            <div class="col-md-6">
                                <input type="text" name="ho_floor" class="form-control" placeholder="Ex: Tile, Granite"
                                       value="<?php echo $house_floor ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Base Price </label>
                            <div class="col-md-6">
                                <input type="number" name="ho_prz" class="form-control" pattern="^[0.00-9.99]" min="1"
                                       step="1" placeholder="LKR" value="<?php echo $house_prz ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Availability </label>
                            <div class="col-md-6">
                                <select name="ho_ava" class="form-control" disabled>
                                    <?php
                                    if (strcmp($house_ava, 'Available') == 0) {
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


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> House Image 1 </label>
                            <div class="col-md-6">
                                <input type="file" name="ho_img1" class="form-control">
                                <br><img src="house_images/<?php echo $house_img1; ?>" width="70" height="70">
                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> House Image 2 </label>
                            <div class="col-md-6">
                                <input type="file" name="ho_img2" class="form-control">
                                <br><img src="house_images/<?php echo $house_img2; ?>" width="70" height="70">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> House Image 3 </label>
                            <div class="col-md-6">
                                <input type="file" name="ho_img3" class="form-control">
                                <br><img src="house_images/<?php echo $house_img3; ?>" width="70" height="70">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> House Description </label>
                            <div class="col-md-6">
                                <textarea name="ho_desc" class="form-control" rows="6" cols="19">
                                    <?php echo $house_desc; ?>
                                </textarea>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="update" value="Update House"
                                       class="btn btn-primary form-control">
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
                    <button type="button" class="close" onclick="window.open('index.php?view_houses','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">House has been edited successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_houses','_self')">OK
                        </button>
                    </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->

    </body>

    </html>

    <?php

    if (isset($_POST['update'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        $ho_code = $_POST['ho_code'];
        $ho_owner_id = $_POST['owner_id'];
        $ho_address = $_POST['ho_address'];
        $ho_city = $_POST['ho_city'];
        $ho_s_type = $_POST['ho_s_type'];
        $ho_beds = $_POST['ho_beds'];
        $ho_ac_beds = $_POST['ho_ac_beds'];
        $ho_baths = $_POST['ho_baths'];
        $ho_floor = $_POST['ho_floor'];
        $ho_prz = $_POST['ho_prz'];
        $ho_desc = $_POST['ho_desc'];

        $ho_img1 = $_FILES['ho_img1']['name'];
        $ho_img2 = $_FILES['ho_img2']['name'];
        $ho_img3 = $_FILES['ho_img3']['name'];

        $temp_name1 = $_FILES['ho_img1']['tmp_name'];
        $temp_name2 = $_FILES['ho_img2']['tmp_name'];
        $temp_name3 = $_FILES['ho_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "house_images/$ho_img1");
        move_uploaded_file($temp_name2, "house_images/$ho_img2");
        move_uploaded_file($temp_name3, "house_images/$ho_img3");

        if(($_FILES['ho_img1']['name'] == "")&&($_FILES['ho_img2']['name'] == "")&&($_FILES['ho_img3']['name'] == "")) {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc' where house_id='$house_id'";
        }
        elseif (($_FILES['ho_img1']['name'] == "")&&($_FILES['ho_img2']['name'] == "")) {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc',house_img3='$ho_img3' where house_id='$house_id'";
        }
        elseif (($_FILES['ho_img1']['name'] == "")&&($_FILES['ho_img3']['name'] == "")) {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc',house_img2='$ho_img2' where house_id='$house_id'";
        }
        elseif (($_FILES['ho_img2']['name'] == "")&&($_FILES['ho_img3']['name'] == "")) {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc',house_img1='$ho_img1' where house_id='$house_id'";
        }
        elseif ($_FILES['ho_img3']['name'] == "") {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc',house_img1='$ho_img1',house_img2='$ho_img2' where house_id='$house_id'";
        }
        elseif ($_FILES['ho_img2']['name'] == "") {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc', house_img1='$ho_img1',house_img3='$ho_img3' where house_id='$house_id'";
        }
        elseif ($_FILES['ho_img1']['name'] == "") {
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$ho_desc', house_img2='$ho_img2', house_img3='$ho_img3' where house_id='$house_id'";
        }
        else{
            $update_house = "update houses set code='$ho_code',owner_id='$ho_owner_id', address='$ho_address', city='$ho_city', sale_type='$ho_s_type', bedrooms='$ho_beds', ac_rooms='$ho_ac_beds', bathrooms='$ho_baths', floor='$ho_floor', base_price='$ho_prz', description='$',house_img1='$ho_img1', house_img2='$ho_img2', house_img3='$ho_img3' where house_id='$house_id'";
        }


        $run_house = mysqli_query($con, $update_house);

        if ($run_house) {

            echo "<script type=\"text/javascript\">
                    $('#suModal').modal('show');
                  </script>";

        }

    }


    ?>


<?php } ?>