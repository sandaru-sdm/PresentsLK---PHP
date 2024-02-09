<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Product</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
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

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";

            if (isset($_GET["id"])) {

                $product_id = $_GET["id"];

                $product_rs = Database::search("SELECT `product`.`title` AS `title`, `product`.`price` AS `price`,
                `product`.`delivery_fee_colombo` AS `colombo`, `product`.`delivery_fee_other` AS `other`,
                `color`.`name` AS `color`, `condition`.`name` AS `condition`, `product`.`qty` AS `qty` FROM `product` 
                INNER JOIN `color` ON `product`.`color_id` = `color`.`id`
                INNER JOIN `condition` ON `condition`.`id` = `product`.`condition_id` 
                WHERE `product`.`id` = '" . $product_id . "'");

                $product_data = $product_rs->fetch_assoc();

            ?>


            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="home.php">Products</a></li>
                                <li class="breadcrumb-item active"><?php echo $product_data["title"] ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?php echo $product_data["title"] ?>
                                </h3>

                                <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_id . "'");
                                    $image_num = $image_rs->num_rows;
                                    $img = array();

                                    ?>
                                <div class="col-12">
                                    <img src="Resources//addproductimg.svg" class="product-image" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <?php

                                        for ($x = 0; $x < $image_num; $x++) {

                                            $image_data = $image_rs->fetch_assoc();

                                            $img[$x] = $image_data["code"];

                                        ?>
                                    <div class="product-image-thumb">
                                        <img src="<?php echo $image_data["code"]; ?>" alt="Product Image">
                                        
                                    </div>

                                    <input type="text" hidden id="pimg" value="<?php echo $img[0];; ?>" />
                                    <?php
                                        }
                                        
                                        ?>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="card card-solid">
                                    <div class="card-body">
                                        <h2 class="my-3"><?php echo $product_data["title"]; ?></h2>

                                        <input type="text" value="<?php echo $product_data["title"]; ?>" hidden id="ptitle" />

                                        <div class="col-12 my-2">
                                            <span class="badge">

                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-half text-warning fs-5"></i>

                                                &nbsp;&nbsp;&nbsp;

                                                <label class="fs-5 text-dark fw-bold">4.5 Stars | 35 Ratings And
                                                    Reviews</label>

                                            </span>
                                        </div>

                                        <hr>

                                        <?php

                                            $price = $product_data["price"];
                                            $addingPrice = ($price / 100) * 5;
                                            $newPrice = $price + $addingPrice;
                                            $difference = $newPrice - $price;
                                            $percentage = ($difference / $price) * 100;

                                            ?>

                                        <div class=" py-2 px-3 mt-4">
                                            <h2 id="unitPrice" class="fw-bold text-black">Rs.
                                                <?php echo $product_data["price"]; ?> .00</h2>
                                                <input type="text" id="unitPrice" value="<?php echo $product_data["price"]; ?>" hidden />
                                            <br />
                                            <span class="fs-4 fw-bold text-danger"><del>Rs. <?php echo $newPrice; ?>
                                                    .00</del></span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp;
                                            <span class="fs-4 fw-bold text-black-50">Save Rs. <?php echo $difference; ?>
                                                .00
                                                (<?php echo $percentage; ?>%)</span>
                                        </div>

                                        <hr>

                                        <div class=" px-3 mt-4">
                                            <span class="fw-bold text-black-50 fs-5"
                                                id="availableQty"><?php echo $product_data["qty"]; ?></span>
                                            <span class="fw-bold text-dark fs-5"> Items Available</span>

                                        </div>

                                        <div class=" px-3 mt-4">
                                            <span class="fw-bold text-black-50 fs-5">Color : </span>
                                            <span
                                                class="fw-bold text-dark fs-5"><?php echo $product_data["color"]; ?></span>

                                        </div>

                                        <div class=" px-3 mt-4">
                                            <span class="fw-bold text-black-50 fs-5">Condition : </span>
                                            <span
                                                class="fw-bold text-dark fs-5"><?php echo $product_data["condition"]; ?></span>

                                        </div>


                                        <hr>

                                        <div class=" py-2 px-3 mt-4">
                                            <label class="fw-bold"> qty</label>
                                            <input type="number" pattern="[0-9]"
                                                onchange="checkQty(<?php echo $product_id ?>);" id="qty" />
                                        </div>

                                        <hr>

                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-flat"
                                                onclick="buyNow(<?php echo $product_id ?>);">
                                                <i class="fas fa-credit-card mr-2"></i> Buy It Now
                                            </button>

                                            <button class="btn btn-danger  btn-flat"
                                                onclick="addToCart(<?php echo $product_id; ?>)" ;>
                                                <i class="fas fa-cart-plus  mr-2"></i> Add to Cart
                                            </button>

                                            <button class="btn btn-secondary btn-flat"
                                                addToWatchList(<?php echo $product_id; ?>);'>
                                                <i class="fas fa-heart mr-2"></i> Add to Wishlist
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                        href="#product-desc" role="tab" aria-controls="product-desc"
                                        aria-selected="true">Description</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                        href="#product-comments" role="tab" aria-controls="product-comments"
                                        aria-selected="false">Feedback</a>
                                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                        href="#product-rating" role="tab" aria-controls="product-rating"
                                        aria-selected="false">Related Items</a>
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                    aria-labelledby="product-desc-tab">

                                    <div class="col-12">
                                        <div class="card card-solid">
                                            <div class="card-body">

                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div
                                                                class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                                                <div class="col-12">
                                                                    <span class="fs-4 fw-bold">Product Details</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 bg-white">
                                                            <div class="row">

                                                                <?php

                                                                    $pro_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                                                    $pro_data = $pro_rs->fetch_assoc();
                                                                    $model_id = $pro_data["model_id"];

                                                                    $model_rs = Database::search("SELECT `brand`.`name` AS `brand`, `model`.`name` AS `model`, 
                                                                    `brand`.`id` AS `brand_id`, `model`.`id` AS `model_id` 
                                                                    FROM `model` INNER JOIN `brand` ON `brand`.`id` =  `model`.`brand_id` 
                                                                    WHERE `model`.`id` = '" . $model_id . "' ");

                                                                    $model_data = $model_rs->fetch_assoc();

                                                                    ?>

                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label class="form-label fs-4 fw-bold">Brand
                                                                                : </label>
                                                                        </div>

                                                                        <div class="col-9">
                                                                            <label
                                                                                class="form-label fs-4 "><?php echo $model_data["brand"]; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label class="form-label fs-4 fw-bold">Model
                                                                                : </label>
                                                                        </div>

                                                                        <div class="col-9">
                                                                            <label
                                                                                class="form-label fs-4"><?php echo $model_data["model"]; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label
                                                                                class="form-label fs-4 fw-bold">Description
                                                                                : </label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <textarea class="form-control" cols="60"
                                                                                rows="10"
                                                                                disabled><?php echo $pro_data["description"]; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                    aria-labelledby="product-comments-tab">

                                    <div class="col-12">
                                        <div class="card card-solid">
                                            <div class="card-body">

                                                <?php

                                                $feedback_rs = Database::search("SELECT * FROM `feedback` INNER JOIN `feedback_type` 
                                                ON `feedback`.`feedback_type_id` = `feedback_type`.`id` 
                                                WHERE `product_id` = '" . $product_id . "' ORDER BY `feedback`.`feedback_type_id`");
                                                $feedback_num = $feedback_rs->num_rows;

                                                ?>
                                                <div class="col-12 bg-white">
                                                    <div
                                                        class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                                        <div class="col-12">
                                                            <span class="fs-3 fw-bold">Feedback</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card col-12">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="row d-block me-0 mt-2 mb-3">
                                                                <div class="col-12">

                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Feedback</th>
                                                                                <th scope="col">Type</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                        
                                                                        for($x = 0; $x < $feedback_num; $x++){

                                                                            $feedback_data = $feedback_rs -> fetch_assoc();

                                                                            ?>

                                                                            <tr>
                                                                                <th scope="row"><?php echo $x + 1 ?>
                                                                                </th>
                                                                                <td><?php echo $feedback_data["feedback"] ; ?>
                                                                                </td>
                                                                                <td><?php echo $feedback_data["name"] ; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <?php

                                                                        }
                                                                        
                                                                        ?>

                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Feedback</th>
                                                                                <th scope="col">Type</th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                    aria-labelledby="product-rating-tab">

                                    <div class="col-12 bg-white">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                            <div class="col-12">
                                                <span class="fs-3 fw-bold">Related Items</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 bg-white">
                                        <div class="row g-2 ">



                                            <?php

                                                $related_rs = Database::search("SELECT * FROM `product` INNER JOIN `model` ON `model`.`id` = `product`.`model_id`
                                                INNER JOIN `brand` ON `brand`.`id` = `model`.`brand_id` WHERE 
                                                `brand`.`id`='" . $model_data["brand_id"] . "' LIMIT 5");

                                                $related_num = $related_rs->num_rows;

                                                for ($y = 0; $y < $related_num; $y++) {
                                                    $related_data = $related_rs->fetch_assoc();

                                                ?>
                                            <div class="offset-1 offset-lg-0 col-4 m-3 col-lg-2 mx-5">
                                                <div class="card" style="width: 18rem;">

                                                    <?php

                                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $related_data["id"] . "'");
                                                            $image_data = $image_rs->fetch_assoc();

                                                            ?>

                                                    <img src="<?php echo $image_data["code"]; ?>"
                                                        class="card-img-top" />
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php echo $related_data["title"]; ?>
                                                        </h4>
                                                        <br />
                                                        <span class="fs-5 fw-bold">Rs.
                                                            <?php echo $related_data["price"]; ?> .00</span>
                                                        <div class="col-12 my-2">
                                                            <div class="row g-1">
                                                                <div class="col-12 d-grid">
                                                                    <button onclick="buyNow(<?php echo $pid; ?>);"
                                                                        class="btn btn-primary">Buy Now</button>
                                                                </div>
                                                                <div class="col-12 d-grid">
                                                                    <button class="btn btn-danger"
                                                                        onclick="addToCart(<?php echo $related_data['id']; ?>);">Add
                                                                        to Cart</button>
                                                                </div>
                                                                <div class="col-12 d-grid">
                                                                    <!-- <button class="btn btn-secondary"
                                                                        onclick='addToWatchList(<?php //echo $related_data["id"]; ?>);'>
                                                                        <i
                                                                            class="bi bi-heart-fill text-danger"></i>
                                                                    </button> -->

                                                                    <?php
                                                if(isset($_SESSION["u"])){
                                                    $user = $_SESSION["u"]["id"];

                                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE 
                                                `product_id` = '".$product_id."' AND `users_id` = '".$user."' ");

                                                $watclist_num = $watchlist_rs -> num_rows;

                                                if($watclist_num == 1){

                                                        ?>

                                                                    <a class="btn btn-secondary col-12 mt-1"
                                                                        onclick='addToWatchList(<?php echo $related_data["id"]; ?>);'>
                                                                        <i class="bi bi-heart-fill fs-5 text-danger"
                                                                            id="heart<?php echo $related_data["id"]; ?>"></i></a>

                                                                    <?php     

                                                    }else {

                                                        ?>

                                                                    <a class="btn btn-secondary col-12 mt-1"
                                                                        onclick='addToWatchList(<?php echo $related_data["id"]; ?>);'>
                                                                        <i class="bi bi-heart-fill fs-5 text-white"
                                                                            id="heart<?php echo $related_data["id"]; ?>"></i></a>

                                                                    <?php
                                                    }
                                                    }else {

                                                        ?>


                                                                    <a class="btn btn-secondary col-12 mt-1"
                                                                        onclick='addToWatchList(<?php echo $related_data["id"]; ?>);'>
                                                                        <i class="bi bi-heart-fill fs-5 text-white"
                                                                            id="heart<?php echo $related_data["id"]; ?>"></i></a>

                                                                    <?php
                                                    }
                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                                }

                                                ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->

            <?php
            } else {
            ?>

            <script>
            alertify.alert('Somthing Wrong', 'Please Select a Product!', function() {
                // alertify.success('Ok');
                window.location = "allProducts.php";
            });
            </script>

            <?php
            }

            require "footer.php";
            ?>

        </div>
    </div>
    
    <script src="js/checkOut.js"></script>
    <script src="js/singleProductView.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/watchlist.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>


    <script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
    </script>
</body>

</html>