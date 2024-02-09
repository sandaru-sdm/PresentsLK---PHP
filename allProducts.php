<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Products</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php"; ?>

            <!-- <hr /> -->

            <div class="col-12 justify-content-center">
                <div class="row mb-3">

                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" class="form-control form-control-lg"
                                        placeholder="Type your keywords here" id="basic_search_txt" />
                                    <div class="input-group-append">
                                        <button class="btn btn-lg btn-default" onclick="basicSearch(0);">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><a href="advancedSearch.php"
                                                class="text-decoration-none link-light">Advanced Search</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <hr /> -->

            <div class="col-12">
                <div class="col-12" id="basicSearchResult">

                    <div class="col-12 d-none d-lg-block mb-3">
                        <div class="row">

                            <div id="carouselExampleIndicators" class="carousel slide col-8 offset-2"
                                data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="Resources/Product/Caro-01.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="Resources/Product/Caro-02.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="Resources/Product/Caro-03.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- special products -->
                    <section id="special" class="py-5">
                        <div class="container col-8 col-lg-10">

                            <?php
                        
                        $category_rs = Database::search("SELECT * FROM `category` WHERE `status_id` = '1'");
                        $category_num = $category_rs -> num_rows;

                        for($x=0; $x<$category_num; $x++){

                            $category_data = $category_rs -> fetch_assoc();
                            $category_id = $category_data["id"];

                            ?>

                            <!-- Category -->
                            <div class="title text-center py-5">
                                <a href="categoryProducts.php?category_id=<?php echo $category_id; ?>" class="pointer-event text-decoration-none ">
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

                                    if($category_id == "2"){

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

                                }else{
                                    ?>

                                <div class="col-md-6 col-lg-4 col-xl-3 p-2 border border-dark mb-2">
                                    <div class="special-img position-relative overflow-hidden" style="height:350px ;">

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
                                        <p class="text-capitalize mt-3 mb-1"><?php echo $product_data["title"]; ?></p>
                                        <span class="fw-bold d-block">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                        <br />
                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>"
                                            class="btn btn-primary col-12 ">Buy Now</a>
                                        <a onclick="addToCart(<?php echo $product_data['id']; ?>);"
                                            class="btn btn-danger col-12 mt-1 "><i
                                                class="fas fa-cart-plus fa-lg mr-2"></i>Add to Cart</a>
                                        <?php
                                                if(isset($_SESSION["u"])){
                                                    $user = $_SESSION["u"]["id"];

                                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE 
                                                `product_id` = '".$product_id."' AND `users_id` = '".$user."' ");

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

                                <!-- Category -->

                                <?php
                                }
                                
                                ?>

                                <!-- Category -->
                                <?php

                                    }

                                    ?>

                                <!-- card -->

                            </div>
                    </section>
                    <!-- end of special products -->

                </div>
            </div>

            <?php require "footer.php"; ?>

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