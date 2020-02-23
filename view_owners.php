<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Owners

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading clearfix"><!-- panel-heading Starts -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="panel-title pull-left" style="padding-top: 7.5px;">
                                <i class="fa fa-user-secret fa-2x fa-fw"></i> View Owners
                            </h3>
                        </div>
                    </div>
                    <br>
                    <form name="search_form" method="post">
                        <div class="input-group">
                            <input type="text" name="search_box" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group center-block text-center">
                            <div class="form-horizontal">
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   value="Owner_Name">Owner Name</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Address">Address</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Phone">Phone Number</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Email">Email</label>
                            </div>

                        </div>
                    </form>
                    <?php
                    if (isset($_POST['search'])) {

                        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
                        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
                        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
                        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";
                        $rdo = $_POST['optradio'];
                        $box = $_POST['search_box'];


                        if (strcmp($rdo, 'Owner_Name') == 0) {
                            $get_rslt = "select * from owners WHERE name LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Address') == 0) {
                            $get_rslt = "select * from owners WHERE address LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Phone') == 0) {
                            $get_rslt = "select * from owners WHERE phone LIKE '%$box%'";
                            $run_rslt = mysqli_query($con, $get_rslt);
                        }
                        if (strcmp($rdo, 'Email') == 0) {
                            $get_rslt = "select * from owners WHERE email LIKE '%$box%'";
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
                            <div class="modal fade" id="sModal" role="dialog" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <form method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        onclick="window.open('index.php?view_owners','_self')">
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
                                                            <th style="vertical-align: middle;text-align: center">Owner ID</th>
                                                            <th style="vertical-align: middle;text-align: center">Owner Name</th>
                                                            <th style="vertical-align: middle;text-align: center">Owner Address</th>
                                                            <th style="vertical-align: middle;text-align: center">Owner Phone</th>
                                                            <th style="vertical-align: middle;text-align: center">Owner Fax</th>
                                                            <th style="vertical-align: middle;text-align: center">Owner Email</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0;
                                                        while ($row_rslt = mysqli_fetch_array($run_rslt)) {
                                                            $ow_id_s = $row_rslt['owner_id'];
                                                            $ow_name_s = $row_rslt['name'];
                                                            $ow_address_s = $row_rslt['address'];
                                                            $ow_phone_s = $row_rslt['phone'];
                                                            $ow_fax_s = $row_rslt['fax'];
                                                            $ow_email_s = $row_rslt['email'];
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <button style="display:block;margin:0 auto;margin-top:2px;" type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                                            data-original-title="" title="Edit"
                                                                            onclick="location.href = 'index.php?edit_owner=<?php echo $ow_id_s; ?>';">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>
                                                                    <button style="display:block;margin:0 auto;margin-top:2px;" type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                                            data-original-title="" title="Delete"
                                                                            onclick="location.href = 'index.php?delete_owner=<?php echo $ow_id_s; ?>';">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                                <td style="text-align:center"<?php echo $i; ?></td>
                                                                <td style="text-align:center"><?php echo $ow_name_s; ?></td>
                                                                <td><?php echo $ow_address_s; ?></td>
                                                                <td><?php echo $ow_phone_s; ?></td>
                                                                <td><?php echo $ow_fax_s; ?></td>
                                                                <td><?php echo $ow_email_s; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table><!-- table table-bordered table-hover table-striped Ends -->
                                                </div><!-- table-responsive Ends -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        onclick="window.open('index.php?view_owners','_self')">Close
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

                            <thead><!-- thead Starts -->

                            <tr>
                                <th style="vertical-align: middle;text-align: center"><i
                                        class="fa fa-gear"></i></th>
                                <th style="vertical-align: middle;text-align: center">Owner ID</th>
                                <th style="vertical-align: middle;text-align: center">Owner Name</th>
                                <th style="vertical-align: middle;text-align: center">Owner Address</th>
                                <th style="vertical-align: middle;text-align: center">Owner Phone</th>
                                <th style="vertical-align: middle;text-align: center">Owner Fax</th>
                                <th style="vertical-align: middle;text-align: center">Owner Email</th>
                            </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_owner = "select * from owners";

                            $run_owner = mysqli_query($con, $get_owner);

                            while ($row_owner = mysqli_fetch_array($run_owner)) {
                                $owner_id = $row_owner['owner_id'];
                                $owner_name = $row_owner['name'];
                                $owner_address = $row_owner['address'];
                                $owner_phone = $row_owner['phone'];
                                $owner_fax = $row_owner['fax'];
                                $owner_email = $row_owner['email'];
                                $i++;
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <button style="display:block;margin:0 auto;margin-top:2px;" type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                data-original-title="" title="Edit"
                                                onclick="location.href = 'index.php?edit_owner=<?php echo $owner_id; ?>';">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button style="display:block;margin:0 auto;margin-top:2px;" type="button" rel="tooltip" class="btn btn-danger btn-sm"
                                                data-original-title="" title="Delete"
                                                onclick="location.href = 'index.php?delete_owner=<?php echo $owner_id; ?>';">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td style="text-align:center"><?php echo $i; ?></td>
                                    <td style="text-align:center"><?php echo $owner_name; ?></td>
                                    <td><?php echo $owner_address; ?></td>
                                    <td><?php echo $owner_phone; ?></td>
                                    <td><?php echo $owner_fax; ?></td>
                                    <td><?php echo $owner_email; ?></td>
                                </tr>

                            <?php } ?>


                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

<?php } ?>