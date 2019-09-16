<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Gestion de Stock</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./includes/style.css">
        <script type="text/javascript" rel="stylesheet" src="./js/mainOperations.js"></script>
    </head>
    <body class="bg-gradient-primary">
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->

        <br/><br/><br/><br/>
        <div class="container">
            <div class="card mx-auto" style="width: 20rem;">
                <br>
                <div class="card-body">
                    <form id="register_Admin_form" onsubmit="return false" autocomplete="off">
                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input type="text" name="adminusername" class="form-control" id="adminusername" placeholder="Enter Username">
                            <small id="u_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="adminemail" class="form-control" id="adminemail" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="er_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password1">PassWord</label>
                            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
                            <small id="p1_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password2">Re-enter The Password</label>
                            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
                            <small id="p2_error" class="form-text text-muted"></small>
                        </div>
                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Registrer</button>
                            </div>
                        </div>
                    </form>
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
    </body>
</html>
