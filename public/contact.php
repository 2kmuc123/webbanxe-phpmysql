<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>
    <div class="super_container">
        <!-- navibar -->
        <?php include("./include/nav.php"); ?>

        <!-- heard -->
        <div class="container contact_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- Contact Us -->

            <div class="row">

                <div class="col-lg-6 contact_col">
                    <div class="contact_contents">
                        <h1>Liên Hệ</h1>
                        <p>Có nhiều cách để liên hệ với chúng tôi. Bạn có thể gọi cho chung tôi qua số điện thoại, email ... hãy chọn cách phù hợp với bạn nhất</p>
                        <div>
                            <p>0845721868</p>
                            <p>phpnhom6@gmail.com</p>
                        </div>
                        <div>
                            <p>mm</p>
                        </div>
                        <div>
                            <p>Thứ 2 - 6 : 07h30 - 18h30</p>
                            <p>Sunday: Closed</p>
                        </div>
                    </div>

                    <!-- Follow Us -->

                    <div class="follow_us_contents">
                        <h1>Follow Us</h1>
                        <ul class="social d-flex flex-row">
                            <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-6 get_in_touch_col">
                    <div class="get_in_touch_contents">
                        <h1>Gửi lời nhắn</h1>
                        <p>Fill out the form below to recieve a free and confidential.</p>
                        <form action="post">
                            <div>
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
                                <input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
                                <input id="input_website" class="form_input input_website input_ph" type="url" name="name" placeholder="Website" required="required" data-error="Name is required.">
                                <textarea id="input_message" class="input_ph input_message" name="message" placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
                            </div>
                            <div>
                                <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>



        <!-- Map Container -->
        <div class="row">
            <div class="col">
                <div id="google_map">
                    <div class="map_container">
                        <iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60465.79354751468!2d105.66196507659971!3d18.70379889853218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139ce640b5a1dad%3A0xf8266890856bbaa1!2zVHAuIFZpbmgsIE5naOG7hyBBbiwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1640748394290!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>





        <br><br><br>
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/contact_custom.js"></script>
</body>

</html>