<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Watch List</title>

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
    
    if(isset($_SESSION["u"])){
    ?>

    <div class="container-fluid">
        <div class="row">

            <section class="h-100 h-custom col-12" style="background-color: #d2c9ff;">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1 class="fw-bold mb-0 text-black">Watchlist</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="cart.php">Watchlist</a></li>
                                    <!-- <li class="breadcrumb-item active">Product Name</li> -->
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <?php
                
                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_id` = '".$_SESSION['u']['id']."'");
                $watchlist_num = $watchlist_rs -> num_rows;
                
                ?>

                <div class="container-fluid d-flex justify-content-center align-items-center h-100 col-10 ">
                    <div class="row d-flex justify-content-center align-items-center h-100 col-12">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h1 class="fw-bold mb-0 text-black">Watchlist Items</h1>
                                                    <h6 class="mb-0 text-muted"><?php echo $watchlist_num; ?> items</h6>
                                                </div>

                                                <hr class="my-4">

                                                <?php
                                                for($x = 0; $x < $watchlist_num; $x++){

                                                    $watchlist_data = $watchlist_rs -> fetch_assoc();
                                                    $product_id = $watchlist_data["product_id"];

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."' ");
                                                    $product_data = $product_rs -> fetch_assoc();
                                                    
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

                                                                <div class="col-md-3">

                                                                    <span class="d-inline-block" tabindex="0"
                                                                        data-bs-toggle="popover"
                                                                        data-bs-trigger="hover focus"
                                                                        data-bs-content="Description"
                                                                        title="Product Descripton">
                                                                        <?php 
                                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '".$product_id."' LIMIT 1");
                                                                        $image_data = $image_rs -> fetch_assoc();

                                                                        ?>
                                                                        <img src="<?php echo $image_data["code"]; ?>"
                                                                            class="img-fluid rounde-start"
                                                                            style="max-width: 200px;" />
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="card-body">

                                                                        <?php
                                                                    $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '".$product_data["color_id"]."'");
                                                                    $color_data = $color_rs -> fetch_assoc();
                                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '".$product_data["condition_id"]."'");
                                                                    $condition_data = $condition_rs -> fetch_assoc();
                                                                    ?>

                                                                        <div class="mb-2">

                                                                            <span class="fw-bold text-black-50">Color :
                                                                            </span>
                                                                            <span
                                                                                class="fw-bold text-dark"><?php echo $color_data["name"]; ?></span>&nbsp;
                                                                            |&nbsp;
                                                                            <span class="fw-bold text-black-50">Conditon
                                                                                : </span>
                                                                            <span
                                                                                class="fw-bold text-dark"><?php echo $condition_data["name"]; ?></span>
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
                                                                            <span
                                                                                class="fw-bold text-dark"><?php echo $product_data["qty"]; ?></span>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Delivery
                                                                                Fee (colombo): </span>
                                                                            <span
                                                                                class="fw-bold text-dark">Rs.<?php echo $product_data["delivery_fee_colombo"]; ?>.00</span>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <span class="fw-bold text-black-50">Delivery
                                                                                Fee (Other) : </span>
                                                                            <span
                                                                                class="fw-bold text-dark">Rs.<?php echo $product_data["delivery_fee_other"]; ?>.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="card-body d-grid">
                                                                        <a href="<?php echo 'singleProductView.php?id='.$product_id ?>" class="btn btn-success mb-3">Buy
                                                                            Now</a>
                                                                        <button class="btn btn-dark mb-3" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add
                                                                            to Cart</button>
                                                                        <button class="btn btn-danger"
                                                                            onclick="removeFromWatchlist(<?php echo $watchlist_data['id']; ?>);">Remove</button>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- basket card area -->
                                                <?php
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
}else{
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
    <?php include "footer.php"; ?>

    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="js/watchlist.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>