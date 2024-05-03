<?php 



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:14 GMT -->
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
    <title>Art Shopping - Product</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
   <?php include("aside.php"); 
   session_start();
   include("../Classes/product_class.php");
   
   ?>
        
            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
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
                                                        <th>Product Desc</th>
                                                        <th>Product Price</th>
                                                        <th>Sale Price</th>
                                                        <th>Quantity</th>
                                                        <th>Created Date</th>
                                                        <th>Product No</th>
                                                        <th>Warranty Date</th>
                                                        <th>Update / Delete</th>
                                                    </tr>
                                                </thead>

                                                    <?php

                                                    $pro=new products();
                                                        if(@$_GET["pid"]){
                                                             if($pro->DeleteProduct($_GET["pid"])){
                                                                echo "<script> window.location.href='products.php' </script>";
                                                             }   
                                                    }


                                                    

                                                    $cus=$pro->SelectProduct(null);
                                                    while($row=$cus->fetch_assoc()){

                                                    
                                                    ?>
                                                <tbody>
                                                    <tr>

                                                        <td>
                                                            <?php echo $row["ProductName"] ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo $row["ProductImg"] ?>" width="100" height="100">
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $row["ProductDesc"] ?>
                                                        </td>
                                                       
                                                        <td>
                                                            <?php echo $row["ProductPrice"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["SalePrice"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["Quantity"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["CreatedDate"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["ProductNo"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["WarrantyDate"] ?>
                                                        </td>

                                                      <td>
                                                          
                                                      <?php 

                                                            if($_SESSION==null){
                                                                echo "<script>window.location.href='signin.php'</script>";
                                                            }
                                                            if($_SESSION["User"]["Role"]=="Employee"){

                                                            }else{
                                                                ?>
                                                                <ul><li>
                                                                    <a href="editproduct.php?id=<?php echo $row["ProductID"] ?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    
                                                                    <a href="products.php?pid=<?php echo $row["ProductID"]?>">
                                                                        
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                                            <?php
                                                                        }
                                                                        ?>
       
                                                     
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <div class="container-fluid">
                    <!-- footer start-->
                    <footer class="footer">
                        <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Art Shopping </p>
                    </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper End-->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Delete Modal Box Start -->
    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>The permission for the use/group, preview is inherited from the object, object will create a
                            new permission for this object</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <div class="wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </div>
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Box End -->

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

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Data table js -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/custom-data-table.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:14 GMT -->
</html>