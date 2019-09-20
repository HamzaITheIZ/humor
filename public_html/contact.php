<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/loginUser.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">

        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="ussef.css">
        <script type="text/javascript" src="./js/mainOperations.js"></script>



    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

        <div class="site-wrap"  id="home-section">

            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>


            <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

                <div class="container">
                    <div class="row align-items-center position-relative">


                        <div class="site-logo">
                            <a href="index.html" class="text-black"><span class="half1">ICHA3</span>AH</a>
                        </div>

                        <div class="col-12">
                            <nav class="site-navigation text-center " role="navigation">

                                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                    <li><a href="home.php" class="nav-link">Home</a></li>
                                    <li><a href="re-rumors.php" class="nav-link">Received rumors</a></li>
                                    <li><a href="profile.php" class="nav-link">My profile</a></li>
                                    <li><a href="logout.php" class="nav-link">Logout</a></li>
                                    <li><a href="contact.php" class="nav-link active">Contact</a></li>
                                </ul>
                            </nav>

                        </div>

                        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    </div>
                </div>

            </header>













            <div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 text-center m-0 p-0" style="">
                            <button class="btn contact-choice p-5 m-0" data-toggle="modal" data-target="#contactModal">Contact Us</button>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5 text-center m-0 p-0" style="">
                            <button class="btn contact-choice p-5 m-0" data-toggle="modal" data-target="#suggestModal">Suggest Rumor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--My Modals-->
            <!--            <div id="contactModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Contact us</h4>
                                    </div>
                                    <div class="modal-body">
            
                                        <div class="row">
                                            <div class="col-lg-12 mb-5">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <textarea name="" id="" class="form-control contact-msg" placeholder="Write your message." maxlength="1000"  rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 ml-auto">
                                                        <input type="submit" class="btn btn-block mainBackColor2 text-white py-3 px-5" value="Send Message">
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
            
                                    </div>
            
                                </div>
                            </div>
            
                        </div>-->
            <!--            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thank you ^^</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <label>we will review you request</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->



            <!--End of my modals -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>



            <footer class="site-footer">
                <div class="container">
                    <div class="row  text-center">
                        <div class="col-md-12">
                            <div class="">
                                <p>
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved for <a href="#">ICHA3AH</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>


        </div>

        <?php include_once 'templates/contactUs.php'; ?>
        <?php include_once 'templates/suggestRumor.php'; ?>


        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/aos.js"></script>

        <script src="js/main.js"></script>

        <script src="ussefscripts/sc1.js"></script>        
        <script src="ussefscripts/dist/autosize.js"></script>        
        <script src="ussefscripts/dist/autosize.min.js"></script>





    </body>
</html>