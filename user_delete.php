<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
    echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
    echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
    echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
    echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

    ?>

    <?php
    if (isset($_GET['user_delete'])) {
        $delete_id = $_GET['user_delete'];
    }
    ?>

    <?php echo "<script type=\"text/javascript\">
        $(window).load(function(){
            $('#myModal').modal('show');
        });
        </script>"; ?>

    <!-- Delete Modal -->
    <div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="window.open('index.php?view_users','_self')">
                            &times;
                        </button>
                        <h2 class="modal-title text-center text-danger">Are you sure?</h2>
                    </div>
                    <div class="modal-body">
                        <i style="font-size: 800%"
                           class="text-center text-danger center-block fa fa-times-circle-o fa-5x"></i>
                        <br>
                        <p style="font-size: 110%" class="text-center">Do you really want to delete this record? This
                            process cannot be undone.</p>
                        <input name="del_id" type="hidden" value="<?php echo $delete_id ?>">

                    </div>
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <input type="submit" name="close" value="Close"
                               class="btn btn-default" onclick="window.open('index.php?view_users','_self')">
                        <input type="submit" name="delete" value="Delete"
                               class="btn btn-danger" onclick=$('#myModal').modal('hide');>
                        <!--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>-->

                    </div>
                </div>
        </div>
    </div>
    <!-- Delete Modal -->


    <!-- Success Modal -->
    <div class="modal fade" id="suModal" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <i style="font-size: 800%"
                       class="text-center text-success center-block fa fa-check-circle-o fa-5x"></i>
                    <br>
                    <p style="font-size: 110%" class="text-center">Record has been deleted!</p>

                </div>
                <form method="post">
                    <div style="text-align: center" class="modal-footer text-center center-block">
                        <input type="submit" name="ok" value="OK"
                               class="btn btn-success">
                    </div>
            </div>

        </div>
        </form>
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

    if (isset($_POST['delete'])) {
        echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

        $del_id = $_POST['del_id'];
        $delete_house = "delete from admins where admin_id='$del_id'";
        $run_delete = mysqli_query($con, $delete_house);
        if ($run_delete) {

            echo "<script type=\"text/javascript\">
            $(window).load(function(){
                $('#myModal').modal('hide');
            });
            $('#loadingModal').modal('hide');
            $('#suModal').modal('show');
        </script>";
        }
    }
    if (isset($_POST['ok'])) {
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }

    if (isset($_POST['close'])) {
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
    ?>

<?php } ?>