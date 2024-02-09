<!DOCTYPE html>
<html lang="en">

<?php 

if(isset($_GET["category_id"])){

    $category_id = $_GET["category_id"];

    ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Categories</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    <div class="container-fluid">
        <div class="row">

            <?php 
            
            require "header.php";
                        
            $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$category_id."' ");
            $category_data = $category_rs -> fetch_assoc();
            

            ?>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1><?php echo $category_data["name"]; ?></h1>
                        </div>
                        <div class="col-sm-6 text-end">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="allProducts.php">All Products</a></li>
                                <li class="breadcrumb-item active"><?php echo $category_data["name"] ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="col-12">
                <div class="col-12" id="basicSearchResult">

                    <!-- special products -->
                    <section id="special">
                        <div class="container col-8 col-lg-10">

                            <!-- Category -->
                            <div class="title text-center py-2">
                                <a href="#" class="pointer-event text-decoration-none ">
                                    <h2 class="position-relative d-inline-block text-black">
                                        <?php echo $category_data["name"]; ?></h2>
                                </a>
                            </div>

                            <div class="special-list row g-0">

                                <?php
                                
                                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id` = '".$category_id."'");
                                $product_num = $product_rs -> num_rows;

                                for($y=0; $y<$product_num; $y++){

                                    $product_data = $product_rs -> fetch_assoc();
                                    $product_id = $product_data["id"];

                                        ?>

                                <div class="col-md-6 col-lg-4 col-xl-3 p-2 border border-dark mb-2">
                                    <div class="special-img position-relative overflow-hidden" style="height:200px ;">

                                        <?php 
                                        
                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '".$product_id."' LIMIT 1");
                                        $image_data = $image_rs -> fetch_assoc();

                                        ?>

                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>"><img
                                                src="<?php echo $image_data["code"]; ?>"
                                                class="w-100 pointer-event"></a>
                                        <span
                                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                                            <!-- <i class="fas fa-heart"></i> -->
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-capitalize mt-3 mb-1 "><?php echo $product_data["title"]; ?></p>
                                        <span class="fw-bold d-block">Qty :-
                                            <?php echo $product_data["qty"]; ?>.00</span>
                                        <span class="fw-bold d-block">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                        <br />
                                        <?php 
                                        if($product_data["qty"] == 0){
                                            ?>

                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>"
                                            class="btn btn-primary col-12 disabled">Buy Now</a>
                                        <a onclick="addToCart(<?php echo $product_data['id']; ?>);" href="#"
                                            class="btn btn-danger col-12 mt-1 "><i
                                                class="fas fa-cart-plus fa-lg mr-2 disabled"></i>Add to Cart</a>

                                        <?php
                                        }else{
                                            ?>
                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>"
                                            class="btn btn-primary col-12 ">Buy Now</a>
                                        <a onclick="addToCart(<?php echo $product_data['id']; ?>);" href="#"
                                            class="btn btn-danger col-12 mt-1 "><i
                                                class="fas fa-cart-plus fa-lg mr-2"></i>Add to Cart</a>
                                        <?php
                                        }
                                        ?>


                                        <?php
                                        if(isset($_SESSION["u"])){
                                            $user = $_SESSION["u"]["id"];

                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE 
                                        `product_id` = '".$product_data["id"]."' AND `users_id` = '".$user."' ");

                                        $watclist_num = $watchlist_rs -> num_rows;

                                        if($watclist_num == 1){

                                                ?>

                                        <a class="btn btn-secondary col-12 mt-1"
                                            onclick='addToWatchList(<?php echo $product_data["id"]; ?>);'>
                                            <i class="bi bi-heart-fill fs-5 text-danger"
                                                id="heart<?php echo $product_data["id"]; ?>"></i></a>

                                        <?php     

                                            }else {

                                                ?>

                                        <a class="btn btn-secondary col-12 mt-1"
                                            onclick='addToWatchList(<?php echo $product_data["id"]; ?>);'>
                                            <i class="bi bi-heart-fill fs-5 text-white"
                                                id="heart<?php echo $product_data["id"]; ?>"></i></a>

                                        <?php
                                            }
                                            }else {

                                                ?>


                                        <a class="btn btn-secondary col-12 mt-1"
                                            onclick='addToWatchList(<?php echo $product_data["id"]; ?>);'>
                                            <i class="bi bi-heart-fill fs-5 text-white"
                                                id="heart<?php echo $product_data["id"]; ?>"></i></a>

                                        <?php
                                            }
                                            ?>
                                    </div>
                                </div>

                                <!-- card -->

                                <?php

                                }
                                
                                ?>


                                <!-- card -->

                            </div>
                    </section>
                    <!-- end of special products -->

                </div>
            </div>

            <?php 

            require "footer.php"; 

            }else {
                ?>
            <script>
            window.location = "allproducts.php";
            </script>
            <?php
                }
                ?>



        </div>
    </div>

    <script src="js/cart.js"></script>
    <script src="js/singleProductView.js"></script>
    <script src="js/watchlist.js"></script>
    <script src="js/basicSearch.js"></script>
    <script src="js/allProducts.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>