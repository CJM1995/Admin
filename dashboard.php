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

    $result_wp = mysqli_query($con, "SELECT COUNT(w_need_id) AS wp_count FROM warehouse_needs");
    $row = mysqli_fetch_array($result_wp);
    $wp_count = $row['wp_count'];

    $result_hp = mysqli_query($con, "SELECT COUNT(h_need_id) AS hp_count FROM house_needs");
    $row = mysqli_fetch_array($result_hp);
    $hp_count = $row['hp_count'];

    $result_lp = mysqli_query($con, "SELECT COUNT(lnd_need_id) AS lp_count FROM land_needs");
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

                <?php
                    if ($admin_job === 'Admin' || $admin_job === 'ADMIN' || $admin_job === 'Administrator' || $admin_job === 'ADMINISTRATOR') {
                        echo "<a href=\"index.php?view_warehouses\">";
                        echo "<div class=\"panel-footer\">";
                        echo "<span class=\"pull-left\"> View Details </span>";
                        echo "<span class=\"pull-right\"> <i class=\"fa fa-arrow-circle-right\"></i> </span>";
                        echo "<div class=\"clearfix\"></div>";
                        echo "</div>";
                        echo "</a>";
                    }
                ?>
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
                            <i class="fa fa-building fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-eye fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $wp_count; ?> </div>
                            <div>Warehouse Wanted</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_warehouse_needed">
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
                            <i class="fa fa-home fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-eye fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $hp_count; ?> </div>
                            <div>House Wanted</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_house_needed">
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
                            <i class="fa fa-map-signs fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-2"><!-- col-xs-2 Starts -->
                            <i class="fa fa-eye fa-4x"> </i>
                        </div><!-- col-xs-2 Ends -->
                        <div class="col-xs-8 text-right"><!-- col-xs-8 text-right Starts -->
                            <div class="huge"> <?php echo $lp_count; ?> </div>
                            <div>Land Wanted</div>
                        </div><!-- col-xs-8 text-right Ends -->
                    </div><!-- panel-heading row Ends -->
                </div><!-- panel-heading Ends -->

                <a href="index.php?view_land_needed">
                    <div class="panel-footer"><!-- panel-footer Starts -->
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div><!-- panel-footer Ends -->
                </a>
            </div><!-- panel panel-red Ends -->
        </div><!-- col-lg-4 col-md-6 Ends -->
    </div><!-- 3 row Ends -->

    
    <a class="gotopbtn" href="#"> <i class="fa fa-arrow-circle-up"></i> </a>
<?php } ?>