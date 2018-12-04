<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Owner

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Insert Owner

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Full Name </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="owner_name" class="form-control" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="owner_address" class="form-control" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Phone Number </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input name="owner_number" class="form-control"
                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       type="number" min="0" maxlength="10" placeholder="Ex: 0123456789"
                                />
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Fax </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="number" name="owner_fax" class="form-control" pattern="^[0-9]" min="0"
                                       step="1" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Email </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input class="form-control" placeholder="Ex: xxx@xxx.xxx"
                                       name="owner_email" type="email"
                                       title="Owner's email (format: xxx@xxx.xxx)"
                                       pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!---->
                        <!--                            <label class="col-md-3 control-label">User About: </label>-->
                        <!---->
                        <!--                            <div class="col-md-6"><!-- col-md-6 Starts -->
                        <!---->
                        <!--                                <textarea name="admin_about" class="form-control" rows="3"> </textarea>-->
                        <!---->
                        <!--                            </div><!-- col-md-6 Ends -->
                        <!---->
                        <!--                        </div><!-- form-group Ends -->

                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!---->
                        <!--                            <label class="col-md-3 control-label">User Image: </label>-->
                        <!---->
                        <!--                            <div class="col-md-6"><!-- col-md-6 Starts -->
                        <!---->
                        <!--                                <input type="file" name="admin_image" class="form-control" required>-->
                        <!---->
                        <!--                            </div><!-- col-md-6 Ends -->
                        <!---->
                        <!--                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="submit" value="Insert Owner"
                                       class="btn btn-primary form-control">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {

        $owner_name = $_POST['owner_name'];

        $owner_address = $_POST['owner_address'];

        $owner_number = $_POST['owner_number'];

        $owner_fax = $_POST['owner_fax'];

        $owner_email = $_POST['owner_email'];


//        $admin_image = $_FILES['admin_image']['name'];
//        $temp_admin_image = $_FILES['admin_image']['tmp_name'];
//        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");


        $insert_owner = "insert into owners (name,address,phone,fax,email) values ('$owner_name','$owner_address','$owner_number','$owner_fax','$owner_email')";

        $run_owner = mysqli_query($con, $insert_owner);


        if ($run_owner) {

            echo "<script>alert('One Owner Has Been Inserted successfully')</script>";

            echo "<script>window.open('index.php?view_owners','_self')</script>";

        }


    }


    ?>


<?php } ?>