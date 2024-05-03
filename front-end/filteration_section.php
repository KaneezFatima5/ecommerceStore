<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/shop-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 19:55:58 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Shop List</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <!-- <link rel="stylesheet" href="../assets/css/animate.min.css" /> -->

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

    <section class="section-b-space shop-section">
        <div class="container-fluid">

            <div class="col-custome-12">
                <div class="left-box     ">
                    <div class="shop-left-sidebar">


                        <div class="filter-category">
                            <div class="filter-title">
                                <h2>Filters</h2>
                                <a href="index.php">Clear All</a>
                            </div>

                        </div>

                        <div class="accordion custome-accordion" id="accordionExample">
                        <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Price</span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                                    <p>
                                        <input type="hidden" id="hide_min" value="0">
                                        <input type="hidden" id="hide_max" value="10000">
                                        <label for="amount"></label>
                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>

                                    <div id="slider-range"></div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Categories</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                               

                                        <ul class="category-list custom-padding custom-height">
                                            <?php
                                            $filters = new smart_fill();
                                            $get_filter = $filters->fetch_cat();
                                            while ($filter = $get_filter->fetch_assoc()) {
                                            ?>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated category comman_selector" type="checkbox" id="fruit" value="<?php echo $filter["CatID"] ?>">
                                                        <label class="form-check-label" for="fruit">
                                                            <span class="name">
                                                                <?php echo $filter["CatName"] ?>
                                                            </span>

                                                        </label>
                                                    </div>
                                                </li>
                                            <?php

                                            }

                                            ?>


                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Warranty</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                               

                                        <ul class="category-list custom-padding custom-height">
                                     
                                     
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated warranty comman_selector" type="checkbox" id="fruit" value="nowarranty">
                                                        <label class="form-check-label" for="fruit">
                                                            <span class="name">
                                                                With Warranty
                                                         </span>
                                                        </label>
                                                    </div>
                                                </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>

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
    <script src="../assets/js/slick/custom_slick.js"></script>

    <!-- Price Range Js -->
    <script src="../assets/js/ion.rangeSlider.min.js"></script>

    <!-- Quantity js -->
    <script src="../assets/js/quantity-2.js"></script>

    <!-- sidebar open js -->
    <script src="../assets/js/filter-sidebar.js"></script>

    <!-- WOW js -->
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>

    <!-- thme setting js -->
    <script src="../assets/js/theme-setting.js"></script>
</body>


</html>