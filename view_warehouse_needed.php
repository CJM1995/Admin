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
                    <i class="fa fa-dashboard"></i> Dashboard / View Needed Warehouses
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
                                <i class="fa fa-building fa-2x fa-fw"></i> View Needed Warehouses
                            </h3>
                        </div>
                    </div>
                    <br>
                    <form name="search_form" method="post">
                        <div class="input-group">
                            <input type="text" name="search_box" class="form-control" placeholder="Search">
                            <div style="background-color: #2e6da4;" class="input-group-addon">
                                <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none" name="status">
                                    class="btn-group-lg">
                                    <option value="Pending">Pending</option>
                                    <option value="On-hold">On-hold</option>
                                    <option value="Completed">Completed</option>
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
                                <label class="radio-inline"><input type="radio" name="optradio" value="Customer">Customer Name</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="City">City</label>
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
                            $status = $_POST['status'];
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
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND need_status='" . $status . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Rent') == 0) {
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND need_status='" . $status . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($first, 'Lease') == 0) {
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND need_status='" . $status . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }

                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } elseif ($st_count == 2) {
                                if ($box == '' || $box == null) {
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE need_status='" . $status . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE need_status='" . $status . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if ((strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                        // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE need_status='" . $status . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "')";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                }

                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'City') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    // echo ("<script>console.log('st_count2: " . $st_count . "');</script>");
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' OR sale_type='" . $second . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Customer') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE sale_type='" . $first . "' AND need_status='" . $status . "' AND cus_id IN (SELECT cus_id FROM customersn WHERE name LIKE '%$box%')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Rent') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Rent') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                                if ((strcmp($rdo, 'Price') == 0) && (strcmp($first, 'Sale') == 0) && (strcmp($second, 'Lease') == 0)) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE sale_type='" . $first . "' AND w_need_id IN (SELECT w_need_id FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "')";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                }
                            } else {
                                if ($box == '' || $box == null) {
                                    $get_rslt = "SELECT * FROM warehouse_needs WHERE need_status='" . $status . "'";
                                    $run_rslt = mysqli_query($con, $get_rslt);
                                } else {

                                    if (strcmp($rdo, 'City') == 0) {
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE city LIKE '%$box%' AND need_status='" . $status . "'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Customer') == 0) {
                                        $get_rslt = "SELECT * FROM warehouse_needs,customersn WHERE warehouse_needs.cus_id=customersn.cus_id AND warehouse_needs.need_status='" . $status . "' AND customersn.name LIKE '%$box%'";
                                        $run_rslt = mysqli_query($con, $get_rslt);
                                    }
                                    if (strcmp($rdo, 'Price') == 0) {
                                        $get_rslt = "SELECT * FROM warehouse_needs WHERE max_price LIKE '%$box%' AND need_status='" . $status . "'";
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
                                                <button type="button" class="close" onclick="window.open('index.php?view_warehouse_needed','_self')">
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
                                                                <th style="vertical-align: middle;text-align: center">Customer Name
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Contact Number
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Sale
                                                                    Type
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">City
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Area sq. ft
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Electricity
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Water
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Maximum Price
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Extra Details
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">Request Status
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center">
                                                                    Creater
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                        $i = 0;
                                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {
                                                                            $w_need_id_s = $row_rslt['w_need_id'];

                                                                            $w_need_cus_id_s = $row_rslt['cus_id'];
                                                                            $get_cus_name_n_s = "select * from customersn where cus_id='$w_need_cus_id_s'";
                                                                            $run_cus_name_n_s = mysqli_query($con, $get_cus_name_n_s);
                                                                            $row_cus_name_n_s = mysqli_fetch_array($run_cus_name_n_s);
                                                                            $cus_name_n_s = $row_cus_name_n_s['name'];
                                                                            $cus_number_n_s = $row_cus_name_n_s['phone'];

                                                                            $w_need_cus_name_s = $cus_name_n_s;
                                                                            $w_need_cus_number_s = $cus_number_n_s;

                                                                            $w_need_city_s = $row_rslt['city'];
                                                                            $w_need_s_type_s = $row_rslt['sale_type'];
                                                                            $w_need_area_sqft_s = $row_rslt['area_sqft'];
                                                                            $w_need_electric_s = $row_rslt['electricity'];
                                                                            $w_need_water_s = $row_rslt['water'];
                                                                            $w_need_max_price_s = $row_rslt['max_price'];
                                                                            $w_need_desc_s = $row_rslt['description'];
                                                                            $w_need_status_s = $row_rslt['need_status'];
                                                                            $w_need_creater_s = $row_rslt['creater'];
                                                                            $i++;
                                                                            ?>
                                                                <tr>
                                                                    <?php
                                                                                    if ((strcmp($w_need_status_s, 'Pending') == 0) || (strcmp($w_need_status_s, 'On-hold') == 0)) {
                                                                                        echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_warehouse_needed=$w_need_id_s';\">
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_warehouse_needed=$w_need_id_s';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                                                    } else {
                                                                                        echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_warehouse_needed=$w_need_id_s';\" disabled>
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_warehouse_needed=$w_need_id_s';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                                                    }
                                                                                    ?>
                                                                    <!-- <td><?php echo $i; ?></td> -->

                                                                    <td style="text-align:center;"><?php echo $w_need_cus_name_s; ?></td>
                                                                    <td><?php echo $w_need_cus_number_s; ?></td>
                                                                    <td><?php echo $w_need_s_type_s; ?></td>
                                                                    <td><?php echo $w_need_city_s; ?></td>
                                                                    <td><?php echo number_format($w_need_area_sqft_s,2); ?></td>
                                                                    <td><?php echo $w_need_electric_s; ?></td>
                                                                    <td><?php echo $w_need_water_s; ?></td>
                                                                    <td>LKR &nbsp;<?php echo number_format($w_need_max_price_s,2); ?></td>
                                                                    <td><?php echo $w_need_desc_s; ?></td>
                                                                    <td><?php echo $w_need_status_s; ?></td>
                                                                    <td><?php echo $w_need_creater_s; ?></td>

                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" onclick="window.open('index.php?view_warehouse_needed','_self')">Close
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
                                <tr>
                                    <th style="vertical-align: middle;text-align: center"><i class="fa fa-gear"></i></th>
                                    <!-- <th style="vertical-align: middle;text-align: center">House
                                                                    ID
                                                                </th> -->
                                    <th style="vertical-align: middle;text-align: center">Customer Name
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Contact Number
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Sale
                                        Type
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">City
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Area sq. ft
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Electricity
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Water
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Maximum Price
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Extra Details
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">Request Status
                                    </th>
                                    <th style="vertical-align: middle;text-align: center">
                                        Creater
                                    </th>
                                </tr>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                    $i = 0;

                                    $get_pro = "select * from warehouse_needs";

                                    $run_pro = mysqli_query($con, $get_pro);

                                    while ($row_pro = mysqli_fetch_array($run_pro)) {

                                        $w_need_id = $row_pro['w_need_id'];

                                        $w_need_cus_id = $row_pro['cus_id'];
                                        $get_cus_name_n = "select * from customersn where cus_id='$w_need_cus_id'";
                                        $run_cus_name_n = mysqli_query($con, $get_cus_name_n);
                                        $row_cus_name_n = mysqli_fetch_array($run_cus_name_n);
                                        $cus_name_n = $row_cus_name_n['name'];
                                        $cus_number_n = $row_cus_name_n['phone'];

                                        $w_need_cus_name = $cus_name_n;
                                        $w_need_cus_number = $cus_number_n;

                                        $w_need_city = $row_pro['city'];
                                        $w_need_s_type = $row_pro['sale_type'];
                                        $w_need_area_sqft = $row_pro['area_sqft'];
                                        $w_need_electric = $row_pro['electricity'];
                                        $w_need_water = $row_pro['water'];
                                        $w_need_max_price = $row_pro['max_price'];
                                        $w_need_desc = $row_pro['description'];
                                        $w_need_status = $row_pro['need_status'];
                                        $w_need_creater = $row_pro['creater'];

                                        $i++;

                                        ?>

                                    <tr>
                                        <?php
                                                if ((strcmp($w_need_status, 'Pending') == 0) || (strcmp($w_need_status, 'On-hold') == 0)) {
                                                    echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_warehouse_needed=$w_need_id';\">
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_warehouse_needed=$w_need_id';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                } else {
                                                    echo "<td style=\"text-align:center\">
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_warehouse_needed=$w_need_id';\" disabled>
                                            <i class=\"fa fa-pencil fa-fw\"></i>
                                        </button>
                                        <button style=\"display:block;margin:0 auto;margin-top:2px;\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_warehouse_needed=$w_need_id';\">
                                            <i class=\"fa fa-trash fa-fw\"></i>
                                        </button>
                                    </td>";
                                                }
                                                ?>
                                        <!-- <td><?php echo $i; ?></td> -->

                                        <td style="text-align:center;"><?php echo $w_need_cus_name; ?></td>
                                        <td><?php echo $w_need_cus_number; ?></td>
                                        <td><?php echo $w_need_s_type; ?></td>
                                        <td><?php echo $w_need_city; ?></td>
                                        <td><?php echo number_format($w_need_area_sqft,2); ?></td>
                                        <td><?php echo $w_need_electric; ?></td>
                                        <td><?php echo $w_need_water; ?></td>
                                        <td>LKR &nbsp;<?php echo number_format($w_need_max_price,2); ?></td>
                                        <td><?php echo $w_need_desc; ?></td>
                                        <td><?php echo $w_need_status; ?></td>
                                        <td><?php echo $w_need_creater; ?></td>

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