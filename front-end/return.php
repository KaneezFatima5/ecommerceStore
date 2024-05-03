<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/forgot.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:56:23 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Forgot Password</title>

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

<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:54:24 GMT -->

<body class="bg-effect">


    <!-- Header Start -->
    <?php include("navbar.php");

include("../Classes/OrderReturn.php");
include("../Classes/Orders.php");
if(@$_POST["return"])
{
    if(@$_POST["warranty"]=="Warranty available."){
    $return=new OrderReturn();
    $order=new Order();
if(($return->create($_POST["orderId"],$_POST["productId"],$_POST["customerId"], date('y.m.d'), $_POST["status"], $_POST["reason"], $_POST['days']))==1)
{
    $del=$order->Status($_POST["orderId"], $_POST["productId"]);
        echo "<script>alert('Return Request sent successfully!')</script>";
        echo"<script>window.location.href='order-tracking.php'</script>";

}
else{
    echo "<script>alert('order cant be return/replaced!!')</script>";
}}
else{
    echo "<script>alert('order warranty has expired!!')</script>";
}

}


?>


    <!-- mobile fix menu end ---------------------------------------------------------------------------->

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Return Order</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Return Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Art shopping</h3>
                            <h4>Return Or Exchange</h4>
                        </div>
                        <?php
                        $order=new Order();
                        $st=$order->SelectOrderByOrderId($_GET["id"]);
while($rows=$st->fetch_assoc()){
    ?>

                        <div class="input-box">
                            <form class="row g-4" method="post">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="hidden"  name="orderId"  value="<?php echo $rows['OrderID']?>">
                                        <input type="hidden" class="form-control" name="productId"  value="<?php echo $rows['ProductID']?>">
                                       
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                    <input type="hidden" class="form-control" name="customerId"  value="<?php echo $rows['CustomerID']?>">
                                    </div>
                                </div>
                               <?php 
                               $res;
                               $date=new DateTime($rows["WarrantyDate"]);
                               $Wyear=$date->format('y');
                               if($Wyear>=date('y')){
                                $Wmonth=$date->format('m');
                                if($Wmonth>=date('m')){
                                    $Wday=$date->format('d');
                                if($Wday>=date('d')){
                                 $res= "Warranty available.";
                             } else{
                                 $res="Warranty Expired.";
                                }
                                }else{
                                    $res="Warranty Expired.";
                                }
                                
                               }else{
                                $res="Warranty Expired.";
                               }
                               
                               ?>
                               <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" name="warranty" value="<?php echo $res?>">
                                        <label for="days">Warranty</label>
                                    </div>
                                    <br>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" name="days" placeholder="Days Passed" value="<?php echo ($Wday-date('d')) ?>">
                                        <label for="days">Days left in Warranty</label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                    <select name="status">
                    <option value="return" selected>Return</option>
                    <option value="exchange" >Exchange</option>
                  </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                        <textarea id="reason" name="reason" rows="2" cols="50" class="form-control"></textarea>
                                        <label for="customerId">Reason for Exchange/return</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                <input type="submit" name="return" class="btn btn-animation w-100" value="Return/Exchange Order" id="return">
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin"
                                        class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                            alt="">
                                        Sign up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Sign up with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="login.php">Log In</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
    <?php
include("footer.php");
?>
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

    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="../assets/js/feather/feather.min.js"></script>
    <script src="../assets/js/feather/feather-icon.js"></script>

    <!-- Slick js-->
    <script src="../assets/js/slick/slick.js"></script>
    <script src="../assets/js/slick/slick-animation.min.js"></script>
    <script src="../assets/js/slick/custom_slick.js"></script>

    <!-- Lazyload Js -->
    <script src="../assets/js/lazysizes.min.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:56:23 GMT -->
</html>