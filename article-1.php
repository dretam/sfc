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
    <title>SFC | Article 1</title>
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
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Mengenal Flora Endemik Pulau Sumatera yang Mengagumkan</h3>
            <div class="">
                <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"></h5>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">Banyak dari kita yang masih belum mengetahui keanekaragaman flora di Indonesia, khususnya di Pulau Sumatera. Berdasarkan hasil survey yang sudah dilakukan, dari 169 responden hanya 26% yang paham dan mengetahui mengenai flora di Pulau Sumatera. Pentingnya mengenal macam-macam flora adalah agar kita bisa lebih menjaga dan melestarikannya supaya flora khas Indonesia tidak punah. Sebelum kita mengenal macam-macam flora di Pulau Sumatera, mari kita mengenal apa itu flora. Flora adalah segala jenis tumbuhan atau tanaman yang ada di muka bumi. Lantas, apa saja sih macam-macam flora yang ada di Pulau Sumatera?
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">Pada tahun 2018 portal resmi Indonesia menyebutkan setidaknya sebanyak 10% atau lebih dari 25.000 jenis flora yang ada di dunia terdapat di Indonesia. Pada Pulau Sumatera sendiri terdapat kurang lebih 8.931 jenis flora, dengan jumlah flora endemik sebanyak 1.891. Di antara banyaknya jenis flora yang ada di Pulau Sumatera, ada jenis flora yang sudah sangat langka bahkan hampir punah.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Berikut ini beberapa contoh flora endemik Pulau Sumatera yang mengagumkan.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">
                    1. Padma Raksasa
                </p>
                <center><img src="img/artikel/11.jpg"></center>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Padma raksasa yang memiliki nama latin Rafflesia arnoldii merupakan tumbuhan parasit obligat yang populer disebabkan karena mempunyai bunga yang memiliki ukuran sangat besar, bahkan dikategorikan sebagai bunga paling besar di dunia.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Bunga raksasa ini pertama kali ditemukan di hutan tropis Bengkulu yang berada di pulau Sumatera pada tahun 1818 di suatu tempat yang lokasinya dekat dengan Sungai Manna, Lubuk Tapi, Kabupaten Bengkulu Selatan.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Asal mula pemberian nama bunga Rafflesia arnoldii ini didasarkan dari paduan nama antara Thomas Stamford Raffles yang merupakan pemimpin ekspedisi dan juga Dr. Joseph Arnold sebagai seseorang yang menemukan bunga tersebut untuk pertama kalinya.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Tumbuhan ini endemik di Pulau Sumatra, khususnya bagian selatan seperti Bengkulu, Jambi dan juga Sumatra Selatan. Taman Nasional Kerinci Seblat adalah wilayah konservasi utama bagi spesies ini. Jenis ini, bersama dengan anggota genus Rafflesia lainnya, terancam statusnya karena penebangan hutan secara liar yang semakin tidak terkendali.
                </p>
            </div>
            <div class="">
                <p class="light justify" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">
                    2. Bunga Bangkai Raksasa
                </p>
                <center><img src="img/artikel/12.jpg" width="220"></center>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Kibut atau bunga bangkai raksasa yang memiliki nama latin Amorphophallus titanum adalah tumbuhan dari suku talas-talasan (Araceae) yang termasuk flora atau tumbuhan endemik dari Sumatra yang terkenal sebagai tumbuhan dengan bunga (majemuk) paling besar di dunia, walaupun catatan mengatakan jika kerabatnya, A. gigas bisa menghasilkan bunga yang tingginya dapat mencapai 5 meter.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Kibut yang terkenal dengan sebutan bunga bangkai karena bunganya yang mengeluarkan bau yang tidak sedap seperti halnya bau bangkai yang telah membusuk, berguna mengundang kumbang dan juga lalat untuk menyerbuki bunganya.
                </p>
            </div>
            <div class="">
                <p class="light justify" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">
                    3. Tusam Sumatera
                </p>
                <center><img src="img/artikel/13.jpg" width="220"></center>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Pohon Pinus merkusii Jungh. et de Vriese adalah jenis pinus yang tumbuh asli di daerah Indonesia yang pertama kali ditemukan dengan nama Tusam di wilayah Sipirok, Tapanuli Selatan oleh seseorang pakar botani dari Jerman yang bernama Dr. F. R. Junghuhn.
                </p>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Tidak hanya termasuk ke dalam jenis tanaman cepat tumbuh atau fast growing species, jenis pinus ini adalah jenis pinus yang tidak membutuhkan kriteria tempat tumbuh yang khusus sehingga sangat gampang untuk dibudidayakan bahkan pada tempat yang kering, tumbuhan ini juga dapat bertahan hidup.
                </p>
            </div>
            <div class="">
                <p class="light justify" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">
                    4. Cempaka Wangi
                </p>
                <center><img src="img/artikel/14.jpg"></center>
                <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">
                    Cempaka wangi yang memiliki nama latin Magnolia champaca merupakan pohon hijau abadi besar yang bunga putih mapun kuningnya terkenal dijadikan sebagai sumber wewangian. Bunga ini bijinya terbungkus oleh salut biji yang sangat disenangi burung-burung. Cempaka wangi merupakan flora atau tumbuhan yang menjadi identitas dan tanaman khas bagi Provinsi Aceh tentunta, yang disana terkenal dengan nama Bungöng Jeumpa Gadéng.
                </p>
            </div>
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