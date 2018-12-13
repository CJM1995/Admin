<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

    <?php

    if (isset($_GET['edit_sale_purchase_h'])) {
        $edit_id = $_GET['edit_sale_purchase_h'];
        $get_record = "select * from house_purchases where hp_id='$edit_id'";
        $run_record = mysqli_query($con, $get_record);
        $row_record = mysqli_fetch_array($run_record);
        $hp_id = $row_record['hp_id'];
        $cus_id = $row_record['cus_id'];
        $house_id = $row_record['house_id'];
        $invoice_no = $row_record['invoice_no'];
        $p_date = $row_record['p_date'];
        $tot_amt = $row_record['tot_amt'];
        $paid_amt = $row_record['paid_amt'];
        $remain_amt = $row_record['remain_amt'];
        $payment_status = $row_record['pay_status'];

        $result_cn = mysqli_query($con, "SELECT name AS cus_name FROM customersn WHERE cus_id='$cus_id'");
        $row_cn = mysqli_fetch_array($result_cn);
        $cus_name = $row_cn['cus_name'];

        $result_h = mysqli_query($con, "SELECT code AS h_code, sale_type AS s_type FROM houses WHERE house_id='$house_id'");
        $row_h = mysqli_fetch_array($result_h);
        $h_code = $row_h['h_code'];
        $s_type = $row_h['s_type'];
    }


    ?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit House Purchase Details

                </li>


            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-dollar fa-2x fa-fw"></i><i class="fa fa-home fa-2x fa-fw"></i> Edit House
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
                            <label class="col-md-3 control-label"> House Code / Sale Type</label>
                            <div class="col-md-6">
                                <select name="house_id" class="form-control" disabled>
                                    <option value="<?php echo $house_id; ?>"> <?php echo $h_code; ?>
                                        &nbsp;/&nbsp; <?php echo $s_type; ?> </option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Invoice No.</label>
                            <div class="col-md-6">
                                <input type="number" name="inv_no" id="inv_no" class="form-control simptip-position-top" pattern="^[0-9]"
                                       min="1" data-tippy="Previous: <?php echo $invoice_no ?>" data-tippy-arrow="true" data-tippy-size="large"
                                       placeholder="Previous: <?php echo $invoice_no ?>" required>
                            </div>
                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Paid/Last Paid Date </label>
                            <div class="col-md-6">
                                <input type="date" name="pay_day" id="pay_day" class="form-control" data-tippy="Value must be <?php echo date('Y-m-d'); ?> or later." data-tippy-arrow="true" data-tippy-size="large"
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
                            <label class="col-md-3 control-label"> Remaining Amount </label>
                            <div class="col-md-6">
                                <input type="text" name="new_remain_amt" class="form-control" placeholder="LKR"
                                       data-tippy="This will be auto updated"
                                       value="LKR &nbsp;<?php echo $remain_amt; ?>" disabled>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Payment Status </label>
                            <div class="col-md-6">
                                <select id="pay_status" name="pay_status" class="form-control" required>
                                    <option value="<?php echo $payment_status; ?>"> <?php echo $payment_status; ?> </option>
                                    <?php
                                    if (strcmp($payment_status, 'Advance') == 0) {
                                        echo "<option value=\"Complete\"> Complete</option>
                                        <option value=\"Incomplete\"> Incomplete</option>";
                                    } elseif (strcmp($payment_status, 'Complete') == 0) {
                                        echo "<option value=\"Advance\"> Advance</option>
                                        <option value=\"Incomplete\"> Incomplete</option>";
                                    } else {
                                        echo "<option value=\"Advance\"> Advance</option>
                                        <option value=\"Complete\"> Complete</option>";
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
                    <button type="button" class="close" onclick="window.open('index.php?view_house_purchases','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">House Purchase details has been edited
                        successfully!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <button type="button" class="btn btn-success"
                                onclick="window.open('index.php?view_house_purchases','_self')">OK
                        </button>
                    </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->

    <?php

    if (isset($_POST['update'])) {
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        $hp_inv_no = $_POST['inv_no'];
        $hp_pay_day = $_POST['pay_day'];
        $hp_tot_amt = $_POST['tot_amt'];
        $hp_paid_amt = $_POST['new_paid_amt'];
        $hp_pay_status = $_POST['pay_status'];

        if (empty($hp_paid_amt)) {
            echo "<script>alert('Paid Amount cannot be empty!')</script>";
        } else {
            if (($hp_paid_amt < $remain_amt) && ($hp_paid_amt > 0)) {
                $n_remain_amt = ((float)$remain_amt - (float)$hp_paid_amt);
                $n_paid_amt = ((float)$paid_amt + (float)$hp_paid_amt);

                if (strcmp($hp_pay_status, 'Complete') == 0) {
                    echo "<script>alert('Check Payment Status: It should be Advance OR Incomplete!')</script>";
                } else {
                    $update_hp = "update house_purchases set invoice_no='$hp_inv_no',p_date='$hp_pay_day',paid_amt='$n_paid_amt',remain_amt='$n_remain_amt',pay_status='$hp_pay_status' where hp_id='$hp_id'";
                }
            } elseif ($hp_paid_amt == $remain_amt) {
                $n_remain_amt = 0;
                $n_paid_amt = $remain_amt;

                if (strcmp($hp_pay_status, 'Complete') != 0) {
                    echo "<script>alert('Check Payment Status: It should be Completed!')</script>";
                } else {
                    $update_hp = "update house_purchases set invoice_no='$hp_inv_no',p_date='$hp_pay_day',paid_amt='$n_paid_amt',remain_amt='$n_remain_amt',pay_status='$hp_pay_status' where hp_id='$hp_id'";
                }
            } else {
                echo "<script>alert('Check Latest Payment: It should be Less than OR Equal to Remaining Amount!')</script>";
            }
        }


        $run_hp = mysqli_query($con, $update_hp);

        if ($run_hp) {

            echo "<script type=\"text/javascript\">
                    $('#suModal').modal('show');
                  </script>";

        }

    }


    ?>


<?php } ?>