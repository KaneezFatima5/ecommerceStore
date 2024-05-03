<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:20 GMT -->
<head>
    <!-- meta data -->
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
    <title>Art Shopping - Add New Product</title>

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!--Dropzon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

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
    
<?php include("aside.php"); ?>

            <div class="page-body">

            <?php
            include("../Classes/category_class.php");

            $cat=new categories();



            if(@$_POST["btnupdate"]){
                $ImageName=$_FILES["catImage"]["name"];
                $path="uploads/".$ImageName;
    if($path!=null){
        
 if(move_uploaded_file($_FILES["catImage"]["tmp_name"],$path)){
                if($cat->UpdateCategory($_POST["txtname"],$path,$_GET["id"])){
                    echo "<script>window.location.href='category.php'</script>";
                }
    }else{
        if($cat->UpdateCategory($_POST["txtname"],$_SESSION["image"],$_GET["id"])){
            echo "<script>window.location.href='category.php'</script>";
        }
    }
               
        } 

            }

            if(@$_GET["id"]){
                $st=$cat->SelectCategory($_GET["id"]);
                $row=$st->fetch_assoc();
                $_SESSION["image"]= $row["CatImg"];
            }
            
            
            ?>

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Category Updation</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form" method="post" enctype="multipart/form-data">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text"
                                                            placeholder="Category Name" name="txtname" value="<?php echo $row["CatName"]; ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Category
                                                        Image</label>
                                                        <div class="form-group">

                                                        <input type="file" class="form-control" name="catImage" id="exampleInputEmail1" value="<?php echo $row["CatImg"]; ?>">
                                                    </div>
                                                </div>

                                                <input type="hidden" name="txtid" value="<?php echo $row["CatID"];  ?>" >
<div style="height: 150px; width:150px;border-radius:8px"><img src="<?php echo $row["CatImg"]  ?>" width="100%" height="100px" alt=""></div>
                                               <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-success" name="btnupdate">
                                               </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->

                <!-- footer Start -->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Art Shopping </p>
                    </div>
                        </div>
                    </footer>
                </div>
                <!-- footer En -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->

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

    <!-- bootstrap tag-input js -->
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!--Dropzon js -->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- select2 js -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/select2-custom.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Mar 2023 09:58:20 GMT -->
</html>