<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
//    echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
//    echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
//    echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
//    echo "<link rel=\"stylesheet\" href=\"css/my_style.css\">";
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Starts -->

        <div class="navbar-header"><!-- navbar-header Starts -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <!-- navbar-ex1-collapse Starts -->

                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button><!-- navbar-ex1-collapse Ends -->

            <a class="navbar-brand" href="index.php?dashboard">Admin Panel</a>

        </div><!-- navbar-header Ends -->

        <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav Starts -->
            <li class="dropdown"><!-- dropdown Starts -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle Starts -->
                    <i class="fa fa-user"></i>
                    <?php echo $admin_name; ?> <b class="caret"></b>
                </a><!-- dropdown-toggle Ends -->

                <ul class="dropdown-menu"><!-- dropdown-menu Starts -->
                    <li><!-- li Starts -->
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                            <i class="fa fa-fw fa-user"></i> Profile
                        </a>
                    </li><!-- li Ends -->

                    <li><!-- li Starts -->
                        <a href="index.php?view_products">
                            <i class="fa fa-fw fa-envelope"></i> Products
                            <span class="badge"><?php echo $count_products; ?></span>
                        </a>

                    </li><!-- li Ends -->

                    <li><!-- li Starts -->

                        <a href="index.php?view_customers">

                            <i class="fa fa-fw fa-gear"></i> Customers

                            <span class="badge"><?php echo $count_customers; ?></span>


                        </a>

                    </li><!-- li Ends -->

                    <li><!-- li Starts -->

                        <a href="index.php?view_p_cats">

                            <i class="fa fa-fw fa-gear"></i> Product Categories

                            <span class="badge"><?php echo $count_p_categories; ?></span>


                        </a>

                    </li><!-- li Ends -->

                    <li class="divider"></li>

                    <li><!-- li Starts -->

                        <a href="logout.php">

                            <i class="fa fa-fw fa-power-off"> </i> Log Out

                        </a>

                    </li><!-- li Ends -->

                </ul><!-- dropdown-menu Ends -->


            </li><!-- dropdown Ends -->


        </ul><!-- nav navbar-right top-nav Ends -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

            <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

                <li><!-- li Starts -->

                    <a href="index.php?dashboard">

                        <i class="fa fa-fw fa-dashboard"></i> Dashboard

                    </a>

                </li><!-- li Ends -->

                <li class="item" id='ware' data-toggle="collapse" data-target="#warehouses"><!-- li Starts -->
                    <a href="#ware" class="">
                        <i class="fa fa-fw fa-building"></i> Warehouses
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="warehouses" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_warehouse">Insert Warehouses</a>
                        <a style="text-decoration: none" href="index.php?view_warehouses">View Warehouses</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='house' data-toggle="collapse" data-target="#houses"><!-- li Starts -->
                    <a href="#house" class="">
                        <i class="fa fa-fw fa-home"></i> Houses
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="houses" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_house"> Insert House</a>
                        <a style="text-decoration: none" href="index.php?view_houses"> View Houses</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='land' data-toggle="collapse" data-target="#lands"><!-- li Starts -->
                    <a href="#land" class="">
                        <i class="fa fa-fw fa-map-signs"></i> Lands
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="lands" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_land"> Insert Land</a>
                        <a style="text-decoration: none" href="index.php?view_lands"> View Lands</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='owner' data-toggle="collapse" data-target="#owners"><!-- li Starts -->
                    <a href="#owner" class="">
                        <i class="fa fa-fw fa-user-secret"></i> Owners
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="owners" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_owner"> Insert Owner</a>
                        <a style="text-decoration: none" href="index.php?view_owners"> View Owners</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='customer' data-toggle="collapse" data-target="#customers"><!-- li Starts -->
                    <a href="#customer" class="">
                        <i class="fa fa-fw fa-users"></i> Customers
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="customers" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_customer"> Insert Customer</a>
                        <a style="text-decoration: none" href="index.php?view_customers"> View Customers</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='purchase_w' data-toggle="collapse" data-target="#purchases_w"><!-- li Starts -->
                    <a href="#purchase_w" class="">
                        <i class="fa fa-fw fa-dollar"></i><i class="fa fa-fw fa-building"></i>Warehouse Purchase
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="purchases_w" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_warehouse_purchase"> Insert Purchase</a>
                        <a style="text-decoration: none" href="index.php?view_warehouse_purchases"> View Purchase</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='purchase_h' data-toggle="collapse" data-target="#purchases_h"><!-- li Starts -->
                    <a href="#purchase_h" class="">
                        <i class="fa fa-fw fa-dollar"></i><i class="fa fa-fw fa-home"></i>House Purchase
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="purchases_h" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_house_purchase"> Insert Purchase</a>
                        <a style="text-decoration: none" href="index.php?view_house_purchases"> View Purchase</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='purchase_l' data-toggle="collapse" data-target="#purchases_l"><!-- li Starts -->
                    <a href="#purchase_l" class="">
                        <i class="fa fa-fw fa-dollar"></i><i class="fa fa-fw fa-map-signs"></i>Land Purchase
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="purchases_l" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_land_purchase"> Insert Purchase</a>
                        <a style="text-decoration: none" href="index.php?view_land_purchases"> View Purchase</a>
                    </div>
                </li><!-- li Ends -->

                <li class="item" id='user' data-toggle="collapse" data-target="#users"><!-- li Starts -->
                    <a href="#user" class="">
                        <i class="fa fa-fw fa-user"></i></i>Users
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <div id="users" class="smenu collapse">
                        <a style="text-decoration: none" href="index.php?insert_user"> Insert User</a>
                        <a style="text-decoration: none" href="index.php?view_users"> View User</a>
                        <a style="text-decoration: none" href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile</a>
                    </div>
                </li><!-- li Ends -->

                <li><!-- li Starts -->
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li><!-- li Ends -->

            </ul><!-- nav navbar-nav side-nav Ends -->

        </div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

    </nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>