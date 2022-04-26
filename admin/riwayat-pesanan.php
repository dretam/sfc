<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
    header('location:login-admin.php');
} else if ($_SESSION['role'] != 'Admin') {
    header('location:../error.php');
} else {
};

date_default_timezone_set("Asia/Jakarta");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Order History - SFC</title>
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

        <?php include 'navbar.php'; ?>

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
                                    <h2>Riwayat Pesanan</h2>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="display" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>ID Pesanan</th>
                                                <th hidden>ID Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Tanggal Order</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $brgs = mysqli_query($conn, "SELECT * from cart ORDER BY idcart ASC");
                                            $no = 1;
                                            while ($p = mysqli_fetch_array($brgs)) {
                                            ?>
                                                <tr style="text-align: center;">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><strong><a href="order.php?orderid=<?php echo $p['orderid'] ?>">#<?php echo $p['orderid'] ?></a></strong></td>
                                                    <td hidden><?php echo $p['userid']; ?></td>
                                                    <td>
                                                        <?php
                                                        $dord = $p['orderid'];
                                                        $ambilinfo = mysqli_query($conn, "select * from konfirmasi where orderid='$dord'");
                                                        while ($tarik = mysqli_fetch_array($ambilinfo)) {
                                                            echo $namarek = $tarik['namarek'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $dord = $p['orderid'];
                                                        $ambilinfo = mysqli_query($conn, "select * from konfirmasi where orderid='$dord'");
                                                        while ($tarik = mysqli_fetch_array($ambilinfo)) {
                                                            echo $met = $tarik['payment'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $dord = $p['orderid'];
                                                        $ambilinfo = mysqli_query($conn, "select * from konfirmasi where orderid='$dord'");
                                                        while ($tarik = mysqli_fetch_array($ambilinfo)) {
                                                            echo $tglb = $tarik['tglbayar'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $p['tglorder']; ?></td>
                                                    <td>
                                                        Rp <?php
                                                            $dord = $p['orderid'];
                                                            $result1 = mysqli_query($conn, "SELECT SUM(d.qty*l.hargaafter) AS count FROM detailorder d, layanan l where orderid='$dord' and d.idlayanan=l.idlayanan order by d.idlayanan ASC");
                                                            $cekrow = mysqli_num_rows($result1);
                                                            $row1 = mysqli_fetch_assoc($result1);
                                                            $count = $row1['count'];
                                                            if ($cekrow > 0) {
                                                                echo number_format($count);
                                                            } else {
                                                                echo 'No data';
                                                            } ?>
                                                    </td>
                                                    <td><?php echo $p['status']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <th colspan="7" style="text-align:right">Total:</th>
                                                <th colspan="2" style="text-align:left">Rp <?php
                                                                                            $result1 = mysqli_query($conn, "SELECT SUM(d.qty*l.hargaafter) AS count FROM detailorder d, layanan l where orderid and d.idlayanan=l.idlayanan order by d.idlayanan ASC");
                                                                                            $cekrow = mysqli_num_rows($result1);
                                                                                            $row1 = mysqli_fetch_assoc($result1);
                                                                                            $count = $row1['count'];
                                                                                            if ($cekrow > 0) {
                                                                                                echo number_format($count);
                                                                                            } else {
                                                                                                echo 'No data';
                                                                                            } ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

    <?php include 'footer.php'; ?>

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