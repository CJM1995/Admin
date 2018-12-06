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
                    <i class="fa fa-dashboard"></i> Dashboard / View Lands
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
                                <i class="fa fa-map-signs fa-2x fa-fw"></i> View Lands
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
                                <label class="radio-inline"><input type="radio" name="optradio" value="Quantity">Quantity(Perches)</label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Price">Price</label>
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
                            $get_rslt = "select * from lands WHERE city LIKE '%$box%' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Sale Type') == 0) {
                            $get_rslt = "select * from lands WHERE sale_type LIKE '%$box%' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Quantity') == 0) {
                            $get_rslt = "select * from lands WHERE available_qty='$box' AND availability='$ava'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Price') == 0) {
                            $get_rslt = "select * from lands WHERE perch_prz='$box' AND availability='$ava'";
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
                                                        onclick="window.open('index.php?view_lands','_self')">
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
                                                            <th style="vertical-align: middle;text-align: center">Land
                                                                ID
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Land
                                                                Code
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Land
                                                                Image1
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Land
                                                                Image2
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Land
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
                                                                Total Qty.
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Available Qty.
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Perch
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
                                                            $lnd_id_s = $row_rslt['land_id'];
                                                            $lnd_code_s = $row_rslt['code'];
                                                            $lnd_img1_s = $row_rslt['land_img1'];
                                                            $lnd_img2_s = $row_rslt['land_img2'];
                                                            $lnd_img3_s = $row_rslt['land_img3'];
                                                            $lnd_address_s = $row_rslt['address'];
                                                            $lnd_city_s = $row_rslt['city'];
                                                            $lnd_s_type_s = $row_rslt['sale_type'];
                                                            $lnd_t_qty_s = $row_rslt['total_qty'];
                                                            $lnd_a_qty_s = $row_rslt['available_qty'];
                                                            $lnd_p_prz_s = $row_rslt['perch_prz'];
                                                            $lnd_ava_s = $row_rslt['availability'];
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                                if(strcmp($lnd_ava_s,'Available')==0){
                                                                    echo "<td>
                                                                    <button style=\"margin-top: 2px\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_land=$lnd_id_s';\">
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button style=\"margin-top: 2px\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_land=$lnd_id_s';\">
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </td>";
                                                                }
                                                                else{
                                                                    echo "<td>
                                                                    <button style=\"margin-top: 2px\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-success btn-sm\"
                                                                            data-original-title=\"\" title=\"Edit\"
                                                                            onclick=\"location.href = 'index.php?edit_land=$lnd_id_s';\" disabled>
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button style=\"margin-top: 2px\" type=\"button\"
                                                                            rel=\"tooltip\"
                                                                            class=\"btn btn-danger btn-sm\"
                                                                            data-original-title=\"\" title=\"Remove\"
                                                                            onclick=\"location.href = 'index.php?delete_land=$lnd_id_s';\" disabled>
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </td>";
                                                                }
                                                                ?>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $lnd_code_s; ?></td>
<!--                                                                <style>-->
<!--                                                                </style>-->
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $lnd_img1_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $lnd_img2_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><img class="image"
                                                                         src="house_images/<?php echo $lnd_img3_s; ?>"
                                                                         width="60"
                                                                         height="60"></td>
                                                                <td><?php echo $lnd_address_s; ?></td>
                                                                <td><?php echo $lnd_city_s; ?></td>
                                                                <td><?php echo $lnd_s_type_s; ?></td>
                                                                <td><?php echo $lnd_t_qty_s; ?></td>
                                                                <td><?php echo $lnd_a_qty_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $lnd_p_prz_s; ?></td>
                                                                <td><?php echo $lnd_ava_s; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        onclick="window.open('index.php?view_lands','_self')">Close
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
                                <th style="vertical-align: middle;text-align: center"><i
                                            class="fa fa-gear"></i></th>
                                <th style="vertical-align: middle;text-align: center">Land
                                    ID
                                </th>
                                <th style="vertical-align: middle;text-align: center">Land
                                    Code
                                </th>
                                <th style="vertical-align: middle;text-align: center">Land
                                    Image1
                                </th>
                                <th style="vertical-align: middle;text-align: center">Land
                                    Image2
                                </th>
                                <th style="vertical-align: middle;text-align: center">Land
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
                                    Total Qty.
                                </th>
                                <th style="vertical-align: middle;text-align: center">
                                    Available Qty.
                                </th>
                                <th style="vertical-align: middle;text-align: center">Perch
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

                            $get_land = "select * from lands";

                            $run_land = mysqli_query($con, $get_land);

                            while ($row_land = mysqli_fetch_array($run_land)) {

                                $lnd_id = $row_land['land_id'];
                                $lnd_code = $row_land['code'];
                                $lnd_img1 = $row_land['land_img1'];
                                $lnd_img2 = $row_land['land_img2'];
                                $lnd_img3 = $row_land['land_img3'];
                                $lnd_address = $row_land['address'];
                                $lnd_city = $row_land['city'];
                                $lnd_s_type = $row_land['sale_type'];
                                $lnd_t_qty = $row_land['total_qty'];
                                $lnd_a_qty = $row_land['available_qty'];
                                $lnd_p_prz = $row_land['perch_prz'];
                                $lnd_ava = $row_land['availability'];

                                $i++;

                                ?>

                                <tr>
                                    <?php
                                    if(strcmp($lnd_ava,'Available')==0){
                                        echo "<td>
                                        <button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_land=$lnd_id';\">
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>
                                        <button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_land=$lnd_id';\">
                                            <i class=\"fa fa-trash\"></i>
                                        </button>
                                    </td>";
                                    }
                                    else{
                                        echo "<td>
                                        <button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Edit\"
                                                onclick=\"location.href = 'index.php?edit_land=$lnd_id';\" disabled>
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>
                                        <button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?delete_land=$lnd_id';\" disabled>
                                            <i class=\"fa fa-trash\"></i>
                                        </button>
                                    </td>";
                                    }
                                    ?>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $lnd_code; ?></td>
<!--                                    <style>-->
<!--                                    </style>-->
                                    <td><img class="image" src="house_images/<?php echo $lnd_img1; ?>" width="60"
                                             height="60"></td>
                                    <td><img class="image" src="house_images/<?php echo $lnd_img2; ?>" width="60"
                                             height="60"></td>
                                    <td><img class="image" src="house_images/<?php echo $lnd_img3; ?>" width="60"
                                             height="60"></td>
                                    <td><?php echo $lnd_address; ?></td>
                                    <td><?php echo $lnd_city; ?></td>
                                    <td><?php echo $lnd_s_type; ?></td>
                                    <td><?php echo $lnd_t_qty; ?></td>
                                    <td><?php echo $lnd_a_qty; ?></td>
                                    <td>LKR &nbsp;<?php echo $lnd_p_prz; ?></td>
                                    <td><?php echo $lnd_ava; ?></td>

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