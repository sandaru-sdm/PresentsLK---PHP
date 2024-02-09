<!DOCTYPE html>
<html lang="en">

<?php 

require "connection.php";
session_start();

if(isset($_GET["order_id"])){

    $order_id = $_GET["order_id"];

    $data_rs = Database::search("SELECT `invoice`.`id` AS `inv_id`, `product`.`id` AS `product_id`,
    `product`.`title` AS `product_name`,
    `product`.`price` AS `price`,
    `invoice_item`.`qty` AS `qty`,
    `product`.`delivery_fee_colombo` AS `delivery_fee_colombo`,
    `product`.`delivery_fee_other` AS `delivery_fee_other`,
    `invoice_item`.`total` AS `total` FROM `invoice` 
    INNER JOIN `invoice_item` ON `invoice_item`.`invoice_id` = `invoice`.`id`
    INNER JOIN `product` ON `product`.`id` = `invoice_item`.`product_id` 
    WHERE `invoice`.`order_id` = '".$order_id."' ");

    $data_num = $data_rs -> num_rows;


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Checkout</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <section class="h-100 h-custom col-12" style="background-color: #d2c9ff;">

                <div class="col-12 mt-2">
                    <div class="row text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>

                <div class="container py-2 h-100 col-12">
                    <div class="row d-flex justify-content-center align-items-center h-100 col-12">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">

                                    <form autocomplete="off" action="checkout-charge.php" method="POST">

                                        <div class="card-body col-12">
                                            <div class="row">

                                                <div class="form-group col-12">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="c_name"
                                                        placeholder="Name" required
                                                        value="<?php echo $_SESSION["u"]["fname"]." ".$_SESSION["u"]["lname"]; ?> " />
                                                </div>

                                                <?php
                                                
                                                $userid = $_SESSION["u"]["id"];

                                                $resultset = Database::search("SELECT `user_has_address`.`line1` AS `line1`,
                                                `user_has_address`.`line2` AS `line2`,
                                                `user_has_address`.`postal_code` AS `postal_code`,
                                                `province`.`name` AS `province`,
                                                `district`.`id` AS `district_id`,
                                                `district`.`name` AS `district`,
                                                `city`.`name` AS `city` FROM `users` 
                                                INNER JOIN `profile_image` ON `users`.`id` = `profile_image`.`users_id` 
                                                INNER JOIN `user_has_address` ON `users`.`id`=`user_has_address`.`users_id` 
                                                INNER JOIN `city` ON `user_has_address`.`city_id` = `city`.`id` 
                                                INNER JOIN `district` ON `city`.`district_id`=`district`.`id` 
                                                INNER JOIN `province` ON `district`.`province_id`=`province`.`id` 
                                                INNER JOIN `gender` ON `users`.`gender_id` = `gender`.`id` 
                                                WHERE `users`.`id` = '" . $userid . "'");
                                                
                                                $address_data = $resultset -> fetch_assoc();

                                                ?>

                                                <div class="form-group col-12">
                                                    <label>Address</label>
                                                    <input type="input" class="form-control" name="address"
                                                        placeholder="Address" required
                                                        value="<?php echo $address_data["line1"]." ".$address_data["line2"]." ".$address_data["postal_code"] ?>" />
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Contact Number</label>
                                                    <input type="input" class="form-control" id="ph" name="phone"
                                                        pattern="\d{10}" maxlength="10" required
                                                        placeholder="Contact Number"
                                                        value="<?php echo $_SESSION["u"]["mobile"]; ?>" />
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Order ID</label>
                                                    <input type="input" class="form-control" name="product_name"
                                                        placeholder="Product Name" disabled required
                                                        value="<?php echo $order_id; ?>" />
                                                </div>



                                                <!-- Table row -->
                                                <div class="row justify-content-center align-content-center d-flex">
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
                                                                
                                                                $sub_total = 0;
                                                                $all_qty = 0;

                                                                $shipping_col = 0;
                                                                $shipping_other = 0;

                                                                for($x = 0; $x < $data_num; $x++){

                                                                    $data = $data_rs -> fetch_assoc();

                                                                    $total = $data["total"];
                                                                    $u_qty = $data["qty"];
                                                                    ?>

                                                                <tr>
                                                                    <td><?php echo $x+1 ?></td>
                                                                    <td><?php echo $data["product_id"] ?></td>
                                                                    <td><?php echo $data["product_name"] ?></td>
                                                                    <td>Rs.<?php echo $data["price"] ?> .00</td>
                                                                    <td><?php echo $u_qty; ?></td>
                                                                    <td class="text-end">Rs. <?php echo $total ?>.00
                                                                    </td>
                                                                </tr>


                                                                <?php

                                                                    $all_qty = $all_qty + $u_qty;
                                                                    $sub_total = $sub_total + $total;

                                                                    $shipping_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$data["product_id"]."'");
                                                                    $shipping_data = $shipping_rs -> fetch_assoc();

                                                                    $shipping_col = $shipping_col +  $shipping_data["delivery_fee_colombo"];
                                                                    $shipping_other = $shipping_other +  $shipping_data["delivery_fee_other"];

                                                                }
                                                                
                                                                ?>

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
                                                                WHERE `users_id` = '".$_SESSION["u"]["id"]."'");

                                                                $user_data = $user_rs -> fetch_assoc();

                                                                $shipping = 0;

                                                                if($user_data["district_id"] == 5){
                                                                    $shipping = $shipping_col;
                                                                }else{
                                                                    $shipping = $shipping_other;
                                                                }

                                                                $netTotal = $sub_total + $shipping;

                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Shipping</label>
                                                    <input type="input" class="form-control" name="shipping"
                                                        placeholder="Price" disabled required
                                                        value="<?php echo $shipping; ?>" />
                                                </div>


                                                <div class="form-group col-12">
                                                    <label>Price</label>
                                                    <input type="input" class="form-control" name="price"
                                                        placeholder="Price" disabled required
                                                        value="<?php echo $netTotal; ?>" />
                                                </div>

                                                <input type="hidden" name="amount" value="<?php echo $netTotal; ?>">
                                                <input type="hidden" name="product_name"
                                                    value="<?php echo $order_id; ?>">

                                                    <?php
                                                    
                                                        $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `users_id` = '".$userid."'");
                                                        $image_data = $image_rs -> fetch_assoc();

                                                        $path = $image_data["path"];

                                                    ?>

                                                <div class="col-12">
                                                    <div
                                                        class="row justify-content-center align-content-center align-items-center d-flex container-fluid">

                                                        <script src="https://checkout.stripe.com/checkout.js"
                                                            class="stripe-button"
                                                            data-key="pk_test_51LUtaCLtfP1Lafvh8p1kssA6WnpXQ7ej4Stwz5cZvpojQp55xQQWjWToyXjR2671EYcXb4Uov6dDJaf341mjLHkt00R1Tiwte2"
                                                            data-amount=<?php echo str_replace(",","",$netTotal) * 100?>
                                                            data-name="<?php echo $_SESSION["u"]["fname"]." ".$_SESSION["u"]["lname"]?>"
                                                            data-description="<?php echo $order_id ?>"
                                                            data-image="<?php echo $path?>" data-currency="lkr"
                                                            data-locale="auto">
                                                        </script>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php

        include "footer.php";
        }else{
            ?>
    <script>
    window.location = "allProducts.php";
    </script>
    <?php
        }
        ?>


    <script src="js/singleProductView.js"></script>
    <script src="js/checkOut.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>


</body>

</html>