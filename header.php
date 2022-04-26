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
                <a href="#home" class="brand-logo page-scroll"><img src="img/ss/13.png" class="responsive-img" alt=""></a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger" style="color: #669966;"><i class="material-icons">dehaze</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#about" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">About Us</a></li>
                    <li><a href="#clients" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Clients</a></li>
                    <li><a href="#services" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Services</a></li>
                    <li><a href="#portfolio" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Portfolio</a></li>
                    <li><a href="#article" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Article</a></li>
                    <li><a href="#faq" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">FAQ</a></li>
                    <li><a href="#contact" class="page-scroll" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold; color: #669966;">Contact Us</a></li>

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
    <li><a href="#about" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif; ">About Us</a></li>
    <li><a href="#clients" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Clients</a></li>
    <li><a href="#services" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Services</a></li>
    <li><a href="#portfolio" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Portfolio</a></li>
    <li><a href="#article" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Article</a></li>
    <li><a href="#faq" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">FAQ</a></li>
    <li><a href="#contact" class="page-scroll green-text text-darken-4" style="font-family: 'Red Hat Display', sans-serif;">Contact Us</a></li>

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