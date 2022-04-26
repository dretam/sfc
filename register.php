<?php
session_start();
if (!isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};

include 'dbconnect.php';

if (isset($_POST['adduser'])) {
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $notelp = $_POST['notelp'];
    $institusi = $_POST['institusi'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = "insert into login (namalengkap, email, password, notelp, institusi, pekerjaan) values('$namalengkap','$email','$password','$notelp','$institusi','$pekerjaan')";
    $sql = mysqli_query($conn, $query); // eksekusi atau jalankan query dari variabel $query

    if ($sql) {
        echo "<div class='teal lighten-2 white-text text-white center'>
        Your account has been registered! Let's login into our website!
        </div>
        <meta http-equiv='refresh' content='2; URL=login.php'>";
    } else {
        // jika gagal, lakukan:
        echo "<div class='red white-text text-white center'>
        Your account has been registered! Let's login into our website!
        </div>
        <meta http-equiv='refresh' content='2; URL=register.php'>";
    }
};

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
    <title>SFC | Register</title>

    <!-- Style Form Register -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .container-form {
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: auto;
            margin-right: auto;
            background: white;
            padding: 20px 25px;
            /* border: 5px solid #669966; */
            width: 550px;
            height: auto;
            box-sizing: border-box;
            position: relative;
            border-radius: 25px;
        }

        .col.s6>.btn {
            width: 100%;
        }

        .container-form {
            animation: showUp 0.5s cubic-bezier(0.18, 1.3, 1, 1) forwards;
        }

        @keyframes showUp {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        .row {
            margin-bottom: 10px;
        }

        .ngl {
            position: absolute;
            top: -20px;
            right: -20px;
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

    <div class="container-form z-depth-1 grey lighten-4">
        <h5 style="color: #669966; text-align: center; font-family: 'Red Hat Display', cursive; font-weight: bold;">Register your account!</h5>
        <br>
        <div class="row">
            <form class="col s12" id="reg-form" action="register.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="namalengkap" name="namalengkap" type="text" class="validate" required>
                        <label for="namalengkap" style="font-family: 'Nunito', sans-serif;">Full Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="institusi" name="institusi" type="text" class="validate" required>
                        <label for="institusi" style="font-family: 'Nunito', sans-serif;">Institution</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="pekerjaan" name="pekerjaan" type="text" class="validate" required>
                        <label for="pekerjaan" style="font-family: 'Nunito', sans-serif;">Occupation</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="notelp" name="notelp" type="text" class="validate" required maxlength="15">
                        <label for="notelp" style="font-family: 'Nunito', sans-serif;">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m12 s12">
                        <input id="email" name="email" type="email" class="validate" required>
                        <label for="email" style="font-family: 'Nunito', sans-serif;">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m12 s12">
                        <input id="password" name="password" type="password" class="validate" minlength="6" required>
                        <label for="password" style="font-family: 'Nunito', sans-serif;">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 m4">
                    </div>

                    <div class="input-field col s4 m4">
                        <button class="btn btn-large btn-register waves-effect waves-light #66bb6a green lighten-1" type="submit" name="adduser" style="font-family: 'Nunito', sans-serif;">Register
                        </button>
                    </div>

                    <div class="input-field col s4 m4">
                    </div>
                </div>
            </form>
        </div>
        <a href="login.php" title="Login" class="ngl btn-floating btn-large waves-effect waves-light red"><i class="material-icons">input</i></a>
    </div>

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