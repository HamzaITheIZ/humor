<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/loginUser.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>send rumors</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">

        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="ussef.css">
        <script type="text/javascript" rel="stylesheet" src="./js/mainOperations.js"></script>



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
                                    <li><a href="#services-section" class="nav-link">Public rumors</a></li>
                                    <li><a href="re-rumors.php" class="nav-link">Received rumors</a></li>
                                    <li><a href="#team-section" class="nav-link">My profile</a></li>
                                    <li><a href="login2.php" class="nav-link">Login</a></li>
                                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                </ul>
                            </nav>

                        </div>

                        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    </div>
                </div>

            </header>













            <div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
                <div class="container">

                    <div class="text-center mb-5">
                        <div class="block-heading-1">
                            <span>To:Shoyokousei</span>
                            <!--<h2 class="mainTextColor2">rumors on me</h2>-->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-6">
                            <div>
                                <form id="send_rumor" onsubmit="return false">
                                    <div class="block-testimony-1 text-center ">                                    
                                        <input type="hidden" name="from" id="from" value="<?php echo $_SESSION['username'] ?>" >
                                        <input type="hidden" name="to" id="to" value="Shoyokousei">
                                        <blockquote class="mb-4 newRumorContainer">
                                            <!--<textarea rows="8"  class="p-2 written-rumor"  maxlength="250" minlength="5"></textarea>-->
                                            <textarea name="rumor" id="rumor" rows="3"  class="p-2 written-rumor"  maxlength="300" minlength="5"></textarea>
                                            <span class="msgLength ">0/300</span>

                                        </blockquote>
                                        <label><input type="checkbox" name="known" id="known"> allow my name</label>
                                        <h3 class="font-size-20 text-black">sender:<b>private</b></h3>
                                        <button type="submit" class="btn btn-warning">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>



                </div>
            </div>







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