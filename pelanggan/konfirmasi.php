<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
    header('location:../login.php');
} else if ($_SESSION['role'] != 'Member') {
    header('location:../error.php');
} else {
};

$idorder = $_GET['id'] ?? null;

date_default_timezone_set("Asia/Jakarta");
$timenow = date("Y-m-d H:i:s");

if (isset($_POST['confirm'])) {

    $userid = $_SESSION['id'];
    $veriforderid = mysqli_query($conn, "select * from cart where orderid='$idorder'");
    $fetch = mysqli_fetch_array($veriforderid);
    $liat = mysqli_num_rows($veriforderid);

    if ($fetch > 0) {
        $nama = $_POST['nama'];
        $metode = $_POST['metode'];
        $tanggal = $_POST['tanggal'];

        $kon = mysqli_query($conn, "insert into konfirmasi (orderid, userid, payment, namarek, tglbayar) 
		values('$idorder','$userid','$metode','$nama','$tanggal')");
        if ($kon) {

            $up = mysqli_query($conn, "update cart set status='Confirmed' where orderid='$idorder'");

            echo " <div class='alert alert-success'>
			Terima kasih telah melakukan konfirmasi pembayaran, tim kami akan melakukan verifikasi!
		  </div>
		<meta http-equiv='refresh' content='2; url= daftarorder.php'/>  ";
        } else {
            echo "<div class='alert alert-warning'>
			Gagal submit, silakan ulangi lagi!
		  </div>
		 <meta http-equiv='refresh' content='2; url= konfirmasi.php'/> ";
        }
    } else {
        echo "<div class='alert alert-danger'>
			Kode order tidak ditemukan, harap masukkan kembali dengan benar!
		  </div>
		 <meta http-equiv='refresh' content='2; url= konfirmasi.php'/> ";
    }
};

date_default_timezone_set("Asia/Jakarta");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Konfirmasi Pembayaran - SFC</title>
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

            <div class="container pt--50 pb--50">
                <h2>Konfirmasi Pembayaran</h2>
                <br>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kode Order</label>
                                <input type="text" name="orderid" value="<?php echo $idorder ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Atas Nama</label>
                                <input type="text" name="nama" placeholder="Nama Pembayar" value="<?php echo $_SESSION['name']; ?>" class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Metode Pembayaran</label>
                                <select name="metode" class="form-control">

                                    <?php
                                    $metode = mysqli_query($conn, "select * from pembayaran");

                                    while ($a = mysqli_fetch_array($metode)) {
                                    ?>
                                        <option value="<?php echo $a['metode'] ?>"><?php echo $a['metode'] ?> | <?php echo $a['norek'] ?></option>
                                    <?php
                                    };
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput4">Tanggal Bayar</label>
                                <input type="text" class="form-control" name="tanggal" value="<?php echo $timenow; ?>" required readonly>
                            </div>
                            <button type="submit" name="confirm" class="btn btn-primary mb">Submit</button>
                            <a href="index.php"><button class="btn btn-danger">Cancel</button></a>
                        </form>
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