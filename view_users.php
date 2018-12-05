<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Users

                </li>

            </ol><!-- breadcrumb Ends -->


        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-user fa-2x fa-fw"></i> View Users

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>
                                <th style="vertical-align: middle;text-align: center"><i
                                            class="fa fa-gear"></i></th>
                                <th style="vertical-align: middle;text-align: center">User Name</th>
                                <th style="vertical-align: middle;text-align: center">User Image</th>
                                <th style="vertical-align: middle;text-align: center">User Email</th>
                                <th style="vertical-align: middle;text-align: center">User Contact</th>
                                <th style="vertical-align: middle;text-align: center">User Job</th>
                            </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                            <?php

                            $get_admin = "select * from admins";

                            $run_admin = mysqli_query($con, $get_admin);

                            while ($row_admin = mysqli_fetch_array($run_admin)) {

                                $admin_id = $row_admin['admin_id'];
                                $admin_name = $row_admin['admin_name'];
                                $admin_image = $row_admin['admin_image'];
                                $admin_email = $row_admin['admin_email'];
                                $admin_contact = $row_admin['admin_contact'];
                                $admin_job = $row_admin['admin_job'];


                                ?>
                                <tr>
                                    <td class="text-center">
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                data-original-title="" title="Delete"
                                                onclick="location.href = 'index.php?user_delete=<?php echo $admin_id; ?>';">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td><?php echo $admin_name; ?></td>
                                    <td><img class="image" src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"></td>
                                    <td><?php echo $admin_email; ?></td>
                                    <td><?php echo $admin_contact; ?></td>
                                    <td><?php echo $admin_job; ?></td>
                                </tr>


                            <?php } ?>

                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->


                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->


        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->


<?php } ?>