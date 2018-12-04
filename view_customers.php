<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Customers

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> View Customers

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>

                                <th>Customer No</th>
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Customer NIC/Passport</th>
                                <th>Customer Phone Number</th>
                                <th>Customer Email</th>
                                <th>Customer City</th>


                            </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_c = "select * from customersN";

                            $run_c = mysqli_query($con, $get_c);

                            while ($row_c = mysqli_fetch_array($run_c)) {

                                $c_id = $row_c['cus_id'];

                                $c_name = $row_c['name'];

                                $c_address = $row_c['address'];

                                $c_nic = $row_c['nic_passport'];

                                $c_phone = $row_c['phone'];

                                $c_email = $row_c['email'];

                                $i++;


                                ?>

                                <tr>

                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $c_name; ?></td>

                                    <td><?php echo $c_address; ?></td>

                                    <td><?php echo $c_nic; ?></td>

                                    <td><?php echo $c_phone; ?></td>

                                    <td><?php echo $c_email; ?></td>

                                    <td class="text-center">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                data-original-title="" title="Edit"
                                                onclick="location.href = 'index.php?edit_customer=<?php echo $c_id; ?>';">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                data-original-title="" title="Delete"
                                                onclick="location.href = 'index.php?delete_customer=<?php echo $c_id; ?>';">
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