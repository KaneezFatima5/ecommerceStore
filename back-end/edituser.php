
<?php



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:04 GMT -->
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
    <title>Art Shopping - Update Users</title>

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- fontawesome css  -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!--Drop zon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Bootstrap-tag input css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap-tagsinput.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<?php include("aside.php"); 

include("../Classes/User_Class.php");
session_start();
$User=new usermanagements;

if(@$_POST["btnup"]){
if($User->UpdateUser($_POST["txtuser"],$_POST["txtemail"],$_POST["txtcontact"],$_POST["txtpass"],$_POST["txtrole"],$_POST["id"])){
    echo "<script> window.location.href='all-users.php' </script>";
    header("location:all-users.php");
}
else
{
    echo "<script>alert('Error in your sql syntex...')</script>";
}
}


if(@$_GET["id"]){
    $emp=$User->SelectUser($_GET["id"]);
    $row=$emp->fetch_assoc();
    if($_SESSION["User"]["Role"]=="Employee"){
        ?>
             <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Details Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Update User</h5>
                                            </div>
                                            <form class="theme-form theme-form-2 mega-form" method="post">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">User Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" readonly type="text"
                                                                placeholder="Enter Your User Name" name="txtuser" value="<?php  echo $row["UserName"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Email</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" readonly type="email"
                                                                placeholder="Enter Your Last Name" name="txtemail"value="<?php  echo $row["UserEmail"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Contact
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" readonly type="text"
                                                                placeholder="Enter Your Number" name="txtcontact"value="<?php  echo $row["UserContact"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Password
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control"  type="text"
                                                                placeholder="Enter Your Password" name="txtpass"value="<?php  echo $row["UserPass"] ?>">
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Role
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" readonly type="text"
                                                                placeholder="Enter Your Role" name="txtrole"value="<?php  echo $row["Role"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="hidden"
                                                                placeholder="Enter Your Role" name="id" value="<?php  echo $row["UserID"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control btn btn-danger" type="submit"
                                                                value="Submit" name="btnup">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Details End -->

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
        <?php
       }
}
?>   
<!-- Settings Section Start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Details Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Update User</h5>
                                            </div>
                                            <form class="theme-form theme-form-2 mega-form" method="post">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">User Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text"
                                                                placeholder="Enter Your User Name" name="txtuser" value="<?php  echo $row["UserName"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Email</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="email"
                                                                placeholder="Enter Your Last Name" name="txtemail"value="<?php  echo $row["UserEmail"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Contact
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text"
                                                                placeholder="Enter Your Number" name="txtcontact"value="<?php  echo $row["UserContact"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Password
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text"
                                                                placeholder="Enter Your Password" name="txtpass"value="<?php  echo $row["UserPass"] ?>">
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Role
                                                            </label>
                                                        <div class="col-sm-10">
                                                        <select name="txtrole" id="txtrole" class="form-control">
                                              <option value="<?php  echo $row["Role"] ?>"><?php  echo $row["Role"] ?></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Employee">Employee</option>

                                                </select>
                                                            </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="hidden"
                                                                placeholder="Enter Your Role" name="id" value="<?php  echo $row["UserID"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control btn btn-danger" type="submit"
                                                                value="Submit" name="btnup">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Details End -->

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Settings Section End -->
        </div>
        <!-- Page Body End-->

        <!-- footer start-->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Art Shopping </p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer End-->
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

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js-->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery-->
    <script src="assets/js/config.js"></script>
    <!-- Plugins JS start-->

    <!-- bootstrap tag-input JS start-->
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- customizer js start  -->
    <script src="assets/js/customizer.js"></script>
    <!-- customizer js end -->

    <!--Dropzon start-->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!--Dropzon start-->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>
    <!-- Plugins JS Ends-->

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:14 GMT -->
</html>
