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
                    <i class="fa fa-dashboard"></i> Dashboard / View House Purchases
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
                                <i class="fa fa-dollar fa-2x fa-fw"></i><i class="fa fa-home fa-2x fa-fw"></i> View
                                House Purchases
                            </h3>
                        </div>
                    </div>
                    <br>
                    <form name="search_form" method="post">
                        <div class="input-group">
                            <input type="text" name="search_box" class="form-control" placeholder="Search">
                            <!--                            <div style="background-color: #2e6da4" class="input-group-addon">-->
                            <!--                                <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none"-->
                            <!--                                        name="ava">-->
                            <!--                                    class="btn-group-lg">-->
                            <!--                                    <option value="Available">Available</option>-->
                            <!--                                    <option value="Not - available">Not-available</option>-->
                            <!--                                </select>-->
                            <!--                            </div>-->
                            <div class="input-group-btn">
                                <button type="submit" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group center-block text-center">
                            <div class="form-horizontal">
                                <label class="radio-inline"><input type="radio" name="optradio" value="Invoice">Invoice</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Sale Type">Sale
                                    Type</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Payment Status">Payment
                                    Status</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Duration">Duration</label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Amount">Amount</label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Date">Date</label>
                            </div>

                        </div>
                    </form>
                    <?php
                    if (isset($_POST['search'])) {

                        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
                        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
                        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
                        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";
                        //$ava = $_POST['ava'];
                        $rdo = $_POST['optradio'];
                        $box = $_POST['search_box'];


                        if (strcmp($rdo, 'Invoice') == 0) {
                            $get_rslt = "select * from house_purchases WHERE invoice_no LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Sale Type') == 0) {
                            $get_rslt = "select * from house_purchases WHERE sale_type LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Payment Status') == 0) {
                            $get_rslt = "select * from house_purchases WHERE pay_status LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Duration') == 0) {
                            $get_rslt = "select * from house_purchases WHERE duration='$box'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Amount') == 0) {
                            $get_rslt = "select * from house_purchases WHERE tot_amt='$box' OR paid_amt='$box' OR rent_amt='$box' OR remain_amt='$box'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Date') == 0) {
                            $get_rslt = "select * from house_purchases WHERE p_date LIKE '%$box%'";
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
                                                        onclick="window.open('index.php?view_house_purchases','_self')">
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
                                                                Purchase
                                                                ID
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Customer ID
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">House
                                                                ID
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Invoice No.
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Sale
                                                                Type
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Purchased Date
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Total
                                                                Amount
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Paid
                                                                Amount
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">Rental
                                                                Amount
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Remaining Amount
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Payment Status
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Duration
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center">
                                                                Remaining Lease Installments
                                                            </th>

                                                        </tr>

                                                        </thead>

                                                        <tbody>

                                                        <?php

                                                        $i = 0;

                                                        $get_house = "select * from house_purchases";

                                                        $run_house = mysqli_query($con, $get_house);

                                                        while ($row_house = mysqli_fetch_array($run_house)) {

                                                            $hp_id_s = $row_house['hp_id'];
                                                            $cus_id_s = $row_house['cus_id'];
                                                            $house_id_s = $row_house['house_id'];
                                                            $invoice_no_s = $row_house['invoice_no'];
                                                            $sale_type_s = $row_house['sale_type'];
                                                            $p_date_s = $row_house['p_date'];
                                                            $tot_amt_s = $row_house['tot_amt'];
                                                            $paid_amt_s = $row_house['paid_amt'];
                                                            $rent_amt_s = $row_house['rent_amt'];
                                                            $remain_amt_s = $row_house['remain_amt'];
                                                            $pay_status_s = $row_house['pay_status'];
                                                            $duration_s = $row_house['duration'];
                                                            $l_ins_s = $row_house['lease_ins'];
                                                            $i++;

                                                            ?>

                                                            <tr>

                                                                <td>
                                                                    <?php
                                                                    if (strcmp($sale_type_s, 'Sale') == 0) {
                                                                        echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                                                class=\"btn btn-success btn-sm\"
                                                                                data-original-title=\"\" title=\"Update\"
                                                                                onclick=\"location.href = 'index.php?edit_sale_purchase_h=$hp_id_s'\">
                                                                            <i class=\"fa fa-pencil\"></i>
                                                                        </button>";
                                                                    }
                                                                    if (strcmp($sale_type_s, 'Rent') == 0) {
                                                                        echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                                                class=\"btn btn-success btn-sm\"
                                                                                data-original-title=\"\" title=\"Update\"
                                                                                onclick=\"location.href = 'index.php?edit_rent_purchase_h=$hp_id_s'\">
                                                                            <i class=\"fa fa-pencil\"></i>
                                                                        </button>";
                                                                    }
                                                                    if (strcmp($sale_type_s, 'Lease') == 0) {
                                                                        echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                                                class=\"btn btn-success btn-sm\"
                                                                                data-original-title=\"\" title=\"Update\"
                                                                                onclick=\"location.href = 'index.php?edit_lease_purchase_h=$hp_id_s'\">
                                                                            <i class=\"fa fa-pencil\"></i>
                                                                        </button>";
                                                                    }
                                                                    if ((strcmp($pay_status_s, 'Complete') == 0) || (strcmp($pay_status_s, 'Rental / Lease') == 0)) {
                                                                        echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                                                class=\"btn btn-danger btn-sm\"
                                                                                data-original-title=\"\" title=\"Remove\"
                                                                                onclick=\"location.href = 'index.php?remove_house_purchase=$hp_id_s';\">
                                                                            <i class=\"fa fa-trash\"></i>
                                                                        </button>";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $cus_id_s; ?></td>
                                                                <td><?php echo $house_id_s; ?></td>
                                                                <td><?php echo $invoice_no_s; ?></td>
                                                                <td><?php echo $sale_type_s; ?></td>
                                                                <td><?php echo $p_date_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $tot_amt_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $paid_amt_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $rent_amt_s; ?></td>
                                                                <td>LKR &nbsp;<?php echo $remain_amt_s; ?></td>
                                                                <td><?php echo $pay_status_s; ?></td>
                                                                <td><?php echo $duration_s; ?>&nbsp; Month/s</td>
                                                                <td><?php echo $l_ins_s; ?></td>
                                                            </tr>

                                                        <?php } ?>


                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        onclick="window.open('index.php?view_house_purchases','_self')">
                                                    Close
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
                                <th style="vertical-align: middle;text-align: center">House Purchase
                                    ID
                                </th>
                                <th style="vertical-align: middle;text-align: center">Customer ID
                                </th>
                                <th style="vertical-align: middle;text-align: center">House
                                    ID
                                </th>
                                <th style="vertical-align: middle;text-align: center">Invoice No.
                                </th>
                                <th style="vertical-align: middle;text-align: center">Sale Type
                                </th>
                                <th style="vertical-align: middle;text-align: center">Purchased Date
                                </th>
                                <th style="vertical-align: middle;text-align: center">Total Amount
                                </th>
                                <th style="vertical-align: middle;text-align: center">Paid Amount
                                </th>
                                <th style="vertical-align: middle;text-align: center">Rental Amount
                                </th>
                                <th style="vertical-align: middle;text-align: center">Remaining Amount
                                </th>
                                <th style="vertical-align: middle;text-align: center">Payment Status
                                </th>
                                <th style="vertical-align: middle;text-align: center">Duration
                                </th>
                                <th style="vertical-align: middle;text-align: center">Remaining Lease Installments
                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php

                            $i = 0;

                            $get_house = "select * from house_purchases";

                            $run_house = mysqli_query($con, $get_house);

                            while ($row_house = mysqli_fetch_array($run_house)) {

                                $hp_id = $row_house['hp_id'];
                                $cus_id = $row_house['cus_id'];
                                $house_id = $row_house['house_id'];
                                $invoice_no = $row_house['invoice_no'];
                                $sale_type = $row_house['sale_type'];
                                $p_date = $row_house['p_date'];
                                $tot_amt = $row_house['tot_amt'];
                                $paid_amt = $row_house['paid_amt'];
                                $rent_amt = $row_house['rent_amt'];
                                $remain_amt = $row_house['remain_amt'];
                                $pay_status = $row_house['pay_status'];
                                $duration = $row_house['duration'];
                                $l_ins = $row_house['lease_ins'];
                                $i++;

                                ?>

                                <tr>

                                    <td>
                                        <?php
                                        if (strcmp($sale_type, 'Sale') == 0) {
                                            echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Update\"
                                                onclick=\"location.href = 'index.php?edit_sale_purchase_h=$hp_id'\">
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>";
                                        }
                                        if (strcmp($sale_type, 'Rent') == 0) {
                                            echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Update\"
                                                onclick=\"location.href = 'index.php?edit_rent_purchase_h=$hp_id'\">
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>";
                                        }
                                        if (strcmp($sale_type, 'Lease') == 0) {
                                            echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-success btn-sm\"
                                                data-original-title=\"\" title=\"Update\"
                                                onclick=\"location.href = 'index.php?edit_lease_purchase_h=$hp_id'\">
                                            <i class=\"fa fa-pencil\"></i>
                                        </button>";
                                        }
                                        if ((strcmp($pay_status, 'Complete') == 0) || (strcmp($pay_status, 'Rental / Lease') == 0)) {
                                            echo "<button style=\"margin-top: 2px\" type=\"button\" rel=\"tooltip\"
                                                class=\"btn btn-danger btn-sm\"
                                                data-original-title=\"\" title=\"Remove\"
                                                onclick=\"location.href = 'index.php?remove_house_purchase=$hp_id';\">
                                            <i class=\"fa fa-trash\"></i>
                                        </button>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cus_id; ?></td>
                                    <td><?php echo $house_id; ?></td>
                                    <td><?php echo $invoice_no; ?></td>
                                    <td><?php echo $sale_type; ?></td>
                                    <td><?php echo $p_date; ?></td>
                                    <td>LKR &nbsp;<?php echo $tot_amt; ?></td>
                                    <td>LKR &nbsp;<?php echo $paid_amt; ?></td>
                                    <td>LKR &nbsp;<?php echo $rent_amt; ?></td>
                                    <td>LKR &nbsp;<?php echo $remain_amt; ?></td>
                                    <td><?php echo $pay_status; ?></td>
                                    <td><?php echo $duration; ?>&nbsp; Month/s</td>
                                    <td><?php echo $l_ins; ?></td>
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