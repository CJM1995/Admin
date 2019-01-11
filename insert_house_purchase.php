<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

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
                    <i class="fa fa-dashboard"> </i> Dashboard / Insert House Purchase
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-dollar fa-2x fa-fw"></i><i class="fa fa-home fa-2x fa-fw"></i> Insert House
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
                            <label class="col-md-3 control-label"> House Code / Sale Type </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="house_id" name="house_id" class="form-control" required>
                                        <option value="<?= isset($_POST['house_id']) ? $_POST['house_id'] : ''; ?>"> <?= isset($_POST['house_id']) ? $_POST['house_id'] : ''; ?> </option>
                                        <option value="0"> Please Select</option>
                                        <?php
                                        $get_house = "select * from houses WHERE availability='Available'";
                                        $run_house = mysqli_query($con, $get_house);
                                        while ($row_house = mysqli_fetch_array($run_house)) {
                                            $house_id = $row_house['house_id'];
                                            $house_code = $row_house['code'];
                                            $sale_type = $row_house['sale_type'];
                                            echo "<option value='$house_id'>$house_code &nbsp; / &nbsp; $sale_type </option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" name="view_houses" data-tippy="Check more details"
                                                class="btn btn-default" data-tippy-arrow="true" data-tippy-size="large"
                                                onclick="window.open('index.php?view_houses','_blank')"><i
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

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Rental Amount </label>
                            <div class="col-md-6">
                                <input type="number" id="rent_amt" name="rent_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1" data-tippy-arrow="true" data-tippy-size="large"
                                       placeholder="LKR" data-tippy="Only if the selected house is for rent"
                                       value="<?= isset($_POST['rent_amt']) ? $_POST['rent_amt'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Rental Duration </label>
                            <div class="col-md-6">
                                <input type="number" data-tippy="Only if the House - Sale Type is Rent" id="duration"
                                       name="duration" class="form-control" pattern="^[0-9]" min="1"
                                       placeholder="In Months Only - Ex: 12" data-tippy-arrow="true"
                                       data-tippy-size="large"
                                       value="<?= isset($_POST['duration']) ? $_POST['duration'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Lease Installment </label>
                            <div class="col-md-6">
                                <input type="number" id="lease_amt" name="lease_amt" class="form-control"
                                       pattern="^[0.00-9.99]" min="1" data-tippy-arrow="true" data-tippy-size="large"
                                       placeholder="LKR" data-tippy="Only if the selected house is for lease"
                                       value="<?= isset($_POST['lease_amt']) ? $_POST['lease_amt'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Remaining Lease Installments </label>
                            <div class="col-md-6">
                                <input type="number" data-tippy="Only if the house - Sale Type is Lease" id="lease_ins"
                                       name="lease_ins" class="form-control" pattern="^[0-9]" min="1"
                                       placeholder="Ex: 24" data-tippy-arrow="true" data-tippy-size="large"
                                       value="<?= isset($_POST['lease_ins']) ? $_POST['lease_ins'] : ''; ?>">
                            </div>
                        </div><!-- form-group Ends -->

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

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Payment Status </label>
                            <div class="col-md-6">
                                <select id="pay_status" name="pay_status" class="form-control" required>
                                    <option value="<?= isset($_POST['pay_status']) ? $_POST['pay_status'] : ''; ?>"> <?= isset($_POST['pay_status']) ? $_POST['pay_status'] : ''; ?> </option>
                                    <option> Select Payment Status</option>
                                    <option value="Advance"> Advance</option>
                                    <option value="Complete"> Complete</option>
                                    <option value="Rental / Lease"> Rental / Lease</option>
                                    <option value="Incomplete"> Incomplete</option>
                                </select>
                            </div>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert House Purchase Record"
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
                    <button type="button" class="close" onclick="window.open('index.php?view_house_purchases','_self')">
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
                            onclick="window.open('index.php?view_house_purchases','_self')">OK
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
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

        $cus_id = $_POST['cus_id'];
        $house_id = $_POST['house_id'];
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

        $result_h = mysqli_query($con, "SELECT sale_type AS s_type FROM houses WHERE house_id='$house_id'");
        $row_h = mysqli_fetch_array($result_h);
        $s_type = $row_h['s_type'];

        if (strcmp($pay_status, 'Advance') == 0) {
            if (empty($paid_amt)) {
                echo "<script>alert('Paid Amount cannot be empty!')</script>";
            } else {
                if (empty($tot_amt)) {
                    $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, paid_amt, duration, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$paid_amt','$duration','$pay_status')";
                } else {
                    $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, duration, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$duration','$pay_status')";
                }
            }
        } elseif (strcmp($s_type, 'Rent') == 0) {
            if (empty($rent_amt)) {
                echo "<script>alert('Rental Amount cannot be empty!')</script>";
            } else {
                if (empty($duration)) {
                    echo "<script>alert('Rental Duration cannot be empty!')</script>";
                } else {
                    if (strcmp($pay_status, 'Rental / Lease') != 0) {
                        echo "<script>alert('Check Payment Status - It should be Rental/Lease')</script>";
                    } else {
                        $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, rent_amt, duration, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$rent_amt','$duration','$pay_status')";
                    }
                }
            }
        } elseif (strcmp($s_type, 'Lease') == 0) {
            if (empty($paid_amt)) {
                echo "<script>alert('Paid Amount cannot be empty!')</script>";
            } else {
                if (empty($tot_amt)) {
                    echo "<script>alert('Total Amount cannot be empty!')</script>";
                } else {
                    if (empty($lease_ins_amt)) {
                        echo "<script>alert('Lease installment cannot be empty!')</script>";
                    } else {
                        if (empty($lease_ins)) {
                            echo "<script>alert('Remaining Lease installments cannot be empty!')</script>";
                        } else {
                            $remain_amt = (float)$tot_amt - (float)$paid_amt;
                            if ($remain_amt == 0) {
                                if (strcmp($pay_status, 'Complete') != 0) {
                                    echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
                                } else {
                                    $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, lease_amt, lease_ins, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$lease_ins_amt','0','$pay_status')";
                                }
                            } else {
                                if (strcmp($pay_status, 'Rental / Lease') != 0) {
                                    echo "<script>alert('Check Payment Status - It should be Rental/Lease')</script>";
                                } else {
                                    $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, lease_amt, lease_ins, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$lease_ins_amt','$lease_ins','$pay_status')";
                                }
                            }
                        }
                    }
                }
            }
        } else {
            if (empty($paid_amt)) {
                echo "<script>alert('Paid Amount cannot be empty!')</script>";
            } else {
                if (empty($tot_amt)) {
                    echo "<script>alert('Total Amount cannot be empty!')</script>";
                } else {
                    $remain_amt = (float)$tot_amt - (float)$paid_amt;
                    if ($remain_amt == 0) {
                        if (strcmp($pay_status, 'Complete') != 0) {
                            echo "<script>alert('Check Payment Status - It should be Complete!')</script>";
                        } else {
                            $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$pay_status')";
                        }
                    } else {
                        if (strcmp($pay_status, 'Incomplete') != 0) {
                            echo "<script>alert('Check Payment Status - It should be Incomplete')</script>";
//                            echo "<script type=\"text/javascript\">
//                                    var mymodal = $('#alModal');
//                                    mymodal.find('#m_body').text('Check Payment Status - It should be Incomplete');
//                                    mymodal.modal('show');
//                                  </script>";
                        } else {
                            $insert_house_p = "INSERT INTO house_purchases (cus_id, house_id, invoice_no, sale_type, p_date, tot_amt, paid_amt, remain_amt, pay_status) VALUES ('$cus_id','$house_id','$inv_no','$s_type','$pay_day','$tot_amt','$paid_amt','$remain_amt','$pay_status')";

                        }
                    }
                }
            }
        }

        $run_house_p = mysqli_query($con, $insert_house_p);

        $update_house = "update houses set availability='Not - available' where house_id='$house_id'";
        $run_update_house = mysqli_query($con, $update_house);

        if ($run_house_p && $run_update_house) {
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
