<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome to Icha3a</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./includes/style.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

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
        <script type="text/javascript" src="./js/mainOperations.js"></script>
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->

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
                            <a href="index.html" class="text-black"><span class="text-primary">Icha</span>3a</a>
                        </div>

                        <div class="col-12">
                            <nav class="site-navigation text-center " role="navigation">

                                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                    <li><a href="#home-section" class="nav-link">Home</a></li>
                                    <li><a href="#services-section" class="nav-link">Services</a></li>
                                    <li><a href="#about-section" class="nav-link">About Us</a></li>
                                    <li><a href="#team-section" class="nav-link">Doctors</a></li>

                                    <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                                    <li><a href="#blog-section" class="nav-link">Blog</a></li>
                                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                </ul>
                            </nav>

                        </div>

                        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    </div>
                </div>

            </header>
            <br/><br/><br/><br/>
            <div class="container">
                <?php
                if (isset($_GET["msg"]) AND ! empty($_GET["msg"])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <?php echo $_GET["msg"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <div class="card mx-auto" style="width: 20rem;">
                    <br>
                    <img class="card-img-top mx-auto" style="width:60%;" src="./images/lock.png" alt="Login Icon">
                    <div class="card-body">
                        <form id="form_login" onsubmit="return false">
                            <div class="text-center">
                                <h1 class="h4">Welcome back!</h1>
                                <p></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter Your Email Address">
                                <small id="e_error" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Enter your password">
                                <small id="p_error" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fa fa-lock">&nbsp;</i>Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a class="small" href="requestReset.php">Forgot your password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="#" data-toggle="modal" data-target="#form_register">Create an account!</a>
                        </div>
                    </div>
                </div>


            </div>

            <?php include_once 'templates/register.php'; ?>

            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <script src="js/sb-admin-2.min.js"></script>

            <script src="vendor/chart.js/Chart.min.js"></script>

            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
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