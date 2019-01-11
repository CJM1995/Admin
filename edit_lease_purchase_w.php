<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['edit_lease_purchase_w'])) {
        $edit_id = $_GET['edit_lease_purchase_w'];
        $get_record = "select * from warehouse_purchases where wp_id='$edit_id'";
        $run_record = mysqli_query($con, $get_record);
        $row_record = mysqli_fetch_array($run_record);
        $wp_id = $row_record['wp_id'];
        $cus_id = $row_record['cus_id'];
        $warehouse_id = $row_record['warehouse_id'];
        $invoice_no = $row_record['invoice_no'];
        $p_date = $row_record['p_date'];
        $tot_amt = $row_record['tot_amt'];
        $paid_amt = $row_record['paid_amt'];
        $lease_amt = $row_record['lease_amt'];
        $lease_ins = $row_record['lease_ins'];
        $remain_amt = $row_record['remain_amt'];
        $payment_status = $row_record['pay_status'];

        $result_cn = mysqli_query($con, "SELECT name AS cus_name FROM customersn WHERE cus_id='$cus_id'");
        $row_cn = mysqli_fetch_array($result_cn);
        $cus_name = $row_cn['cus_name'];

        $result_w = mysqli_query($con, "SELECT code AS w_code, sale_type AS s_type FROM warehouses WHERE warehouse_id='$warehouse_id'");
        $row_w = mysqli_fetch_array($result_w);
        $w_code = $row_w['w_code'];
        $s_type = $row_w['s_type'];
    }


    ?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Warehouse Purchase Details

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-dollar fa-2x fa-fw"></i><i class="fa fa-building fa-2x fa-fw"></i> Edit
                        Warehouse
                        Purchase Details

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Customer </label>
                            <div class="col-md-6">
                                <select name="cus_id" class="form-control" disabled>
                                    <option value="<?php echo $cus_id; ?>"> <?php echo $cus_name; ?> </option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Warehouse Code / Sale Type</label>
                            <div class="col-md-6">
                                <select name="house_id" class="form-control" disabled>
                                    <option value="<?php echo $warehouse_id; ?>"> <?php echo $w_code; ?>
                                        &nbsp;/&nbsp; <?php echo $s_type; ?> </option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Invoice No.</label>
                            <div class="col-md-6">
                                <input type="number" name="inv_no" id="inv_no" class="form-control" pattern="^[0-9]"
                                       min="1" data-tippy-arrow="true" data-tippy-size="large"
                                       data-tippy="Previous: <?php echo $invoice_no ?>"
                                       placeholder="Previous: <?php echo $invoice_no ?>" required>
                            </div>
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Paid/Last Paid Date </label>
                            <div class="col-md-6">
                                <input type="date" name="pay_day" id="pay_day" class="form-control"
                                       data-tippy="Value must be <?php echo date('Y-m-d'); ?> or later."
                                       data-tippy-arrow="true" data-tippy-size="large"
                                       min="<?php echo date('Y-m-d'); ?>" value="<?php echo $p_date; ?>" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Total Amount </label>
                            <div class="col-md-6">
                                <input type="text" id="tot_amt" name="tot_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1"
                                       placeholder="LKR" value="LKR &nbsp;<?php echo $tot_amt; ?>" disabled>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Latest Payment </label>
                            <div class="col-md-6">
                                <input type="number" name="new_paid_amt" id="paid_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1" data-tippy-arrow="true" data-tippy-size="large"
                                       placeholder="Must be less than OR equal to Remaining Amount (LKR <?php echo $remain_amt; ?>)"
                                       data-tippy="Must be less than OR equal to Remaining Amount (LKR <?php echo $remain_amt; ?>)">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Lease Installment </label>
                            <div class="col-md-6">
                                <input type="number" id="lease_amt" name="lease_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1"
                                       placeholder="Previous: LKR <?php echo $lease_amt; ?>"
                                       value="<?php echo $lease_amt; ?>" data-tippy-arrow="true" data-tippy-size="large"
                                       data-tippy="Previous: LKR <?php echo $lease_amt; ?>" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Remaining Lease Installments </label>
                            <div class="col-md-6">
                                <input type="number" data-tippy="Should be less than the Previous: <?php echo $lease_ins; ?>"
                                       id="lease_ins" data-tippy-arrow="true" data-tippy-size="large"
                                       name="lease_ins" class="form-control" pattern="^[0-9]"
                                       min="<?php echo((float)$lease_ins - 1); ?>"
                                       placeholder="Should be less than the Previous: <?php echo $lease_ins; ?>"
                                       value="<?php echo $lease_ins; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Remaining Amount </label>
                            <div class="col-md-6">
                                <input type="text" name="new_remain_amt" class="form-control" placeholder="LKR"
                                       data-tippy="This will be auto updated" data-tippy-arrow="true" data-tippy-size="large"
                                       value="LKR &nbsp;<?php echo $remain_amt; ?>" disabled>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Payment Status </label>
                            <div class="col-md-6">
                                <select id="pay_status" name="pay_status" class="form-control" required>
                                    <option value="<?php echo $payment_status; ?>"> <?php echo $payment_status; ?> </option>
                                    <?php
                                    if (strcmp($payment_status, 'Rental / Lease') == 0) {
                                        echo "<option value=\"Complete\"> Complete</option>";
                                    }
                                    if (strcmp($payment_status, 'Complete') == 0) {
                                        echo "<option value=\"Rental / Lease\"> Rent / Lease</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="submit" name="update" value="Update House Purchase"
                                       class="btn btn-primary form-control">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->

    <!-- Success Modal -->
    <div class="modal fade" id="suModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            onclick="window.open('index.php?view_warehouse_purchases','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Warehouse Purchase details has been edited
                        successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_warehouse_purchases','_self')">OK
                        </button>
                    </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->

    <!--Loading-->
    <div class="modal load-modal" id="loadingModal" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="container"></div>
                <div class="modal-body text-center center-block">
                    <i style="font-size: 800%" class="fa fa-spinner fa-pulse fa-5x"></i>
                    <br><br>
                    <h4 class="text-center load-text">Please wait...</h4>
                </div>
            </div>
        </div>
    </div>
    <!--Loading-->

    <?php

    if (isset($_POST['update'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

        $wp_inv_no = $_POST['inv_no'];
        $wp_pay_day = $_POST['pay_day'];
        $wp_tot_amt = $_POST['tot_amt'];
        $wp_paid_amt = $_POST['new_paid_amt'];
        $wp_lease_amt = $_POST['lease_amt'];
        $wp_lease_ins = $_POST['lease_ins'];
        $wp_pay_status = $_POST['pay_status'];

        if (empty($wp_paid_amt)) {
            echo "<script>alert('Paid Amount cannot be empty!')</script>";
        } elseif ($wp_lease_ins == $lease_ins) {
            echo "<script>alert('Remaining Lease Installments should be less than previous no. of installments!')</script>";
        } else {
            if (($wp_paid_amt < $remain_amt) && ($wp_paid_amt > 0)) {
                $n_remain_amt = ((float)$remain_amt - (float)$wp_paid_amt);
                $n_paid_amt = ((float)$paid_amt + (float)$wp_paid_amt);

                if (strcmp($wp_pay_status, 'Complete') == 0) {
                    echo "<script>alert('Check Payment Status: It should be Advance OR Incomplete!')</script>";
                } else {
                    $update_wp = "update warehouse_purchases set invoice_no='$wp_inv_no',p_date='$wp_pay_day',paid_amt='$n_paid_amt',remain_amt='$n_remain_amt',lease_amt='$wp_lease_amt',lease_ins='$wp_lease_ins',pay_status='$wp_pay_status' where wp_id='$wp_id'";
                }
            } elseif ($hp_paid_amt == $remain_amt) {
                $n_remain_amt = 0;
                $n_paid_amt = $remain_amt;

                if (strcmp($wp_pay_status, 'Complete') != 0) {
                    echo "<script>alert('Check Payment Status: It should be Completed!')</script>";
                } else {
                    $update_wp = "update warehouse_purchases set invoice_no='$wp_inv_no',p_date='$wp_pay_day',paid_amt='$n_paid_amt',remain_amt='$n_remain_amt',lease_amt='$wp_lease_amt',lease_ins='$wp_lease_ins',pay_status='$wp_pay_status' where wp_id='$wp_id'";
                }
            } else {
                echo "<script>alert('Check Latest Payment: It should be Less than OR Equal to Remaining Amount!')</script>";
            }
        }


        $run_wp = mysqli_query($con, $update_wp);

        if ($run_wp) {

            echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('hide');
                    $('#suModal').modal('show');
                  </script>";

        }

    }


    ?>


<?php } ?>