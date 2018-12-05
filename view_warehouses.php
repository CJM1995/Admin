<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    $PUB_ID = '';

    ?>


    <div class="row"><!--  1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Warehouses

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!--  1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading clearfix"><!-- panel-heading Starts -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="panel-title pull-left" style="padding-top: 7.5px;">
                                <i class="fa fa-building fa-2x fa-fw"></i> View Warehouses
                            </h3>
                        </div>
                    </div>
                    <br>
                    <form name="search_form" method="post">
                        <div class="input-group">
                            <input type="text" name="search_box" class="form-control" placeholder="Search">
                            <div style="background-color: #2e6da4" class="input-group-addon">
                                <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none"
                                        name="ava">
                                    class="btn-group-lg">
                                    <option value="Available">Available</option>
                                    <option value="Not - available">Not-available</option>
                                </select>
                            </div>
                            <div class="input-group-btn">
                                <button type="submit" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group center-block text-center">
                            <div class="form-horizontal">
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="City">City</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Sale Type">Sale Type</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Area">Area sq. ft</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Price_sq">Price per sq. ft</label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Price">Base Price</label>
                            </div>

                        </div>
                    </form>
                    <?php
                    if (isset($_POST['search'])) {

                        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
                        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
                        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
                        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";
                        $ava = $_POST['ava'];
                        $rdo = $_POST['optradio'];
                        $box = $_POST['search_box'];


                        if (strcmp($rdo, 'City') == 0) {
                            $get_rslt = "select * from warehouses WHERE city LIKE '%$box%' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Sale Type') == 0) {
                            $get_rslt = "select * from warehouses WHERE sale_type LIKE '%$box%' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Area') == 0) {
                            $get_rslt = "select * from warehouses WHERE area_sqft='$box' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Price_sq') == 0) {
                            $get_rslt = "select * from warehouses WHERE price_sqft='$box' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Price') == 0) {
                            $get_rslt = "select * from warehouses WHERE value='$box' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }


                        $count = mysqli_num_rows($run_rslt);

                        if ($count == 0) {
                            echo "
                                <div class='box'>
                                    <h2>No Search Results Found</h2>
                                </div>
                                ";

                        } else {
                            ?>
                            <!-- search Modal -->
                            <div class="modal fade" id="sModal" role="dialog" data-keyboard="false"
                                 data-backdrop="static">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <form method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        onclick="window.open('index.php?view_warehouses','_self')">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive"><!-- table-responsive Starts -->
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <!-- table table-bordered table-hover table-striped Starts -->
                                                        <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;text-align: center">Operations</th>
                                                            <th style="vertical-align: middle;text-align: center">Warehouse ID</th>
                                                            <th style="vertical-align: middle;text-align: center">Warehouse Image</th>
                                                            <th style="vertical-align: middle;text-align: center">Warehouse Code</th>
                                                            <th style="vertical-align: middle;text-align: center">Sale Type</th>
                                                            <th style="vertical-align: middle;text-align: center">Address</th>
                                                            <th style="vertical-align: middle;text-align: center">City</th>
                                                            <th style="vertical-align: middle;text-align: center">Road Access</th>
                                                            <th style="vertical-align: middle;text-align: center">Price per sq. ft</th>
                                                            <th style="vertical-align: middle;text-align: center">Area sq. ft</th>
                                                            <th style="vertical-align: middle;text-align: center">Container bays</th>
                                                            <th style="vertical-align: middle;text-align: center">Electricity</th>
                                                            <th style="vertical-align: middle;text-align: center">Water</th>
                                                            <th style="vertical-align: middle;text-align: center">Telephone</th>
                                                            <th style="vertical-align: middle;text-align: center">CCTV</th>
                                                            <th style="vertical-align: middle;text-align: center">Base Value</th>
                                                            <th style="vertical-align: middle;text-align: center">Availability</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        $i = 0;
                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {

                                                            $warehouse_id_s = $row_rslt['warehouse_id'];
                                                            $warehouse_image_s = $row_rslt['warehouse_img1'];
                                                            $warehouse_code_s = $row_rslt['code'];
                                                            $warehouse_category_s = $row_rslt['sale_type'];
                                                            $warehouse_address_s = $row_rslt['address'];
                                                            $warehouse_city_s = $row_rslt['city'];
                                                            $warehouse_rd_acc_s = $row_rslt['road_access'];
                                                            $warehouse_price_sqft_s = $row_rslt['price_sqft'];
                                                            $warehouse_area_sqft_s = $row_rslt['area_sqft'];
                                                            $warehouse_no_of_bays_s = $row_rslt['no_of_bays'];
                                                            $warehouse_electricity_s = $row_rslt['electricity'];
                                                            $warehouse_water_s= $row_rslt['water'];
                                                            $warehouse_telephone_s = $row_rslt['telephone'];
                                                            $warehouse_cctv_s = $row_rslt['cctv'];
                                                            $warehouse_price_s = $row_rslt['value'];
                                                            $warehouse_availability_s = $row_rslt['availability'];
                                                            $i++;

                                                            ?>

                                                            <tr>
                                                                <td style="min-width: 130px">

                                                                    <button type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                                            data-original-title="" title="Edit"
                                                                            onclick="location.href = 'index.php?edit_warehouse=<?php echo $warehouse_id_s; ?>';">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                                            data-original-title="" title="Remove"
                                                                            onclick="location.href = 'index.php?delete_warehouse=<?php echo $warehouse_id_s; ?>';">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                                <style>
                                                                    .image {
                                                                        -webkit-transition: all 0.7s ease;
                                                                        transition: all 0.7s ease;
                                                                    }

                                                                    .image:hover {
                                                                        -webkit-transform: scale(3.5);
                                                                        transform: scale(3.5);
                                                                    }
                                                                </style>

                                                                <td><?php echo $i; ?></td>
                                                                <td><img class="image" src="warehouse_images/<?php echo $warehouse_image_s; ?>" width="60"
                                                                         height="60"></td>
                                                                <td><?php echo $warehouse_code_s; ?></td>
                                                                <td><?php echo $warehouse_category_s; ?></td>
                                                                <td><?php echo $warehouse_address_s; ?></td>
                                                                <td><?php echo $warehouse_city_s; ?></td>
                                                                <td><?php echo $warehouse_rd_acc_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $warehouse_price_sqft_s; ?></td>
                                                                <td><?php echo $warehouse_area_sqft_s; ?></td>
                                                                <td><?php echo $warehouse_no_of_bays_s; ?></td>
                                                                <td><?php echo $warehouse_electricity_s; ?></td>
                                                                <td><?php echo $warehouse_water_s; ?></td>
                                                                <td><?php echo $warehouse_telephone_s; ?></td>
                                                                <td><?php echo $warehouse_cctv_s; ?></td>
                                                                <td>LKR &nbsp; <?php echo $warehouse_price_s; ?></td>
                                                                <td><?php echo $warehouse_availability_s; ?></td>

                                                            </tr>

                                                        <?php } ?>


                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        onclick="window.open('index.php?view_warehouses','_self')">Close
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- search Modal -->

                            <?php
                            echo "<script type=\"text/javascript\">
                                $(window).load(function(){
                                    $('#sModal').modal('show');
                                });
                                
                               </script>";
                        }
                    }
                    ?>
                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->
                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table style="padding: 5px; text-align: center;"
                               class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align: center">Operations</th>
                                <th style="vertical-align: middle;text-align: center">Warehouse ID</th>
                                <th style="vertical-align: middle;text-align: center">Warehouse Image</th>
                                <th style="vertical-align: middle;text-align: center">Warehouse Code</th>
                                <th style="vertical-align: middle;text-align: center">Sale Type</th>
                                <th style="vertical-align: middle;text-align: center">Address</th>
                                <th style="vertical-align: middle;text-align: center">City</th>
                                <th style="vertical-align: middle;text-align: center">Road Access</th>
                                <th style="vertical-align: middle;text-align: center">Price per sq. ft</th>
                                <th style="vertical-align: middle;text-align: center">Area sq. ft</th>
                                <th style="vertical-align: middle;text-align: center">Container bays</th>
                                <th style="vertical-align: middle;text-align: center">Electricity</th>
                                <th style="vertical-align: middle;text-align: center">Water</th>
                                <th style="vertical-align: middle;text-align: center">Telephone</th>
                                <th style="vertical-align: middle;text-align: center">CCTV</th>
                                <th style="vertical-align: middle;text-align: center">Base Value</th>
                                <th style="vertical-align: middle;text-align: center">Availability</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i = 0;
                            $get_warehouse = "select * from warehouses";
                            $run_warehouse = mysqli_query($con, $get_warehouse);
                            while ($row_warehouse = mysqli_fetch_array($run_warehouse)) {

                                $warehouse_id = $row_warehouse['warehouse_id'];
                                $warehouse_image = $row_warehouse['warehouse_img1'];
                                $warehouse_code = $row_warehouse['code'];
                                $warehouse_category = $row_warehouse['sale_type'];
                                $warehouse_address = $row_warehouse['address'];
                                $warehouse_city = $row_warehouse['city'];
                                $warehouse_rd_acc = $row_warehouse['road_access'];
                                $warehouse_price_sqft = $row_warehouse['price_sqft'];
                                $warehouse_area_sqft = $row_warehouse['area_sqft'];
                                $warehouse_no_of_bays = $row_warehouse['no_of_bays'];
                                $warehouse_electricity = $row_warehouse['electricity'];
                                $warehouse_water = $row_warehouse['water'];
                                $warehouse_telephone = $row_warehouse['telephone'];
                                $warehouse_cctv = $row_warehouse['cctv'];
                                $warehouse_price = $row_warehouse['value'];
                                $warehouse_availability = $row_warehouse['availability'];
                                $i++;

                                ?>

                                <tr>
                                    <td style="min-width: 130px">

                                        <button type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                data-original-title="" title="Edit"
                                                onclick="location.href = 'index.php?edit_warehouse=<?php echo $warehouse_id; ?>';">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                data-original-title="" title="Remove"
                                                onclick="location.href = 'index.php?delete_warehouse=<?php echo $warehouse_id; ?>';">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <style>
                                        .image {
                                            -webkit-transition: all 0.7s ease;
                                            transition: all 0.7s ease;
                                        }

                                        .image:hover {
                                            -webkit-transform: scale(3.5);
                                            transform: scale(3.5);
                                        }
                                    </style>

                                    <td><?php echo $i; ?></td>
                                    <td><img class="image" src="warehouse_images/<?php echo $warehouse_image; ?>" width="60"
                                             height="60"></td>
                                    <td><?php echo $warehouse_code; ?></td>
                                    <td><?php echo $warehouse_category; ?></td>
                                    <td><?php echo $warehouse_address; ?></td>
                                    <td><?php echo $warehouse_city; ?></td>
                                    <td><?php echo $warehouse_rd_acc; ?></td>
                                    <td>LKR &nbsp;<?php echo $warehouse_price_sqft; ?></td>
                                    <td><?php echo $warehouse_area_sqft; ?></td>
                                    <td><?php echo $warehouse_no_of_bays; ?></td>
                                    <td><?php echo $warehouse_electricity; ?></td>
                                    <td><?php echo $warehouse_water; ?></td>
                                    <td><?php echo $warehouse_telephone; ?></td>
                                    <td><?php echo $warehouse_cctv; ?></td>
                                    <td>LKR &nbsp; <?php echo $warehouse_price; ?></td>
                                    <td><?php echo $warehouse_availability; ?></td>

                                </tr>

                            <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




<?php } ?>