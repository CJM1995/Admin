<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>
    <!DOCTYPE html>

    <html>

    <head>

        <title> Insert Warehouse </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>

    </head>

    <body>

    <div class="row"><!-- row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Dashboard / Insert Warehouse

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-building fa-2x fa-fx"></i> Insert Warehouses

                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Warehouse Code </label>
                            <div class="col-md-6">
                                <input type="text" name="warehouse_code" class="form-control" placeholder="Ex: W-M-001, W001"
                                       required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Owner </label>
                            <div class="col-md-6">
                                <select name="owner_id" class="form-control">
                                    <option> Select a Owner</option>
                                    <?php
                                    $get_ow = "select * from owners";
                                    $run_ow = mysqli_query($con, $get_ow);
                                    while ($row_owner = mysqli_fetch_array($run_ow)) {
                                        $ow_id = $row_owner['owner_id'];
                                        $ow_name = $row_owner['name'];
                                        echo "<option value='$ow_id'>$ow_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Category </label>

                            <div class="col-md-6">

                                <select name="warehouse_cat" class="form-control">

                                    <option> Select a Warehouse Category</option>
                                    <option value="Rent"> Rent</option>
                                    <option value="Lease"> Lease</option>
                                    <option value="Sale"> Sale</option>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Location </label>

                            <div class="col-md-6">

                                <input type="text" name="warehouse_address" class="form-control"
                                       placeholder="Address without city" required>
                                <input style="margin-top: 5px" type="text" name="warehouse_city" class="form-control"
                                       placeholder="Enter only the City" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Road Access </label>

                            <div class="col-md-6">

                                <input type="text" name="road_acc" class="form-control" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Price per sq. ft </label>

                            <div class="col-md-6">

                                <input type="number" name="prz_sqft" class="form-control" pattern="^[0.00-9.99]" min="1"
                                       placeholder="LKR" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Area sq. ft </label>

                            <div class="col-md-6">

                                <input type="number" name="area_sqft" class="form-control" pattern="^[1-9]" min="1"
                                       step="1" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> No. of Landing Bays </label>

                            <div class="col-md-6">

                                <input type="number" name="no_lbays" class="form-control" pattern="^[1-9]" min="1"
                                       step="1" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Roof Height </label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <input type="number" name="roof_height" class="form-control"
                                               pattern="^[0.00-9.99]" min="1" required>
                                    </span>
                                    <span class="input-group-btn">
                                        <select name="unit" class="form-control">
                                            <option value="FT" selected>FT</option>
                                            <option value="M">M</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Electricity </label>

                            <div class="col-md-6">

                                <select name="electric" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Water </label>

                            <div class="col-md-6">

                                <select name="water" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Telephone </label>

                            <div class="col-md-6">

                                <select name="telephone" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> CCTV </label>

                            <div class="col-md-6">

                                <select name="cctv" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Container Parking Slots </label>

                            <div class="col-md-6">

                                <input type="number" name="con_park" class="form-control" pattern="^[1-9]" min="1"
                                       step="1" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Loading Points </label>

                            <div class="col-md-6">

                                <input type="text" name="load_points" class="form-control" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> 40 FT Container Access </label>

                            <div class="col-md-6">

                                <select name="acc_40" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> 20 FT Container Access </label>

                            <div class="col-md-6">

                                <select name="acc_20" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Lunch Room </label>

                            <div class="col-md-6">

                                <select name="lunch_rm" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Office Room </label>

                            <div class="col-md-6">

                                <select name="office_rm" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Wash Room/s (STAFF) </label>

                            <div class="col-md-6">

                                <select name="wash_rm_staff" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Wash Room/s (LABOUR) </label>

                            <div class="col-md-6">

                                <select name="wash_rm_labour" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Fans exhaust </label>

                            <div class="col-md-6">

                                <select name="fans" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Aluminium Foil </label>

                            <div class="col-md-6">

                                <select name="alu_foils" class="form-control">
                                    <option value="Yes" selected> Yes</option>
                                    <option value="No"> No</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Roof Material </label>

                            <div class="col-md-6">

                                <select name="rf_mat" class="form-control">
                                    <option value="Amano" selected> Amano</option>
                                    <option value="Asbastos"> Asbastos</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Wall Material </label>

                            <div class="col-md-6">

                                <select name="wall_mat" class="form-control">
                                    <option value="Amano" selected> Amano</option>
                                    <option value="Bricks"> Bricks</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Lights </label>

                            <div class="col-md-6">

                                <select name="lights" class="form-control">
                                    <option value="None" selected> None</option>
                                    <option value="Normal"> Normal</option>
                                    <option value="CFL"> CFL</option>
                                    <option value="Fluorescent(Tube) Lamp">Fluorescent(Tube) Lamp</option>
                                    <option value="LED"> LED</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Warehouse Image 1 </label>

                            <div class="col-md-6">

                                <input type="file" name="warehouse_img1" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Warehouse Image 2 </label>

                            <div class="col-md-6">

                                <input type="file" name="warehouse_img2" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Warehouse Image 3 </label>

                            <div class="col-md-6">

                                <input type="file" name="warehouse_img3" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> General Value</label>

                            <div class="col-md-6">

                                <input type="number" name="g_value" class="form-control" placeholder="LKR (Optional)"
                                       pattern="^[0.00-9.99]" min="1">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Availability </label>

                            <div class="col-md-6">
                                <select name="ava" class="form-control" disabled>
                                    <option value="Available" selected> Available</option>
                                    <option value="Not - available"> Not - available</option>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Warehouse Description </label>

                            <div class="col-md-6">

                                <textarea name="warehouse_desc" class="form-control" rows="6" cols="19"></textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" value="Insert Warehouse"
                                       class="btn btn-primary form-control">

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
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Warehouse has been inserted successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_warehouses','_self')">OK
                        </button>
                    </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->


    </body>

    </html>

    <?php

    if (isset($_POST['submit'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        $code = $_POST['warehouse_code'];
        $owner_id = $_POST['owner_id'];
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
        $ava = 'Available';
        $warehouse_desc = $_POST['warehouse_desc'];

        $warehouse_img1 = $_FILES['warehouse_img1']['name'];
        $warehouse_img2 = $_FILES['warehouse_img2']['name'];
        $warehouse_img3 = $_FILES['warehouse_img3']['name'];

        $temp_name1 = $_FILES['warehouse_img1']['tmp_name'];
        $temp_name2 = $_FILES['warehouse_img2']['tmp_name'];
        $temp_name3 = $_FILES['warehouse_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "warehouse_images/$warehouse_img1");
        move_uploaded_file($temp_name2, "warehouse_images/$warehouse_img2");
        move_uploaded_file($temp_name3, "warehouse_images/$warehouse_img3");


        if(($_FILES['warehouse_img1']['name'] == "")&&($_FILES['warehouse_img2']['name'] == "")&&($_FILES['warehouse_img3']['name'] == "")) {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc')";
        }
        elseif (($_FILES['warehouse_img1']['name'] == "")&&($_FILES['warehouse_img2']['name'] == "")) {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img3) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img3')";
        }
        elseif (($_FILES['warehouse_img1']['name'] == "")&&($_FILES['warehouse_img3']['name'] == "")) {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img2) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img2')";
        }
        elseif (($_FILES['warehouse_img2']['name'] == "")&&($_FILES['warehouse_img3']['name'] == "")) {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img1) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img1')";
        }
        elseif ($_FILES['warehouse_img3']['name'] == "") {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img1, warehouse_img2) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img1','$warehouse_img2')";
        }
        elseif ($_FILES['warehouse_img2']['name'] == "") {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img1, warehouse_img3) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img1','$warehouse_img3')";
        }
        elseif ($_FILES['warehouse_img1']['name'] == "") {
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img2, warehouse_img3) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img2','$warehouse_img3')";
        }
        else{
            $insert_warehouse = "INSERT INTO warehouses(code, owner_id, sale_type, address, city, road_access, price_sqft, area_sqft, no_of_bays, roof_height, roof_height_unit, electricity, water, telephone, cctv, container_parking_slots, loading_points, access_40ft, access_20ft, lunch_room, office_room, wash_room_staff, wash_room_labour, fans_exhaust, aluminium_foil, roof_material, wall_material, lights, value, availability, description, warehouse_img1, warehouse_img2, warehouse_img3) VALUES ('$code','$owner_id','$warehouse_cat','$warehouse_address','$warehouse_city','$road_acc','$prz_sqft','$area_sqft','$no_lbays','$roof_height','$unit','$electric','$water','$telephone','$cctv','$con_park','$load_points','$acc_40','$acc_20','$lunch_rm','$office_rm','$wash_rm_staff','$wash_rm_labour','$fans','$alu_foils','$rf_mat','$wall_mat','$lights','$g_value', '$ava', '$warehouse_desc','$warehouse_img1','$warehouse_img2','$warehouse_img3')";
        }

        $run_warehouse = mysqli_query($con, $insert_warehouse);

        if ($run_warehouse) {

            echo "<script type=\"text/javascript\">
                    $('#suModal').modal('show');
                  </script>";

        }

    }

    ?>

<?php } ?>
