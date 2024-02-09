<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    <script src="https://kit.fontawesome.com/a51f2d3a19.js" crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse" style="background-color: #d2c9ff;">
    <div class="wrapper" style="background-color: #d2c9ff;">

        <?php require "admin-header.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <?php

            $today = date("Y-m-d");
            $this_month = date("m");
            $this_year = date("Y");

            $a = "0";
            $b = "0";
            $c = "0";
            $d = "0";
            $e = "0";

            $invoice_rs = Database::search("SELECT * FROM `invoice` INNER JOIN `invoice_item` ON `invoice_item`.`invoice_id` = `invoice`.`id`");
            $invoice_num = $invoice_rs->num_rows;

            for ($x = 0; $x < $invoice_num; $x++) {

                $invoice_data = $invoice_rs->fetch_assoc();

                $e = $e + $invoice_data["qty"];

                $f = $invoice_data["date_time"];

                $split_date = explode(" ", $f);
                $pdate = $split_date[0];

                if ($pdate == $today) {

                    $a = $a + $invoice_data["total"];
                    $c = $c + $invoice_data["qty"];
                }

                $split_result = explode("-", $pdate);
                $pyear = $split_result[0];
                $pmonth = $split_result[1];

                if ($pyear == $this_year) {
                    if ($pmonth == $this_month) {

                        $b = $b + $invoice_data["total"];
                        $d = $d + $invoice_data["qty"];
                    }
                }
            }

            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Rs. <?php echo $a; ?> .00</h3>

                                    <p>Daily Earnings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $b; ?> .00<sup style="font-size: 20px"></sup></h3>

                                    <p>Monthly Earnings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $c; ?> Items</h3>

                                    <p>Today Sellings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $d; ?> Items</h3>

                                    <p>Monthly Sellings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h3><?php echo $e; ?> Items</h3>

                                    <p>Total Sellings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php

                                    $user_rs = Database::search("SELECT * FROM `users`");
                                    $user_num = $user_rs->num_rows;

                                    ?>

                                    <h3><?php echo $user_num; ?> Members</h3>

                                    <p>Total Engagement</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.row -->

                    <!-- <div class="col-12 mb-3 col-lg-12 mt-3">

                        <div class="row">

                            <div
                                class="container-fluid d-flex align-items-center col-12 col-lg-10 justify-content-center">

                                <div class="row col-12 g-4" style="width: 600px ;">

                                    <?php

                                    // $freq_rs = Database::search("SELECT `product`.`title`,`product_id`, COUNT(`product_id`) AS `value_occurrence`  
                                    // FROM `invoice` INNER JOIN `invoice_item` ON `invoice`.`id` = `invoice_item`.`invoice_id` 
                                    // INNER JOIN `product` ON `invoice_item`.`product_id` = `product`.`id` WHERE `date_time` LIKE '%".$today."%' GROUP BY `product_id`  
                                    // ORDER BY `value_occurrence` DESC LIMIT 1");

                                    // $freq_num = $freq_rs -> num_rows;


                                    // if($freq_num > 0){

                                    //     $freq_data = $freq_rs -> fetch_assoc();

                                    //     $product_id = $freq_data["product_id"];

                                    //     
                                    ?>

                                    <div class="col-4" style="height: 500px ;">

                                        <div class="card" style="height: 500px ;">

                                            <?php

                                            // $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '".$product_id."' LIMIT 1 ");
                                            // $image_data = $image_rs -> fetch_assoc();

                                            ?>

                                            <img src="<?php //echo $image_data["code"]; 
                                                        ?>"
                                                class="card-img-top img-thumbnail" alt="Hollywood Sign on The Hill"
                                                style="height: 350px;" />
                                            <div class="card-body mt-5">
                                                <h5 class="card-title fs-3 fw-bold">
                                                    <?php //echo $freq_data["title"]; 
                                                    ?></h5>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                            //}
                            ?>

                        </div>
                    </div> -->

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-12">

                                    <?php

                                    $product_rs = Database::search("SELECT `product`.`id` AS `id`, `product`.`title` AS `name`, 
                        `product`.`description` AS `description`, `product`.`price` AS `price`, `product`.`qty` AS `qty`,
                        `category`.`name` AS `category`, `model`.`name` AS `model`, `condition`.`name` AS `condition`, 
                        `product`.`status_id` AS `status` 
                        FROM `product` INNER JOIN `category` ON `product`.`category_id` = `category`.`id` 
                        INNER JOIN `model` ON `product`.`model_id` = `model`.`id` INNER JOIN 
                        `condition` ON `product`.`condition_id` = `condition`.`id` WHERE `product`.`qty` <= '10' ");
                                    $product_num = $product_rs->num_rows;

                                    ?>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Quantity Reminder</h3>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Product</th>
                                                        <th>Image</th>
                                                        <th>Price</th>
                                                        <th>QTY</th>
                                                        <th>Category</th>
                                                        <th>Model</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    for ($x = 0; $x < $product_num; $x++) {

                                                        $product_data = $product_rs->fetch_assoc();

                                                        $status = $product_data["status"];

                                                        $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $status . "' ");
                                                        $status_data = $status_rs->fetch_assoc();

                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "' LIMIT 1 ");
                                                        $image_data = $image_rs->fetch_assoc();

                                                    ?>

                                                        <tr>
                                                            <td><a href="admin-products.php"> <?php echo $product_data["id"]; ?></a></td>

                                                            <td><a href="admin-products.php"><?php echo $product_data["name"]; ?></a></td>
                                                            <td><img src="<?php echo $image_data["code"]; ?>" style="width:100px ; justify-content:center ; align-items: center; text-align: center;" />
                                                            </td>

                                                            <td>Rs.<?php echo $product_data["price"]; ?>.00</td>
                                                            <td class="fs-4 text-danger"><?php echo $product_data["qty"]; ?></td>
                                                            <td><?php echo $product_data["category"]; ?></td>
                                                            <td><?php echo $product_data["model"]; ?></td>
                                                            <td id="status"><?php echo $status_data["name"]; ?></td>

                                                        </tr>

                                                    <?php

                                                    }

                                                    ?>


                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Product</th>
                                                        <th>Image</th>
                                                        <th>Price</th>
                                                        <th>QTY</th>
                                                        <th>Category</th>
                                                        <th>Model</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
</body>

</html>