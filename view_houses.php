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
                    <i class="fa fa-dashboard"></i> Dashboard / View Houses
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
                                <i class="fa fa-home fa-2x fa-fw"></i> View Houses
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
                                <!-- <label class="radio-inline"><input type="radio" name="optradio" value="Sale Type">Sale
                                    Type</label> -->
                                <label class="radio-inline"><input type="radio" name="optradio" value="Bedrooms">Bedrooms</label>
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
                            $box = strval($_POST['search_box']);
                            $sale = $_POST['st_sale'];
                            $rent = $_POST['st_sale'];
                            $lease = $_POST['st_sale'];

                            $first = array_values($_POST['sale_t'])[0];
                            $second = array_values($_POST['sale_t'])[1];
                            $third = array_values($_POST['sale_t'])[2];

                            $st_count = count($_POST['sale_t']);

                            // echo ("<script>console.log('first: " . $first . "');</script>");
                            // echo ("<script>console.log('second: " . $second . "');</script>");
                            // echo ("<script>console.log('third: " . $third . "');</script>");
                            // echo ("<script>console.log('st_count: " . $st_count . "');</script>");

                            if ($st_count == 1) {
                                // echo ("<script>console.log('st_count1: " . $st_count . "');</script>");
                                // echo ("<script>console.log('radio opt: " . $rdo . "');</script>");
                                // echo ("<script>console.log('box: " . $box . "');</script>");
                                if ($box == '' || $box == null) {
                                    if (strcmp($first, 'Sale') == 0) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Rent') == 0) {
                                        $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Lease') == 0) {
                                        $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }

                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) and (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) and (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } elseif ($st_count == 2) {
                                if ($box == '' || $box == null) {
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM houses WHERE availability='" . $ava . "' AND house_id IN (SELECT house_id FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM houses WHERE availability='" . $ava . "' AND house_id IN (SELECT house_id FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM houses WHERE availability='" . $ava . "' AND house_id IN (SELECT house_id FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }

                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Bedrooms') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM houses WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND house_id IN (SELECT house_id FROM houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } else {
                                if ($box == '' || $box == null) {
                                    $get_rslt = "SELECT * FROM houses WHERE availability='" . $ava . "'";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                } else {

                                    if (strcmp($rdo, 'City') == 0) {
                                        $get_rslt = "SELECT * FROM houses WHERE city LIKE '%$box%' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Bedrooms') == 0) {
                                        $get_rslt = "select * from houses WHERE bedrooms='" . $box . "' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Price') == 0) {
                                        $get_rslt = "SELECT * from houses WHERE base_price LIKE '%$box%' AND availability='" . $ava . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Code') == 0) {
                                        $get_rslt = "select * from houses WHERE code='" . $box . "' AND availability='" . $ava . "'";
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
                                                <button type="button" class="close" onclick="window.open('index.php?view_houses','_self')">
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
                                                                <!-- <th style="vertical-align: middle;text-align: center">House
                                                                    ID
                                                                </th> -->
                                                                <th style="vertical-align: middle;text-align: center">House
                                                                    Code
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">House
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
                                                                <th style="vertical-align: middle;text-align: center">Land Size
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Bedrooms
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">A/C
                                                                    Bedrooms
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
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Creater
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Description
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                        $i = 0;
                                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {
                                                                            $hou_id_s = $row_rslt['house_id'];
                                                                            $hou_code_s = $row_rslt['code'];

                                                                            $hou_ow_id_s = $row_rslt['owner_id'];
                                                                            $get_o_name = "select * from owners where owner_id='$hou_ow_id_s'";
                                                                            $run_o_name = mysqli_query($con, $get_o_name);
                                                                            $row_o_name = mysqli_fetch_array($run_o_name);
                                                                            $o_name = $row_o_name['name'];
                                                                            $ow_number = $row_o_name['phone'];

                                                                            $hou_ow_name_s = $o_name;
                                                                            $hou_ow_number_s = $ow_number;
                                                                            $hou_img1_s = $row_rslt['house_img1'];
                                                                            $hou_img2_s = $row_rslt['house_img2'];
                                                                            $hou_img3_s = $row_rslt['house_img3'];
                                                                            $hou_address_s = $row_rslt['address'];
                                                                            $hou_city_s = $row_rslt['city'];
                                                                            $hou_s_type_s = $row_rslt['sale_type'];
                                                                            $hou_land_size_s = $row_rslt['land_size'];
                                                                            $hou_beds_s = $row_rslt['bedrooms'];
                                                                            $hou_ac_beds_s = $row_rslt['ac_rooms'];
                                                                            $hou_baths_s = $row_rslt['bathrooms'];
                                                                            $hou_floor_s = $row_rslt['floor'];
                                                                            $hou_prz_s = $row_rslt['base_price'];
                                                                            $hou_ava_s = $row_rslt['availability'];
                                                                            $hou_creater_s = $row_rslt['creater'];
                                                                            $hou_extra_desc_s = $row_rslt['description'];
                                                                            $i++;
                                                                            ?>
                                                                <tr>
                                                                    <?php
                                                                                    if (strcmp($hou_ava_s, 'Available') == 0) {
                                                                                        echo "<td style=\"text-align:center\">
                                                                    <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_house=$hou_id_s';\">
                                                                        <i class=\"fa fa-pencil fa-fw\"></i>
                                                                    </button>
                                                                    <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_house=$hou_id_s';\">
                                                                        <i class=\"fa fa-trash fa-fw\"></i>
                                                                    </button>
                                                                </td>";
                                                                                    } else {
                                                                                        echo "<td style=\"text-align:center\">
                                                                    <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_house=$hou_id_s';\" disabled>
                                                                        <i class=\"fa fa-pencil fa-fw\"></i>
                                                                    </button>
                                                                    <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_house=$hou_id_s';\">
                                                                        <i class=\"fa fa-trash fa-fw\"></i>
                                                                    </button>
                                                                </td>";
                                                                                    }
                                                                                    ?>
                                                                    <!-- <td><?php echo $i; ?></td> -->
                                                                    <td><?php echo $hou_code_s; ?></td>
                                                                    <!--                                                                <style>-->
                                                                    <!--                                                                </style>-->
                                                                    <td><img class="image" src="house_images/<?php echo $hou_img1_s; ?>" width="60" height="60"></td>
                                                                    <td><?php echo $hou_ow_name_s; ?></td>
                                                                    <td><?php echo $hou_ow_number_s; ?></td>
                                                                    <td><?php echo $hou_address_s; ?></td>
                                                                    <td><?php echo $hou_city_s; ?></td>
                                                                    <td><?php echo $hou_s_type_s; ?></td>
                                                                    <td><?php echo number_format($hou_land_size_s,2); ?></td>
                                                                    <td><?php echo $hou_beds_s; ?></td>
                                                                    <td><?php echo $hou_ac_beds_s; ?></td>
                                                                    <td><?php echo $hou_baths_s; ?></td>
                                                                    <td><?php echo $hou_floor_s; ?></td>
                                                                    <td>LKR &nbsp;<?php echo number_format($hou_prz_s,2); ?></td>
                                                                    <td><?php echo $hou_ava_s; ?></td>
                                                                    <td><?php echo $hou_creater_s; ?></td>
                                                                    <td><?php echo $hou_extra_desc_s; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" onclick="window.open('index.php?view_houses','_self')">Close
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
                                    <!-- <th style="vertical-align: middle;text-align: center">House ID</th> -->
                                    <th style="vertical-align: middle;text-align: center">House Code</th>
                                    <th style="vertical-align: middle;text-align: center">House Image</th>
                                    <th style="vertical-align: middle;text-align: center">Owner Name</th>
                                    <th style="vertical-align: middle;text-align: center">Contact Number</th>
                                    <th style="vertical-align: middle;text-align: center">Address</th>
                                    <th style="vertical-align: middle;text-align: center">City</th>
                                    <th style="vertical-align: middle;text-align: center">Sale Type</th>
                                    <th style="vertical-align: middle;text-align: center">Land Size</th>
                                    <th style="vertical-align: middle;text-align: center">Bedrooms</th>
                                    <th style="vertical-align: middle;text-align: center">A/C Bedrooms</th>
                                    <th style="vertical-align: middle;text-align: center">Bathrooms</th>
                                    <th style="vertical-align: middle;text-align: center">Floor Material</th>
                                    <th style="vertical-align: middle;text-align: center">Base Price</th>
                                    <th style="vertical-align: middle;text-align: center">Availability</th>
                                    <th style="vertical-align: middle;text-align: center">Creater</th>
                                    <th style="vertical-align: middle;text-align: center">Description</th>


                                </tr>

                            </thead>

                            <tbody>
                                <form name="extra_d" method="post" enctype="multipart/form-data">

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

                                            $hou_ow_id = $row_pro['owner_id'];
                                            $get_o_name_n = "select * from owners where owner_id='$hou_ow_id'";
                                            $run_o_name_n = mysqli_query($con, $get_o_name_n);
                                            $row_o_name_n = mysqli_fetch_array($run_o_name_n);
                                            $o_name_n = $row_o_name_n['name'];
                                            $ow_number_n = $row_o_name_n['phone'];

                                            $hou_ow_name = $o_name_n;
                                            $hou_ow_number = $ow_number_n;

                                            $hou_address = $row_pro['address'];
                                            $hou_city = $row_pro['city'];
                                            $hou_s_type = $row_pro['sale_type'];
                                            $hou_land_size = $row_pro['land_size'];
                                            $hou_beds = $row_pro['bedrooms'];
                                            $hou_ac_beds = $row_pro['ac_rooms'];
                                            $hou_baths = $row_pro['bathrooms'];
                                            $hou_floor = $row_pro['floor'];
                                            $hou_prz = $row_pro['base_price'];
                                            $hou_extra_desc = $row_pro['description'];
                                            $hou_ava = $row_pro['availability'];
                                            $hou_creater = $row_pro['creater'];

                                            $i++;

                                            ?>

                                        <tr>
                                            <?php
                                                    if (strcmp($hou_ava, 'Available') == 0) {
                                                        echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_house=$hou_id';\">
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_house=$hou_id';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                    } else {
                                                        echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_house=$hou_id';\" disabled>
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_house=$hou_id';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                    }
                                                    ?>
                                            <!-- <td><?php echo $i; ?></td> -->
                                            <td><?php echo $hou_code; ?></td>
                                            <!--                                    <style>-->
                                            <!--                                    </style>-->
                                            <td><img class="image" src="house_images/<?php echo $hou_img1; ?>" width="60" height="60"></td>
                                            <td style="text-align:center;"><?php echo $hou_ow_name; ?></td>
                                            <td><?php echo $hou_ow_number; ?></td>
                                            <td><?php echo $hou_address; ?></td>
                                            <td><?php echo $hou_city; ?></td>
                                            <td><?php echo $hou_s_type; ?></td>
                                            <td><?php echo number_format($hou_land_size,2); ?></td>
                                            <td><?php echo $hou_beds; ?></td>
                                            <td><?php echo $hou_ac_beds; ?></td>
                                            <td><?php echo $hou_baths; ?></td>
                                            <td><?php echo $hou_floor; ?></td>
                                            <td>LKR &nbsp;<?php echo number_format($hou_prz,2); ?></td>
                                            <td><?php echo $hou_ava; ?></td>
                                            <td><?php echo $hou_creater; ?></td>
                                            <td><?php echo $hou_extra_desc; ?></td>

                                        </tr>

                                    <?php } ?>                               

                                </form>
                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <a class="gotopbtn" href="#"> <i class="fa fa-arrow-circle-up"></i> </a>
<?php } ?>