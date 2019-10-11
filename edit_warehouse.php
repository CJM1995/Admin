<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>

    <?php

        if (isset($_GET['edit_warehouse'])) {
            $edit_id = $_GET['edit_warehouse'];
            $get_w = "select * from warehouses where warehouse_id='$edit_id'";
            $run_edit = mysqli_query($con, $get_w);
            $row_edit = mysqli_fetch_array($run_edit);
            $w_id = $row_edit['warehouse_id'];
            $warehouse_code = $row_edit['code'];
            $w_o_id = $row_edit['owner_id'];
            $w_cat = $row_edit['sale_type'];
            $w_add = $row_edit['address'];
            $w_city = $row_edit['city'];
            $w_rda = $row_edit['road_access'];
            $w_p_sqft = $row_edit['price_sqft'];
            $w_a_sqft = $row_edit['area_sqft'];
            $w_bays = $row_edit['no_of_bays'];
            $w_rf_height = $row_edit['roof_height'];
            $w_h_unit = $row_edit['roof_height_unit'];
            $w_elec = $row_edit['electricity'];
            $w_water = $row_edit['water'];
            $w_tel = $row_edit['telephone'];
            $w_cctv = $row_edit['cctv'];
            $w_park = $row_edit['container_parking_slots'];
            $w_load = $row_edit['loading_points'];
            $w_40ft = $row_edit['access_40ft'];
            $w_20ft = $row_edit['access_20ft'];
            $w_lunch = $row_edit['lunch_room'];
            $w_office = $row_edit['office_room'];
            $w_w_staff = $row_edit['wash_room_staff'];
            $w_w_labour = $row_edit['wash_room_labour'];
            $w_fans = $row_edit['fans_exhaust'];
            $w_alu_foil = $row_edit['aluminium_foil'];
            $w_rf_mat = $row_edit['roof_material'];
            $w_wl_mat = $row_edit['wall_material'];
            $w_lights = $row_edit['lights'];
            $w_val = $row_edit['value'];
            $w_available = $row_edit['availability'];
            $w_desc = $row_edit['description'];
            $w_image1 = $row_edit['warehouse_img1'];
            $w_image2 = $row_edit['warehouse_img2'];
            $w_image3 = $row_edit['warehouse_img3'];
            $warehouse_creater = $row_edit['creater'];
        }

        $get_o_name = "select * from owners where owner_id='$w_o_id'";
        $run_o_name = mysqli_query($con, $get_o_name);
        $row_o_name = mysqli_fetch_array($run_o_name);
        $o_name = $row_o_name['name'];
        $ow_number = $row_o_name['phone'];

        ?>


    <!DOCTYPE html>

    <html>

    <head>

        <title> Edit Warehouse Details </title>


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

                        <i class="fa fa-dashboard"> </i> Dashboard / Edit Warehouse Details

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

                            <i class="fa fa-building fa-2x fa-fw"></i> Edit Warehouse Details

                        </h3>

                    </div><!-- panel-heading Ends -->

                    <div class="panel-body">
                        <!-- panel-body Starts -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->
                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Warehouse Code </label>
                                <div class="col-md-6">
                                    <input type="text" name="ware_code" class="form-control" placeholder="Ex: W-M-001, W001" value="<?php echo $warehouse_code ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Owner </label>
                                <div class="col-md-6">
                                    <select name="owner_id" class="form-control">
                                        <option value="<?php echo $w_o_id; ?>"> <?php echo $o_name; ?> </option>
                                        <?php
                                            $get_w_ow = "select * from owners";
                                            $run_w_ow = mysqli_query($con, $get_w_ow);
                                            while ($row_w_ow = mysqli_fetch_array($run_w_ow)) {
                                                $w_ow_id = $row_w_ow['owner_id'];
                                                $w_ow_name = $row_w_ow['name'];
                                                echo "<option value='$w_ow_id' >$w_ow_name</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Category </label>
                                <div class="col-md-6">
                                    <select name="warehouse_cat" class="form-control">
                                        <?php
                                            if (strcmp($w_cat, 'Rent') == 0) {
                                                echo "<option value=\"Rent\" selected> Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($w_cat, 'Lease') == 0) {
                                                echo "<option value=\"Lease\" selected> Lease</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Sale\"> Sale</option>";
                                            }
                                            if (strcmp($w_cat, 'Sale') == 0) {
                                                echo "<option value=\"Sale\" selected> Sale</option>";
                                                echo "<option value=\"Rent\"> Rent</option>";
                                                echo "<option value=\"Lease\"> Lease</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Location </label>
                                <div class="col-md-6">
                                    <input type="text" name="warehouse_address" class="form-control" value="<?php echo $w_add ?>" required>
                                    <input style="margin-top: 5px" type="text" name="warehouse_city" class="form-control" value="<?php echo $w_city ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Road Access </label>
                                <div class="col-md-6">
                                    <input type="text" name="road_acc" class="form-control" value="<?php echo $w_rda ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Price per sq. ft </label>
                                <div class="col-md-6">
                                    <input type="number" name="prz_sqft" class="form-control" pattern="^[0.00-9.99]" min="1" placeholder="LKR" value="<?php echo $w_p_sqft ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Area sq. ft </label>
                                <div class="col-md-6">
                                    <input type="number" name="area_sqft" class="form-control" pattern="^[1-9]" min="1" step="1" value="<?php echo $w_a_sqft ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> No. of Landing Bays </label>
                                <div class="col-md-6">
                                    <input type="number" name="no_lbays" class="form-control" pattern="^[1-9]" min="1" step="1" value="<?php echo $w_bays ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Roof Height </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <input type="number" name="roof_height" class="form-control" pattern="^[0.00-9.99]" min="1" value="<?php echo $w_rf_height ?>" required>
                                        </span>
                                        <span class="input-group-btn">
                                            <select name="unit" class="form-control">
                                                <?php
                                                    if (strcmp($w_h_unit, 'FT') == 0) {
                                                        echo "<option value=\"FT\" selected>FT</option>";
                                                        echo "<option value=\"M\">M</option>";
                                                    } else {
                                                        echo "<option value=\"FT\">FT</option>";
                                                        echo "<option value=\"M\" selected>M</option>";
                                                    }
                                                    ?>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Electricity </label>
                                <div class="col-md-6">
                                    <select name="electric" class="form-control">
                                        <?php
                                            if (strcmp($w_elec, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Water </label>
                                <div class="col-md-6">
                                    <select name="water" class="form-control">
                                        <?php
                                            if (strcmp($w_water, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Telephone </label>
                                <div class="col-md-6">
                                    <select name="telephone" class="form-control">
                                        <?php
                                            if (strcmp($w_tel, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> CCTV </label>
                                <div class="col-md-6">
                                    <select name="cctv" class="form-control">
                                        <?php
                                            if (strcmp($w_cctv, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Container Parking Slots </label>
                                <div class="col-md-6">
                                    <input type="number" name="con_park" class="form-control" pattern="^[1-9]" min="1" step="1" value="<?php echo $w_park ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Loading Points </label>
                                <div class="col-md-6">
                                    <input type="text" name="load_points" class="form-control" value="<?php echo $w_load ?>" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> 40 FT Container Access </label>
                                <div class="col-md-6">
                                    <select name="acc_40" class="form-control">
                                        <?php
                                            if (strcmp($w_40ft, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> 20 FT Container Access </label>
                                <div class="col-md-6">
                                    <select name="acc_20" class="form-control">
                                        <?php
                                            if (strcmp($w_20ft, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Lunch Room </label>
                                <div class="col-md-6">
                                    <select name="lunch_rm" class="form-control">
                                        <?php
                                            if (strcmp($w_lunch, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Office Room </label>
                                <div class="col-md-6">
                                    <select name="office_rm" class="form-control">
                                        <?php
                                            if (strcmp($w_office, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Wash Room/s (STAFF) </label>
                                <div class="col-md-6">
                                    <select name="wash_rm_staff" class="form-control">
                                        <?php
                                            if (strcmp($w_w_staff, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Wash Room/s (LABOUR) </label>
                                <div class="col-md-6">
                                    <select name="wash_rm_labour" class="form-control">
                                        <?php
                                            if (strcmp($w_w_labour, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Fans exhaust </label>
                                <div class="col-md-6">
                                    <select name="fans" class="form-control">
                                        <?php
                                            if (strcmp($w_fans, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Aluminium Foil </label>
                                <div class="col-md-6">
                                    <select name="alu_foils" class="form-control">
                                        <?php
                                            if (strcmp($w_alu_foil, 'Yes') == 0) {
                                                echo "<option value=\"Yes\" selected>Yes</option>";
                                                echo "<option value=\"No\">No</option>";
                                            } else {
                                                echo "<option value=\"Yes\">Yes</option>";
                                                echo "<option value=\"No\" selected>No</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Roof Material </label>
                                <div class="col-md-6">
                                    <select name="rf_mat" class="form-control">
                                        <?php
                                            if (strcmp($w_rf_mat, 'Amano') == 0) {
                                                echo "<option value=\"Amano\" selected>Amano</option>";
                                                echo "<option value=\"Asbastos\">Asbastos</option>";
                                            } else {
                                                echo "<option value=\"Amano\">Amano</option>";
                                                echo "<option value=\"Asbastos\" selected>Asbastos</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->
                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Wall Material </label>
                                <div class="col-md-6">
                                    <select name="wall_mat" class="form-control">
                                        <?php
                                            if (strcmp($w_wl_mat, 'Amano') == 0) {
                                                echo "<option value=\"Amano\" selected>Amano</option>";
                                                echo "<option value=\"Bricks\">Bricks</option>";
                                            } else {
                                                echo "<option value=\"Amano\">Amano</option>";
                                                echo "<option value=\"Bricks\" selected>Bricks</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Lights </label>
                                <div class="col-md-6">
                                    <select name="lights" class="form-control">
                                        <?php
                                            if (strcmp($w_lights, 'None') == 0) {
                                                echo "<option value=\"None\" selected>None</option>";
                                                echo "<option value=\"Normal\">Normal</option>";
                                                echo "<option value=\"CFL\">CFL</option>";
                                                echo "<option value=\"Fluorescent(Tube) Lamp\">Fluorescent(Tube) Lamp</option>";
                                                echo "<option value=\"LED\">LED</option>";
                                            } elseif (strcmp($w_lights, 'Normal') == 0) {
                                                echo "<option value=\"None\">None</option>";
                                                echo "<option value=\"Normal\" selected>Normal</option>";
                                                echo "<option value=\"CFL\">CFL</option>";
                                                echo "<option value=\"Fluorescent(Tube) Lamp\">Fluorescent(Tube) Lamp</option>";
                                                echo "<option value=\"LED\">LED</option>";
                                            } elseif (strcmp($w_lights, 'CFL') == 0) {
                                                echo "<option value=\"None\">None</option>";
                                                echo "<option value=\"Normal\">Normal</option>";
                                                echo "<option value=\"CFL\" selected>CFL</option>";
                                                echo "<option value=\"Fluorescent(Tube) Lamp\">Fluorescent(Tube) Lamp</option>";
                                                echo "<option value=\"LED\">LED</option>";
                                            } elseif (strcmp($w_lights, 'LED') == 0) {
                                                echo "<option value=\"None\">None</option>";
                                                echo "<option value=\"Normal\">Normal</option>";
                                                echo "<option value=\"CFL\">CFL</option>";
                                                echo "<option value=\"Fluorescent(Tube) Lamp\">Fluorescent(Tube) Lamp</option>";
                                                echo "<option value=\"LED\" selected>LED</option>";
                                            } else {
                                                echo "<option value=\"None\">None</option>";
                                                echo "<option value=\"Normal\">Normal</option>";
                                                echo "<option value=\"CFL\">CFL</option>";
                                                echo "<option value=\"Fluorescent(Tube) Lamp\" selected>Fluorescent(Tube) Lamp</option>";
                                                echo "<option value=\"LED\">LED</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Warehouse Image 1 </label>
                                <div class="col-md-6">
                                    <input type="file" name="warehouse_img1" class="form-control">
                                    <br>
                                    <img src="warehouse_images/<?php echo $w_image1; ?>" width="70" height="70">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Warehouse Image 2 </label>
                                <div class="col-md-6">
                                    <input type="file" name="warehouse_img2" class="form-control">
                                    <br><img src="warehouse_images/<?php echo $w_image2; ?>" width="70" height="70">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Warehouse Image 3 </label>
                                <div class="col-md-6">
                                    <input type="file" name="warehouse_img3" class="form-control">
                                    <br><img src="warehouse_images/<?php echo $w_image3; ?>" width="70" height="70">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> General Value </label>
                                <div class="col-md-6">
                                    <input type="number" name="g_value" class="form-control" placeholder="LKR (Optional)" pattern="^[0.00-9.99]" min="1" value="<?php echo $w_val; ?>">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Availability </label>
                                <div class="col-md-6">
                                    <select name="ava" class="form-control">
                                        <?php
                                            if (strcmp($w_available, 'Available') == 0) {
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
                                    <input type="text" name="warehouse_creater" class="form-control" title="Will be updated with last editor" value="<?php echo $warehouse_creater ?>" disabled>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Warehouse Description </label>
                                <div class="col-md-6">
                                    <textarea name="warehouse_desc" class="form-control" rows="6" cols="19">
                                    <?php echo $w_desc; ?>
                                </textarea>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <input type="submit" name="update" value="Update Warehouse" class="btn btn-primary form-control">
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
                        <button type="button" class="close" onclick="window.open('index.php?view_warehouses','_self')">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%" class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">Warehouse has been edited successfully!</p>

                    </div>
                    <form method="post">
                        <div style="text-align: center" class="modal-footer text-center center-block">
                            <button type="button" class="btn btn-success" onclick="window.open('index.php?view_warehouses','_self')">OK
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

            $owner_id = $_POST['owner_id'];
            $ware_code = $_POST['ware_code'];
            $warehouse_cat = $_POST['warehouse_cat'];
            $warehouse_address = $_POST['warehouse_address'];
            $warehouse_city = $_POST['warehouse_city'];
            $road_acc = $_POST['road_acc'];
            $prz_sqft = $_POST['prz_sqft'];
            $area_sqft = $_POST['area_sqft'];
            $no_lbays = $_POST['no_lbays'];
            $roof_height = $_POST['roof_height'];
            $unit = $_POST['unit'];
            $electric = $_POST['electric'];
            $water = $_POST['water'];
            $telephone = $_POST['telephone'];
            $cctv = $_POST['cctv'];
            $con_park = $_POST['con_park'];
            $load_points = $_POST['load_points'];
            $acc_40 = $_POST['acc_40'];
            $acc_20 = $_POST['acc_20'];
            $lunch_rm = $_POST['lunch_rm'];
            $office_rm = $_POST['office_rm'];
            $wash_rm_staff = $_POST['wash_rm_staff'];
            $wash_rm_labour = $_POST['wash_rm_labour'];
            $fans = $_POST['fans'];
            $alu_foils = $_POST['alu_foils'];
            $rf_mat = $_POST['rf_mat'];
            $wall_mat = $_POST['wall_mat'];
            $lights = $_POST['lights'];
            $g_value = $_POST['g_value'];
            $ava = $_POST['ava'];
            $warehouse_desc = $_POST['warehouse_desc'];

            $creater = $_SESSION['admin_name'];

            $warehouse_img1 = $_FILES['warehouse_img1']['name'];
            $warehouse_img2 = $_FILES['warehouse_img2']['name'];
            $warehouse_img3 = $_FILES['warehouse_img3']['name'];

            $temp_name1 = $_FILES['warehouse_img1']['tmp_name'];
            $temp_name2 = $_FILES['warehouse_img2']['tmp_name'];
            $temp_name3 = $_FILES['warehouse_img3']['tmp_name'];

            move_uploaded_file($temp_name1, "warehouse_images/$warehouse_img1");
            move_uploaded_file($temp_name2, "warehouse_images/$warehouse_img2");
            move_uploaded_file($temp_name3, "warehouse_images/$warehouse_img3");

            $get_ow = "select name from owners WHERE owner_id='".$ho_owner_id."'";
            $run_ow = mysqli_query($con, $get_ow);
            while ($row_owner = mysqli_fetch_array($run_ow)) {
                $ow_name = $row_owner['name'];
                // echo "<option value='$ow_id'>$ow_name</option>";
            }

            if (($_FILES['warehouse_img1']['name'] == "") && ($_FILES['warehouse_img2']['name'] == "") && ($_FILES['warehouse_img3']['name'] == "")) {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',creater='$creater' where warehouse_id='$w_id'";
            } elseif (($_FILES['warehouse_img1']['name'] == "") && ($_FILES['warehouse_img2']['name'] == "")) {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img3='$warehouse_img3',creater='$creater' where warehouse_id='$w_id'";
            } elseif (($_FILES['warehouse_img1']['name'] == "") && ($_FILES['warehouse_img3']['name'] == "")) {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img2='$warehouse_img2',creater='$creater' where warehouse_id='$w_id'";
            } elseif (($_FILES['warehouse_img2']['name'] == "") && ($_FILES['warehouse_img3']['name'] == "")) {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img1='$warehouse_img1',creater='$creater' where warehouse_id='$w_id'";
            } elseif ($_FILES['warehouse_img3']['name'] == "") {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img1='$warehouse_img1',warehouse_img2='$warehouse_img2',creater='$creater' where warehouse_id='$w_id'";
            } elseif ($_FILES['warehouse_img2']['name'] == "") {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img1='$warehouse_img1',warehouse_img3='$warehouse_img3',creater='$creater' where warehouse_id='$w_id'";
            } elseif ($_FILES['warehouse_img1']['name'] == "") {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img2='$warehouse_img2',warehouse_img3='$warehouse_img3',creater='$creater' where warehouse_id='$w_id'";
            } else {
                $update_warehouse = "update warehouses set owner_id='$owner_id',code='$ware_code',sale_type='$warehouse_cat',address='$warehouse_address',city='$warehouse_city',road_access='$road_acc',price_sqft='$prz_sqft',area_sqft='$area_sqft',no_of_bays='$no_lbays',roof_height='$roof_height',roof_height_unit='$unit',electricity='$electric',water='$water',telephone='$telephone',cctv='$cctv',container_parking_slots='$con_park',loading_points='$load_points',access_40ft='$acc_40',access_20ft='$acc_20',lunch_room='$lunch_rm',office_room='$office_rm',wash_room_staff='$wash_rm_staff',wash_room_labour='$wash_rm_labour',fans_exhaust='$fans',aluminium_foil='$alu_foils',roof_material='$rf_mat',wall_material='$wall_mat',lights='$lights',value='$g_value',description='$warehouse_desc',warehouse_img1='$warehouse_img1',warehouse_img2='$warehouse_img2',warehouse_img3='$warehouse_img3',creater='$creater' where warehouse_id='$w_id'";
            }

            $run_warehouse = mysqli_query($con, $update_warehouse);

            if ($run_warehouse) {

                echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";
            }
        }

        ?>

<?php } ?>