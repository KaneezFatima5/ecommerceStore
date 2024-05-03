

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-user.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:20 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Art Shopping - Edit Order</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!--Dropzon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <?php include("aside.php"); ?>
    <?php
include("../Classes/order_class.php");
session_start();
$or = new orders();

if (@$_POST["btnUpdate"]) {
    if ($or->UpdateOrder( $_POST["txtstatus"], $_POST["txtid"])) {
        echo "<script>window.location.href='order-list.php'</script>";

    } else {
        echo "<script> alert('Error in Sql Syntax') </script>";
    }
}


if (@$_GET["id"]) {
    $c = $or->SelectOrder($_GET["id"]);
    $row = $c->fetch_assoc();
}


?>




    <!-- Page Sidebar Start -->
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Edit Order</h5>
                                    </div>
                                    <form method="post">
                                        <div class="card-body">

                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Order Number</label>
                                                <input type="text" class="form-control" name="txton" id="exampleInputEmail1" placeholder="Enter Order Number" value="<?php echo $row["OrderNum"] ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product ID</label>
                                                <input type="text" class="form-control" name="txtpid" id="exampleInputEmail1" placeholder="Enter Product ID" value="<?php echo $row["ProductID"] ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Customer ID</label>
                                                <input type="text" class="form-control" name="txtcid" id="exampleInputPassword1" placeholder="Enter Customer ID" value="<?php echo $row["CustomerID"] ?>">
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Order Date</label>
                                                <input type="text" class="form-control" name="txtorderdate" id="exampleInputPassword1" placeholder="Enter Order Date" value="<?php echo $row["OrderDate"] ?>">
                                            </div>

                                           
                                            
                                            <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" class="form-control" name="txtaddress" id="exampleInputPassword1" placeholder="Enter Address" value="<?php echo $row["Address"] ?>">
                                </div>
                                <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Order Status</label>
                                <select name="txtstatus" id="txtstatus" class="form-control">
                                <option value="<?php echo $row["OrderStatus"] ?>"><?php echo $row["OrderStatus"] ?></option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>

</select>
                           
                            </div>
                                        
                            <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total</label>
                            <input type="text" class="form-control" name="txttotal" id="exampleInputPassword1" placeholder="Enter Total" value="<?php echo $row["Total"] ?>">
                        </div>           
                        <br>
                                            <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <input type="text" class="form-control" name="txtQuantity" id="exampleInputPassword1" placeholder="Enter Quantity" value="<?php echo $row["Quantity"] ?>">
                                            </div>                  
                                
                        <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Payment Mode</label>
                        <input type="text" class="form-control" name="txtpmode" id="exampleInputPassword1" placeholder="Enter Payment Mode" value="<?php echo $row["payment_mode"] ?>">
                    </div>
                </div>
                                
                <div class="card-footer">
                    <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
                </div>          

                     <input type="hidden" name="txtid" value="<?php echo $row["OrderID"] ?>">      
                       

                       
                    </div>


                   


               
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel">
            <div class="card-header-1">
                <h5>Product Related Permition</h5>
            </div>
            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Add Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Update Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Delete Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Apply Discount</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="card-header-1">
                <h5>Category Related Permition</h5>
            </div>
            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Add Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Update Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Delete Product</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label class="col-md-2 mb-0">Apply Discount</label>
                <div class="col-md-9">
                    <form class="radio-section">
                        <label>
                            <input type="radio" name="opinion" checked>
                            <i></i>
                            <span>Allow</span>
                        </label>

                        <label>
                            <input type="radio" name="opinion" />
                            <i></i>
                            <span>Deny</span>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- New User End -->

    <!-- footer start -->
    <div class="container-fluid">
        <footer class="footer">
            <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Art Shopping </p>
                    </div>
            </div>
        </footer>
    </div>
    <!-- footer end -->
    </div>
    <!-- Page Sidebar End -->
    </div>
    </div>
    <!-- page-wrapper End -->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- Sidebar js-->
    <script src="assets/js/config.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!--Dropzon js -->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-user.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:20 GMT -->

</html>