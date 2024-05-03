<?php

session_start();

if($_SESSION["User"]==null){
    echo "<script>window.location.href='signin.php'</script>";
 }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:55:23 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Art Shopping - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="assets/css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    
   <?php
   
   include("aside.php");
   include("../Classes/product_class.php");
   include("../Classes/order_class.php");

   $pro=new products();
   
   $or=new orders();
   ?>

            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- chart caard section start -->
                        


                        <!-- Best Selling Product Start -->
                        <div class="col-xl-12 col-md-12">
                        
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Products List</h5>
                                       
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package theme-table table-product" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Product Image</th>
                                                       
                                                        <th>Product Price</th>
                                                        
                                                        <th>Quantity</th>
                                                        <th>Created Date</th>
                                                        
                                                    </tr>
                                                </thead>

                                                    <?php

                                                    

                                                    

                                                    $cus=$pro->SelectProduct(null);
                                                    while($row=$cus->fetch_assoc()){

                                                    
                                                    ?>
                                                <tbody>
                                                    <tr>

                                                        <td>
                                                            <?php echo $row["ProductName"] ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo $row["ProductImg"] ?>" width="50" height="50">
                                                            
                                                        </td>
                                                       
                                                       
                                                        <td>
                                                            <?php echo $row["ProductPrice"] ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php echo $row["Quantity"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["CreatedDate"] ?>
                                                        </td>
                                                        

                                                      
                                                        
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                
                            </div>
                        <!-- Best Selling Product End -->


                        <!-- Recent orders start-->
                        <div class="col-xl-12">
                            <div class="card o-hidden card-hover">
                                <div class="card-header card-header-top card-header--2 px-0 pt-0">
                                    <div class="card-header-title">
                                        <h5>Orders</h5>
                                    </div>

                                    
                                </div>

                                <div class="card-body p-0">
                                    <div>
                                        <div class="table-responsive">
                                        <table class="table all-package order-table theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Order Num</th>
                                                        <th>Product Name</th>
                                                        <th>Customer Customer</th>
                                                        <th>Order Date</th>
                                                        <th>Address</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Quantity</th>
                                                        <th>Payment Mode</th>
                                                        
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    
                                                    
                                                    

                                                    $cus=$or->SelectOrder(null);
                                                    while($row=$cus->fetch_assoc()){    
                                                        ?>
                                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                                       
                                                        <td>
                                                            <?php echo $row["OrderNum"]?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["ProductName"]?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row["CustomerName"]?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row["OrderDate"]?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php echo $row["Address"] ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php echo $row["OrderStatus"]?>
                                                        </td>

                                                        
                                                        <td>
                                                            <?php echo $row["Total"]?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php echo $row["Quantity"]?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row["payment_mode"]?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div>
                        <!-- Recent orders end-->


    <!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery -->
    <script src="assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="assets/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/chart/apex-chart/chart-custom1.js"></script>


    <!-- slick slider js -->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="assets/js/ratio.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:56:17 GMT -->
</html>