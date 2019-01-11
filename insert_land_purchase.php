<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
    echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
    echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
    echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
    echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

    ?>
    <!DOCTYPE html>

    <html>

    <head>

        <title> Insert Warehouse </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>

    </head>

    <body>

    <div class="row"><!-- row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"> </i> Dashboard / Insert Land Purchase
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-dollar fa-2x fa-fw"></i><i class="fa fa-map-signs fa-2x fa-fw"></i> Insert Land
                        Purchase
                    </h3>
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Customer </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="cus_id" name="cus_id" class="form-control" required>
                                        <option value="<?= isset($_POST['cus_id']) ? $_POST['cus_id'] : ''; ?>"> <?= isset($_POST['cus_id']) ? $_POST['cus_id'] : ''; ?> </option>
                                        <option> Select a Customer</option>
                                        <?php
                                        $get_cu = "select * from customersn";
                                        $run_cu = mysqli_query($con, $get_cu);
                                        while ($row_cus = mysqli_fetch_array($run_cu)) {
                                            $cus_id = $row_cus['cus_id'];
                                            $cus_name = $row_cus['name'];
                                            echo "<option value='$cus_id'>$cus_name</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" name="add_cus" data-tippy="Add Customer"
                                                class="btn btn-default" data-tippy-arrow="true" data-tippy-size="large"
                                                onclick="window.open('index.php?insert_customer','_self')"><i
                                                    class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Land Code / Sale Type </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="land_id" name="land_id" class="form-control" required>
                                        <option value="<?= isset($_POST['land_id']) ? $_POST['land_id'] : ''; ?>"> <?= isset($_POST['land_id']) ? $_POST['land_id'] : ''; ?> </option>
                                        <option value="0"> Please Select</option>
                                        <?php
                                        $get_land = "select * from lands WHERE availability='Available'";
                                        $run_land = mysqli_query($con, $get_land);
                                        while ($row_land = mysqli_fetch_array($run_land)) {
                                            $land_id = $row_land['land_id'];
                                            $land_code = $row_land['code'];
                                            $sale_type = $row_land['sale_type'];
                                            echo "<option value='$land_id'>$land_code &nbsp; / &nbsp; $sale_type </option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" name="view_lands" data-tippy="Check more details"
                                                class="btn btn-default" data-tippy-arrow="true" data-tippy-size="large"
                                                onclick="window.open('index.php?view_lands','_blank')"><i
                                                    class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Perches </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="number" id="perches" name="perches" class="form-control"
                                           pattern="^[0.0-9.9]" min="1" data-tippy-arrow="true" data-tippy-size="large"
                                           data-tippy="Select 'Manual' and enter 'Total Amount' according to perch amount OR select 'Auto' and leave 'Total Amount' blank to calculate amount according to pre-given per perch value on land details."
                                           placeholder="Select 'Manual' and enter 'Total Amount' according to perch amount OR select 'Auto' and leave 'Total Amount' blank to calculate amount according to pre-given per perch value on land details."
                                           value="<?= isset($_POST['perches']) ? $_POST['perches'] : ''; ?>">
                                    <div style="background-color: #2e6da4" class="input-group-addon">
                                        <select style="width: 100px;color: white;background-color: #2e6da4;border-style: none"
                                                name="calc">
                                            class="btn-group-lg">
                                            <option value="Auto" selected>Auto</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>
                                    <div class="input-group-btn">
                                        <button type="button" name="perches_prices" data-tippy="Check more details"
                                                data-tippy-arrow="true" data-tippy-size="large"
                                                class="btn btn-default" data-toggle="modal" data-target="#viewModal"><i
                                                    class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Invoice No.</label>
                            <div class="col-md-6">
                                <input type="number" name="inv_no" id="inv_no" class="form-control" pattern="^[0-9]"
                                       min="1"
                                       value="<?= isset($_POST['inv_no']) ? $_POST['inv_no'] : ''; ?>" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Paid/Last Paid Date </label>
                            <div class="col-md-6">
                                <input type="date" name="pay_day" id="pay_day" class="form-control"
                                       min="<?php echo date('Y-m-d'); ?>"
                                       data-tippy="Value must be <?php echo date('Y-m-d'); ?> or later."
                                       data-tippy-arrow="true" data-tippy-size="large"
                                       value="<?= isset($_POST['pay_day']) ? $_POST['pay_day'] : ''; ?>" required>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Total Amount </label>
                            <div class="col-md-6">
                                <input type="number" id="tot_amt" name="tot_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1"
                                       placeholder="LKR"
                                       value="<?= isset($_POST['tot_amt']) ? $_POST['tot_amt'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Paid Amount </label>
                            <div class="col-md-6">
                                <input type="number" name="paid_amt" id="paid_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1"
                                       placeholder="LKR"
                                       value="<?= isset($_POST['paid_amt']) ? $_POST['paid_amt'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!--                            <label class="col-md-3 control-label"> Rental Amount </label>-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <input type="number" id="rent_amt" name="rent_amt" class="form-control" pattern="^[0.00-9.99]" min="1"-->
                        <!--                                       placeholder="LKR" title="Only if the selected land is for rent" value="-->
                        <? //= isset($_POST['rent_amt']) ? $_POST['rent_amt'] : ''; ?><!--">-->
                        <!--                            </div>-->
                        <!--                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Remaining Amount </label>
                            <div class="col-md-6">
                                <!--                            <div class="input-group">-->
                                <input type="text" name="remain_amt" class="form-control" placeholder="LKR"
                                       value="This will be auto updated" disabled>
                                <!--                                <div class="input-group-btn">-->
                                <!--                                    <button type="button" name="cal" onclick="echoHello()" class="btn btn-default">Calculate</button> <-- Inline button-->
                                <!--                                </div>-->
                                <!--                                </div>-->
                            </div>
                        </div><!-- form-group Ends -->

                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!--                            <label class="col-md-3 control-label"> Lease Installment </label>-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <input type="number" id="lease_amt" name="lease_amt" class="form-control" pattern="^[0.00-9.99]" min="1"-->
                        <!--                                       placeholder="LKR" title="Only if the selected land is for lease" value="-->
                        <? //= isset($_POST['lease_amt']) ? $_POST['lease_amt'] : ''; ?><!--">-->
                        <!--                            </div>-->
                        <!--                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Payment Status </label>
                            <div class="col-md-6">
                                <select id="pay_status" name="pay_status" class="form-control" required>
                                    <option value="<?= isset($_POST['pay_status']) ? $_POST['pay_status'] : ''; ?>"> <?= isset($_POST['pay_status']) ? $_POST['pay_status'] : ''; ?> </option>
                                    <option> Select Payment Status</option>
                                    <option value="Advance"> Advance</option>
                                    <option value="Complete"> Complete</option>
                                    <!--                                    <option value="Rental / Lease"> Rental / Lease</option>-->
                                    <option value="Incomplete"> Incomplete</option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!--                            <label class="col-md-3 control-label">Rental Duration </label>-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <input type="number" title="Only if the Land - Sale Type is Rent" id="duration" name="duration" class="form-control" pattern="^[0-9]" min="1"-->
                        <!--                                       placeholder="In Months Only - Ex: 12" value="-->
                        <? //= isset($_POST['duration']) ? $_POST['duration'] : ''; ?><!--">-->
                        <!--                            </div>-->
                        <!--                        </div><!-- form-group Ends -->
                        <!---->
                        <!--                        <div class="form-group"><!-- form-group Starts -->
                        <!--                            <label class="col-md-3 control-label">Remaining Lease Installments </label>-->
                        <!--                            <div class="col-md-6">-->
                        <!--                                <input type="number" title="Only if the land - Sale Type is Lease" id="lease_ins" name="lease_ins" class="form-control" pattern="^[0-9]" min="1"-->
                        <!--                                       placeholder="Ex: 24" value="-->
                        <? //= isset($_POST['lease_ins']) ? $_POST['lease_ins'] : ''; ?><!--">-->
                        <!--                            </div>-->
                        <!--                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Land Purchase Record"
                                       class="btn btn-primary form-control">
                            </div>

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
                    <button type="button" class="close" onclick="window.open('index.php?view_land_purchases','_self')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Purchase record has been inserted successfully!</p>

                </div>
                <div style="text-align: center" class="modal-footer text-center center-block">
                    <button type="button" class="btn btn-success"
                            onclick="window.open('index.php?view_land_purchases','_self')">OK
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- Success Modal -->

    <!-- Alert Modal -->
    <div class="modal fade" id="alModal" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-danger center-block fa fa-exclamation-triangle fa-5x"></i>
                    <br>
                    <h4 class="text-center" id="m_body"></h4>

                </div>
                <div style="text-align: center" class="modal-footer text-center center-block">
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal">OK
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- Alert Modal -->

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive"><!-- table-responsive Starts -->
                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->
                            <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align: center">Land Code</th>
                                <th style="vertical-align: middle;text-align: center">Price per Perch</th>
                                <th style="vertical-align: middle;text-align: center">Available Perches</th>
                                <th style="vertical-align: middle;text-align: center">Total Price(Perch Price x
                                    Available Perches)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $get_land_m = "select * from lands WHERE availability='Available'";
                            $run_land_m = mysqli_query($con, $get_land_m);
                            while ($row_land_m = mysqli_fetch_array($run_land_m)) {
                                $land_code_m = $row_land_m['code'];
                                $per_perch_m = $row_land_m['perch_prz'];
                                $avi_perches_m = $row_land_m['available_qty'];
                                ?>
                                <tr>
                                    <td><?php echo $land_code_m; ?></td>
                                    <td>LKR &nbsp;<?php echo $per_perch_m; ?></td>
                                    <td><?php echo $avi_perches_m; ?></td>
                                    <td>LKR &nbsp;<?php echo((float)$per_perch_m * (float)$avi_perches_m); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table><!-- table table-bordered table-hover table-striped Ends -->
                    </div><!-- table-responsive Ends -->

                </div>
                <div style="text-align: center" class="modal-footer text-center center-block">
                    <button type="button" class="btn btn-warning"
                            data-dismiss="modal">OK
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- View Modal -->

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

    </body>

    </html>

    <?php

    if (isset($_POST['submit'])) {
//        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
//        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
//        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
//        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

        $cus_id = $_POST['cus_id'];
        $land_id = $_POST['land_id'];
        $inv_no = $_POST['inv_no'];
        $pay_day = $_POST['pay_day'];
        $tot_amt = $_POST['tot_amt'];
        $paid_amt = $_POST['paid_amt'];
        $rent_amt = $_POST['rent_amt'];
        $lease_ins_amt = $_POST['lease_amt'];
        //$remain_amt = $_POST['remain_amt'];
        $pay_status = $_POST['pay_status'];
        $duration = $_POST['duration'];
        $lease_ins = $_POST['lease_ins'];
        $op = $_POST['calc'];
        $perches = $_POST['perches'];
        if (empty($duration)) {
            $duration = '';
        }

        $result_lp = mysqli_query($con, "SELECT available_qty AS ava_perches FROM lands WHERE land_id='$land_id'");
        $row_lp = mysqli_fetch_array($result_lp);
        $ava_perches = $row_lp['ava_perches'];

        $result_pp = mysqli_query($con, "SELECT perch_prz AS prz_perches FROM lands WHERE land_id='$land_id'");
        $row_pp = mysqli_fetch_array($result_pp);
        $prz_perches = $row_pp['prz_perches'];

        $result_l = mysqli_query($con, "SELECT sale_type AS s_type FROM lands WHERE land_id='$land_id'");
        $row_l = mysqli_fetch_array($result_l);
        $s_type = $row_l['s_type'];

//        if(strcmp($pay_status,'Advance')==0){
//            if(empty($paid_amt)){
//                echo "<script>alert('Paid Amount cannot be empty!')</script>";
//            }
//            else{
//                if((float)$perches > (float)$ava_perches){
//                    echo "<script>alert('Number of Perches should be lower OR equal to available perches of this land!')</script>";
//                }
//                elseif(empty($tot_amt)){
//                    if(strcmp($op,'Auto')!=0){
//                        echo "<script>alert('Either change Perches option to Auto or Fill Total Amount!')</script>";
//                    }
//                    else{
//                        if(empty($perches)){
//                            $ttot_amt = ((float)$ava_perches * (float)$prz_perches);
//                            $remain_perches = 0;
//
//                            $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$perches','$pay_status')";
//                            $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
//                        }
//                        else{
//                            $ttot_amt = ((float)$perches * (float)$prz_perches);
//                            $remain_perches = ((float)$ava_perches - (float)$perches);
//                            if(($remain_perches < 0) || ($remain_perches == 0)){
//                                $remain_perches = 0;
//
//                                $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$perches','$pay_status')";
//                                $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
//                            }
//                            else{
//                                $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$perches','$pay_status')";
//                                $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
//                            }
//                        }
//                    }
//                }
//                else{
//                    if ((float)$perches < (float)$ava_perches){
//                        $remain_perches = ((float)$ava_perches - (float)$perches);
//                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$perches','$pay_status')";
//                        $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
//                    }
//                    else{
//                        if((float)$perches == (float)$ava_perches){
//                            $remain_perches = 0;
//                            $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$perches','$pay_status')";
//                            $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
//                        }
//                    }
//                }
//            }
//        }
//        elseif (strcmp($s_type,'Rent')==0) {
//            if(empty($rent_amt)){
//                echo "<script>alert('Rental Amount cannot be empty!')</script>";
//            }
//            else{
//                if(empty($duration)){
//                    echo "<script>alert('Rental Duration cannot be empty!')</script>";
//                }
//                else{
//                    if(strcmp($pay_status,'Rental / Lease')!=0){
//                        echo "<script>alert('Check Payment Status - It should be Rental/Lease')</script>";
//                    }
//                    else{
//                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, rent_amt, duration, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$rent_amt','$duration','$pay_status')";
//                        //$update_land = "update lands set availability='Not - available' where land_id='$land_id'";
//                    }
//                }
//            }
//        } elseif (strcmp($s_type,'Lease')==0) {
//            if(empty($paid_amt)){
//                echo "<script>alert('Paid Amount cannot be empty!')</script>";
//            }
//            else{
//                if(empty($tot_amt)){
//                    echo "<script>alert('Total Amount cannot be empty!')</script>";
//                }
//                else{
//                    if(empty($lease_ins_amt)){
//                        echo "<script>alert('Lease installment cannot be empty!')</script>";
//                    }
//                    else{
//                        if(empty($lease_ins)){
//                            echo "<script>alert('Remaining Lease installments cannot be empty!')</script>";
//                        }
//                        else{
//                            $remain_amt = (float)$tot_amt - (float)$paid_amt;
//                            if($remain_amt == 0){
//                                if(strcmp($pay_status,'Complete')!=0){
//                                    echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
//                                }
//                                else{
//                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, lease_amt, lease_ins, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$lease_ins_amt','0','$pay_status')";
//                                    //$update_land = "update lands set availability='Not - available' where land_id='$land_id'";
//                                }
//                            }
//                            else{
//                                if(strcmp($pay_status,'Rental / Lease')!=0){
//                                    echo "<script>alert('Check Payment Status - It should be Rental/Lease')</script>";
//                                }
//                                else{
//                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, lease_amt, remain_amt, pay_status, lease_ins) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$lease_ins_amt','$remain_amt','$pay_status','$lease_ins')";
//                                    //$update_land = "update lands set availability='Not - available' where land_id='$land_id'";
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//        }
        if (strcmp($s_type, 'Sale') == 0) {
            if (empty($paid_amt)) {
                echo "<script>alert('Paid Amount cannot be empty!')</script>";
            } else {
                if ((float)$perches > (float)$ava_perches) {
                    echo "<script>alert('Number of Perches should be lower OR equal to available perches of this land!')</script>";
                } elseif (empty($tot_amt)) {
                    if (strcmp($op, 'Auto') != 0) {
                        echo "<script>alert('Either change Perches option to Auto or Fill Total Amount!')</script>";
                    } else {
                        if (empty($perches)) {
                            $ttot_amt = ((float)$ava_perches * (float)$prz_perches);
                            $remain_perches = 0;

                            $remain_amt = ((float)$ttot_amt - (float)$paid_amt);

                            if ($remain_amt == 0) {
                                if (strcmp($pay_status, 'Complete') != 0) {
                                    echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
                                } else {
                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                    $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
                                }
                            } else {
                                if ((strcmp($pay_status, 'Incomplete') != 0) && (strcmp($pay_status, 'Advance') != 0)) {
                                    echo "<script>alert('Check Payment Status - It should be Incomplete OR Advance')</script>";
//                            echo "<script type=\"text/javascript\">
//                                    var mymodal = $('#alModal');
//                                    mymodal.find('#m_body').text('Check Payment Status - It should be Incomplete');
//                                    mymodal.modal('show');
//                                  </script>";
                                } else {
                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                    $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";

                                }
                            }
                        } else {
                            $ttot_amt = ((float)$perches * (float)$prz_perches);
                            $remain_perches = ((float)$ava_perches - (float)$perches);

                            $remain_amt = ((float)$ttot_amt - (float)$paid_amt);

                            if ($remain_amt == 0) {
                                if (strcmp($pay_status, 'Complete') != 0) {
                                    echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
                                } else {
                                    if (($remain_perches < 0) || ($remain_perches == 0)) {
                                        $remain_perches = 0;

                                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                        $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
                                    } else {
                                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                        $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
                                    }
                                }
                            } else {
                                if ((strcmp($pay_status, 'Incomplete') != 0) && (strcmp($pay_status, 'Advance') != 0)) {
                                    echo "<script>alert('Check Payment Status - It should be Incomplete OR Advance')</script>";
//                            echo "<script type=\"text/javascript\">
//                                    var mymodal = $('#alModal');
//                                    mymodal.find('#m_body').text('Check Payment Status - It should be Incomplete');
//                                    mymodal.modal('show');
//                                  </script>";
                                } else {
                                    if (($remain_perches < 0) || ($remain_perches == 0)) {
                                        $remain_perches = 0;

                                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                        $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
                                    } else {
                                        $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$ttot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                        $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
                                    }

                                }
                            }
                        }
                    }
                } else {
                    $remain_amt = (float)$tot_amt - (float)$paid_amt;
                    if ($remain_amt == 0) {
                        if (strcmp($pay_status, 'Complete') != 0) {
                            echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
                        } else {
                            if ((float)$perches < (float)$ava_perches) {
                                $remain_perches = (float)$ava_perches - (float)$perches;
                                $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
                            } else {
                                if ((float)$perches == (float)$ava_perches) {
                                    $remain_perches = 0;
                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                    $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
                                }
                            }
                        }
                    } else {
                        if ((strcmp($pay_status, 'Incomplete') != 0) && (strcmp($pay_status, 'Advance') != 0)) {
                            echo "<script>alert('Check Payment Status - It should be Incomplete OR Advance')</script>";
//                            echo "<script type=\"text/javascript\">
//                                    var mymodal = $('#alModal');
//                                    mymodal.find('#m_body').text('Check Payment Status - It should be Incomplete');
//                                    mymodal.modal('show');
//                                  </script>";
                        } else {
                            if ((float)$perches < (float)$ava_perches) {
                                $remain_perches = (float)$ava_perches - (float)$perches;
                                $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                $update_land = "update lands set available_qty='$remain_perches' where land_id='$land_id'";
                            } else {
                                if ((float)$perches == (float)$ava_perches) {
                                    $remain_perches = 0;
                                    $insert_land_p = "INSERT INTO land_purchases (cus_id, land_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, perches, pay_status) VALUES ('$cus_id','$land_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$perches','$pay_status')";
                                    $update_land = "update lands set available_qty='$remain_perches',availability='Not - available' where land_id='$land_id'";
                                }
                            }
                        }
                    }
                }
            }
        }

        $run_land_p = mysqli_query($con, $insert_land_p);

        //$update_land = "update lands set availability='Not - available' where land_id='$land_id'";
        if ($run_land_p) {
            $run_update_land = mysqli_query($con, $update_land);
        }

        if ($run_land_p && $run_update_land) {
            echo "<script type=\"text/javascript\">
            $('#loadingModal').modal('hide');
            $('#suModal').modal('show');
        </script>";
        }
//        else{
//            echo "<script type=\"text/javascript\">
//                      var mymodal = $('#alModal');
//                      mymodal.find('#m_body').text('Oops, Something went wrong');
//                      mymodal.modal('show');
//                  </script>";
//        }
    }
    ?>

<?php } ?>
