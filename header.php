<?php
require "connection.php";
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="home.php"><img src="Resources/Icon_New.svg" style="height: 50px;" class="pointer" /></a>
        <a class="navbar-brand pointer-event" href="home.php">Present LK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        &nbsp;&nbsp;&nbsp;
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="allProducts.php">Products</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->

            </ul>

            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-5">
                    <li class="nav-item">
                        <a class="nav-link fw-bold pointer-event" href="cart.php" tabindex="-1"><i class="fas fa-cart-plus fa-lg mr-2"></i></a>
                    </li>




                    <?php

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>

                        <li class="nav-item col-sm done">
                            <a class="nav-link disabled fw-bold text-decoration-none" href="#" tabindex="-1" aria-disabled="true">Hello</a>
                        </li>
                </ul>

                <div class="row">

                    <div class="col-1 col-lg-1 dropdown mr-5">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION["u"]["fname"]; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item text-decoration-none" href="userProfile.php">My Profile</a></li>
                            <li><a class="dropdown-item text-decoration-none" href="watchlist.php">Watchlist</a></li>
                            <li><a class="dropdown-item text-decoration-none" href="purchaseHistory.php">Purchased History</a></li>
                            <li><a class="dropdown-item text-decoration-none" href="#" onclick="signout();">Sign Out</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- <a class="btn btn-outline-success" type="submit" href="#" role="button"
                    data-widget="pushmenu"><?php //echo $_SESSION["u"]["fname"]; 
                                            ?></a> -->
            </div>
        <?php

                    } else {

        ?>

            <button class="btn btn-outline-success fw-bold" type="submit"><a href="index.php" class="link-dark text-decoration-none">
                    Signin/Register</a></button>
            <!-- <a class="btn btn-outline-success" type="submit" href="index.php" role="button">Signin/Register</a> -->

        <?php

                    }

        ?>
        </div>
    </div>
    </div>
</nav>

<script src="js/signOut.js"></script>