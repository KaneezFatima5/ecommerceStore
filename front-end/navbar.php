 <header class="pb-md-4 pb-0">
     <?php
        session_start();
        include("head.php");
        include("../Classes/Product.php");
        include("../Classes/Wishlist.php");
        include("../Classes/rating.php");
        include("../Classes/contact.php");
        include("../Classes/smart_filteration.php");
        include("../Classes/feedback.php");
        include("../Classes/feedback_class.php");
        //include("../classes/Customer.php");



        $product = new Product();
        $wishlist = new Wishlist();
        if (@$_SESSION["carts"] == null) {
            $_SESSION["carts"] = array();
        }
        if (@$_GET['pid']) {
            $dt = $product->SelectProduct($_GET['pid']);
            $row = $dt->fetch_assoc();
            array_push($_SESSION["carts"], $row);
            echo "<script>location.href='index.php'</script>";
        }
        if (@$_GET['pidss']) {
            $dt = $product->SelectProduct($_GET['pidss']);
            $row = $dt->fetch_assoc();
            array_push($_SESSION["carts"], $row);
        ?>
         <script>
             Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: 'Product has been added in your Cart!',
                 showConfirmButton: false,
                 timer: 1500
             })
             setTimeout("location.href = 'Product_Detail.php?pids=<?php echo @$_GET["pidss"] ?>';", 1500);
         </script>
         <?php
        }
        if (@$_GET['pid_from_wishlist']) {
            $dt = $product->SelectProduct($_GET['pid_from_wishlist']);
            $row = $dt->fetch_assoc();
            array_push($_SESSION["carts"], $row);
            echo "<script>location.href='wishlist.php'</script>";
        }
        if (@$_GET['remove_from_wishlist']) {
            $dt = $wishlist->deletewishlist($_GET['remove_from_wishlist']);

            echo "<script>location.href='wishlist.php'</script>";
        }

        if (@$_GET['keys'] >= 0) {
            unset($_SESSION["carts"][@$_GET['keys']]);
        }
        if (@$_GET['wish']) {
            $wishlist = new Wishlist();
            $productid = $_GET['wish'];
            if ($_SESSION["customer"]["CustomerID"] == null) {
                echo "<script>location.href='login.php'</script>";
            }
            $wishid = $_SESSION["customer"]["CustomerID"];
            if ($wishlist->addwishlist($productid, $wishid)) {
            ?>
             <script>
                 Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Product has been added in your wishlist!',
                     showConfirmButton: false,
                     timer: 1500
                 })
                 setTimeout("location.href = 'index.php';", 1500);
             </script>
         <?php
            }
        }

        if (@$_GET['wish_from_cart']) {
            $productid = $_GET['wish_from_cart'];
            $wishlist = new Wishlist();
            if ($_SESSION["customer"]["CustomerID"] == null) {
                echo "<script>location.href='login.php'</script>";
            }
            $wishid = $_SESSION["customer"]["CustomerID"];
            if ($wishlist->addwishlist($productid, $wishid)) {
            ?>
             <script>
                 Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Product has been added in your wishlist!',
                     showConfirmButton: false,
                     timer: 1500
                 })
                 setTimeout("location.href = 'cart.php';", 1500);
             </script>
         <?php
            }
        }

        $wishlist = new Wishlist();
        $wishid = @$_SESSION["customer"]["CustomerID"];
        $wl = $wishlist->selectWishlist($wishid);
        $wishlists = $wl->fetch_assoc();
        if (@$_GET["catid"]) {
            ?>
         <script>
             $(document).ready(function() {
                 $(".searchbyproduct").hide();
             });
         </script>
         <?php
        }


        $rp = new rating_product();
        $fr = $rp->fetchrating("1");
        $getAverage = mysqli_fetch_array($fr);
        $numRating = $getAverage['numRating'];
        $return_arr = array("numRating" => $numRating);

        if (@$_POST['btnsend']) {
            $name = $_POST['txtname'];
            $number = $_POST['txtnumber'];
            $email = $_POST['txtemail'];
            $msg = $_POST['txtmsg'];
            $contact = new Contact();
            if ($contact->AddContact($name, $number, $email, $msg)) {
            ?>
             <script>
                 Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'We Received Your Message,our Team will respond you soon!',
                     showConfirmButton: false,
                     timer: 1500
                 })
                 setTimeout("location.href = 'Contact_Us.php';", 1500);
             </script>
         <?php
            }
        }


        $rate = null;
        if (@$_GET['strrr']) {

            $rate = $_GET['strrr'];
        }
        $final = $rate;
        if ($rate != null) {
            if ($_SESSION["customer"] == null) {
                echo "<script>location.href='login.php'</script>";
            }

            $_GET["productid"];
            if ($rp->add_rating($_GET["productid"], $_SESSION["customer"]["CustomerID"], $final)) {
                $proid = $_GET["productid"];
            ?>
             <script>
                 Swal.fire(
                     'Thank you for Rating..',
                     'Rating done successfully...',
                     'success'
                 )
                 setTimeout("location.href = 'Product_Detail.php?pids=<?php echo $proid ?>';", 5500);
             </script>

         <?php
            }
        }
        if (@$_GET["logout"]) {
            unset($_SESSION["customer"]);
        }

        if (@$_POST["btnreview"]) {
            if ($_SESSION["customer"]["CustomerID"] == null) {
                echo "<script>location.href='login.php'</script>";
            }
            $wishid = $_SESSION["customer"]["CustomerID"];
            $productid = $_POST["txtproductid"];
            $review = $_POST["txtmsg"];
            $feedback = new feedbacks();
            if ($feedback->Addfeedback($wishid, $productid, $review)) {
                $_SESSION["proid"]
            ?>
             <script>
                 Swal.fire(
                     'Thank you for Review..',
                     'Review done successfully...',
                     'success'
                 )
                 setTimeout("location.href = 'Product_Detail.php?pids=<?php echo @$_SESSION["proid"] ?>';", 5500);
             </script>

     <?php
            }
        }
        ?>


     <style>
         header .onhover-dropdown .onhover-div {
             position: absolute;
             height: 400px;
             overflow-y: scroll;
             top: 60px;
             right: -10px;
             background-color: #fff;
             z-index: 1001;
             width: 320px;
             border-radius: 10px;
             padding: calc(14px + (30 - 14) * ((100vw - 320px) / (1920 - 320))) calc(11px + (20 - 11) * ((100vw - 320px) / (1920 - 320)));
             -webkit-box-shadow: -1px 0 10px 0 rgba(34, 34, 34, 0.07), 5px 20px 40px 0 rgba(34, 34, 34, 0.04);
             box-shadow: -1px 0 10px 0 rgba(34, 34, 34, 0.07), 5px 20px 40px 0 rgba(34, 34, 34, 0.04);
             opacity: 0;
             -webkit-transition: all 0.3s ease-in-out;
             transition: all 0.3s ease-in-out;
             visibility: hidden;
         }
     </style>
     <div class="header-top">
         <div class="container-fluid-lg">
             <div class="row">
                 <div class="col-xxl-3 d-xxl-block d-none">
                     <div class="top-left-header">
                         <i class="iconly-Location icli text-white"></i>
                         <span class="text-white">1418 Riverwood Drive, CA 96052, US</span>
                     </div>
                 </div>

                 <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                     <div class="header-offer">
                         <div class="notification-slider">
                             <div>
                                 <div class="timer-notification">
                                     <h6><strong class="me-1">Welcome to Fastkart!</strong>Wrap new offers/gift
                                         every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                                         </strong>

                                     </h6>
                                 </div>
                             </div>

                             <div>
                                 <div class="timer-notification">
                                     <h6>Something you love is now on sale!
                                         <a href="shop-left-sidebar.html" class="text-white">Buy Now
                                             !</a>
                                     </h6>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3">
                     <ul class="about-list right-nav-about">
                         <li class="right-nav-list">
                             <div class="dropdown theme-form-select">
                                 <button class="btn dropdown-toggle" type="button" id="select-language" data-bs-toggle="dropdown" aria-expanded="false">
                                     <img src="../assets/images/country/united-states.png" class="img-fluid blur-up lazyload" alt="">
                                     <span>English</span>
                                 </button>
                                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                     <li>
                                         <a class="dropdown-item" href="javascript:void(0)" id="english">
                                             <img src="../assets/images/country/united-kingdom.png" class="img-fluid blur-up lazyload" alt="">
                                             <span>English</span>
                                         </a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" href="javascript:void(0)" id="france">
                                             <img src="../assets/images/country/germany.png" class="img-fluid blur-up lazyload" alt="">
                                             <span>Germany</span>
                                         </a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                             <img src="../assets/images/country/turkish.png" class="img-fluid blur-up lazyload" alt="">
                                             <span>Turki</span>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </li>
                         <li class="right-nav-list">
                             <div class="dropdown theme-form-select">
                                 <button class="btn dropdown-toggle" type="button" id="select-dollar" data-bs-toggle="dropdown" aria-expanded="false">
                                     <span>USD</span>
                                 </button>
                                 <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu" aria-labelledby="select-dollar">
                                     <li>
                                         <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>
                                     </li>
                                 </ul>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <div class="top-nav top-header sticky-header">
         <div class="container-fluid-lg">
             <div class="row">
                 <div class="col-12">
                     <div class="navbar-top">
                         <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                             <span class="navbar-toggler-icon">
                                 <i class="fa-solid fa-bars"></i>
                             </span>
                         </button>
                         <a href="index.php" class="web-logo nav-logo">
                             <img src="../assets/images/logo/Art.png" width="215px" class="img-fluid blur-up lazyload" alt="">
                         </a>

                         <div class="middle-box">
                             <!-- <div class="location-box">
                                 <button class="btn location-button" data-bs-toggle="modal" data-bs-target="#locationModal">
                                     <span class="location-arrow">
                                         <i data-feather="map-pin"></i>
                                     </span>
                                     <span class="locat-name">Your Location</span>
                                     <i class="fa-solid fa-angle-down"></i>
                                 </button>
                             </div> -->

                             <div class="search-box">
                                 <div class="input-group">
                                     <input type="search" class="form-control" placeholder="I'm searching for..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                     <button class="btn" type="button" id="button-addon2">
                                         <i data-feather="search"></i>
                                     </button>
                                 </div>
                             </div>
                         </div>

                         <div class="rightside-box">
                             <div class="search-full">
                                 <div class="input-group">
                                     <span class="input-group-text">
                                         <i data-feather="search" class="font-light"></i>
                                     </span>
                                     <input type="text" class="form-control search-type" placeholder="Search here..">
                                     <span class="input-group-text close-search">
                                         <i data-feather="x" class="font-light"></i>
                                     </span>
                                 </div>
                             </div>
                             <ul class="right-side-menu">
                                 <li class="right-side">
                                     <div class="delivery-login-box">
                                         <div class="delivery-icon">
                                             <div class="search-box">
                                                 <i data-feather="search"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </li>

                                 <li class="right-side">
                                     <a href="wishlist.php" class="btn p-0 position-relative header-wishlist">
                                         <button type="button" class="btn p-0 position-relative header-wishlist">
                                             <i data-feather="heart"></i>
                                             <span class="position-absolute top-0 start-100 translate-middle badge"><?php echo $wishlists["Total"]; ?>

                                             </span>
                                         </button>
                                     </a>
                                 </li>
                                 <li class="right-side">
                                     <div class="onhover-dropdown header-badge">
                                         <button type="button" class="btn p-0 position-relative header-wishlist">
                                             <i data-feather="shopping-cart"></i>
                                             <span class="position-absolute top-0 start-100 translate-middle badge"><?php echo count(@$_SESSION['carts']) ?>
                                                 <span class="visually-hidden">unread messages</span>
                                             </span>
                                         </button>

                                         <div class="onhover-div">
                                             <ul class="cart-list">
                                                 <?php
                                                    $totalPrice = 0;
                                                    foreach (@$_SESSION['carts'] as $carts) {
                                                        $totalPrice += $carts['SalePrice'];
                                                    ?>

                                                     <li class="product-box-contain">
                                                         <div class="drop-cart">
                                                             <a href="product-left-thumbnail.html" class="drop-image">
                                                                 <img src="../back-end/<?php echo $carts["ProductImg"] ?>" class="blur-up lazyload" alt="">
                                                             </a>

                                                             <div class="drop-contain">

                                                                 <h5><?php echo $carts['ProductName'] ?></h5>

                                                                 <h6><span>1X</span><?php echo $carts['ProductPrice'] ?></h6>
                                                                 <button class="close-button close_button">
                                                                     <i class="fa-solid fa-xmark"></i>
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 <?php
                                                    } ?>
                                             </ul>

                                             <div class="price-box">
                                                 <h5>Total :</h5>
                                                 <h4 class="theme-color fw-bold"><?php echo $totalPrice ?></h4>
                                             </div>

                                             <div class="button-group">
                                                 <a href="cart.php" class="btn btn-sm cart-button">View Cart</a>

                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="right-side onhover-dropdown">
                                     <div class="delivery-login-box">
                                         <div class="delivery-icon">
                                             <i data-feather="user"></i>
                                         </div>
                                         <div class="delivery-detail">
                                             <h6>Hello,</h6>
                                             <h5>My Account</h5>
                                         </div>
                                     </div>

                                     <form class="d-flex">
                                         <div class="onhover-div onhover-div-login">
                                             <?php
                                                if (@$_SESSION["customer"] != null) { ?>
                                                 <p>Welcome: <?php echo $_SESSION["customer"]["CustomerName"] ?></p>
                                                 <a class="btn btn-danger" href="index.php?logout=true">Logout</a>
                                            
                                                 <a class="btn btn-primary" href="../back-end/signin.php">Login as Admin</a>
                                            <?php
                                                } else {
                                                ?>
                                                 <a class="nav-link" href="sign-up.php">Login/Register</a>
                                                 <a class="btn btn-primary" href="../back-end/signin.php">Login as Admin</a>

                                             <?php
                                                }
                                                ?>
                                 <li class="product-box-contain">
                                     <a href="forgot.php">Forgot Password</a>
                                 </li>
                         </div>
                         </form>
                         </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>

     <div class="container-fluid-lg">
         <div class="row">
             <div class="col-12">
                 <div class="header-nav">
                     <!-- <div class="header-nav-left">
                         <button class="dropdown-category">
                             <i data-feather="align-left"></i>
                             <span>All Categories</span>
                         </button>

                         <div class="category-dropdown">
                             <div class="category-title">
                                 <h5>Categories</h5>
                                 <button type="button" class="btn p-0 close-button text-content">
                                     <i class="fa-solid fa-xmark"></i>
                                 </button>
                             </div>


                         </div>
                     </div> -->

                     <div class="header-nav-middle">
                         <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                             <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                 <div class="offcanvas-header navbar-shadow">
                                     <h5>Menu</h5>
                                     <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                 </div>
                                 <div class="offcanvas-body">
                                     <ul class="navbar-nav">
                                         <li class="nav-item ">
                                             <a class="nav-link " href="index.php">Home</a>


                                         </li>



                                         <li class="nav-item">
                                             <a class="nav-link " href="index.php">Product</a>
                                         </li>


                                         <li class="nav-item dropdown">
                                             <a class="nav-link " href="wishlist.php">Wish List</a>

                                         </li>
                                         <li class="nav-item dropdown">
                                             <a class="nav-link " href="Contact_Us.php">Contact Us</a>

                                         </li>
                                         </li>
                                         <?php
                                            if (@$_SESSION["customer"] != null) {
                                            ?>
                                             <li class="nav-item dropdown">
                                                 <a class="nav-link " href="order-tracking.php">Track Order</a>

                                             </li>
                                         <?php } ?>

                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>


                 </div>
             </div>
         </div>
     </div>
 </header>
 <script>
$(document).ready(function(){



})


 </script>