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
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
                                <i class="fa fa-building fa-2x fa-fw"></i> View Warehouses
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div style="background-color: #2e6da4" class="input-group-addon">
                            <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none"
                                    class="btn-group-lg">
                                <option>Available</option>
                                <option>Not-available</option>
                            </select>
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group center-block text-center">
                        <div class="form-horizontal">
                            <label class="radio-inline"><input type="radio" name="optradio">Location</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Area sq. ft</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Price per sq. ft</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Duration</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Advance</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Accommodation</label>
                        </div>

                    </div>
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
                                <th style="vertical-align: middle;text-align: center">Sale Type</th>
                                <th style="vertical-align: middle;text-align: center">Address</th>
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
                                $warehouse_image2 = $row_warehouse['warehouse_img2'];
                                $warehouse_image3 = $row_warehouse['warehouse_img3'];
                                $warehouse_category = $row_warehouse['sale_type'];
                                $warehouse_address = $row_warehouse['address'];
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

                                    <td><?php echo $i; ?></td>
                                    <td><img src="warehouse_images/<?php echo $warehouse_image; ?>" width="60"
                                             height="60"></td>
                                    <td><?php echo $warehouse_category; ?></td>
                                    <td><?php echo $warehouse_address; ?></td>
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