<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>
    <!DOCTYPE html>

    <html>

    <head>

        <title> Insert Lands </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>


    </head>

    <body>

    <div class="row"><!-- row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"> </i> Dashboard / Insert Lands
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-map-signs fa-2x fa-fw"></i> Insert Lands
                    </h3>
                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Code </label>
                            <div class="col-md-6">
                                <input type="text" name="la_code" class="form-control" placeholder="Ex: L-M-001, L001"
                                       required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Owner </label>
                            <div class="col-md-6">
                                <select name="la_owner" class="form-control">
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
                            <label class="col-md-3 control-label"> Location </label>
                            <div class="col-md-6">
                                <input type="text" name="la_address" class="form-control" placeholder="Full Address"
                                       required>
                                <input style="margin-top: 5px" type="text" name="la_city" class="form-control"
                                       placeholder="City Only" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Sale Type </label>
                            <div class="col-md-6">
                                <select name="la_s_type" class="form-control">
                                    <option> Select Sale Type</option>
                                    <option value="Sale">Sale</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Lease">Lease</option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Total Quantity </label>
                            <div class="col-md-6">
                                <input type="number" name="la_t_qty" class="form-control" pattern="^[0.0-9.9]" min="1"
                                       step="1" required placeholder="Perches">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Perch Price </label>
                            <div class="col-md-6">
                                <input type="number" name="la_prz" class="form-control" pattern="^[0.00-9.99]" min="1"
                                       step="1" placeholder="LKR (per Perch only)" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Availability </label>
                            <div class="col-md-6">
                                <select name="la_ava" class="form-control" disabled>
                                    <option value="Available" selected> Available</option>
                                    <option value="Not - available"> Not - available</option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Image 1 </label>
                            <div class="col-md-6">
                                <input type="file" name="la_img1" class="form-control">
                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Image 2 </label>
                            <div class="col-md-6">
                                <input type="file" name="la_img2" class="form-control">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Image 3 </label>
                            <div class="col-md-6">
                                <input type="file" name="la_img3" class="form-control">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Description </label>
                            <div class="col-md-6">
                                <textarea name="la_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Land"
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
                    <button type="button" class="close" onclick="window.open('index.php?view_lands','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Land has been inserted successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_lands','_self')">OK
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

        $la_code = $_POST['la_code'];
        $la_owner = $_POST['la_owner'];
        $la_address = $_POST['la_address'];
        $la_city = $_POST['la_city'];
        $la_s_type = $_POST['la_s_type'];
        $la_t_qty = $_POST['la_t_qty'];
        $la_prz = $_POST['la_prz'];
        $la_ava = 'Available';
        $la_desc = $_POST['la_desc'];

        $la_img1 = $_FILES['la_img1']['name'];
        $la_img2 = $_FILES['la_img2']['name'];
        $la_img3 = $_FILES['la_img3']['name'];

        $temp_name1 = $_FILES['la_img1']['tmp_name'];
        $temp_name2 = $_FILES['la_img2']['tmp_name'];
        $temp_name3 = $_FILES['la_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "land_images/$la_img1");
        move_uploaded_file($temp_name2, "land_images/$la_img2");
        move_uploaded_file($temp_name3, "land_images/$la_img3");

        if (($_FILES['la_img1']['name'] == "") && ($_FILES['la_img2']['name'] == "") && ($_FILES['la_img3']['name'] == "")) {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava')";
        } elseif (($_FILES['la_img1']['name'] == "") && ($_FILES['la_img2']['name'] == "")) {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img3) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img3')";
        } elseif (($_FILES['la_img1']['name'] == "") && ($_FILES['la_img3']['name'] == "")) {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img2) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img2')";
        } elseif (($_FILES['la_img2']['name'] == "") && ($_FILES['la_img3']['name'] == "")) {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img1) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img1')";
        } elseif ($_FILES['la_img3']['name'] == "") {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img1, land_img2) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img1','$la_img2')";
        } elseif ($_FILES['la_img2']['name'] == "") {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img1, land_img3) VALUES ('$la_code','$la_owner','$la_address','$la_city','la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava', '$la_img1','$la_img3')";
        } elseif ($_FILES['la_img1']['name'] == "") {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img2, land_img3) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img2','$la_img3')";
        } else {
            $insert_land = "INSERT INTO lands (code, owner_id, address, city, sale_type, total_qty, available_qty, perch_prz, description, availability, land_img1, land_img2, land_img3) VALUES ('$la_code','$la_owner','$la_address','$la_city','$la_s_type','$la_t_qty','$la_t_qty','$la_prz','$la_desc','$la_ava','$la_img1','$la_img2','$la_img3')";
        }


        $run_land = mysqli_query($con, $insert_land);

        if ($run_land) {
            echo "<script type=\"text/javascript\">

            $('#suModal').modal('show');
        </script>";

        }

    }


    ?>

<?php } ?>
