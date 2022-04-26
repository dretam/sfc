<?php
session_start();
include '../dbconnect.php';

$idlayanan = $_GET['idlayanan'];

if (!isset($_SESSION['log'])) {
    header('location:../login.php');
} else if ($_SESSION['role'] != 'Member') {
    header('location:../error.php');
} else {
};

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['addlay'])) {
    if (!isset($_SESSION['log'])) {
        header('location:login.php');
    } else {
        $ui = $_SESSION['id'];
        $cek = mysqli_query($conn, "select * from cart where userid='$ui' and status='Menunggu Konfirmasi'");
        $liat = mysqli_num_rows($cek);
        $f = mysqli_fetch_array($cek);
        $orid = $f['orderid'] ?? null;

        //kalo ternyata udeh ada order id nya
        if ($liat > 0) {

            //cek pesanan serupa
            $cekpesanan = mysqli_query($conn, "select * from detailorder where idlayanan='$idlayanan' and orderid='$orid'");
            $liatlg = mysqli_num_rows($cekpesanan);
            $brpbanyak = mysqli_fetch_array($cekpesanan);
            $jmlh = $brpbanyak['qty'] ?? null;

            //kalo ternyata pesanannya sudah ada
            if ($liatlg > 0) {

                echo "<div class='alert alert-warning'>
								Gagal menambahkan pesanan, karena anda telah memesan layanan yang sama!
							  </div>
							  <meta http-equiv='refresh' content='1; url= service.php?idlayanan=" . $idlayanan . "'/>";
            } else {
                $ml = mysqli_query($conn, "SELECT * from login where userid='$ui' AND role='Member'");
                $m = mysqli_fetch_array($ml);
                $tambahdata = mysqli_query($conn, "insert into detailorder (orderid,idlayanan,qty) values('$orid','$idlayanan','1')");
                if ($tambahdata) {
                    echo " <div class='alert alert-success'>
								Berhasil menambahkan pesanan!
							  </div>
							<meta http-equiv='refresh' content='1; url= cart.php'/>  ";
                } else {
                    echo "<div class='alert alert-warning'>
								Gagal menambahkan pesanan, karena anda telah memesan layanan yang sama!
							  </div>
							 <meta http-equiv='refresh' content='1; url= service.php?idlayanan=" . $idlayanan . "'/> ";
                }
            };
        } else {

            //kalo belom ada order id nya
            $oi = crypt(rand(22, 999), time());

            $bikincart = mysqli_query($conn, "insert into cart (orderid, userid) values('$oi','$ui')");

            if ($bikincart) {
                $tambahuser = mysqli_query($conn, "insert into detailorder (orderid,idlayanan,qty) values('$oi','$idlayanan','1')");
                if ($tambahuser) {
                    echo " <div class='alert alert-success'>
								Berhasil menambahkan pesanan!
							  </div>
							<meta http-equiv='refresh' content='1; url= cart.php'/>  ";
                } else {
                    echo "<div class='alert alert-warning'>
								Gagal menambahkan pesanan, karena anda telah memesan layanan yang sama!
							  </div>
							 <meta http-equiv='refresh' content='1; url= service.php?idlayanan=" . $idlayanan . "'/> ";
                }
            } else {
                echo "<div class='alert alert-danger'>
                Gagal membuat pesanan!
                </div>
                <meta http-equiv='refresh' content='1; url= service.php?idlayanan=" . $idlayanan . "'/> ";
            }
        }
    }
};

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Layanan - SFC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
    <link rel="manifest" href="../icon/site.webmanifest">
    <!-- //icon -->

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        /* Services */
        @media (min-width: 768px) {
            .col-md-8 {
                max-width: 100% !important;
            }
        }

        .agileinfo_single_left {
            padding: 2em;
            box-shadow: 0px 0px 5px #b2afaf;
            margin-right: 50px;
        }

        .agileinfo_single_left {
            float: left;
            width: 40%;
        }

        .agileinfo_single_left {
            padding: 1em;
        }

        .agileinfo_single_left {
            width: 100%;
            margin-bottom: 2em;
            padding: 3em 4em;
        }

        .agileinfo_single_left {
            padding: 2em 2em;
        }

        .agileinfo_single_left {
            padding: 1em 1em;
        }

        .agileinfo_single_right {
            padding-left: 5em;
        }

        .agileinfo_single_right_snipcart {
            margin: 0 0 2em;
        }

        .w3agile_description h2 {
            color: #212121;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .w3agile_description h4 {
            font-size: 1em;
            color: #212121;
            text-transform: uppercase;
        }

        .w3agile_description p {
            font-size: 14px;
            color: #999;
            line-height: 2em;
            width: 100%;
            padding-right: 10px;
            margin-bottom: 5px;
        }

        .w3agile_description {
            margin: 2em 0;
        }

        .w3agile_description p {
            font-size: 14px;
            width: 100%;
        }

        .w3agile_description h4 {
            font-size: 0.875em;
        }

        .w3agile_description {
            margin: 1em 0;
        }

        .w3agile_description p {
            font-size: 13px;
        }

        /* Shine */
        .hover14 figure {
            position: relative;
        }

        .hover14 figure::before {
            position: absolute;
            top: 0;
            left: -40%;
            z-index: 2;
            display: block;
            content: '';
            width: 50%;
            height: 100%;
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
            -webkit-transform: skewX(-25deg);
            transform: skewX(-25deg);
        }

        .hover14 figure:hover::before,
        .top_brand_left:hover .hover14 figure::before {
            -webkit-animation: shine .75s;
            animation: shine .75s;
        }

        @-webkit-keyframes shine {
            100% {
                left: 125%;
            }
        }

        @keyframes shine {
            100% {
                left: 125%;
            }
        }
    </style>

    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->

        <?php include "header.php"; ?>

        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->


            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>Layanan yang Anda Pilih</h2>
                                </div>
                                <br>
                                <?php
                                $p = mysqli_fetch_array(mysqli_query($conn, "Select * from layanan where idlayanan='$idlayanan'"));
                                ?>
                                <div class="services">
                                    <div class="col-md-4 agileinfo_single_left">
                                        <img id="example" src="../<?= $p['gambar']; ?>" alt=" " class="img-responsive">
                                    </div>
                                    <div class="col-md-8 agileinfo_single_right">
                                        <div class="w3agile_description">
                                            <h2><?= $p['namalayanan']; ?></h2>
                                            <br>
                                            <h5>Deskripsi</h5>
                                            <p><?= $p['deskripsi']; ?></p>
                                            <br>
                                            <h5><del>Rp <?= number_format($p['hargabefore']); ?></del></h5>
                                            <h5>Rp <?= number_format($p['hargaafter']); ?></h5>
                                            <br>
                                            <form action="#" method="post">
                                                <input type="hidden" name="idlayanan" value="<?php echo $idlayanan ?>">
                                                <input type="submit" name="addlay" value="Order" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->

    <?php include "footer.php"; ?>

    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

    <!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>


</body>

</html>