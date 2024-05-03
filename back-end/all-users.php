<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/all-users.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:57:31 GMT -->
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
    <title>Art Shopping - All User</title>
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
   <?php
   include("aside.php");
   include("../Classes/User_Class.php");
   ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <!-- All User Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>All Users</h5>
                                        <form class="d-inline-flex">
                                            <a href="add-new-user.php" class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus"></i>Add New
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive table-product">
                                        <table class="table all-package theme-table" id="table_id">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>User Email</th>
                                                    <th>User Contact</th>
                                                    <th>Password</th>
                                                    <th>Role</th>
                                                    <th>Update/Delete</th>
                                                </tr>
                                            </thead>
                                        <?php
                                        $User=new usermanagements;
if($_SESSION["User"]["Role"]=="Employee"){
    $id=$_SESSION["User"]["UserID"];
    
           if(@$_GET["uid"]){
                                            if($User->DeleteUser($_GET["uid"])){
                                                echo "<script>alert('User Has Been Deleted')</script>";
                                            }
                                        }

                                        $emp=$User->SelectUser($id);
                                        
                                        while($row=$emp->fetch_assoc())
                                        {?>

                                        
                                        
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $row["UserName"] ?>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <?php echo $row["UserEmail"] ?>
                                                    </td>

                                                    <td> <?php echo $row["UserContact"] ?></td>

                                                    <td> <?php echo $row["UserPass"] ?></td>

                                                    <td>
                                                        <?php echo $row["Role"] ?>
                                                    </td>


                                                    <td>
                                                    <ul>
                                                           

                                                            <li>
                                                                <a href="edituser.php?id=<?php echo $row['UserID'] ?>">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                
                                                                <a href="all-users.php?uid=<?php echo $row['UserID']?>">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                                
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                               
                                            </tbody>
                                        <?php
                                    }
}else{
    if(@$_GET["uid"]){
        if($User->DeleteUser($_GET["uid"])){
            echo "<script>alert('User Has Been Deleted')</script>";
        }
    }

    $emp=$User->SelectUser(null);
    
    while($row=$emp->fetch_assoc())

    {?>

    
    
        <tbody>
            <tr>
                <td>
                    <?php echo $row["UserName"] ?>
                    </div>
                </td>

                <td>
                    <?php echo $row["UserEmail"] ?>
                </td>

                <td> <?php echo $row["UserContact"] ?></td>

                <td> <?php echo $row["UserPass"] ?></td>

                <td>
                    <?php echo $row["Role"] ?>
                </td>


                <td>
                <ul>
                       

                        <li>
                            <a href="edituser.php?id=<?php echo $row['UserID'] ?>">
                                <i class="ri-pencil-line"></i>
                            </a>
                        </li>

                        <li>
                            
                            <a href="all-users.php?uid=<?php echo $row['UserID']?>">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                            
                        </li>
                    </ul>
                </td>
            </tr>

           
        </tbody>
    <?php
}   
}
                                 
                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All User Table Ends-->

                <div class="container-fluid">
                    <!-- footer start-->
                    <footer class="footer">
                        <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Art Shopping </p>
                    </div>
                        </div>
                    </footer>
                    <!-- footer end-->
                </div>
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->

        <!-- Modal Start -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
    </div>

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

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Data table js -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/custom-data-table.js"></script>

    <!-- all checkbox select js -->
    <script src="assets/js/checkbox-all-check.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/all-users.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:57:52 GMT -->
</html>