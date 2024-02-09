<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Add Product</title>

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

        <div class="content-wrapper mb-5">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="admin-products.php">Product</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Product</h3>
                                </div>
                                <div class="card-body col-12">
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label for="exampleInputFile">Select Product Images</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="img/*" class="custom-file-input"
                                                        id="product" multiple onchange="preview(event);" />
                                                    <label onclick="changeProductImage();"
                                                        class="custom-file-label pointer-event" for="product">Choose
                                                        Image</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-12 ">

                                            <div class="row justify-content-center align-items-center container-fluid">

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview0"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview1"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview2"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview3"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>

                                                <div class="col-2 border rounded border-primary m-1">
                                                    <img class="img-fluid" src="Resources/addproductimg.svg"
                                                        id="preview4"
                                                        style="width: 250px ; background-position: center;" />
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Product Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Product Title" id="title" />
                                        </div>


                                        <div class="form-group col-12">
                                            <label for="exampleInputLastName">Description</label>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Description ..."
                                                    id="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Product Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" id="price" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername">Quantity</label>
                                            <input type="input" class="form-control" placeholder="Quantity" id="qty" />
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Color</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="color">
                                                <option selected value="0">Select Color</option>

                                                <?php
                                                    
                                                    $color_rs = Database::search("SELECT * FROM `color`");
                                                    $color_num = $color_rs -> num_rows;                            

                                                    for($x=0; $x < $color_num; $x++ ){

                                                        $color_data = $color_rs -> fetch_assoc();

                                                        ?>

                                                <option value="<?php echo $color_data["id"]; ?>">
                                                    <?php echo $color_data["name"]; ?></option>

                                                <?php

                                                    }      
                                                    
                                                    ?>

                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Delivery Fee Colombo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" id="dfc" />
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
                                                <input type="text" class="form-control" id="dfoc" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Condition</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="condition">
                                                <option selected value="0">Select Condition</option>

                                                <?php
                                                    
                                                    $condition_rs = Database::search("SELECT * FROM `condition`");
                                                    $condition_num = $condition_rs -> num_rows;                            

                                                    for($x=0; $x < $condition_num; $x++ ){

                                                        $condition_data = $condition_rs -> fetch_assoc();

                                                        ?>

                                                <option value="<?php echo $condition_data["id"]; ?>">
                                                    <?php echo $condition_data["name"]; ?></option>

                                                <?php

                                                    }      
                                                    
                                                    ?>

                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Category</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="category">
                                                <option selected value="0">Select Category</option>

                                                <?php
                                                    
                                                    $category_rs = Database::search("SELECT * FROM `category` WHERE `status_id`='1'");
                                                    $category_num = $category_rs -> num_rows;                            

                                                    for($x=0; $x < $category_num; $x++ ){

                                                        $category_data = $category_rs -> fetch_assoc();

                                                        ?>

                                                <option value="<?php echo $category_data["id"]; ?>">
                                                    <?php echo $category_data["name"]; ?></option>

                                                <?php

                                                    }      
                                                    
                                                    ?>

                                            </select>
                                        </div>

                                        <?php
                                        $connection = mysqli_connect("localhost","root","dilshan2000","presentlk","3307");

                                        $query 		= "SELECT * FROM `brand` WHERE `status_id` = '1'";
                                        $result_set = mysqli_query($connection, $query);

                                        $brand_list = "";
                                        while ( $result = mysqli_fetch_assoc($result_set) ) {
                                            $brand_list .= "<option value=\"{$result['id']}\">{$result['name']}</option>";
                                        }
                                    ?>

                                        <div class="form-group col-6">
                                            <label>Brand</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="brand"
                                                name="brand">
                                                <option selected value="0">Select Brand</option>

                                                <?php echo $brand_list; ?>

                                            </select>
                                        </div>



                                        <div class="form-group col-6">
                                            <label>Model</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="model"
                                                name="model">
                                                <option selected value="0">Select Model</option>

                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="card-footer mb-4">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 " name="submit" id="submit"
                                            onclick="addProduct();">Add Product</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#brand").on("change", function() {
            var brandID = $("#brand").val();
            // alert(brandID);
            var getURL = "getModelSelect.php?brand_id=" + brandID;
            $.get(getURL, function(data, status) {
                $("#model").html(data);
            });
        });



    });
    </script>

    <script src="js/addProduct.js"></script>
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


    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>

    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })
    // BS-Stepper Init
    </script>

</body>

</html>