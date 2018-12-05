<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
    //$result = $mysqli->query("SELECT * FROM houses");


    ?>


    <div class="row"><!--  1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Houses
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
                                <i class="fa fa-home fa-2x fa-fw"></i> View Houses
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
                                <label class="radio-inline"><input type="radio" name="optradio" value="Sale Type">Sale
                                    Type</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Bedrooms">Bedrooms</label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Price">Price</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Advance">Advance</label>
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

                        if (strcmp($ava, 'Available') == 0) {
                            if (strcmp($rdo, 'City') == 0) {
                                $get_rslt = "select * from houses WHERE city LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Sale Type') == 0) {
                                $get_rslt = "select * from houses WHERE sale_type LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Bedrooms') == 0) {
                                $get_rslt = "select * from houses WHERE bedrooms LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Price') == 0) {
                                $get_rslt = "select * from houses WHERE base_price LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                        }

                        if (strcmp($ava, 'Not - available') == 0) {
                            if (strcmp($rdo, 'City') == 0) {
                                $get_rslt = "select * from houses WHERE city LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Sale Type') == 0) {
                                $get_rslt = "select * from houses WHERE sale_type LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Bedrooms') == 0) {
                                $get_rslt = "select * from houses WHERE bedrooms LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
                            if (strcmp($rdo, 'Price') == 0) {
                                $get_rslt = "select * from houses WHERE base_price LIKE '%$box%' AND availability='$ava'";
                                $run_rslt = mysqli_query($con, $get_rslt);
                            }
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
                            <div class="modal fade" id="sModal" role="dialog" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <form method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        onclick="window.open('index.php?view_houses','_self')">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive"><!-- table-responsive Starts -->
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <!-- table table-bordered table-hover table-striped Starts -->
                                                        <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;text-align: center"><i
                                                                        class="fa fa-gear"></i></th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                ID
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                Code
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                Image1
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                Image2
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                Image3
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Address
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">City
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Sale
                                                                Type
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Bedrooms
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">A/C
                                                                Bedrooms Date
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Bathrooms
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Floor
                                                                Material
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Base
                                                                Price
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Availability
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0;
                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {
                                                            $hou_id_s = $row_rslt['house_id'];
                                                            $hou_code_s = $row_rslt['code'];
                                                            $hou_img1_s = $row_rslt['house_img1'];
                                                            $hou_img2_s = $row_rslt['house_img2'];
                                                            $hou_img3_s = $row_rslt['house_img3'];
                                                            $hou_address_s = $row_rslt['address'];
                                                            $hou_city_s = $row_rslt['city'];
                                                            $hou_s_type_s = $row_rslt['sale_type'];
                                                            $hou_beds_s = $row_rslt['bedrooms'];
                                                            $hou_ac_beds_s = $row_rslt['ac_rooms'];
                                                            $hou_baths_s = $row_rslt['bathrooms'];
                                                            $hou_floor_s = $row_rslt['floor'];
                                                            $hou_prz_s = $row_rslt['base_price'];
                                                            $hou_ava_s = $row_rslt['availability'];
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <button style="margin-top: 2px" type="button"
                                                                            rel="tooltip"
                                                                            class="btn btn-success btn-sm"
                                                                            data-original-title="" title="Edit"
                                                                            onclick="location.href = 'index.php?edit_house=<?php echo $hou_id_s; ?>';">
                                                                        <i class="fa fa-pencil fa-fw"></i>
                                                                    </button>
                                                                    <button style="margin-top: 2px" type="button"
                                                                            rel="tooltip"
                                                                            class="btn btn-danger btn-sm"
                                                                            data-original-title="" title="Remove"
                                                                            onclick="location.href = 'index.php?delete_house=<?php echo $hou_id_s; ?>';">
                                                                        <i class="fa fa-trash fa-fw"></i>
                                                                    </button>
                                                                </td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $hou_code_s; ?></td>
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
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $hou_img1_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $hou_img2_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $hou_img3_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><?php echo $hou_address_s; ?></td>
                                                                <td><?php echo $hou_city_s; ?></td>
                                                                <td><?php echo $hou_s_type_s; ?></td>
                                                                <td><?php echo $hou_beds_s; ?></td>
                                                                <td><?php echo $hou_ac_beds_s; ?></td>
                                                                <td><?php echo $hou_baths_s; ?></td>
                                                                <td><?php echo $hou_floor_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $hou_prz_s; ?></td>
                                                                <td><?php echo $hou_ava_s; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        onclick="window.open('index.php?view_houses','_self')">Close
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
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->
                            <thead>

                            <tr>
                                <th style="vertical-align: middle;text-align: center"><i class="fa fa-gear"></i></th>
                                <th style="vertical-align: middle;text-align: center">House ID</th>
                                <th style="vertical-align: middle;text-align: center">House Code</th>
                                <th style="vertical-align: middle;text-align: center">House Image1</th>
                                <th style="vertical-align: middle;text-align: center">House Image2</th>
                                <th style="vertical-align: middle;text-align: center">House Image3</th>
                                <th style="vertical-align: middle;text-align: center">Address</th>
                                <th style="vertical-align: middle;text-align: center">City</th>
                                <th style="vertical-align: middle;text-align: center">Sale Type</th>
                                <th style="vertical-align: middle;text-align: center">Bedrooms</th>
                                <th style="vertical-align: middle;text-align: center">A/C Bedrooms Date</th>
                                <th style="vertical-align: middle;text-align: center">Bathrooms</th>
                                <th style="vertical-align: middle;text-align: center">Floor Material</th>
                                <th style="vertical-align: middle;text-align: center">Base Price</th>
                                <th style="vertical-align: middle;text-align: center">Availability</th>


                            </tr>

                            </thead>

                            <tbody>

                            <?php

                            $i = 0;

                            $get_pro = "select * from houses";

                            $run_pro = mysqli_query($con, $get_pro);

                            while ($row_pro = mysqli_fetch_array($run_pro)) {

                                $hou_id = $row_pro['house_id'];
                                $hou_code = $row_pro['code'];
                                $hou_img1 = $row_pro['house_img1'];
                                $hou_img2 = $row_pro['house_img2'];
                                $hou_img3 = $row_pro['house_img3'];
                                $hou_address = $row_pro['address'];
                                $hou_city = $row_pro['city'];
                                $hou_s_type = $row_pro['sale_type'];
                                $hou_beds = $row_pro['bedrooms'];
                                $hou_ac_beds = $row_pro['ac_rooms'];
                                $hou_baths = $row_pro['bathrooms'];
                                $hou_floor = $row_pro['floor'];
                                $hou_prz = $row_pro['base_price'];
                                $hou_ava = $row_pro['availability'];

                                $i++;

                                ?>

                                <tr>

                                    <td>
                                        <button style="margin-top: 2px" type="button" rel="tooltip"
                                                class="btn btn-success btn-sm"
                                                data-original-title="" title="Edit"
                                                onclick="location.href = 'index.php?edit_house=<?php echo $hou_id; ?>';">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </button>
                                        <button style="margin-top: 2px" type="button" rel="tooltip"
                                                class="btn btn-danger btn-sm"
                                                data-original-title="" title="Remove"
                                                onclick="location.href = 'index.php?delete_house=<?php echo $hou_id; ?>';">
                                            <i class="fa fa-trash fa-fw"></i>
                                        </button>
                                    </td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $hou_code; ?></td>
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
                                    <td><img class="image" src="house_images/<?php echo $hou_img1; ?>" width="60"
                                             height="60"></td>
                                    <td><img class="image" src="house_images/<?php echo $hou_img2; ?>" width="60"
                                             height="60"></td>
                                    <td><img class="image" src="house_images/<?php echo $hou_img3; ?>" width="60"
                                             height="60"></td>
                                    <td><?php echo $hou_address; ?></td>
                                    <td><?php echo $hou_city; ?></td>
                                    <td><?php echo $hou_s_type; ?></td>
                                    <td><?php echo $hou_beds; ?></td>
                                    <td><?php echo $hou_ac_beds; ?></td>
                                    <td><?php echo $hou_baths; ?></td>
                                    <td><?php echo $hou_floor; ?></td>
                                    <td>LKR &nbsp;<?php echo $hou_prz; ?></td>
                                    <td><?php echo $hou_ava; ?></td>

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