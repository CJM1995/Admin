<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    //$result = $mysqli->query("SELECT * FROM houses");


    ?>


    <div class="row">
        <!--  1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->
            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Lands
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->

    </div><!--  1 row Ends -->

    <div class="row">
        <!-- 2 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->
            <div class="panel panel-default">
                <!-- panel panel-default Starts -->
                <div class="panel-heading clearfix">
                    <!-- panel-heading Starts -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="panel-title pull-left" style="padding-top: 7.5px;">
                                <i class="fa fa-map-signs fa-2x fa-fw"></i> View Lands
                            </h3>
                        </div>
                    </div>
                    <br>
                    <form name="search_form" method="post">
                        <div class="input-group">
                            <input type="text" name="search_box" class="form-control" placeholder="Search">
                            <div style="background-color: #2e6da4" class="input-group-addon">
                                <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none" name="ava">
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
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="sale_t[]" value="Sale">Sale
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="sale_t[]" value="Rent">Rent
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="sale_t[]" value="Lease">Lease
                                </label>

                                <label class="radio-inline"><input type="radio" name="optradio" value="Code">Code</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="City">City</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Quantity">Quantity(Perches)</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Price">Price</label>
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
                            $sale = $_POST['st_sale'];
                            $rent = $_POST['st_sale'];
                            $lease = $_POST['st_sale'];

                            $first = array_values($_POST['sale_t'])[0];
                            $second = array_values($_POST['sale_t'])[1];
                            $third = array_values($_POST['sale_t'])[2];

                            $st_count = count($_POST['sale_t']);

                            if ($st_count == 1) {
                                if ($box == '' || $box == null) {
                                    if (strcmp($first, 'Sale') == 0) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Rent') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Lease') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }
                                // echo ("<script>console.log('st_count1: " . $st_count . "');</script>");
                                // echo ("<script>console.log('radio opt: " . $rdo . "');</script>");
                                // echo ("<script>console.log('box: " . $box . "');</script>");
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) and (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } elseif ($st_count == 2) {
                                if ($box == '' || $box == null) {
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM lands WHERE availability='" . $ava . "' AND land_id IN (SELECT land_id FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM lands WHERE availability='" . $ava . "' AND land_id IN (SELECT land_id FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM lands WHERE availability='" . $ava . "' AND land_id IN (SELECT land_id FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Quantity') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM lands WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND land_id IN (SELECT land_id FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } else {
                                if ($box == '' || $box == null) {
                                    $get_rslt = "SELECT * FROM lands WHERE availability='" . $ava . "'";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                } else {
                                    if (strcmp($rdo, 'City') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE city LIKE '%$box%' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Quantity') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE available_qty='" . $box . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Price') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE total_price LIKE '%$box%' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Code') == 0) {
                                        $get_rslt = "SELECT * FROM lands WHERE code='" . $box . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
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
                                                <button type="button" class="close" onclick="window.open('index.php?view_lands','_self')">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive small-text">
                                                    <!-- table-responsive Starts -->
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <!-- table table-bordered table-hover table-striped Starts -->
                                                        <thead>
                                                            <tr>
                                                                <th style="vertical-align: middle;text-align: center"><i class="fa fa-gear"></i></th>
                                                                <!-- <th style="vertical-align: middle;text-align: center">Land
                                                                    ID
                                                                </th> -->
                                                                <th style="vertical-align: middle;text-align: center">Land
                                                                    Code
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Land
                                                                    Image
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Owner Name
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Contact Number
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
                                                                    Total Qty.
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Available Qty.
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Perch
                                                                    Price
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Total Price
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Availability
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Creater
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Description
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                        $i = 0;
                                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {
                                                                            $lnd_id_s = $row_rslt['land_id'];
                                                                            $lnd_code_s = $row_rslt['code'];
                                                                            $lnd_ow_id_s = $row_rslt['owner_id'];
                                                                            $get_o_name = "select * from owners where owner_id='$lnd_ow_id_s'";
                                                                            $run_o_name = mysqli_query($con, $get_o_name);
                                                                            $row_o_name = mysqli_fetch_array($run_o_name);
                                                                            $o_name = $row_o_name['name'];
                                                                            $ow_number = $row_o_name['phone'];

                                                                            $lnd_ow_name_s = $o_name;
                                                                            $lnd_ow_number_s = $ow_number;
                                                                            $lnd_img1_s = $row_rslt['land_img1'];
                                                                            $lnd_img2_s = $row_rslt['land_img2'];
                                                                            $lnd_img3_s = $row_rslt['land_img3'];
                                                                            $lnd_address_s = $row_rslt['address'];
                                                                            $lnd_city_s = $row_rslt['city'];
                                                                            $lnd_s_type_s = $row_rslt['sale_type'];
                                                                            $lnd_t_qty_s = $row_rslt['total_qty'];
                                                                            $lnd_a_qty_s = $row_rslt['available_qty'];
                                                                            $lnd_p_prz_s = $row_rslt['perch_prz'];
                                                                            $lnd_tot_prz_s = $row_rslt['total_price'];
                                                                            $lnd_ava_s = $row_rslt['availability'];
                                                                            $lnd_creater_s = $row_rslt['creater'];
                                                                            $lnd_desc_s = $row_rslt['description'];
                                                                            $i++;
                                                                            ?>
                                                                <tr>
                                                                    <?php
                                                                                    if (strcmp($lnd_ava_s, 'Available') == 0) {
                                                                                        echo "<td style=\"text-align:center\">
                                                                    <button style=\"margin-top: 2px;display:block;\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_land=$lnd_id_s';\">
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button style=\"margin-top: 2px;display:block;\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_land=$lnd_id_s';\">
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </td>";
                                                                                    } else {
                                                                                        echo "<td style=\"text-align:center\">
                                                                    <button style=\"margin-top: 2px;display:block;\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_land=$lnd_id_s';\" disabled>
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button style=\"margin-top: 2px;display:block;\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_land=$lnd_id_s';\">
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </td>";
                                                                                    }
                                                                                    ?>
                                                                    <!-- <td><?php echo $i; ?></td> -->
                                                                    <td><?php echo $lnd_code_s; ?></td>
                                                                    <!--                                                                <style>-->
                                                                    <!--                                                                </style>-->
                                                                    <td><img class="image" src="land_images/<?php echo $lnd_img1_s; ?>" width="60" height="60"></td>
                                                                    <td><?php echo $lnd_ow_name_s; ?></td>
                                                                    <td><?php echo $lnd_ow_number_s; ?></td>
                                                                    <td><?php echo $lnd_address_s; ?></td>
                                                                    <td><?php echo $lnd_city_s; ?></td>
                                                                    <td><?php echo $lnd_s_type_s; ?></td>
                                                                    <td><?php echo number_format($lnd_t_qty_s,2); ?></td>
                                                                    <td><?php echo number_format($lnd_a_qty_s,2); ?></td>
                                                                    <td>LKR &nbsp;<?php echo number_format($lnd_p_prz_s,2); ?></td>
                                                                    <td>LKR &nbsp;<?php echo number_format($lnd_tot_prz_s,2); ?></td>
                                                                    <td><?php echo $lnd_ava_s; ?></td>
                                                                    <td><?php echo $lnd_creater_s; ?></td>
                                                                    <td><?php echo $lnd_desc_s; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" onclick="window.open('index.php?view_lands','_self')">Close
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

                <div class="panel-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive small-text">
                        <!-- table-responsive Starts -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->
                            <thead>

                                <tr>
                                    <th style="vertical-align: middle;text-align: center"><i class="fa fa-gear"></i></th>
                                    <th style="vertical-align: middle;text-align: center">Land
                                        Code
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Land
                                        Image
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Owner Name</th>
                                    <th style="vertical-align: middle;text-align: center">Contact Number</th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Address
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">City
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Sale
                                        Type
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Total Qty.
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Available Qty.
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Perch
                                        Price
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Total
                                        Price
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Availability
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Creater</th>
                                    <th style="vertical-align: middle;text-align: center">Description</th>


                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                    $i = 0;

                                    $get_land = "select * from lands";

                                    $run_land = mysqli_query($con, $get_land);

                                    while ($row_land = mysqli_fetch_array($run_land)) {

                                        $lnd_id = $row_land['land_id'];
                                        $lnd_code = $row_land['code'];
                                        $lnd_img1 = $row_land['land_img1'];
                                        $lnd_img2 = $row_land['land_img2'];
                                        $lnd_img3 = $row_land['land_img3'];

                                        $lnd_ow_id = $row_land['owner_id'];
                                        $get_o_name_n = "select * from owners where owner_id='$lnd_ow_id'";
                                        $run_o_name_n = mysqli_query($con, $get_o_name_n);
                                        $row_o_name_n = mysqli_fetch_array($run_o_name_n);
                                        $o_name_n = $row_o_name_n['name'];
                                        $ow_number_n = $row_o_name_n['phone'];

                                        $lnd_ow_name = $o_name_n;
                                        $lnd_ow_number = $ow_number_n;
                                        $lnd_address = $row_land['address'];
                                        $lnd_city = $row_land['city'];
                                        $lnd_s_type = $row_land['sale_type'];
                                        $lnd_t_qty = $row_land['total_qty'];
                                        $lnd_a_qty = $row_land['available_qty'];
                                        $lnd_p_prz = $row_land['perch_prz'];
                                        $lnd_tot_prz = $row_land['total_price'];
                                        $lnd_ava = $row_land['availability'];
                                        $lnd_creater = $row_land['creater'];
                                        $lnd_desc = $row_land['description'];

                                        $i++;

                                        ?>

                                    <tr>
                                        <?php
                                                if (strcmp($lnd_ava, 'Available') == 0) {
                                                    echo "<td style=\"text-align:center\">
                                        <button style=\"margin-top: 2px;display:block;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_land=$lnd_id';\">
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>
                                        <button style=\"margin-top: 2px;display:block;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_land=$lnd_id';\">
                                            <i class=\"fa fa-trash\"></i>
                                        </button>
                                    </td>";
                                                } else {
                                                    echo "<td style=\"text-align:center\">
                                        <button style=\"margin-top: 2px;display:block;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_land=$lnd_id';\" disabled>
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>
                                        <button style=\"margin-top: 2px;display:block;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_land=$lnd_id';\">
                                            <i class=\"fa fa-trash\"></i>
                                        </button>
                                    </td>";
                                                }
                                                ?>
                                        <!-- <td><?php echo $i; ?></td> -->
                                        <td><?php echo $lnd_code; ?></td>
                                        <!--                                    <style>-->
                                        <!--                                    </style>-->
                                        <td><img class="image" src="land_images/<?php echo $lnd_img1; ?>" width="60" height="60"></td>
                                        <td style="text-align:center;"><?php echo $lnd_ow_name; ?></td>
                                        <td><?php echo $lnd_ow_number; ?></td>
                                        <td><?php echo $lnd_address; ?></td>
                                        <td><?php echo $lnd_city; ?></td>
                                        <td><?php echo $lnd_s_type; ?></td>
                                        <td><?php echo number_format($lnd_t_qty,2); ?></td>
                                        <td><?php echo number_format($lnd_a_qty,2); ?></td>
                                        <td>LKR &nbsp;<?php echo number_format($lnd_p_prz,2); ?></td>
                                        <td>LKR &nbsp;<?php echo number_format($lnd_tot_prz,2); ?></td>
                                        <td><?php echo $lnd_ava; ?></td>
                                        <td><?php echo $lnd_creater; ?></td>
                                        <td><?php echo $lnd_desc; ?></td>

                                    </tr>

                                <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <a class="gotopbtn" href="#"> <i class="fa fa-arrow-circle-up"></i> </a>
<?php } ?>