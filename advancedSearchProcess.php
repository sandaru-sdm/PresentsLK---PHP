<?php

require "connection.php";

$text = $_POST["text"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$priceFrom = $_POST["priceFrom"];
$priceTo = $_POST["priceTo"];
$sort = $_POST["sort"];
$page = $_POST["page"];

$query = "SELECT * FROM `product` INNER JOIN `model` ON `product`.`model_id` = `model`.`id` INNER JOIN `brand` ON `model`.`brand_id` = `brand`.`id` ";

if ($sort == 0) {
    if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' ";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id`='" . $category . "'";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id`='" . $brand . "' AND `model_id` = '" . $model . "'";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `price` >= '" . $priceFrom . "' ";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `price` <= '" . $priceTo . "' ";
    } else if (!empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id` = '" . $category . "' ";
    } else if (!empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` >= '" . $priceFrom . "' ";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` <= '" . $priceTo . "' ";
    } else if (empty($text) && !empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` >= '" . $priceFrom . "' ";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` <= '" . $priceTo . "' ";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` <= '" . $priceTo . "' ";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'  AND `price` <= '" . $priceTo . "' ";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE  `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ";
    }

} else if ($sort == 1) {
    if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `price` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id`='" . $category . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id`='" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `price` >= '" . $priceFrom . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (!empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id` = '" . $category . "' ORDER BY `price` DESC";
    } else if (!empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` DESC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` >= '" . $priceFrom . "' ORDER BY `price` DESC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (empty($text) && !empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` >= '" . $priceFrom . "' ORDER BY `price` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'  AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE  `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` DESC";
    }

}else if ($sort == 2) {
    if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `price` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id`='" . $category . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id`='" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `price` >= '" . $priceFrom . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (!empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id` = '" . $category . "' ORDER BY `price` ASC";
    } else if (!empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` ASC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` >= '" . $priceFrom . "' ORDER BY `price` ASC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (empty($text) && !empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `price` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` >= '" . $priceFrom . "' ORDER BY `price` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'  AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE  `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `price` ASC";
    }

}else if ($sort == 3) {
    if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `qty` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id`='" . $category . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id`='" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `price` >= '" . $priceFrom . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (!empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id` = '" . $category . "' ORDER BY `qty` DESC";
    } else if (!empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` DESC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` >= '" . $priceFrom . "' ORDER BY `qty` DESC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (empty($text) && !empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` >= '" . $priceFrom . "' ORDER BY `qty` DESC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'  AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE  `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` DESC";
    }

}else if ($sort == 2) {
    if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `qty` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id`='" . $category . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id`='" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `price` >= '" . $priceFrom . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (!empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id` = '" . $category . "' ORDER BY `qty` ASC";
    } else if (!empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` ASC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` >= '" . $priceFrom . "' ORDER BY `qty` ASC";
    } else if (!empty($text) && empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `title` LIKE '%" . $text . "%' AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (empty($text) && !empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' ORDER BY `qty` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` >= '" . $priceFrom . "' ORDER BY `qty` ASC";
    } else if (empty($text) && !empty($category) && empty($brand) && empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `category_id` = '" . $category . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && !empty($priceFrom) && empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && !empty($brand) && !empty($model) && empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'  AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    } else if (empty($text) && empty($category) && empty($brand) && empty($model) && !empty($priceFrom) && !empty($priceTo)) {

        $query .= " WHERE  `price` >= '" . $priceFrom . "' AND `price` <= '" . $priceTo . "' ORDER BY `qty` ASC";
    }

}


?>
<div class="row">

    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">



            <?php

            if ($_POST["page"] != 0) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 6;
            $number_of_pages = ceil($product_num / $results_per_page);

            $viewed_results = ((int)$pageno - 1) * $results_per_page;
            $query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results;
            $results_rs = Database::search($query);
            $result_num = $results_rs->num_rows;

            while ($product_data = $results_rs->fetch_assoc()) {

            ?>

                <div class="card mb-3 mt-3 col-12 col-lg-6 border">
                    <div class="row">

                        <div class="col-md-4 mt-4">
                            <?php

                            $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $product_img_data = $product_img_rs->fetch_assoc();

                            ?>

                            <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" alt="..." />
                        </div>

                        <div class="col-md-8">
                            <div class="card-body ">
                                <h5 class="card-title fw-bold mt-3"><?php echo $product_data["title"]; ?></h5>

                                <br />
                                <br />

                                <span class="card-text text-primary fw-bold mt-3">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                <br />
                                <br />

                                <span class="card-text text-danger fw-bold fs mt-3"><?php echo $product_data["qty"]; ?> Items Left</span>

                                <br />
                                <br />

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row g-1">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <a href="<?php echo 'singleProductView.php?id='.$product_data["id"] ?>" class="btn btn-success fs" >Buy Now</a>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid">
                                                <a href="#" class="btn btn-danger fs" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add Cart</a>
                                            </div>
                                        </div>

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

    <div class="col-12 text-center mb-5 mt-5">

        <div class="pagination justify-content-center">
            <a <?php

                if ($pageno <= 1) {

                    echo "href=#";
                } else {

                ?> onclick="Search('<?php echo ($pageno - 1); ?>');" <?php

                                                                    }

                                                                        ?>>&laquo;</a>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {
            ?>

                    <a onclick="Search('<?php echo ($page); ?>');" class="active"><?php echo $page; ?></a>

                <?php
                } else {

                ?>

                    <a onclick="Search('<?php echo ($page); ?>');"><?php echo $page; ?></a>

            <?php

                }
            }

            ?>

            <a <?php

                if ($pageno >= $number_of_pages) {

                    echo "href=#";
                } else {

                ?> onclick="Search('<?php echo ($pageno + 1); ?>');" <?php

                                                                    }

                                                                        ?>>&raquo;</a>
        </div>

    </div>
</div>