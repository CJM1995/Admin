<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Owners

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> View Owners

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>

                                <th>Owner ID</th>
                                <th>Owner Name</th>
                                <th>Owner Address</th>
                                <th>Owner Phone</th>
                                <th>Owner Fax</th>
                                <th>Owner Email</th>
                                <th>Owner Operations:</th>


                            </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_owner = "select * from owners";

                            $run_owner = mysqli_query($con, $get_owner);

                            while ($row_owner = mysqli_fetch_array($run_owner)) {

                                $owner_id = $row_owner['owner_id'];

                                $owner_name = $row_owner['name'];

                                $owner_address = $row_owner['address'];

                                $owner_phone = $row_owner['phone'];

                                $owner_fax = $row_owner['fax'];

                                $owner_email = $row_owner['email'];

                                $i++;


                                ?>

                                <tr>

                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $owner_name; ?></td>

                                    <td><?php echo $owner_address; ?></td>

                                    <td><?php echo $owner_phone; ?></td>

                                    <td><?php echo $owner_fax; ?></td>

                                    <td><?php echo $owner_email; ?></td>

                                    <td class="text-center">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                data-original-title="" title="Edit"
                                                onclick="location.href = 'index.php?edit_owner=<?php echo $owner_id; ?>';">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                data-original-title="" title="Delete"
                                                onclick="location.href = 'index.php?delete_owner=<?php echo $owner_id; ?>';">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>

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