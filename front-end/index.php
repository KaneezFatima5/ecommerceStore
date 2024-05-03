<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Art Shopping</title>

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
<body class="bg-effect">

    
    <!-- Header Start -->

      <?php include("navbar.php") ?>


    <!-- Header End -->

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

    <!-- Banner Section Start -->
  
    <!-- Banner Section End -->

    <!-- Product Section Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="p-sticky">
                        <div>
                            <?php include "filteration_section.php" ?>
                        </div>


                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8">
                    
           


                    <div class="title">
                        <h2>Bowse by Categories</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>Top Categories </p>
                    </div>




                    <div class="category-slider-2 product-wrapper no-arrow">
                        <?php
                        include "../Classes/Category.php";
                        $cat = new Category();
                        $get_cat = $cat->SelectCategory(null);

                        while ($category = $get_cat->fetch_assoc()) {
                        ?>
                            <div>
                                <a href="index.php?catid=<?php echo $category["CatID"] ?>" class="category-box category-dark">
                                    <div>
                                        <img src="../back-end/<?php echo $category["CatImg"] ?>" class="blur-up lazyload" alt="">
                                        <h5><?php echo $category["CatName"] ?></h5>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="title title-flex">
                        <div>
                            <h2>Top Save Today</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            <p>Don't miss this opportunity at a special discount</p>
                        </div>
                    </div>
                    <div class="section-b-space">
                        <div class="product-border searchbyproduct border-row overflow-hidden">
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $pro = $product->SelectProduct(@$_GET["cid"]);


                                while ($row = $pro->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>

                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"]?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">
                                                            <a href="#">
                                                                <h6 class="name"><?php echo $row["ProductName"] ?></h6>
                                                            </a>

                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>
                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $pr = $product->SelectProductbyOffset();


                                while ($row = $pr->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>

                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist" onclick='redirect_Page(this)'>
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">

                                                            <h6 class="name"><?php echo $row["ProductName"] ?></h6>


                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>

                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- 3rd slide -->
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $pr = $product->SelectProductbyOffset1();


                                while ($row = $pr->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>

                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">
                                                            <a href="product-left-thumbnail.html">
                                                                <h6 class="name"><?php echo $row["ProductName"] ?></h6>
                                                            </a>

                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>
                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- 3rd slide -->
                            <!-- 3rd slide -->
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $pr = $product->SelectProductbyOffset2();


                                while ($row = $pr->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>

                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">
                                                            <a href="product-left-thumbnail.html">
                                                                <h6 class="name"><?php echo $row["ProductName"] ?></h6>
                                                            </a>

                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>

                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>



                            <div class="product-box-slider no-arrow" id="filterdata">
                             
                            </div>
                        </div>
                        <!-- search by category --------------------------->
                        <div class="product-border searchbycat border-row overflow-hidden">
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $catt = $product->SelectProductbyCatId(@$_GET["catid"]);


                                while ($row = $catt->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>


                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">
                                                            <a href="#">
                                                                <h6 class="name"><?php echo $row["ProductName"] ?></h6>
                                                            </a>

                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>
                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="product-box-slider no-arrow" id="div1">
                                <?php

                                $product = new Product;
                                $pr = $product->SelectProductbyCatIdoffset(@$_GET["catid"]);


                                while ($row = $pr->fetch_assoc()) {
                                    $rp = new rating_product();
                                    $fr = $rp->fetchrating($row["ProductID"]);
                                    $getAverage = mysqli_fetch_array($fr);
                                    $numRating = $getAverage['numRating'];
                                    $return_arr = array("numRating" => $numRating);
                                ?>

                                    <div>
                                        <div class="row m-0">
                                            <div class="col-12 px-0">
                                                <a href="Detail.php?pid=<?php echo $row["ProductID"] ?>">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                <img src="../back-end/<?php echo $row["ProductImg"] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="Product_Detail.php?pids=<?php echo $row["ProductID"] ?>">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                                                    <a href="index.php?pid=<?php echo $row['ProductID'] ?>">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist" onclick='redirect_Page(this)'>
                                                                    <a href="index.php?wish=<?php echo $row['ProductID'] ?>" class="notifi-wishlist">
                                                                        <i data-feather="heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">

                                                            <h6 class="name"><?php echo $row["ProductName"] ?></h6>


                                                            <h5 class="sold text-content">
                                                                <span class="theme-color price"><?php echo $row["SalePrice"] ?></span>
                                                                <del><?php echo $row["ProductPrice"] ?></del>

                                                            </h5>
                                                            <h5 class="sold text-content">
                                                                <?php
                                                                if ($row["WarrantyDate"] == null) {
                                                                    $warranty = "No";
                                                                } else {
                                                                    $warranty = "Yes";
                                                                }
                                                                ?>
                                                                <span class="theme-color price">Warranty :</span>
                                                                <span><?php echo $warranty ?></span>

                                                            </h5>
                                                            <div class="product-rating mt-sm-2 mt-1">
                                                                <ul class="rating">

                                                                    <?php
                                                                    $avr = round($numRating);
                                                                    $var = 0;
                                                                    if ($avr == 0) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 1) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 2) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 3) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 4) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                    if ($avr == 5) {
                                                                    ?>

                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                    <?php
                                                                    }



                                                                    ?>

                                                                    <li>
                                                                        ( <?php echo $numRating ?> )
                                                                    </li>


                                                                </ul>
                                                                <?php
                                                                if ($row["Quantity"] != 0 && $row["Quantity"] > 0) {
                                                                ?>
                                                                    <h6 class="theme-color">In Stock</h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class=" text-danger">Out Stock</h6>
                                                                <?php
                                                                } ?>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <!-- fillter -->
                          <!-- fillter -->
                        </div>
                        <!-- search by category --------------------------->
                    </div>




                    <div class="section-t-space">
                        <div class="banner-contain hover-effect">
                            <img src="../assets/images/inner-page/bn2.webp" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details p-center banner-b-space w-100 text-center">
                                <div>
                                    <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                    <h2 class="banner-title">DEALS</h2>
                                    <h5 class="lh-sm mx-auto mt-1 text-content">Save up to 5% OFF</h5>
                                    <button onclick="location.href = 'shop-left-sidebar.html';" class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="#" class="blog-image">
                                        <img src="../assets/images/inner-page/download222.jpg" width="100%" class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>

                                <a href="#" class="blog-detail">
                                    <h6>20 March, 2022</h6>
                                    <h5>New Fashion Online</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="#" class="blog-image">
                                        <img src="../assets/images/inner-page/bn1.avif" width="100%" class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>

                                <a href="#" class="blog-detail">
                                    <h6>10 April, 2022</h6>
                                    <h5>New Deal </h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/vegetable/blog/3.jpg" class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>10 April, 2022</h6>
                                    <h5>Recommend</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/vegetable/blog/1.jpg" class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>20 March, 2022</h6>
                                    <h5>New Fashion Online</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Newsletter Section Start -->

    <!-- Newsletter Section End -->

    <!-- Footer Section Start -->
    <?php include "footer.php" ?>
    <!-- Footer Section End -->

    <!-- Quick View Modal Box Start -->
    <div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-sm-4 g-2">
                        <div class="col-lg-6">
                            <div class="slider-image">
                                <img src="../assets/images/product/category/1.jpg" class="img-fluid blur-up lazyload" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-sidebar-modal">
                                <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                                <h4 class="price">$36.99</h4>
                                <div class="product-rating">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span class="ms-2">8 Reviews</span>
                                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                                </div>

                                <div class="product-detail">
                                    <h4>Product Details :</h4>
                                    <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                        Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                        Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                        muffin I love carrot cake sugar plum dessert bonbon.</p>
                                </div>

                                <ul class="brand-list">
                                    <li>
                                        <div class="brand-box">
                                            <h5>Brand Name:</h5>
                                            <h6>Black Forest</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Code:</h5>
                                            <h6>W0690034</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Type:</h5>
                                            <h6>White Cream Cake</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="select-size">
                                    <h4>Cake Size :</h4>
                                    <select class="form-select select-form-size">
                                        <option selected>Select Size</option>
                                        <option value="1.2">1/2 KG</option>
                                        <option value="0">1 KG</option>
                                        <option value="1.5">1/5 KG</option>
                                        <option value="red">Red Roses</option>
                                        <option value="pink">With Pink Roses</option>
                                    </select>
                                </div>

                                <div class="modal-button">
                                    <button onclick="location.href = 'cart.html';" class="btn btn-md add-cart-button icon">Add
                                        To Cart</button>
                                    <button onclick="location.href = 'product-left.html';" class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                        View More Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload" alt="">
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
                                        <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload" alt="">
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
                                        <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload" alt="">
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
                                        <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload" alt="">
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
    </div> -->
    <!-- Deal Box Modal End -->

    <!-- Tap to top start -->
    <div class="theme-option">


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

    <script>
        $(document).ready(function() {

            $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 10000,
      values: [ 1000, 5000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        $("#hide_min").val(ui.values[ 0 ]);
        $("#hide_max").val(ui.values[ 1 ]);
        filter_data();
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

            function filter_data() {

                var action = 'act';
                var check = "ok";
                var max_price=$("#hide_max").val();
                var min_price=$("#hide_min").val();
                var categories = get_filter('category');
                var rating = get_filter('rates');
                var check_warranty = get_filter('warranty');

                $.ajax({

                    url: 'filtered.php',
                    method: 'post',
                    data: {
                        categories: categories,
                        check: check,
                        action: action,
                        rating:rating,
                        max_price:max_price,
                        min_price:min_price,
                        check_warranty:check_warranty
                    },
                    success: function(data) {
                        $("#filterdata").html(data);

                    }
                });
            }

            function get_filter(claas_name) {
                var filter = [];
                $('.' + claas_name + ':checked').each(function() {
                    filter.push($(this).val());
                })
                return filter;
            }
            $(".comman_selector").click(function() {

                filter_data();

            });

        })
    </script>

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

    <!-- Auto Height Js -->
    <script src="../assets/js/auto-height.js"></script>

    <!-- Timer Js -->
    <script src="../assets/js/timer1.js"></script>

    <!-- Fly Cart Js -->
    <script src="../assets/js/fly-cart.js"></script>

    <!-- Quantity js -->
    <script src="../assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>

    <!-- thme setting js -->
    <script src="../assets/js/theme-setting.js"></script>
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