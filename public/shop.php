<?php
require_once('../db/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>
    <div class="super_container">
        <!-- navibar -->
        <?php include("./include/nav.php"); ?>

        <!-- sản phẩm mới -->
        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Sản phẩm mới</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col text-center">
                        <div class="new_arrivals_sorting">
                            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".1">Honda</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".2">Yamaha</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".3">Suzuki</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                            <!-- Product  -->
                            <?php
                            $sql = "SELECT productID,brandID,imgDemo,productName,price FROM product";
                            $productlist = executeResult($sql);
                            $index = 1;
                            foreach ($productlist as $item) {
                                echo '<div class="product-item ' . $item['brandID'] . '">
                                      <div class="product discount product_filter">
                                      <div class="product_image">
                                        <img src="' . $item['imgDemo'] . '" alt="">
                                      </div>
                                      <div class="favorite favorite_left"></div>
                                      <div class="product_info">
                                        <h6 class="product_name"><a href="single.php?id=' . $item['productID'] . '">' . $item['productName'] . '</a></h6>
                                        <div class="product_price">' . $item['price'] . ' VND</div>
                                      </div>
                                        </div>
                                      <div class="red_button add_to_cart_button"><a href="order.php?id=' . $item['productID'] . '">add to cart</a></div>
                                      </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- benefit -->
        <br><br><br>
        <?php include("./include/benefit.php") ?>
        <!-- Newsletter -->
        <?php include("./include/newletter.php"); ?>
        <!-- Footer -->
        <?php include("./include/footer.php"); ?>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>