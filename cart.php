<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Cart</title>

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

<body>

    <?php

    include "header.php";
    if (isset($_SESSION["u"])) {

        $total = 0;
        $subTotal = 0;
        $shipping = 0;

    ?>

    <div class="container-fluid">
        <div class="row">

            <section class="h-100 h-custom col-12" style="background-color: #d2c9ff;">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1 class="fw-bold mb-0 text-black">Cart</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                                    <!-- <li class="breadcrumb-item active">Product Name</li> -->
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <?php
                    $user = $_SESSION["u"]["id"];
                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_id` ='" . $user . "' AND `status_id` = '1'");
                    $cart_num = $cart_rs->num_rows;
                    ?>

                <div class="container py-2 h-100 col-12">
                    <div class="row d-flex justify-content-center align-items-center h-100 col-12">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-lg-9">
                                            <div class="p-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h1 class="fw-bold mb-0 text-black">Cart Items</h1>
                                                    <h6 class="mb-0 text-muted"><?php echo $cart_num; ?> items</h6>
                                                </div>

                                                <hr class="my-4">

                                                <?php

                                                    if ($cart_num == 0) {
                                                    ?>

                                                <div class="col-12 col-lg-12 ">
                                                    <div class="row">

                                                        <div class="col-12 card ">
                                                            <div class="row g-0">

                                                                <div class="col-12 img-fluid">
                                                                    <div class="row justify-content-center">
                                                                        <img src="Resources/emptycart.svg"
                                                                            style="max-height: 200px;" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 text-center pb-2">
                                                                    <label class="form-label fs-1">You have no items in
                                                                        your basket.</label>
                                                                </div>
                                                                <div
                                                                    class="offset-0 col-12 offset-lg-4 col-lg-4 d-grid pb-3">
                                                                    <a href="allProducts.php"
                                                                        class="btn btn-primary fs-5">Start
                                                                        Shoping</a>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <?php
                                                    } else {

                                                        for ($x = 0; $x < $cart_num; $x++) {

                                                            $cart_data = $cart_rs->fetch_assoc();
                                                            $product_id = $cart_data["product_id"];

                                                            $product_rs = Database::search("SELECT `product`.`title` AS `title`, `product`.`price` AS `price`,
                                                            `product`.`delivery_fee_colombo` AS `colombo`, `product`.`delivery_fee_other` AS `other`, `product`.`qty` AS `qty`,
                                                            `color`.`name` AS `color`, `condition`.`name` AS `condition` FROM `product` 
                                                            INNER JOIN `color` ON `product`.`color_id` = `color`.`id`
                                                            INNER JOIN `condition` ON `condition`.`id` = `product`.`condition_id` 
                                                            WHERE `product`.`id` = '" . $product_id . "'");

                                                            $address_rs = Database::search("SELECT `district`.`id` , `district`.`name` 
                                                            FROM `user_has_address` 
                                                            INNER JOIN `city` ON `city`.`id` = `user_has_address`.`city_id` 
                                                            INNER JOIN `district` ON `district`.`id` = `city`.`district_id` 
                                                            WHERE `user_has_address`.`users_id` = '" . $user . "' ");

                                                            $address_data = $address_rs->fetch_assoc();
                                                            $district_id = $address_data["id"];

                                                            $product_data = $product_rs->fetch_assoc();

                                                            $total = $total + ($product_data["price"] * $cart_data["qty"]);
                                                            $ship = 0;

                                                            if ($district_id == 5) {
                                                                $ship = $product_data["colombo"];
                                                                $shipping = $shipping + $product_data["colombo"];
                                                            } else {
                                                                $ship = $product_data["other"];
                                                                $shipping = $shipping + $product_data["other"];
                                                            }

                                                        ?>

                                                <!-- basket card area -->
                                                <div class="col-12 col-lg-12 ">
                                                    <div class="row">

                                                        <div class="col-12 card ">
                                                            <div class="row g-0">

                                                                <div class="col-md-12 pt-3 pb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <span class="fw-bold terxt-black fs-4">
                                                                                <?php echo $product_data["title"]; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr />

                                                                <?php

                                                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_id . "' LIMIT 1 ");
                                                                            $image_data = $image_rs->fetch_assoc();

                                                                            ?>

                                                                <div class="col-md-3">

                                                                    <span class="d-inline-block" tabindex="0"
                                                                        data-bs-toggle="popover"
                                                                        data-bs-trigger="hover focus"
                                                                        data-bs-content="Description"
                                                                        title="Product Descripton">
                                                                        <img src="<?php echo $image_data["code"]; ?>"
                                                                            class="img-fluid rounde-start"
                                                                            style="max-width: 200px;" />
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="card-body">

                                                                        <div class="mb-2">

                                                                            <span class="fw-bold text-black-50">Color :
                                                                            </span>
                                                                            <span
                                                                                class="fw-bold text-dark"><?php echo $product_data["color"]; ?></span>&nbsp;
                                                                            |&nbsp;
                                                                            <span class="fw-bold text-black-50">Conditon
                                                                                : </span>
                                                                            <span
                                                                                class="fw-bold text-dark"><?php echo $product_data["condition"]; ?></span>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Price :
                                                                            </span>
                                                                            <span
                                                                                class="fw-bold text-dark">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Quantity
                                                                                : </span>

                                                                            <button class="btn btn-default"
                                                                                onclick='qty_dec(); updateqty(<?php echo $product_id ?>);'>-</button>
                                                                            <input type="text" 
                                                                                class="border-1 fs-5 fw-bold text-center"
                                                                                pattern="[0-9]"
                                                                                value="<?php echo $cart_data["qty"]; ?>"
                                                                                onkeyup='check_value(<?php echo $product_data["qty"]; ?>);'
                                                                                
                                                                                id="qtyInput" />
                                                                            <button class="btn btn-default"
                                                                                onclick='qty_inc(<?php echo $product_data["qty"]; ?>); updateqty(<?php echo $product_id ?>);'>+</button>

                                                                            <!-- <input type="number" onchange="checkQty(<?php echo $product_id ?>); updateqty(<?php echo $product_id ?>);" id="qty"
                                                                                class="ps-3 border border-1 border-secondary rounded fs-5 fw-bold" 
                                                                                value="<?php echo $cart_data["qty"]; ?>" /> -->
                                                                        </div>

                                                                        <?php

                                                                                    if ($district_id == "5") {
                                                                                    ?>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Delivery
                                                                                Fee
                                                                                (<?php echo $address_data["name"]; ?>) :
                                                                            </span>
                                                                            <span
                                                                                class="fw-bold text-dark">Rs.<?php echo $product_data["colombo"]; ?>.00</span>
                                                                        </div>
                                                                        <?php
                                                                                    } else {
                                                                                    ?>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Delivery
                                                                                Fee
                                                                                (<?php echo $address_data["name"]; ?>) :
                                                                            </span>
                                                                            <span
                                                                                class="fw-bold text-dark">Rs.<?php echo $product_data["other"]; ?>.00</span>
                                                                        </div>
                                                                        <?php
                                                                                    }
                                                                                    ?>


                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="card-body d-grid">
                                                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>" class="btn btn-success mb-3">Buy
                                                                            Now</a>
                                                                        <button class="btn btn-danger"
                                                                            onclick="removeFromCart(<?php echo $cart_data['id']; ?>);">Remove</button>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-3 pb-2">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <span
                                                                                class="fw-bold fs-5 text-black-50">Requested
                                                                                Total <i
                                                                                    class="bi bi-info-circle"></i></span>
                                                                        </div>
                                                                        <div class="col-6 text-end pe-4">
                                                                            <span class="fw-bold fs-5 text-balck-50">
                                                                                Rs.<?php echo $product_data["price"] * $cart_data["qty"] + $ship ?>.00
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- basket card area -->

                                                <?php
                                                        }
                                                    }
                                                    ?>

                                                <hr class="my-4">

                                                <div class="pt-5">
                                                    <h6 class="mb-0"><a href="allProducts.php" class="text-body"><i
                                                                class="fas fa-long-arrow-alt-left me-2"></i>Back to
                                                            shop</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 bg-gradient-dark">
                                            <div class="p-3">
                                                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-4">
                                                    <h5 class="text-uppercase">items (<?php echo $cart_num; ?>)</h5>
                                                    <h5>Rs.<?php echo $total; ?>.00</h5>
                                                    <input type="text"  id="total" value="<?php echo $total; ?>" hidden />
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <h5 class="text-uppercase">Shipping</h5>
                                                    <h5>Rs.<?php echo $shipping; ?>.00</h5>
                                                    <input type="text"  id="shipping" value="<?php echo $shipping; ?>" hidden />
                                                </div>



                                                <!-- <h5 class="text-uppercase mb-3">Promo code</h5>

                                                <div class="mb-5">
                                                    <div class="form-outline">
                                                        <input type="text" id="form3Examplea2"
                                                            class="form-control form-control-lg" placeholder="Code" />

                                                    </div>
                                                </div> -->

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>
                                                    <h5>Rs.<?php echo ($total + $shipping); ?>.00</h5>
                                                </div>

                                                <button type="button" class="btn btn-primary btn-block btn-lg"
                                                    data-mdb-ripple-color="dark" onclick="checkOut();" >Check-Out</button>

                                            </div>
                                        </div>
                                    </div>
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
        ?>

    <script src="js/cart.js"></script>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <?php
    } else {
    ?>
    <script>
    alertify.alert('Sign-In', 'Please Sign-In First!', function() {
        // alertify.success('Ok');
        window.location = "index.php";
    });
    </script>
    <?php
    }
    ?>

</body>

</html>