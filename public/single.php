<?php
require_once('../db/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm chi tiết</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>

<body>
    <div class="super_container">
        <!-- navibar -->
        <?php include("./include/nav.php"); ?>

        <!-- sản phẩm -->
        <div class="container single_product_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Sản phẩm chi tiết</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails">
                                    <ul>
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $idget = $_GET['id'];
                                        }
                                        $sql = "SELECT img FROM productimg Where productID='$idget';";
                                        $imgresult = executeResult($sql);
                                        foreach ($imgresult as $item) {
                                            echo '<li class="active"><img src="' . $item['img'] . '" alt="" data-image="' . $item['img'] . '"></li>';
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url(images/single_2.jpg)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <?php
                        $sql2 = ("SELECT productName,brandID,price FROM product WHERE productID='$idget'");
                        $deatailsResult = executeResult($sql2);
                        $index = 1;
                        foreach ($deatailsResult as $item) {
                            echo '<div class="product_details_title">
                                  <h2>' . $item['productName'] . '</h2>
                                  </div>
                                  <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                                  <span class="ti-truck"></span><span>Miễn phí vận chuyển</span>
                                  </div>
                                  <div class="product_price">' . $item['price'] . ' VND</div>';
                        }
                        ?>
                        <ul class="star_rating">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="product_color">
                            <span>Select Color:</span>
                            <ul>
                                <li style="background: #e54e5d"></li>
                                <li style="background: #252525"></li>
                                <li style="background: #60b3f3"></li>
                            </ul>
                        </div>
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>Quantity:</span>
                            <div class="quantity_selector">
                                <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <span id="quantity_value">1</span>
                                <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="order.php?id=<?php echo $idget; ?>">add to cart</a></div>
                            <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tabs -->
        <div class="tabs_section_container">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabs_container">
                            <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                                <li class="tab active" data-active-tab="tab_1"><span>Thông số kỹ thuật</span></li>
                                <li class="tab" data-active-tab="tab_2"><span>Thông tin</span></li>
                                <li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <!-- Tab Description -->

                        <div id="tab_1" class="tab_container active">
                            <div class="row">
                                <div class="col-lg-5 desc_col">
                                    <div class="tab_title">
                                        <h4>Thông số kỹ thuật</h4>
                                    </div>
                                    <?php
                                    $sql = ("SELECT * from product WHERE productID='$idget';");
                                    $productResult = executeResult($sql);
                                    foreach ($productResult as $item) {
                                        echo '<div class="tab_text">
                                              <br>
                                              <p>Kích thước : ' . $item['size'] . '</p><br>
                                              <p>Độ cao yên xe : ' . $item['saddleHeight'] . '</p><br>
                                              <p>Kích thước bánh xe : ' . $item['cakeSize'] . '</p><br>
                                              <p>Loại động cơ : ' . $item['engine'] . '</p><br>
                                              <p>Dung tích xi lanh (cc) : ' . $item['cc'] . '</p><br>
                                              <p>Công suất : ' . $item['wattage'] . '</p><br>
                                              <p>Dung tích dầu máy : ' . $item['viscous'] . '</p><br>
                                              <p>Dung tích bình xăng : ' . $item['gasoline'] . '</p><br>
                                              <p>Phanh : ' . $item['brake'] . '</p><br>
                                              <img src="' . $item['imgDemo'] . '" alt="">
                                              </div>';
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>

                        <!-- Tab Additional Info -->

                        <div id="tab_2" class="tab_container">
                            <div class="row">
                                <div class="col additional_info_col">
                                    <div class="tab_title additional_info_title">
                                        <?php
                                        $sql = ("SELECT productName,note,imgDemo From product WHERE productID='$idget';");
                                        $informationResult = executeResult($sql);
                                        foreach ($informationResult as $item) {
                                            echo '<h4>' . $item['productName'] . '</h4>
                                              </div>
                                              <img src="' . $item['imgDemo'] . '" alt="">
                                              <br><br>
                                              <p>' . $item['note'] . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Reviews -->

                            <div id="tab_3" class="tab_container">
                                <div class="row">

                                    <!-- User Reviews -->

                                    <div class="col-lg-6 reviews_col">
                                        <div class="tab_title reviews_title">
                                            <h4>Reviews (2)</h4>
                                        </div>

                                        <!-- User Review -->

                                        <div class="user_review_container d-flex flex-column flex-sm-row">
                                            <div class="user">
                                                <div class="user_pic"></div>
                                                <div class="user_rating">
                                                    <ul class="star_rating">
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="review_date">27 Aug 2021</div>
                                                <div class="user_name">Muc</div>
                                                <p>chất lượng sản phẩm tốt</p>
                                            </div>
                                        </div>

                                        <!-- User Review -->

                                        <div class="user_review_container d-flex flex-column flex-sm-row">
                                            <div class="user">
                                                <div class="user_pic"></div>
                                                <div class="user_rating">
                                                    <ul class="star_rating">
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <div class="review_date">27 Aug 2021</div>
                                                <div class="user_name">muc123</div>
                                                <p>okok</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add Review -->

                                    <div class="col-lg-6 add_review_col">

                                        <div class="add_review">
                                            <form id="review_form" action="post">
                                                <div>
                                                    <h1>Add Review</h1>
                                                    <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
                                                    <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                                                </div>
                                                <div>
                                                    <h1>Your Rating:</h1>
                                                    <ul class="user_star_rating">
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    </ul>
                                                    <textarea id="review_message" class="input_review" name="message" placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
                                                </div>
                                                <div class="text-left text-sm-right">
                                                    <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

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
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/single_custom.js"></script>
</body>

</html>