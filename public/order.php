<?php
require_once('../db/db.php');
session_start();
if (isset($_GET['id'])) {
    $_SESSION['idget'] = $_GET['id'];
}
if (isset($_SESSION['idget'])) {
    $idget = $_SESSION['idget'];
}
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['address']) && isset($_POST['compare']) && isset($_POST['color']) && isset($_POST['note'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $compare = $_POST['compare'];
    $color = $_POST['color'];
    $note = $_POST['note'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>

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
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>order</a></li>
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
                    </div>
                </div>
            </div>

        </div>

        <div class="tabs_section_container">
            <div class="container">
                <div class="col-lg-8 get_in_touch_col">
                    <div class="get_in_touch_contents">
                        <h3>Nhập thông tin</h3>
                        <p>xin vui lòng điền đủ thông tin cá nhân.</p>
                        <form action="order.php" method="POST">
                            <div>
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Họ và tên " required="required" data-error="Name is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="phone" placeholder="Số điện thoại" required="required" data-error="phone is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="mail" placeholder="Địa chỉ mail" required="required" data-error="mail is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="address" placeholder="Địa chỉ" required="required" data-error="Name is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="compare" placeholder="Số lượng" required="required" data-error="Name is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="color" placeholder="Trắng - Đen - Đỏ" required="required" data-error="Name is required.">
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="note" placeholder="Ghi chú " required="required" data-error="Name is required.">
                            </div>
                            <div>
                                <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit"> order </button>
                            </div>
                        </form>
                        <?php
                        if (isset($idget) && isset($name) && isset($address)) {
                            $sql = "INSERT INTO `order` ( `productID`, `name`, `phone`, `mail`, `address`, `compare`, `color`, `note`) VALUES ( '$idget', '$name', '$phone', '$mail', '$address', '$compare', '$color', '$note');";
                            echo "<script>confirm('Xác nhận order sản phẩm !!!!');</script>";
                            execute($sql);
                            echo "<script>alert('Thành công !!!');</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
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