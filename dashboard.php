<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    $result_w = mysqli_query($con, "SELECT COUNT(warehouse_id) AS w_count FROM warehouses WHERE availability='Available'");
    $row = mysqli_fetch_array($result_w);
    $w_count = $row['w_count'];

    $result_h = mysqli_query($con, "SELECT COUNT(house_id) AS h_count FROM houses WHERE availability='Available'");
    $row = mysqli_fetch_array($result_h);
    $h_count = $row['h_count'];

    $result_l = mysqli_query($con, "SELECT COUNT(land_id) AS l_count FROM lands WHERE availability='Available'");
    $row = mysqli_fetch_array($result_l);
    $l_count = $row['l_count'];

    $result_wp = mysqli_query($con, "SELECT COUNT(wp_id) AS wp_count FROM warehouse_purchases");
    $row = mysqli_fetch_array($result_wp);
    $wp_count = $row['wp_count'];

    $result_hp = mysqli_query($con, "SELECT COUNT(hp_id) AS hp_count FROM house_purchases");
    $row = mysqli_fetch_array($result_hp);
    $hp_count = $row['hp_count'];

    $result_lp = mysqli_query($con, "SELECT COUNT(lp_id) AS lp_count FROM land_purchases");
    $row = mysqli_fetch_array($result_lp);
    $lp_count = $row['lp_count'];
    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <h1 class="page-header">Dashboard</h1>

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-primary"><!-- panel panel-primary Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-3"><!-- col-xs-3 Starts -->
                            <i class="fa fa-building fa-5x"> </i>
                        </div><!-- col-xs-3 Ends -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                            <div class="huge"> <?php echo $w_count; ?> </div>
                            <div>Available Warehouses</div>
                        </div><!-- col-xs-9 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_warehouses">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-primary Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->


        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-green"><!-- panel panel-green Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-3"><!-- col-xs-3 Starts -->
                            <i class="fa fa-home fa-5x"> </i>
                        </div><!-- col-xs-3 Ends -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                            <div class="huge"> <?php echo $h_count; ?> </div>
                            <div>Available Houses</div>
                        </div><!-- col-xs-9 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_houses">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-green Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->


        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-yellow"><!-- panel panel-yellow Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-3"><!-- col-xs-3 Starts -->
                            <i class="fa fa-map-signs fa-5x"> </i>
                        </div><!-- col-xs-3 Ends -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                            <div class="huge"> <?php echo $l_count; ?> </div>
                            <div>Available Lands</div>
                        </div><!-- col-xs-9 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_lands">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-yellow Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->

    </div><!-- 2 row Ends -->

    <div class="row"><!-- 3 row Starts -->
        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-red"><!-- panel panel-red Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-dollar fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-building fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $wp_count; ?> </div>
                            <div>Warehouse Purchases</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_warehouse_purchases">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-red Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->

        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-red"><!-- panel panel-red Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-dollar fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-home fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $hp_count; ?> </div>
                            <div>House Purchases</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_house_purchases">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-red Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->

        <div class="col-lg-4 col-md-6"><!-- col-lg-4 col-md-6 Starts -->
            <div class="panel panel-red"><!-- panel panel-red Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <div class="row"><!-- panel-heading row Starts -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-dollar fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-map-signs fa-5x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $lp_count; ?> </div>
                            <div>Land Purchases</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_land_purchases">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-red Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->
    </div><!-- 3 row Ends -->

    <div class="row"><!-- 4 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-primary"><!-- panel panel-primary Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title"><!-- panel-title Starts -->
                        <i class="fa fa-money fa-fw"></i> Advance/Incomplete Warehouse Purchases
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>
                                <th>Warehouse ID</th>
                                <th>Customer</th>
                                <th>Invoice No.</th>
                                <th>Sale Type</th>
                                <th>Purchased Date</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Remaining Amount</th>
                                <th>Payment Status</th>


                            </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_wp = "select * from warehouse_purchases WHERE pay_status='Advance' OR pay_status='Incomplete' order by 1 DESC LIMIT 0,5";
                            $run_wp = mysqli_query($con, $get_wp);

                            while ($row_wp = mysqli_fetch_array($run_wp)) {

                                $warehouse_id = $row_wp['warehouse_id'];
                                $cus_id = $row_wp['cus_id'];
                                $invoice_no = $row_wp['invoice_no'];
                                $sale_type = $row_wp['sale_type'];
                                $p_date = $row_wp['p_date'];
                                $tot_amt = $row_wp['tot_amt'];
                                $paid_amt = $row_wp['paid_amt'];
                                $remain_amt = $row_wp['remain_amt'];
                                $pay_status = $row_wp['pay_status'];

                                $i++;

                                ?>
                                <tr>
                                    <td><?php echo $warehouse_id; ?></td>
                                        <?php
                                        $result_wc = mysqli_query($con, "SELECT email AS wc_email FROM customersn WHERE cus_id='$cus_id'");
                                        $row = mysqli_fetch_array($result_wc);
                                        $wc_email = $row['wc_email'];
                                        ?>
                                    <td><?php echo $wc_email; ?></td>
                                    <td><?php echo $invoice_no; ?></td>
                                    <td><?php echo $sale_type; ?></td>
                                    <td><?php echo $p_date; ?></td>
                                    <td><?php echo $tot_amt; ?></td>
                                    <td><?php echo $paid_amt; ?></td>
                                    <td><?php echo $remain_amt; ?></td>
                                    <td><?php echo $pay_status; ?></td>

                                </tr>

                            <?php } ?>

                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                    <div class="text-right"><!-- text-right Starts -->

                        <a href="index.php?view_warehouse_purchases">

                            View All Orders <i class="fa fa-arrow-circle-right"></i>

                        </a>

                    </div><!-- text-right Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-primary Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 4 row Ends -->

    <div class="row"><!-- 5 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-green"><!-- panel panel-primary Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title"><!-- panel-title Starts -->
                        <i class="fa fa-money fa-fw"></i> Advance/Incomplete House Purchases
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>
                                <th>House ID</th>
                                <th>Customer</th>
                                <th>Invoice No.</th>
                                <th>Sale Type</th>
                                <th>Purchased Date</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Remaining Amount</th>
                                <th>Payment Status</th>


                            </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_hp = "select * from house_purchases WHERE pay_status='Advance' OR pay_status='Incomplete' order by 1 DESC LIMIT 0,5";
                            $run_hp = mysqli_query($con, $get_hp);

                            while ($row_hp = mysqli_fetch_array($run_hp)) {

                                $house_id = $row_hp['house_id'];
                                $cus_id = $row_hp['cus_id'];
                                $invoice_no = $row_hp['invoice_no'];
                                $sale_type = $row_hp['sale_type'];
                                $p_date = $row_hp['p_date'];
                                $tot_amt = $row_hp['tot_amt'];
                                $paid_amt = $row_hp['paid_amt'];
                                $remain_amt = $row_hp['remain_amt'];
                                $pay_status = $row_hp['pay_status'];

                                $i++;

                                ?>
                                <tr>
                                    <td><?php echo $house_id; ?></td>
                                        <?php
                                        $result_hc = mysqli_query($con, "SELECT email AS hc_email FROM customersn WHERE cus_id='$cus_id'");
                                        $row = mysqli_fetch_array($result_hc);
                                        $hc_email = $row['hc_email'];
                                        ?>
                                    <td><?php echo $hc_email; ?></td>
                                    <td><?php echo $invoice_no; ?></td>
                                    <td><?php echo $sale_type; ?></td>
                                    <td><?php echo $p_date; ?></td>
                                    <td><?php echo $tot_amt; ?></td>
                                    <td><?php echo $paid_amt; ?></td>
                                    <td><?php echo $remain_amt; ?></td>
                                    <td><?php echo $pay_status; ?></td>

                                </tr>

                            <?php } ?>

                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                    <div class="text-right"><!-- text-right Starts -->

                        <a href="index.php?view_house_purchases">

                            View All Orders <i class="fa fa-arrow-circle-right"></i>

                        </a>

                    </div><!-- text-right Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-primary Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 5 row Ends -->

    <div class="row"><!-- 6 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-yellow"><!-- panel panel-primary Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title"><!-- panel-title Starts -->
                        <i class="fa fa-money fa-fw"></i> Advance/Incomplete Land Purchases
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>
                                <th>Land ID</th>
                                <th>Customer</th>
                                <th>Invoice No.</th>
                                <th>Sale Type</th>
                                <th>Purchased Date</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Remaining Amount</th>
                                <th>Payment Status</th>


                            </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_lp = "select * from land_purchases WHERE pay_status='Advance' OR pay_status='Incomplete' order by 1 DESC LIMIT 0,5";
                            $run_lp = mysqli_query($con, $get_lp);

                            while ($row_lp = mysqli_fetch_array($run_lp)) {

                                $land_id = $row_lp['land_id'];
                                $cus_id = $row_lp['cus_id'];
                                $invoice_no = $row_lp['invoice_no'];
                                $sale_type = $row_lp['sale_type'];
                                $p_date = $row_lp['p_date'];
                                $tot_amt = $row_lp['tot_amt'];
                                $paid_amt = $row_lp['paid_amt'];
                                $remain_amt = $row_lp['remain_amt'];
                                $pay_status = $row_lp['pay_status'];

                                $i++;

                                ?>
                                <tr>
                                    <td><?php echo $land_id; ?></td>
                                        <?php
                                        $result_lc = mysqli_query($con, "SELECT email AS lc_email FROM customersn WHERE cus_id='$cus_id'");
                                        $row = mysqli_fetch_array($result_lc);
                                        $lc_email = $row['lc_email'];
                                        ?>
                                    <td><?php echo $lc_email; ?></td>
                                    <td><?php echo $invoice_no; ?></td>
                                    <td><?php echo $sale_type; ?></td>
                                    <td><?php echo $p_date; ?></td>
                                    <td><?php echo $tot_amt; ?></td>
                                    <td><?php echo $paid_amt; ?></td>
                                    <td><?php echo $remain_amt; ?></td>
                                    <td><?php echo $pay_status; ?></td>

                                </tr>

                            <?php } ?>

                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                    <div class="text-right"><!-- text-right Starts -->

                        <a href="index.php?view_land_purchases">

                            View All Orders <i class="fa fa-arrow-circle-right"></i>

                        </a>

                    </div><!-- text-right Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-primary Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 6 row Ends -->
    <a class="gotopbtn" href="#"> <i class="fa fa-arrow-circle-up"></i> </a>
<?php } ?>