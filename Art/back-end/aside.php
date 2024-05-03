 <?php
 session_start();
 ?>
 <!-- tap on top start -->
 <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.php">
                             <img class="img-fluid main-logo" src="assets/images/logo/artshopping.jpeg" alt="logo">
                            <img class="img-fluid white-logo" src="assets/images/logo/artshopping.jpeg" alt="logo"> 
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.php">
                            <img src="assets/images/logo/artshopping.jpeg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                       
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                
                                <div class="user-name-hide media-body">
                                    <span><?php echo $_SESSION["User"]["UserName"] ?></span>
                                    <p class="mb-0 font-roboto"><?php echo $_SESSION["User"]["Role"] ?><i class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="all-users.php">
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="order-list.php">
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                
                               
                                <li>
                                    <form action="" method="post">
                                    <input type="submit" value="Log Out" class="btn btn-danger" name="btnlogout">
                                    </form>
                                    
                                       
                                </li>
                                <?php
                                        
                                        if(@$_POST["btnlogout"]){
                                            unset($_SESSION["User"]);
                                            echo "<script>window.location.href='signin.php'</script>";
                                        }

                                        ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="index.php" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="assets/images/logo/artshopping.jpeg" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.php">
                            <img class="img-fluid main-logo main-white" src="assets/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark" src="assets/images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="index.php">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Product</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="products.php">Products</a>
                                        </li>

                                        <li>
                                            <a href="add-new-product.php">Add New Products</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Customer</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="customer.php">Customer</a>
                                        </li>

                                        <li>
                                            <a href="addcustomer.php">Add New Customer</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Category</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="category.php">Category List</a>
                                        </li>

                                        <li>
                                            <a href="add-new-category.php">Add New Category</a>
                                        </li>
                                    </ul>
                                </li>

                               
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="all-users.php">All users</a>
                                        </li>
                                        <li>
                                            <a href="add-new-user.php">Add new user</a>
                                        </li>
                                    </ul>
                                </li>

                               
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="contact.php">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Contact Us</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="order-list.php">Order List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders Return</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="orderreturn.php">Order Return List</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                               
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="feedback.php">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Feedback</span>
                                    </a>
                                </li>

                               
                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- Page Sidebar Ends-->