<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['user_profile'])) {

        $edit_id = $_GET['user_profile'];

        $get_admin = "select * from admins where admin_id='$edit_id'";

        $run_admin = mysqli_query($con, $get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];

        $admin_name = $row_admin['admin_name'];

        $admin_email = $row_admin['admin_email'];

        $admin_pass = $row_admin['admin_pass'];

        $admin_image = $row_admin['admin_image'];

        $admin_job = $row_admin['admin_job'];

        $admin_contact = $row_admin['admin_contact'];

        $admin_about = $row_admin['admin_about'];

    }


    ?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Profile

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Edit Profile

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Name: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_name" class="form-control" required
                                       value="<?php echo $admin_name; ?>">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Email: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_email" class="form-control" required
                                       value="<?php echo $admin_email; ?>">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Password: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_pass" class="form-control" required
                                       value="<?php echo $admin_pass; ?>">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Job: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <?php
                                if($admin_job === 'Admin' || $admin_job === 'ADMIN' || $admin_job === 'Administrator' || $admin_job === 'ADMINISTRATOR'){
                                    echo "<input type=\"text\" name=\"admin_job\" class=\"form-control\" required
                                       value=\"$admin_job\">";
                                }
                                else{
                                    echo "<input type=\"text\" name=\"admin_job\" class=\"form-control\" required
                                       value=\"$admin_job\" disabled>";
                                }
                                ?>


                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Contact: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_contact" class="form-control" required
                                       value="<?php echo $admin_contact; ?>">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User About: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <textarea name="admin_about" class="form-control"
                                          rows="3"> <?php echo $admin_about; ?> </textarea>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Image: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="file" name="admin_image" class="form-control" required>
                                <br>
                                <img src="admin_images/<?Php echo $admin_image; ?>" width="70" height="70">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="submit" name="update" value="Update User"
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
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Your Profile has been Updated successfully! Please Login again.</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('login.php','_self')">OK
                        </button>
                    </div>
                </form>
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

    <?php

    if (isset($_POST['update'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

        $admin_name = $_POST['admin_name'];

        $admin_email = $_POST['admin_email'];

        $admin_pass = $_POST['admin_pass'];

        if($admin_job === 'Admin' || $admin_job === 'ADMIN' || $admin_job === 'Administrator' || $admin_job === 'ADMINISTRATOR'){
            $admin_job = $_POST['admin_job'];
        }

        $admin_contact = $_POST['admin_contact'];

        $admin_about = $_POST['admin_about'];


        $admin_image = $_FILES['admin_image']['name'];

        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

        $update_admin = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image',admin_contact='$admin_contact',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$admin_id'";


        $run_admin = mysqli_query($con, $update_admin);

        if ($run_admin) {
            echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";

//            echo "<script>alert('User Has Been Updated successfully and login again')</script>";
//
//            echo "<script>window.open('login.php','_self')</script>";

            session_destroy();

        }

    }


    ?>


<?php } ?>