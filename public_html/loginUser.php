<?php
include_once("./database/constants.php");

if (isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/Home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">

        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <script type="text/javascript" rel="stylesheet" src="./js/mainOperations.js"></script>


        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">        
        <link rel="stylesheet" href="ussef.css">

    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap"  id="home-section">
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
                                        <li><a href="home.php" class="nav-link ">Home</a></li>
                                        <li><a href="re-rumors.php" class="nav-link">Received rumors</a></li>
                                        <li><a href="profil.php" class="nav-link">My profile</a></li>
                                        <li><a href="loginUser.php" class="nav-link active">Login</a></li>
                                        <li><a href="contact.php" class="nav-link">Contact</a></li>
                                    </ul>
                                </nav>

                            </div>

                            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                        </div>
                    </div>

                </header>



                <!--HELLO-->
                <div class="container" style="margin-top: 80px;border: 0px #000 solid;">
                    <div class="col-md-4 mx-auto" style="border: 0px red solid;text-align: center;">
                        <label class="name"><span class="half1">ICHA3</span><span class="half2">AH</span></label>                
                        <!--<label class="name"><span class="half1">ICHA3</span>&nbsp;<span class="half2">AH</span></label>-->

                    </div>
                    <div class="row">
                        <div class="col-md-4" style="background-color: none;">

                        </div>
                        <div class="col-md-4 card mx-auto p-sm-3 pl-sm-5 pr-sm-5 shadow">
                            <form id="form_login" onsubmit="return false">
                                <div style="text-align: center;">
                                    <label class="mx-auto signIn">Sign In</label>
                                </div>
                                <div class="form-group mt-sm-2">
                                    <input class="col-md-12 field1 form-control" id="log_email" name="log_email" type="text" placeholder="username or email">
                                    <small id="e_error" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group mt-sm-2 ">
                                    <input class="col-md-12 field2 form-control " id="log_password" name="log_password" type="password" placeholder="password">
                                    <small id="p_error" class="form-text text-muted"></small>

                                </div>
                                <div class="checkbox mt-sm-2">
                                    <label><input type="checkbox" class="checkbox"> Remember me please ^^</label>
                                </div>
                                <div class="form-group mt-sm-2">
                                    <button class="col-md-12 btn-login">LOGIN</button>
                                </div>
                                <div>
                                    <label><a href="#" class="forgot">Oh..I forgot my password !</a></label>                            
                                </div>
                                <div>
                                    <label><a href="#" class="forgot">Create new account</a></label>                            
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4" style="background-color: none;">

                        </div>
                    </div>
                </div>



                <?php include_once 'templates/register.php'; ?>
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




                </body>
                </html>
