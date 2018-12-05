<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    ?>


    <div class="row"><!-- 1  row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Customer
                </li>

            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 1  row Ends -->
    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Customer
                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Full Name </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_name" class="form-control" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_address" class="form-control" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">NIC </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="cus_nic" class="form-control" min="0" maxlength="10" placeholder="Ex: 123456789V" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Phone Number </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input name="cus_number" class="form-control"
                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       type="number" min="0" maxlength="10" placeholder="Ex: 0123456789" required
                                />
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Email </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input class="form-control" placeholder="Ex: xxx@xxx.xxx"
                                       name="cus_email" type="email"
                                       title="Customer's email (format: xxx@xxx.xxx)"
                                       pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="submit" value="Insert Customer"
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
                    <button type="button" class="close" onclick="window.open('index.php?view_customers','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Customer has been inserted successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_customers','_self')">OK
                        </button>
                    </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->

    <?php

    if (isset($_POST['submit'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        $cus_name = $_POST['cus_name'];

        $cus_address = $_POST['cus_address'];

        $cus_nic = $_POST['cus_nic'];

        $cus_phone = $_POST['cus_number'];

        $cus_email = $_POST['cus_email'];


//        $admin_image = $_FILES['admin_image']['name'];
//        $temp_admin_image = $_FILES['admin_image']['tmp_name'];
//        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");


        $insert_cus = "insert into customersN (name,address,nic_passport,phone,email) values ('$cus_name','$cus_address','$cus_nic','$cus_phone','$cus_email')";

        $run_cus = mysqli_query($con, $insert_cus);


        if ($run_cus) {

            echo "<script type=\"text/javascript\">

            $('#suModal').modal('show');
        </script>";

        }


    }


    ?>


<?php } ?>