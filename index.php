<?php

session_start();

include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins  where admin_email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];

    $admin_image = $row_admin['admin_image'];

    $admin_country = $row_admin['admin_country'];

    $admin_job = $row_admin['admin_job'];

    $admin_contact = $row_admin['admin_contact'];

    $admin_about = $row_admin['admin_about'];


    $get_products = "select * from products";
    $run_products = mysqli_query($con, $get_products);
    $count_products = mysqli_num_rows($run_products);

    $get_customers = "select * from customers";
    $run_customers = mysqli_query($con, $get_customers);
    $count_customers = mysqli_num_rows($run_customers);

    $get_p_categories = "select * from product_categories";
    $run_p_categories = mysqli_query($con, $get_p_categories);
    $count_p_categories = mysqli_num_rows($run_p_categories);


    $get_pending_orders = "select * from pending_orders";
    $run_pending_orders = mysqli_query($con, $get_pending_orders);
    $count_pending_orders = mysqli_num_rows($run_pending_orders);


    ?>


    <!DOCTYPE html>
    <html>

    <head>

        <title>Admin Panel</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">-->

    </head>

    <body>

    <div id="wrapper"><!-- wrapper Starts -->

        <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper"><!-- page-wrapper Starts -->

            <div class="container-fluid"><!-- container-fluid Starts -->

                <?php

                if (isset($_GET['dashboard'])) {

                    include("dashboard.php");

                }

                if (isset($_GET['insert_product'])) {

                    include("insert_product.php");

                }

                if (isset($_GET['insert_warehouse'])) {

                    include("insert_warehouse.php");

                }

                if (isset($_GET['view_products'])) {

                    include("view_products.php");

                }

                if (isset($_GET['view_warehouses'])) {

                    include("view_warehouses.php");

                }

                if (isset($_GET['delete_product'])) {

                    include("delete_product.php");

                }

                if (isset($_GET['delete_warehouse'])) {

                    include("delete_warehouse.php");

                }

                if (isset($_GET['insert_owner'])) {

                    include("insert_owner.php");

                }

                if (isset($_GET['view_owners'])) {

                    include("view_owners.php");

                }

                if (isset($_GET['edit_owner'])) {

                    include("edit_owner.php");

                }

                if (isset($_GET['delete_owner'])) {

                    include("delete_owner.php");

                }

                if (isset($_GET['insert_land'])) {

                    include("insert_land.php");

                }

                if (isset($_GET['view_lands'])) {

                    include("view_lands.php");

                }

                if (isset($_GET['edit_land'])) {

                    include("edit_land.php");

                }

                if (isset($_GET['delete_land'])) {

                    include("delete_land.php");

                }

                if (isset($_GET['insert_house'])) {

                    include("insert_house.php");

                }

                if (isset($_GET['view_houses'])) {

                    include("view_houses.php");

                }

                if (isset($_GET['edit_house'])) {

                    include("edit_house.php");

                }

                if (isset($_GET['delete_house'])) {

                    include("delete_house.php");

                }

                if (isset($_GET['insert_house_purchase'])) {

                    include("insert_house_purchase.php");

                }

                if (isset($_GET['view_house_purchases'])) {

                    include("view_house_purchases.php");

                }

                if (isset($_GET['remove_house_purchase'])) {

                    include("remove_house_purchase.php");

                }

                if (isset($_GET['insert_warehouse_purchase'])) {

                    include("insert_warehouse_purchase.php");

                }

                if (isset($_GET['view_warehouse_purchases'])) {

                    include("view_warehouse_purchases.php");

                }

                if (isset($_GET['remove_warehouse_purchase'])) {

                    include("remove_warehouse_purchase.php");

                }

                if (isset($_GET['insert_land_purchase'])) {

                    include("insert_land_purchase.php");

                }

                if (isset($_GET['view_land_purchases'])) {

                    include("view_land_purchases.php");

                }

                if (isset($_GET['remove_land_purchase'])) {

                    include("remove_land_purchase.php");

                }

                if (isset($_GET['edit_sale_purchase_h'])) {

                    include("edit_sale_purchase_h.php");

                }

                if (isset($_GET['edit_rent_purchase_h'])) {

                    include("edit_rent_purchase_h.php");

                }

                if (isset($_GET['edit_lease_purchase_h'])) {

                    include("edit_lease_purchase_h.php");

                }

                if (isset($_GET['edit_sale_purchase_w'])) {

                    include("edit_sale_purchase_w.php");

                }

                if (isset($_GET['edit_rent_purchase_w'])) {

                    include("edit_rent_purchase_w.php");

                }

                if (isset($_GET['edit_lease_purchase_w'])) {

                    include("edit_lease_purchase_w.php");

                }

                if (isset($_GET['edit_sale_purchase_l'])) {

                    include("edit_sale_purchase_l.php");

                }

                if (isset($_GET['edit_product'])) {

                    include("edit_product.php");

                }

                if (isset($_GET['edit_warehouse'])) {

                    include("edit_warehouse.php");

                }

                if (isset($_GET['insert_p_cat'])) {

                    include("insert_p_cat.php");

                }

                if (isset($_GET['view_p_cats'])) {

                    include("view_p_cats.php");

                }

                if (isset($_GET['delete_p_cat'])) {

                    include("delete_p_cat.php");

                }

                if (isset($_GET['edit_p_cat'])) {

                    include("edit_p_cat.php");

                }

                if (isset($_GET['insert_cat'])) {

                    include("insert_cat.php");

                }

                if (isset($_GET['view_cats'])) {

                    include("view_cats.php");

                }

                if (isset($_GET['delete_cat'])) {

                    include("delete_cat.php");

                }

                if (isset($_GET['edit_cat'])) {

                    include("edit_cat.php");

                }

                if (isset($_GET['insert_slide'])) {

                    include("insert_slide.php");

                }


                if (isset($_GET['view_slides'])) {

                    include("view_slides.php");

                }

                if (isset($_GET['delete_slide'])) {

                    include("delete_slide.php");

                }


                if (isset($_GET['edit_slide'])) {

                    include("edit_slide.php");

                }

                if (isset($_GET['insert_customer'])) {

                    include("insert_customer.php");

                }

                if (isset($_GET['edit_customer'])) {

                    include("edit_customer.php");

                }


                if (isset($_GET['view_customers'])) {

                    include("view_customers.php");

                }

                if (isset($_GET['delete_customer'])) {

                    include("delete_customer.php");

                }

                if (isset($_GET['customer_delete'])) {

                    include("customer_delete.php");

                }


                if (isset($_GET['view_orders'])) {

                    include("view_orders.php");

                }

                if (isset($_GET['order_delete'])) {

                    include("order_delete.php");

                }


                if (isset($_GET['view_payments'])) {

                    include("view_payments.php");

                }

                if (isset($_GET['payment_delete'])) {

                    include("payment_delete.php");

                }

                if (isset($_GET['insert_user'])) {

                    include("insert_user.php");

                }

                if (isset($_GET['view_users'])) {

                    include("view_users.php");

                }


                if (isset($_GET['user_delete'])) {

                    include("user_delete.php");

                }


                if (isset($_GET['user_profile'])) {

                    include("user_profile.php");

                }


                if (isset($_GET['editdata'])) {

                    include("editdata.php");

                }

                ?>

            </div><!-- container-fluid Ends -->

        </div><!-- page-wrapper Ends -->

    </div><!-- wrapper Ends -->

    <script src="js/jquery.min.js"></script>

    <script src="js/bootbox.min.js"></script>

    <script src="js/bootstrap.min.js"></script>


    </body>


    </html>

<?php } ?>