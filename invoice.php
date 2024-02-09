<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Invoice</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</head>

<body style="background-color: #d2c9ff;">

    <?php 
    require "header.php";
    
    if(isset($_GET["order_id"])){

        $order_id = $_GET["order_id"];

        $invoice_rs = Database::search("SELECT `invoice`.`id` AS `invoice_id`, `invoice`.`users_id` AS `users_id`, 
        `invoice`.`date_time` AS `date_time` FROM `invoice` WHERE `invoice`.`order_id` = '".$order_id."'");

        $invoice_data = $invoice_rs -> fetch_assoc();

    ?>

    <div class="container-fluid">
        <div class="row">


            <!-- Content Header (Page header) -->
            <section class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="fs-1">INVOICE</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-light"><a href="allProducts.php">Home</a></li>
                                <li class="breadcrumb-item disabled text-dark">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid col-lg-11 d-flex justify-content-center align-items-center text-dark">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">

                                        <?php
                                        
                                        $d = new DateTime();
                                        $tz = new DateTimeZone("Asia/Colombo");
                                        $d -> setTimezone($tz);
                                        $date = $d -> format("Y-m-d H:i:s");
                                        
                                        ?>

                                            <h4>
                                                <i class="fas fa-globe"></i> PresentLK
                                                <small class="float-right">Date: <?php echo $date; ?></small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            From
                                            <address>
                                                <strong>PresentLK.</strong><br>
                                                351/D, Pahala Imbulgoda,<br>
                                                Imbulgoda, Western 11856<br>
                                                Phone: (+94) 70 1794934<br>
                                                Email: presentlk@gmail.com
                                            </address>
                                        </div>
                                        <!-- /.col -->

                                        <?php
                                        
                                        $user_rs = Database::search("SELECT `users`.`id` AS `user_id`, 
                                        `users`.`fname` AS `fname`, `users`.`lname` AS `lname`, `users`.`email` AS `email`, 
                                        `users`.`mobile` AS `mobile`, `user_has_address`.`id` AS `address_id`, 
                                        `user_has_address`.`line1` AS `line1`, `user_has_address`.`line2` AS `line2`, 
                                        `user_has_address`.`postal_code` AS `postal_code`, `city`.`id` AS `city_id`, 
                                        `city`.`name` AS `city`, `district`.`id` AS `district_id`, 
                                        `district`.`name` AS `district`, `province`.`id` AS `province_id`, 
                                        `province`.`name` AS `province` FROM `users` 
                                        INNER JOIN `user_has_address` ON `user_has_address`.`users_id` = `users`.`id` 
                                        INNER JOIN `city` ON `user_has_address`.`city_id` = `city`.`id`
                                        INNER JOIN `district` ON `city`.`district_id` = `district`.`id`
                                        INNER JOIN `province` ON `province`.`id` = `district`.`province_id` 
                                        WHERE `users_id` = '".$invoice_data["users_id"]."'");

                                        $user_data = $user_rs -> fetch_assoc();

                                        ?>

                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong><?php echo $user_data["fname"]." ".$user_data["lname"]; ?></strong><br />
                                                <?php echo $user_data["line1"]; ?>, <?php echo $user_data["line2"] ?><br />
                                                <?php echo $user_data["city"] ?>, <?php echo $user_data["province"] ?> <?php echo $user_data["postal_code"] ?>, <br />
                                                Phone: <?php echo $user_data["mobile"] ?><br>
                                                Email: <?php echo $user_data["email"] ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Invoice #00<?php echo $invoice_data["invoice_id"]; ?></b><br>
                                            <br>
                                            <b>Order ID:</b> <?php echo $order_id; ?><br>
                                            <b>Payment Due:</b> <?php echo $invoice_data["date_time"]; ?><br>
                                            
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Unit Price</th>
                                                        <th>Qty</th>
                                                        <th class="text-end">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                
                                                $invoice_item_rs = Database::search("SELECT * FROM `invoice_item` 
                                                WHERE `invoice_id` = '".$invoice_data["invoice_id"]."'");

                                                $invoice_item_num = $invoice_item_rs -> num_rows;

                                                $sub_total = 0;
                                                $shipping_col = 0;
                                                $shipping_other = 0;

                                                for($x = 0; $x < $invoice_item_num; $x++){

                                                    $invoice_item_data = $invoice_item_rs -> fetch_assoc();

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$invoice_item_data["product_id"]."' ");
                                                    $product_data = $product_rs -> fetch_assoc();    
                                                    ?>

                                                    <tr>
                                                        <td>01</td>
                                                        <td><?php echo $product_data["id"]; ?></td>
                                                        <td><?php echo $product_data["title"]; ?></td>
                                                        <td>Rs. <?php echo $product_data["price"]; ?> .00</td>
                                                        <td><?php echo $invoice_item_data["qty"]; ?></td>
                                                        <?php
                                                        $unit_price = $product_data["price"];
                                                        $qty = $invoice_item_data["qty"];
                                                        $total = $unit_price * $qty;
                                                        ?>
                                                        <td class="text-end">Rs. <?php echo $total; ?> .00</td>
                                                    </tr>

                                                    <?php
                                                    
                                                    $sub_total = $sub_total + $total; 
                                                    $shipping_col = $shipping_col +  $product_data["delivery_fee_colombo"];
                                                    $shipping_other = $shipping_other +  $product_data["delivery_fee_other"];

                                                }

                                                ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            <p class="lead">Payment Methods:</p>
                                            <img src="dist/img/credit/visa.png" alt="Visa">
                                            <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                                            <img src="dist/img/credit/american-express.png" alt="American Express">
                                            <img src="dist/img/credit/paypal2.png" alt="Paypal">

                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                <b>All amounts are in Sri Lankan Rupees (LKR)</b><br />
                                                This receipt is the invoice for your transaction. <br />
                                                A copy of this reciept has been sent to your registered email address. 
                                                This is a computer generated Invoice. No verification required. 
                                            </p>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <p class="lead">Amount Due <?php echo $date; ?></p>

                                            <div class="table-responsive text-end">
                                                <table class="table">
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>Rs. <?php echo $sub_total; ?> .00</td>
                                                    </tr>

                                                    <?php

                                                    $shipping = 0;

                                                    if($user_data["district_id"] == 5){
                                                        $shipping = $shipping_col;
                                                    }else{
                                                        $shipping = $shipping_other;
                                                    }
                                                    
                                                    ?>

                                                    <tr>
                                                        <th>Shipping:</th>
                                                        <td>Rs. <?php echo $shipping; ?> .00</td>
                                                    </tr>

                                                    <?php
                                                    
                                                    $last_total = $shipping + $sub_total;

                                                    ?>

                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>Rs. <?php echo $last_total; ?> .00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <a href="invoicePrint.php" rel="noopener" target="_blank"
                                                class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                            <button type="button" class="btn btn-success float-right"><i
                                                    class="far fa-credit-card"></i> Submit
                                                Payment
                                            </button>
                                            <button type="button" class="btn btn-primary float-right"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-download"></i> Generate PDF
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.invoice -->

                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Note:</h5>
                                    This page has been enhanced for printing. Click the print button at the bottom of
                                    the invoice to test.
                                </div>

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>

    <?php 
    }else{
        ?>

            <script>
            alertify.alert('Somthing Wrong', 'Please Select a Product And Buy it!', function() {
                window.location = "allProducts.php";
            });
            </script>

            <?php
            }
    require "footer.php"; 
    ?>

    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="js/bootstrap.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>

</body>

</html>