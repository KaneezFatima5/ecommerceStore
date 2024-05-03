<?php include("head.php");
include("../Classes/Product.php");
include("../Classes/rating.php");
$product = new Product();


include("../Classes/smart_filteration.php");

$rp = new rating_product();
$con = mysqli_connect('localhost', 'root', '', 'onlinestore');
if (@$_POST["action"]) {


    if (@$_POST["action"]) {

if(isset($_POST["max_price"], $_POST["min_price"]) ){
    $query1 = mysqli_query($con, "Select * from product  where SalePrice between '" . $_POST['min_price'] . "' and '" . $_POST['max_price'] . "'");
    $rows1 = mysqli_num_rows($query1);
}

        if (@$_POST["categories"]) {
            $cat_filter = implode("','", @$_POST["categories"]);
            $query1 = mysqli_query($con, "Select * from product  where CatID in('" . @$cat_filter . "') and SalePrice between '" . $_POST['min_price'] . "' and '" . $_POST['max_price'] . "'");
            $rows1 = mysqli_num_rows($query1);
        }
        if (@$_POST["check_warranty"]) {
            $warranty_filter = implode("','", @$_POST["check_warranty"]);
            $query1 = mysqli_query($con, "Select * from product  where CatID in('" . @$cat_filter . "') and SalePrice between '" . $_POST['min_price'] . "' and '" . $_POST['max_price'] . "' and WarrantyDate is not null ");
            $rows1 = mysqli_num_rows($query1);
        }
    

        if (@$rows1 > 0) {
?>
            <style>
                #div1,
                #hid {
                    display: none;
                }
            </style>
            <div class="row m-0">
                <?php
                $pr = $product->totlarpoduct();

                while (@$row = mysqli_fetch_array($query1)) {

                    $rp = new rating_product();
                    $fr = $rp->fetchrating($row["ProductID"]);
                    $getAverage = mysqli_fetch_array($fr);
                    $numRating = $getAverage['numRating'];
                    $return_arr = array("numRating" => $numRating);

                ?>

                    <div class="col-4 px-0">
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
            <?php

                }
            }
        } else {
            ?>
            <style>
                #div1 {
                    display: none;
                }

                #hid {
                    display: none;
                }

                #nodata {
                    padding: 22px;
                    font-size: 15px
                }
            </style>

        <?php

        }

        if (@$rows1 == 0) {
            echo   $output = '<h6 class="theme-color" id="nodata">No Record Found</h6>';
        ?>
            <style>
                #div1 {
                    display: none;
                }

                #hid {
                    display: none;
                }

                #nodata {
                    padding: 22px;
                    font-size: 15px
                }
            </style>

    <?php
        }
    }
    ?>

            </div>
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