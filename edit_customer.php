<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>

    <?php

    if (isset($_GET['edit_customer'])) {
        $edit_id = $_GET['edit_customer'];
        $get_cus = "select * from customersN where cus_id='$edit_id'";
        $run_cus = mysqli_query($con, $get_cus);
        $row_cus = mysqli_fetch_array($run_cus);
        $cus_id = $row_cus['cus_id'];
        $cus_name = $row_cus['name'];
        $cus_address = $row_cus['address'];
        $cus_nic = $row_cus['nic_passport'];
        $cus_phone = $row_cus['phone'];
        $cus_email = $row_cus['email'];

    }

    ?>


    <div class="row"><!-- 1  row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Customer Details
                </li>

            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 1  row Ends -->
    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Edit Customer Details
                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Full Name </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_name" class="form-control" value="<?php echo $cus_name ?>" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_address" class="form-control" value="<?php echo $cus_address ?>" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">NIC </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_nic" class="form-control" min="0" maxlength="10" placeholder="Ex: 123456789V" value="<?php echo $cus_nic ?>" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Phone Number </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input name="cus_number" class="form-control"
                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       type="number" min="0" maxlength="10" placeholder="Ex: 0123456789" value="<?php echo $cus_phone ?>" required
                                />
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Email </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input class="form-control" placeholder="Ex: xxx@xxx.xxx"
                                       name="cus_email" type="email"
                                       title="Customer's email (format: xxx@xxx.xxx)"
                                       pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" value="<?php echo $cus_email ?>" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="update" value="Update Customer"
                                       class="btn btn-primary form-control">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['update'])) {

        $cus_name = $_POST['cus_name'];

        $cus_address = $_POST['cus_address'];

        $cus_nic = $_POST['cus_nic'];

        $cus_phone = $_POST['cus_number'];

        $cus_email = $_POST['cus_email'];


//        $admin_image = $_FILES['admin_image']['name'];
//        $temp_admin_image = $_FILES['admin_image']['tmp_name'];
//        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");


        $update_cus = "update customersN set name='$cus_name',address='$cus_address',nic_passport='$cus_nic',phone='$cus_phone',email='$cus_email' WHERE cus_id='$cus_id'";

        $run_cus = mysqli_query($con, $update_cus);


        if ($run_cus) {

            echo "<script>alert('One Customer Has Been Updated successfully')</script>";

            echo "<script>window.open('index.php?view_customers','_self')</script>";

        }


    }


    ?>


<?php } ?>