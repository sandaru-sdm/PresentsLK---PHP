<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Manage Orders</title>

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



</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <?php require "admin-header.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Orders</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage Orders</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">

                            <?php

                            $order_rs = Database::search("SELECT * FROM `invoice`");
                            $order_num = $order_rs -> num_rows;
                                
                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Orders</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>QTY</th>
                                                <th>User Name</th>
                                                <th>User Address</th>
                                                <th>Date & Time</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                        
                                        for($x = 0; $x < $order_num; $x++){

                                            $order_data = $order_rs -> fetch_assoc();

                                            $user_rs = Database::search("SELECT `users`.`id` AS `user_id`, 
                            `users`.`fname` AS `fname`, `users`.`lname` AS `lname`, `users`.`email` AS `email`, 
                            `users`.`mobile` AS `mobile`, `user_has_address`.`id` AS `address_id`, 
                            `user_has_address`.`line1` AS `line1`, `user_has_address`.`line2` AS `line2`, 
                            `user_has_address`.`postal_code` AS `postal_code`, `city`.`id` AS `city_id`, 
                            `city`.`name` AS `city`, `district`.`id` AS `district_id`, 
                            `district`.`name` AS `district`, `province`.`id` AS `province_id`, 
                            `province`.`name` AS `province`, `users`.`joined_date` AS `date`, 
                            `status`.`id` AS `status_id`, `status`.`name` AS `status_name` 
                            FROM `users` 
                            INNER JOIN `user_has_address` ON `user_has_address`.`users_id` = `users`.`id` 
                            INNER JOIN `city` ON `user_has_address`.`city_id` = `city`.`id`
                            INNER JOIN `district` ON `city`.`district_id` = `district`.`id`
                            INNER JOIN `province` ON `province`.`id` = `district`.`province_id`
                            INNER JOIN `status` ON `users`.`status_id` = `status`.`id` WHERE `users_id` = '".$order_data["users_id"]."' ");
                                            ?>

                                            <tr>


                                                <?php
                                                
                                                $invoice_Item_rs = Database::search("SELECT `invoice_item`.`id`, `product`.`id` AS `product_id`,
                                                `product`.`title` AS `product_name`, `invoice_item`.`qty` FROM `invoice_item` INNER JOIN `product` ON `product`.`id` = `invoice_item`.`product_id` 
                                                WHERE `invoice_id` = '".$order_data["id"]."'  ");
                                                
                                                $invoice_item_num = $invoice_Item_rs -> num_rows;
                                                $user_data = $user_rs -> fetch_assoc();

                                                $status = $order_data["invoice_status_id"];
                                                $status_rs = Database::search("SELECT * FROM `invoice_status` WHERE `id` = '".$status."'");
                                                $status_data = $status_rs -> fetch_assoc();

                                                for($y = 0; $y < $invoice_item_num; $y++){ 

                                                $invoice_item_data = $invoice_Item_rs -> fetch_assoc();
                                                }

                                               ?>
                                                <td><?php echo $x +1; ?></td>
                                                <td><?php echo $order_data["order_id"]; ?></td>
                                                <td><?php echo $invoice_item_data["product_id"]; ?></td>
                                                <td><?php echo $invoice_item_data["product_name"]; ?></td>
                                                <td><?php echo $invoice_item_data["qty"]; ?></td>
                                                <td><?php echo $user_data["fname"]." ".$user_data["lname"]; ?></td>
                                                <td><?php echo $user_data["line1"]." ". $user_data["line2"]." ". $user_data["postal_code"] ?>
                                                </td>
                                                <td><?php echo $order_data["date_time"]; ?></td>

                                                <?php
                                                
                                                if($status==0){

                                                    ?>
                                                <td>
                                                    <button class="btn btn-success fw-bold my-2"
                                                        onclick="changeInvoiceId(<?php echo $order_data['id']; ?>)"
                                                        id="btn<?php echo $order_data['id']; ?>">Confirm Order</button>
                                                </td>
                                                <?php
                                                }else if($status==1){
                                                    ?>
                                                <td>
                                                    <button class="btn btn-warning fw-bold my-2"
                                                        onclick="changeInvoiceId(<?php echo $order_data['id']; ?>)"
                                                        id="btn<?php echo $order_data['id']; ?>">Packing</button>
                                                </td>
                                                <?php
                                                }else if($status==2){
                                                    ?>
                                                <td>
                                                    <button class="btn btn-info fw-bold my-2"
                                                        onclick="changeInvoiceId(<?php echo $order_data['id']; ?>)"
                                                        id="btn<?php echo $order_data['id']; ?>">Dispatch</button>
                                                </td>
                                                <?php
                                                }else if($status==3){
                                                    ?>
                                                <td>
                                                    <button class="btn btn-primary fw-bold my-2"
                                                        onclick="changeInvoiceId(<?php echo $order_data['id']; ?>)"
                                                        id="btn<?php echo $order_data['id']; ?>">Shipping</button>
                                                </td>
                                                <?php
                                                }else if($status==4){
                                                    ?>
                                                <td>
                                                    <button class="btn btn-danger fw-bold my-2"
                                                        onclick="changeInvoiceId(<?php echo $order_data['id']; ?>)"
                                                        id="btn<?php echo $order_data['id']; ?>"
                                                        disabled>Delivered</button>
                                                </td>
                                                <?php
                                                }
                                                ?>




                                            </tr>

                                            <?php

                                        }
                                        
                                        ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>QTY</th>
                                                <th>User Name</th>
                                                <th>User Address</th>
                                                <th>Date & Time</th>
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


    <script src="js/manageOrders.js"></script>

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

    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- Page specific script -->

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>