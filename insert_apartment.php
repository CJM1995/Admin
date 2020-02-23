<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    // echo("<script>console.log('creater: " . $_SESSION['admin_name'] . "');</script>");

    ?>
    <!DOCTYPE html>

    <html>

    <head>

        <title> Insert Houses </title>


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

                        <i class="fa fa-dashboard"> </i> Dashboard / Insert Apartment

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

                            <i class="fa fa-bed fa-2x fa-fw"></i> Insert Apartment

                        </h3>

                    </div><!-- panel-heading Ends -->

                    <div class="panel-body">
                        <!-- panel-body Starts -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!-- form-horizontal Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Apartment Code </label>
                                <div class="col-md-6">
                                    <input type="text" name="ho_code" class="form-control" placeholder="Ex: H-M-001, H001" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Owner Name </label>
                                <div class="col-md-6">
                                    <input type="text" name="ho_owner_name" class="form-control" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label">Phone Number </label>
                                <div class="col-md-6">
                                    <!-- col-md-6 Starts -->
                                    <input name="ho_owner_number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="0" maxlength="10" placeholder="Ex: 0123456789" required />
                                </div><!-- col-md-6 Ends -->
                            </div><!-- form-group Ends -->

                            <!-- form-group Starts -->
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label"> Owner </label>
                                <div class="col-md-6">
                                    <select name="ho_owner" class="form-control">
                                        <option> Select a Owner</option>
                                        
                                    </select>
                                </div>
                            </div> -->
                            <!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Location </label>
                                <div class="col-md-6">
                                    <input type="text" name="ho_address" class="form-control" placeholder="Full Address" required>
                                    <input style="margin-top: 5px" type="text" name="ho_city" class="form-control" placeholder="City Only" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Sale Type </label>
                                <div class="col-md-6">
                                    <select name="ho_s_type" class="form-control" required>
                                        <option> Select Sale Type</option>
                                        <option value="Sale">Sale</option>
                                        <option value="Lease">Lease</option>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Floor Material </label>
                                <div class="col-md-6">
                                    <select name="ho_s_type" class="form-control" required>
                                        <option> Select Floor Material</option>
                                        <option value="Sale">Tile</option>
                                        <option value="Lease">Granite</option>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Security </label>
                                <div class="col-md-6">
                                    <input type="text" name="ho_land_qty" class="form-control">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Bedrooms </label>
                                <div class="col-md-6">
                                    <input type="number" name="ho_beds" class="form-control" pattern="^[1-9]" min="1" step="1" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> A/C Bedrooms </label>
                                <div class="col-md-6">
                                    <input type="number" name="ho_ac_beds" class="form-control" pattern="^[0-9]" min="0" step="1" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Bathrooms </label>
                                <div class="col-md-6">
                                    <input type="number" name="ho_baths" class="form-control" pattern="^[1-9]" min="1" step="1" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Base Price </label>
                                <div class="col-md-6">
                                    <input type="number" name="ho_prz" class="form-control" pattern="^[0.00-9.99]" min="1.00" step="0.01" placeholder="LKR" required>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> Availability </label>
                                <div class="col-md-6">
                                    <select name="ho_ava" class="form-control" disabled>
                                        <option value="Available" selected> Available</option>
                                        <option value="Not - available"> Not - available</option>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->


                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> House Image 1 </label>
                                <div class="col-md-6">
                                    <input type="file" name="ho_img1" class="form-control">
                                </div>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> House Image 2 </label>
                                <div class="col-md-6">
                                    <input type="file" name="ho_img2" class="form-control">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> House Image 3 </label>
                                <div class="col-md-6">
                                    <input type="file" name="ho_img3" class="form-control">
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->
                                <label class="col-md-3 control-label"> House Description </label>
                                <div class="col-md-6">
                                    <textarea name="ho_desc" class="form-control" rows="6" cols="19"></textarea>
                                </div>
                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">

                                    <input type="submit" name="submit" value="Insert House" class="btn btn-primary form-control">

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
                        <button type="button" class="close" onclick="window.open('index.php?view_houses','_self')">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%" class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">House has been inserted successfully!</p>

                    </div>
                    <form method="post">
                        <div style="text-align: center" class="modal-footer text-center center-block">
                            <button type="button" class="btn btn-success" onclick="window.open('index.php?view_houses','_self')">OK
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

            $ho_code = $_POST['ho_code'];
            $ho_owner = $_POST['ho_owner'];
            $ho_address = $_POST['ho_address'];
            $ho_city = $_POST['ho_city'];
            $ho_s_type = $_POST['ho_s_type'];
            $ho_land_size = $_POST['ho_land_qty'];
            $ho_beds = $_POST['ho_beds'];
            $ho_ac_beds = $_POST['ho_ac_beds'];
            $ho_baths = $_POST['ho_baths'];
            $ho_floor = $_POST['ho_floor'];
            $ho_prz = $_POST['ho_prz'];
            $ho_ava = 'Available';
            $ho_desc = $_POST['ho_desc'];

            $creater = $_SESSION['admin_name'];

            $ho_img1 = $_FILES['ho_img1']['name'];
            $ho_img2 = $_FILES['ho_img2']['name'];
            $ho_img3 = $_FILES['ho_img3']['name'];

            $temp_name1 = $_FILES['ho_img1']['tmp_name'];
            $temp_name2 = $_FILES['ho_img2']['tmp_name'];
            $temp_name3 = $_FILES['ho_img3']['tmp_name'];

            // move_uploaded_file($temp_name1, "\\\\ADMIN\\house_images\\$ho_img1");
            // move_uploaded_file($temp_name2, "\\\\ADMIN\\house_images\\$ho_img2");
            // move_uploaded_file($temp_name3, "\\\\ADMIN\\house_images\\$ho_img3");
            move_uploaded_file($temp_name1, "\\\\CJ-LAPTOP\\house_images\\$ho_img1");
            move_uploaded_file($temp_name2, "\\\\CJ-LAPTOP\\house_images\\$ho_img2");
            move_uploaded_file($temp_name3, "\\\\CJ-LAPTOP\\house_images\\$ho_img3");
            // move_uploaded_file($temp_name1, "house_images/$ho_img1");
            // move_uploaded_file($temp_name2, "house_images/$ho_img2");
            // move_uploaded_file($temp_name3, "house_images/$ho_img3");

            $hou_owner_name = $_POST['ho_owner_name'];
            $hou_owner_number = $_POST['ho_owner_number'];

            $chk_owner = "select * from owners WHERE name='".$hou_owner_name."'";
            // $chk_owner = "select * from owners WHERE name='".$hou_owner_name."' AND phone='".$ho_owner_number."'";
            $run_chk_owner = mysqli_query($con, $chk_owner);
            $ow_count = mysqli_num_rows($run_chk_owner);
            echo ("<script>console.log('count :" . $ow_count . "');</script>");
            // echo ("<script>console.log('owner id: " . $run_chk_owner . "');</script>");
            if ($ow_count < 1) {
                $insert_owner = "insert into owners (name,phone) values ('$hou_owner_name','$hou_owner_number')";
                $run_owner = mysqli_query($con, $insert_owner);
            }

            $get_ow = "select owner_id from owners WHERE name='".$hou_owner_name."'";
            $run_ow = mysqli_query($con, $get_ow);
            while ($row_owner = mysqli_fetch_array($run_ow)) {
                $ow_id = $row_owner['owner_id'];
                $ow_name = $row_owner['name'];
                // echo "<option value='$ow_id'>$ow_name</option>";
            }
            echo ("<script>console.log('owner id: " . $ow_id . "');</script>");
            echo ("<script>console.log('owner name: " . $hou_owner_name . "');</script>");


            if (($_FILES['ho_img1']['name'] == "") && ($_FILES['ho_img2']['name'] == "") && ($_FILES['ho_img3']['name'] == "")) {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$creater')";
            } elseif (($_FILES['ho_img1']['name'] == "") && ($_FILES['ho_img2']['name'] == "")) {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img3, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img3','$creater')";
            } elseif (($_FILES['ho_img1']['name'] == "") && ($_FILES['ho_img3']['name'] == "")) {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img2, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img2','$creater')";
            } elseif (($_FILES['ho_img2']['name'] == "") && ($_FILES['ho_img3']['name'] == "")) {
                $insert_house = "INSERT INTO houses(code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img1, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img1','$creater')";
            } elseif ($_FILES['ho_img3']['name'] == "") {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img1, house_img2, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img1','$ho_img2','$creater')";
            } elseif ($_FILES['ho_img2']['name'] == "") {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img1, house_img3, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava', '$ho_img1','$ho_img3','$creater')";
            } elseif ($_FILES['ho_img1']['name'] == "") {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img2, house_img3, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img2','$ho_img3','$creater')";
            } else {
                $insert_house = "INSERT INTO houses (code, owner_id, address, city, sale_type, land_size, bedrooms, ac_rooms, bathrooms, floor, base_price, description, availability, house_img1, house_img2, house_img3, creater) VALUES ('$ho_code','$ow_id','$ho_address','$ho_city','$ho_s_type','$ho_land_size','$ho_beds','$ho_ac_beds','$ho_baths','$ho_floor','$ho_prz','$ho_desc','$ho_ava','$ho_img1','$ho_img2','$ho_img3','$creater')";
            }


            $run_house = mysqli_query($con, $insert_house);

            if ($run_house) {
                echo "<script type=\"text/javascript\">
            $('#loadingModal').modal('hide');
            $('#suModal').modal('show');
        </script>";
            }
        }


        ?>

<?php } ?>