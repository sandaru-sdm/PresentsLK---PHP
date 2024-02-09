<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Advanced Search</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <?php require "header.php"; ?>
    <div class="container-fluid">
        <div class="row">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Advanced Search</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="allProducts.php">Products</a></li>
                                <li class="breadcrumb-item active">Advanced Search</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container mt-2">

                <div class="row d-flex justify-content-center">

                    <div class="col-md-10">

                        <div class="card p-3  py-4 ">

                            <div class="row g-3 mt-2 d-flex justify-content-center align-items-center mb-3">

                                <div class="col-md-6">

                                    <input type="text" class="form-control" placeholder="Type Keywords to Search..." id="searchText" />

                                </div>

                                <div class="col-md-3">

                                    <button class="btn btn-info btn-block" onclick="Search(0)">Search Results</button>

                                </div>

                            </div>


                            <div class="mt-3">

                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                    aria-controls="collapseExample" class="advanced fw-bold link-info">
                                    Advance Search With Filters <i class="fa fa-angle-down"></i>
                                </a>


                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">

                                        <div class="row">

                                            <div class="col-md-4">

                                                <?php
                                            
                                            $category_rs = Database::search("SELECT * FROM `category` Where `status_id` = '1'");
                                            $category_num = $category_rs -> num_rows;

                                            ?>

                                                <!-- <input type="text" placeholder="Property ID" class="form-control"> -->
                                                <select id="category" class="form-control">
                                                    <option value="0">Select Category</option>

                                                    <?php 
                                                    
                                                    for($x = 0; $x < $category_num; $x++){
                                                        $category_data = $category_rs -> fetch_assoc();
                                                        ?>
                                                    <option value="<?php echo $category_data["id"]; ?>">
                                                        <?php echo $category_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div>


                                            <div class="col-md-4">

                                                <?php
                                            
                                            $brand_rs = Database::search("SELECT * FROM `brand` WHERE `status_id` = '1'");
                                            $brand_num = $brand_rs -> num_rows;
                                            
                                            ?>

                                                <!-- <input type="text" class="form-control" placeholder="Search by MAP"> -->
                                                <select id="brand" class="form-control" onchange="selectModel(value);">
                                                    <option value="0">Select Brand</option>

                                                    <?php
                                                    for($y = 0; $y < $brand_num; $y++){
                                                        $brand_data = $brand_rs -> fetch_assoc();
                                                        ?>
                                                    <option value="<?php echo $brand_data["id"]; ?>">
                                                        <?php echo $brand_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                ?>

                                                </select>

                                            </div>


                                            <div class="col-md-4">

                                                <!-- <input type="text" class="form-control" placeholder="Search by Country"> -->
                                                <select id="model" class="form-control">
                                                    <option value="">Select Model</option>
                                                </select>

                                            </div>

                                            <div class="col-md-6 mt-3">

                                                <input type="text" placeholder="Price From" class="form-control" id="priceFrom" />

                                            </div>

                                            <div class="col-md-6 mt-3">

                                                <input type="text" placeholder="Price To" class="form-control" id="priceTo" />

                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>


            </div>

            <div class="container mt-2">

                <div class="row d-flex justify-content-center">

                    <div class="col-md-10">

                        <div class="card p-3  py-4 d-flex justify-content-center align-items-center">

                            <div class="col-md-4">

                                <!-- <input type="text" class="form-control" placeholder="Search by MAP"> -->
                                <select id="sort" class="form-control">
                                    <option value="0">SORT BY</option>
                                    <option value="1">PRICE HIGH TO LOW</option>
                                    <option value="2">PRICE LOW TO HIGH</option>
                                    <option value="3">QUANTITY HIGH TO LOW</option>
                                    <option value="4">QUANTITY LOW TO HIGH</option>
                                </select>

                            </div>

                        </div>

                    </div>

                </div>


            </div>

            <div class="container mt-2 mb-5">

                <div class="row d-flex justify-content-center">

                    <div class="col-md-10">

                        <div class="card p-3  py-4 d-flex justify-content-center align-items-center">

                            <div class="col-12 text-center d-flex justify-content-center align-items-center" id="searchResult">
                                <div class="row" id="view_area">

                                    <div class="col-12 mt-3 mb-3">
                                        <span class="text-black-50 fw-bold h1"><i class="bi bi-search fs-1"></i></span>
                                    </div>

                                    <div class="col-12 mt-3 mb-3">
                                        <span class="text-text-black-50 h1">No Item Searched Yet...</span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="js/cart.js"></script>
    <script src="js/singleProductView.js"></script>
    <script src="js/watchlist.js"></script>

    <script src="js/advancedSearch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>