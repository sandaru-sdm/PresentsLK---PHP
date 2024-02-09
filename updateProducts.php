<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Update Products</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <?php require "admin-header.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mb-5">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Product</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="admin-products.php">Product</a></li>
                                <li class="breadcrumb-item active">Update Product</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10 mx-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body col-12">
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label for="exampleInputFile">Select Product Images</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="img/*" class="custom-file-input"
                                                        id="product" multiple onchange="preview(event);" disabled />
                                                    <label onclick="changeProductImage();"
                                                        class="custom-file-label pointer-event" for="product">Choose
                                                        Image</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-12 ">

                                            <div class="row justify-content-center align-items-center container-fluid">
                                                <!-- <div class="col-4">
                                                <button class="btn btn-success" onclick="changeImage();">view</button>
                                            </div> -->
                                                <!-- <div class="col-6 input-group "> -->

                                                <?php 
                                                
                                                $product_id = $_GET["id"];

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '".$product_id."'");
                                                $image_num = $image_rs -> num_rows;

                                                for($x=0; $x<$image_num; $x++){


                                                    $image_data = $image_rs -> fetch_assoc();
                                                    ?>

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="<?php echo $image_data["code"]; ?>"
                                                        id="preview0"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>
                                                <?php


                                                }

                                                ?>

                                                <!-- </div> -->

                                                <!-- <div class="col-6 input-group "> -->

                                                <!-- <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview1"
                                                        style="width: 250px ; background-position: center;" />
                                                </div> -->

                                                <!-- </div> -->

                                                <!-- <div class="col-6 input-group"> -->

                                                <!-- <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview2"
                                                        style="width: 250px ; background-position: center;" />
                                                </div> -->

                                                <!-- </div> -->

                                                <!-- <div class="col-6 input-group"> -->

                                                <!-- <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview3"
                                                        style="width: 250px ; background-position: center;" />
                                                </div> -->

                                                <!-- </div> -->

                                                <!-- <div class="col-6 input-group "> -->

                                                <!-- <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview4"
                                                        style="width: 250px ; background-position: center;" />
                                                </div> -->

                                                <!-- </div> -->
                                            </div>
                                        </div>

                                        <?php
                                        
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."' ");
                                        $product_data = $product_rs -> fetch_assoc();
                                        
                                        ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Product Id</label>
                                            <input type="text" class="form-control" name="id" disabled
                                                placeholder="Product Title" id="id"
                                                value="<?php echo $_GET["id"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">

                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Product Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Product Title" id="title"
                                                value="<?php echo $product_data["title"]; ?>" />
                                        </div>


                                        <div class="form-group col-12">
                                            <label for="exampleInputLastName">Description</label>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Description ..."
                                                    id="description"><?php echo $product_data["description"]; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Product Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" id="price"
                                                    value="<?php echo $product_data["price"]; ?>" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Quantity</label>
                                            <input type="input" class="form-control" placeholder="Quantity" id="qty"
                                                value="<?php echo $product_data["qty"]; ?>" />
                                        </div>

                                        <?php
                                                    
                                                    $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '".$product_data["color_id"]."'");
                   
                                                        $color_data = $color_rs -> fetch_assoc();

                                                        ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Color</label>
                                            <input type="input" class="form-control" placeholder="Color" id="qty"
                                                disabled value="<?php echo $color_data["name"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">

                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Delivery Fee Colombo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" id="dfc" value="<?php echo $product_data["delivery_fee_colombo"] ?>"  />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Delivery Fee Out of Colombo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" id="dfoc" value="<?php echo $product_data["delivery_fee_other"] ?>" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                                    
                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '".$product_data["condition_id"]."'");
                                                    $condition_num = $condition_rs -> num_rows;   
                                                    $condition_data = $condition_rs -> fetch_assoc();                         

                                                    ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Condition</label>
                                            <input type="input" class="form-control" placeholder="Condition" id="qty"
                                                disabled value="<?php echo $condition_data["name"]; ?>" />
                                        </div>

                                        <?php
                                                    
                                        $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$product_data["category_id"]."'");
                                        $category_num = $category_rs -> num_rows;                            
                                        $category_data = $category_rs -> fetch_assoc();

                                        ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Category</label>
                                            <input type="input" class="form-control" placeholder="Condition" id="qty"
                                                disabled value="<?php echo $category_data["name"]; ?>" />
                                        </div>

                                        <?php
                                       
                                            $model_rs = Database::search("SELECT * FROM `model` WHERE `id` = '".$product_data["model_id"]."'");
                                            $model_data = $model_rs -> fetch_assoc();
                                            
                                            $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '".$model_data["brand_id"]."'");
                                            $brand_data = $brand_rs -> fetch_assoc();
                                        
                                        ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Brand</label>
                                            <input type="input" class="form-control" placeholder="Condition" id="qty"
                                                disabled value="<?php echo $brand_data["name"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Model</label>
                                            <input type="input" class="form-control" placeholder="Quantity" id="qty"
                                                disabled value="<?php echo $model_data["name"]; ?>" />
                                        </div>


                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer mb-4">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 " name="submit" id="submit"
                                            onclick="updateProduct(<?php echo $product_id; ?>);">Update Product</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
        <!-- /.content-wrapper -->

        <?php require "footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <script src="js/updateProducts.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>



    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>


</body>

</html>