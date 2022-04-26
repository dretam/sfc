<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="css/style.css">

    <style>
        @media only screen and (min-width: 993px) {
            .navbar-fixed .container {
                width: 75% !important;
            }
        }
    </style>

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
    <title>SFC | Article 3</title>
</head>

<body id="home" class="scrollspy">

    <!-- Navbar -->
    <div class="navbar-fixed">
        <ul id="dropdown1" class="dropdown-content">
            <?php

            if (!isset($_SESSION['log'])) {
                echo '
            <li><a href="login.php" class="green-text text-darken-4">Login</a></li>
            <li><a href="register.php" class="green-text text-darken-4">Register</a></li>
            ';
            } else if ($_SESSION['role'] == 'Member') {
                echo '
            <li><a href="pelanggan/index.php" class="green-text text-darken-4">Customer Panel</a></li>
            <li><a href="logout.php" class="green-text text-darken-4">Logout</a></li>
            ';
            } else {
                header('location:logout.php');
            }

            ?>

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

                        <?php
                        $sesi_nama = $_SESSION["name"] ?? null;
                        if (!isset($_SESSION['log'])) {
                            echo '
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1" style="font-family: Red Hat Display, sans-serif; font-weight: bold; color: #669966; word-wrap: break-word; max-width: 240px;">See More<i class="material-icons right">arrow_drop_down</i></a></li>
                        ';
                        } else if ($_SESSION['role'] == 'Member') {
                            echo '
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1" style="font-family: Red Hat Display, sans-serif; font-weight: bold; color: #669966; word-wrap: break-word; max-width: 240px;">Halo, ' . strtok($sesi_nama, " ") . '<i class="material-icons right">arrow_drop_down</i></a></li>
                        ';
                        } else {
                            header('location:logout.php');
                        }

                        ?>


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

        <?php
        $sesi_nama = $_SESSION["name"] ?? null;
        if (!isset($_SESSION['log'])) {
            echo '
        <li><a href="login.php" class="page-scroll green-text text-darken-4" style="font-family: Red Hat Display, sans-serif;">Login</a></li>
        <li><a href="register.php" class="page-scroll green-text text-darken-4" style="font-family: Red Hat Display, sans-serif;">Register</a></li>
        ';
        } else if ($_SESSION['role'] == 'Member') {
            echo '
        <li><a href="pelanggan/index.php" class="page-scroll green-text text-darken-4" style="font-family: Red Hat Display, sans-serif;">Customer Panel</a></li>
        ';
        } else {
            header('location:logout.php');
        }

        ?>
    </ul>

    <div class="container">
        <div class="row">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Makin Asyik, Eksplorasi Keindahan Pesona Flora Sumatera dengan SFC</h3>
            <div class="">
                <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"></h5>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">Keindahan pesona flora Sumatera memberikan ketertarikan bagi masyarakat Sumatera dan penikmat flora untuk dapat mengenali dan menikmati pesonanya. Berdasarkan survey yang dilakukan, Terdapat 40,2% dari 169 responden tertarik untuk mempelajari flora di Sumatera bahkan 23,7% menyatakan sangat tertarik.
                </p>
                <center><img src="img/artikel/lil.jpeg" width="60%"></center>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">Pada Keterbatasan waktu, jarak dan ekonomi seringkali menjadi penyebab masyarakat tidak dapat merasakan pesona flora yang ada. Saat ini, banyak masyarakat yang hanya mengetahui pesona sebuah flora melalui sebuah gambar yang terdapat dalam internet. Sebagai solusi untuk permasalahan ini, SFC yang didukung oleh SVCC ingin memberikan pengalaman dunia virtual yang terasa lebih nyata kepada masyarakat yang ingin mengetahui serta merasakan pesona flora di Sumatera.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Penyelenggaraan event dengan Webinar yang dapat dihadiri 6000+ peserta dengan dilengkapi berbagai fitur interaktif dan Gamifikasi yang membuat event flora Anda menjadi lebih menarik. Penyelenggaraan Pameran Virtual expo dapat menjadi pilihan bagi anda yang ingin menghadirkan pengalaman imersif bagi pengunjung. Pengunjung dapat merasakan pengalaman menghadiri pameran flora secara nyata meski hanya melalui layar virtual. Mari berikan pengalaman terbaik kepada pengunjung dengan ide pameran flora kreatif Anda bersama SFC.
                </p>
            </div>
        </div>
        <div class="row"></div>
    </div>
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