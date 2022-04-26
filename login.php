<?php
session_start();

if (!isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};

include 'dbconnect.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $queryuser = mysqli_query($conn, "SELECT * FROM login WHERE email='$email' AND role='Member'");
    $cariuser = mysqli_fetch_assoc($queryuser);

    if (password_verify($password, $cariuser['password'] ?? null)) {
        $_SESSION['id'] = $cariuser['userid'] ?? null;
        $_SESSION['role'] = $cariuser['role'] ?? null;
        $_SESSION['notelp'] = $cariuser['notelp'] ?? null;
        $_SESSION['name'] = $cariuser['namalengkap'] ?? null;
        $_SESSION['log'] = "Logged" ?? null;
        header('location:index.php');
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="css/style.css">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SFC | Login</title>

    <!-- Style Form Login -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        body {
            background: #fff;
        }

        .container-form {
            animation: showUp 0.5s cubic-bezier(0.18, 1.3, 1, 1) forwards;
        }

        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #e91e63;
        }

        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #e91e63;
            box-shadow: none;
        }
    </style>
</head>

<body id="home" class="scrollspy">
    <!-- Navbar -->
    <div class="navbar-fixed">
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="login.php" class="green-text text-darken-4">Login</a></li>
            <li><a href="register.php" class="green-text text-darken-4">Register</a></li>
        </ul>
        <nav style="background-color: #ffff;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo page-scroll"><img src="img/ss/13.png" class="responsive-img" alt=""></a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger" style="color: #669966;"><i class="material-icons">dehaze</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">About Us</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Clients</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Services</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Portfolio</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Article</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">FAQ</a></li>
                        <li><a href="index.php" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Contact Us</a></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">See More<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Side Nav -->
    <ul class="sidenav" id="mobile-nav">
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif; ">About Us</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Clients</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Services</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Portfolio</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Article</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">FAQ</a></li>
        <li><a href="index.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Contact Us</a></li>
        <li><a href="login.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Login</a></li>
        <li><a href="register.php" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Register</a></li>
    </ul>

    <div class="section"></div>
    <main>
        <center>
            <div class="section"></div>
            <div class="section"></div>

            <div class="container-form">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; border-radius: 25px;">
                    <h5 style="color: #669966; font-family: 'Red Hat Display', cursive; font-weight: bold;">Please, login into your account!</h5>

                    <?php if (isset($error)) : ?>
                        <p style="color: red; font-style: italic; text-align: center; margin-top: 10px;">Login Failed</p>
                    <?php endif; ?>

                    <form class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' required />
                                <label for='email' style="font-family: 'Nunito', sans-serif;">Enter your email</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' required />
                                <label for='password' style="font-family: 'Nunito', sans-serif;">Enter your password</label>
                            </div>
                            <label style='float: right;'>
                                <a style="color: #669966;" href='#!' style="font-family: 'Nunito', sans-serif;"><b>Forgot Password?</b></a>
                            </label>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='login' class='col s12 btn btn-large waves-effect #66bb6a green lighten-1' style="border-radius: 25px; font-family: 'Nunito', sans-serif;">Login</button>
                            </div>
                        </center>
                    </form>
                    <div class="row">
                        <a href="register.php" style="color: #669966; font-family: 'Nunito', sans-serif;">Create Account</a>
                    </div>
                </div>
            </div>
        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>

    <footer>
        <div class="foot white-text center" style="font-family: 'Nunito', sans-serif; background-color: #669966;">Copyright&copy 2022 | SFC <br>
            Powered by <a href="https://www.svcc.io/" target="_blink" style="font-family: 'Nunito', sans-serif; color: white;">SVCC</a>
        </div>
    </footer>

    <!--JavaScript at end of body for optimized loading-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/be2c06ee43.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>