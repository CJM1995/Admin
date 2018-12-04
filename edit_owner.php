<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['edit_owner'])) {
        $edit_id = $_GET['edit_owner'];
        $get_owner = "select * from owners where owner_id='$edit_id'";
        $run_owner = mysqli_query($con, $get_owner);
        $row_owner = mysqli_fetch_array($run_owner);
        $owner_id = $row_owner['owner_id'];
        $owner_name = $row_owner['name'];
        $owner_address = $row_owner['address'];
        $owner_phone = $row_owner['phone'];
        $owner_fax = $row_owner['fax'];
        $owner_email = $row_owner['email'];

    }


    ?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Owner Details

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Edit Owner Details

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Full Name </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="owner_name" class="form-control" required
                                       value="<?php echo $owner_name; ?>">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="owner_address" class="form-control" required
                                       value="<?php echo $owner_address; ?>">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Phone </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input name="owner_phone" class="form-control"
                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       type="number" min="0" maxlength="10" placeholder="Ex: 0123456789"
                                       value="<?php echo $owner_phone ?>"
                                />
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Fax </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="number" name="owner_fax" class="form-control" pattern="^[0-9]" min="0"
                                       step="1" required value="<?php echo $owner_fax ?>">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Email </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input class="form-control" placeholder="Ex: xxx@xxx.xxx"
                                       name="owner_email" type="email"
                                       title="Owner's email (format: xxx@xxx.xxx)"
                                       pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"
                                       value="<?php echo $owner_email ?>" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="update" value="Update Owner"
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
        $owner_name = $_POST['owner_name'];
        $owner_address = $_POST['owner_address'];
        $owner_phone = $_POST['owner_phone'];
        $owner_fax = $_POST['owner_fax'];
        $owner_email = $_POST['owner_email'];

        $update_owner = "update owners set name='$owner_name',address='$owner_address',phone='$owner_phone',fax='$owner_fax',email='$owner_email' where owner_id='$owner_id'";

        $run_owner = mysqli_query($con, $update_owner);

        if ($run_owner) {

            echo "<script>alert('Owner Has Been Updated successfully')</script>";

            echo "<script>window.open('index.php?view_owners','_self')</script>";

        }

    }


    ?>


<?php } ?>