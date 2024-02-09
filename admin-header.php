<?php require "admin-loginCheck.php" ?>
<?php require "connection.php" ?>

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://kit.fontawesome.com/a51f2d3a19.js" crossorigin="anonymous"></script>

<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="Resources/Icon.png" height="150" />
        </div> -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="admin-dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" onclick="signout();">Log-Out</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-indigo elevation-4">
    <!-- Brand Logo -->
    <a href="admin-dashboard.php" class="brand-link">
        <img src="Resources/Icon.png" alt="PresentsLK Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PresentsLK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <?php 
                    
                    $adminID = $_SESSION["admin"]["id"];

                    $image_rs = Database::search("SELECT * FROM `admin_image` WHERE `admin_id` = '".$adminID."'");
                    $image_data = $image_rs -> fetch_assoc();

                    
                    ?>

                <img src="<?php echo $image_data["path"]; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#"
                    class="d-block"><?php echo $_SESSION["admin"]["fname"]. " ". $_SESSION["admin"]["lname"]; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="admin-dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-p "></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin-products.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-p "></i>
                                <p>
                                    Products

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-category.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-c"></i>
                                <p>
                                    Category
                                    </i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-brand.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-b"></i>
                                <p>
                                    Brand
                                    </i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-model.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-m"></i>
                                <p>
                                    Model
                                    </i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-color.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-c"></i>
                                <p>
                                    Color
                                    </i>
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="admin-Admin.php" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-a "></i>
                        <p>
                            Admin

                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="admin-manageOrders.php" class="nav-link active">
                        
                        <i class="nav-icon fas fa-solid fa-o "></i>
                        <p>
                            Manage Orders

                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="admin-manageUsers.php" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-u "></i>
                        
                        
                        <p>
                            Manage Users

                        </p>
                    </a>
                </li>

<!-- 
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-d "></i>
                        <p>
                            Display Images
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin-carousel.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-c "></i>
                                <p>
                                    Carousel

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="admin-homeImage.php" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-h"></i>
                                <p>

                                    Home Images
                                </p>
                            </a>
                        </li>

                    </ul>
                </li> -->


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script src="js/adminLogin.js"></script>