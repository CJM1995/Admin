<?php

session_start();

include("includes/db.php");

?>
    <!DOCTYPE HTML>
    <html>

    <head>

        <title>Admin Login</title>

        <link rel="stylesheet" href="css/login_style.css">

    </head>

    <body>

    <div class="container"><!-- container Starts -->

        <form class="box" action="" method="post"><!-- form-login Starts -->

            <h1>Login</h1>

            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>
            <input type="submit" name="admin_login" value="Login">


        </form><!-- form-login Ends -->

    </div><!-- container Ends -->

    <?php
    if (isset($_POST['admin_login'])) {
        echo "<!-- Success Modal -->
        <div class=\"modal fade\" id=\"suModal\" role=\"dialog\" data-keyboard=\"false\" data-backdrop=\"static\">
            <div class=\"modal-dialog modal-sm\">

                <!-- Modal content-->
                <div class=\"modal-content\">
                    <div class=\"modal-body\">
                        <i style=\"font-size: 800%\"
                           class=\"text-center text-success center-block fa fa-check-circle-o fa-5x\"></i>
                        <br>
                        <p style=\"font-size: 110%\" class=\"text-center\">You are Logged into Admin Panel!</p>

                    </div>
                    <form method=\"post\">
                        <div style=\"text-align: center\" class=\"modal-footer text-center center-block\">
                            <button type=\"button\" class=\"btn btn-success\"
                                    onclick=\"window.open('index.php?dashboard','_self')\">OK
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Success Modal -->

        <!--Loading-->
        <div class=\"modal load-modal\" id=\"loadingModal\" data-backdrop=\"static\">
            <div class=\"modal-dialog modal-sm\">
                <div class=\"modal-content\">
                    <div class=\"container\"></div>
                    <div class=\"modal-body text-center center-block\">
                        <i style=\"font-size: 800%\" class=\"fa fa-spinner fa-pulse fa-5x\"></i>
                        <br><br>
                        <h4 class=\"text-center load-text\">Please wait...</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--Loading-->

        <!-- Alert Modal -->
        <div class=\"modal fade\" id=\"oopsModal\" role=\"dialog\" data-keyboard=\"false\" data-backdrop=\"static\">
            <div class=\"modal-dialog modal-sm\">

                <!-- Modal content-->
                <div class=\"modal-content\">
                    <div class=\"modal-body\">
                        <i style=\"font-size: 800%\"
                           class=\"text-center text-danger center-block fa fa-exclamation-circle fa-5x\"></i>
                        <br>
                        <p style=\"font-size: 110%\" class=\"text-center\">Email or Password is Wrong</p>

                    </div>
                    <form method=\"post\">
                        <div style=\"text-align: center\" class=\"modal-footer text-center center-block\">
                            <button type=\"button\" class=\"btn btn-danger\"
                                    onclick=\"window.open('login.php','_self')\">OK
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Alert Modal -->";
    }
    ?>


    </body>

    </html>


<?php

if (isset($_POST['admin_login'])) {

    echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
    echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
    echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
    echo "<link href=\"css/style.css\" rel=\"stylesheet\">";

    echo "<script type=\"text/javascript\">
                    $('#loadingModal').modal('show');
                  </script>";

    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con, $get_admin);

    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {

        $_SESSION['admin_email'] = $admin_email;

        echo "<script type=\"text/javascript\">
            $('#loadingModal').modal('hide');
            $('#suModal').modal('show');
        </script>";

    } else {

        echo "<script type=\"text/javascript\">
            $('#loadingModal').modal('hide');
            $('#oopsModal').modal('show');
        </script>";

    }

}

?>