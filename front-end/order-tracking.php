<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/order-tracking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:56:15 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Order Tracking</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
<?php
 include("navbar.php");
 include("../Classes/Orders.php");
?>
    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Order Tracking</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-------------------------------- rteturn Order end -------------------------------------->
    <section class="py-5">

<div class="container text-center"><h1>Track Order</h1><hr></div>      
<div class="container">
    <form method="post">
      
        <div>
    
            <input placeholder="Enter Order Number" class="form-control" style="width:50%; float:left" type="text" name="txtsearchorder">
            <input class="btn btn-primary" style="width:100px" type="submit" name="btnSearchOrder" value="Search">
        </div>
        
    </form>
</div>




    <section class="order-table-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table order-tab-table">
                            <thead>
                                <tr>
<th>Order Number</th>
<th>Order Date</th>
<th>Order Address</th>
<th>Customer Name</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Total Amount</th>
<th>Payment Method</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php

if($_SESSION["customer"]==null)
{
header("location:customerlogin.php");
}
$order=new Order();


if(@$_POST["btnSearchOrder"])
{
$odernumber=$_POST["txtsearchorder"];
$st=$order->SelectOrderByStatus($odernumber);
while($rows=$st->fetch_assoc())
{?>
<tr>
<td><?php echo $rows["OrderNum"]?></td>
<td><?php echo $rows["OrderDate"]?></td>
<td><?php echo $rows["Address"]?></td>
<td><?php echo $rows["CustomerName"]?></td>
<td><?php echo $rows["ProductName"]?></td>
<td><?php echo $rows["Quantity"]?></td>
<td><?php echo $rows["Total"]?></td>
<td><?php echo $rows["PaymentMethod"]?></td>
<td>
<?php 
    if($rows["Status"]=="Pending")
    {
    echo "<span style='color:orange'>".$rows["Status"]."</span>";
    }
    else
    {
      echo "<span style='color:green'>".$rows["Status"]."</span>";
    }
    ?>
</td>
<td><button type="button" class="btn btn-primary"><a href="return.php?id=<?php echo $rows["OrderID"]   ?>">Return Order</button></td>

</tr>
<?php
}
}
else
{
$st=$order->SelectOrderByStatus($_SESSION["customer"]["CustomerID"]);
while($rows=$st->fetch_assoc())
{?>
<tr>
<td><?php echo $rows["OrderNum"]?></td>
<td><?php echo $rows["OrderDate"]?></td>
<td><?php echo $rows["Address"]?></td>
<td><?php echo $rows["CustomerName"]?></td>
<td><?php echo $rows["ProductName"]?></td>
<td><?php echo $rows["Quantity"]?></td>
<td><?php echo $rows["Total"]?></td>
<td><?php echo $rows["payment_mode"]?></td>
<td>
<?php 
    if($rows["OrderStatus"]=="Pending")
    {
    echo "<span style='color:orange'>".$rows["OrderStatus"]."</span>";
    }
    else
    {
      echo "<span style='color:green'>".$rows["OrderStatus"]."</span>";
    }
    ?>
</td>
<td><button type="button" class="btn btn-primary"><a href="return.php?id=<?php echo $rows["OrderID"] ?>">Return Order</button>
<td>

</tr>

<?php
}
}



?>

</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- </div> -->
</section>

    <!-- Order Detail Section Start -->
    <section class="order-detail">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-6">
                    <div class="order-image">
                        <img src="../assets/images/vegetable/product/6.png" class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-6">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i data-feather="package" class="text-content"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Tracking Code</h5>
                                    <h2 class="theme-color">MH4285UY</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i data-feather="truck" class="text-content"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Service</h5>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/brand-name.svg"
                                        class="img-fluid blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="info"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Package Info</h5>
                                    <h4>Letter</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="crosshair"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">From</h5>
                                    <h4>STR. Smardan 9, Bucuresti, romania.</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="map-pin"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Destination</h5>
                                    <h4>Flokagata 24, 105 Reykjavik, Iceland</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="calendar"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Estimated Time</h5>
                                    <h4>7 Frb, 05:05pm</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 overflow-hidden">
                            <ol class="progtrckr">
                                <li class="progtrckr-done">
                                    <h5>Order Processing</h5>
                                    <h6>05:43 AM</h6>
                                </li>
                                <li class="progtrckr-done">
                                    <h5>Pre-Production</h5>
                                    <h6>01:21 PM</h6>
                                </li>
                                <li class="progtrckr-done">
                                    <h5>In Production</h5>
                                    <h6>Processing</h6>
                                </li>
                                <li class="progtrckr-todo">
                                    <h5>Shipped</h5>
                                    <h6>Pending</h6>
                                </li>
                                <li class="progtrckr-todo">
                                    <h5>Delivered</h5>
                                    <h6>Pending</h6>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Detail Section End -->



 <?php
 include("footer.php");
 ?>

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#0da487" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>RTL</h4>
                            </div>
                            <div class="theme-setting-button rtl">
                                <button class="btn btn-2 rtl-unline">LTR</button>
                                <button class="btn btn-2 rtl-outline">RTL</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="../assets/js/jquery-ui.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="../assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="../assets/js/feather/feather.min.js"></script>
    <script src="../assets/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="../assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="../assets/js/slick/slick.js"></script>
    <script src="../assets/js/slick/slick-animation.min.js"></script>
    <script src="../assets/js/custom-slick-animated.js"></script>
    <script src="../assets/js/slick/custom_slick.js"></script>

    <!-- Price Range Js -->
    <script src="../assets/js/ion.rangeSlider.min.js"></script>

    <!-- sidebar open js -->
    <script src="../assets/js/filter-sidebar.js"></script>

    <!-- Zoom Js -->
    <script src="../assets/js/jquery.elevatezoom.js"></script>
    <script src="../assets/js/zoom-filter.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>

    <!-- thme setting js -->
    <script src="../assets/js/theme-setting.js"></script>

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/order-tracking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:56:15 GMT -->
</html>