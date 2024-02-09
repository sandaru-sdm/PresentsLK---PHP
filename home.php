<?php require "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <img src="Resources/Header-Pic.jpg" class="col-12 m-0 p-0" />
            <nav class="navbar navbar-expand-lg position-absolute">
                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item m-3 mr-5">

                            <?php
                                session_start();
                                if(isset($_SESSION["u"])){
                                $data = $_SESSION["u"]; 
                            ?>

                            <div class="row">

                                <div class="col-1 col-lg-1 dropdown mr-5">
                                    <button class="btn btn-success dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION["u"]["fname"]; ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="signout();">Sign Out</a></li>

                                    </ul>
                                </div>
                            </div>


                            <?php
                            
                            }else{

                            ?>

                            <button class="btn btn-success" type="submit"><a href="index.php" class="link-light">
                                    Signin/Register</a></button>

                            <?php

                            }

                            ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <div
                class="col-12 container-fluid justify-content-center align-items-center d-flex mt-4 mb-3 bg-gradient-gray-dark hover state_hover">
                <div class="row">
                    <h3 class="fw-bold mt-2 mb-2"> Trending Products </h3>
                </div>
            </div>

            <div class="col-12 mb-3 col-lg-12 mt-3">

                <div class="row">

                    <div class="container-fluid d-flex align-items-center col-12 col-lg-10 justify-content-center">

                        <div class="row col-12 g-4" style="width: 600px ;">

                            <?php
                            
                            $product_rs = Database::search("SELECT * FROM `product` ORDER BY `id` DESC LIMIT 6");
                            
                            for($x=0; $x<6; $x++){

                                $product_data = $product_rs -> fetch_assoc();
                                $product_id = $product_data["id"];

                                ?>

                            <div class="col-4" style="height: 500px ;">

                                <div class="card" style="height: 500px ;">

                                    <?php
                                
                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '".$product_id."' LIMIT 1 ");
                                $image_data = $image_rs -> fetch_assoc();
                                
                                ?>
                                    <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail"
                                        alt="Hollywood Sign on The Hill" style="height: 350px;"/>
                                    <div class="card-body mt-5" >
                                        <h5 class="card-title fs-3 fw-bold"><?php echo $product_data["title"]; ?></h5> 
                                    </div>
                                </div>
                            </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="container-fluid col-lg-10 col-12 mt-3 mb-3">
                        <div class="row d-flex justify-content-center align-items-center">

                            <a class="btn btn-success fw-bold" type="submit" href="allProducts.php" role="button">View/
                                Search Products</a>
                            <!-- <button class="btn btn-success"><a href="allProducts.php">View Products</a></button> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php require "footer.php"; ?>
        </div>
    </div>

    <script src="js/home.js"></script>
    <script src="js/signOut.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

</body>

</html>