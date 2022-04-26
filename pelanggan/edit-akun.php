<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
	header('location:../login.php');
} else if ($_SESSION['role'] != 'Member') {
    header('location:../error.php');
} else {
};

function update($data){
	global $conn;
	//ambil data dari tiap elemen dalam form & pengaman
	$uid = $_SESSION['id'];
	
	$nama = htmlspecialchars($data["namalengkap"]);
	$email = htmlspecialchars($data["email"]);
	$password = password_hash($data["password"], PASSWORD_DEFAULT);
	$notelp = htmlspecialchars($data["notelp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	
	//query ubah data
	$query = "UPDATE login SET
				namalengkap = '$nama', 
				email = '$email',
				password = '$password',
				notelp = '$notelp',
				alamat = '$alamat'
			WHERE userid = $uid
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

$uid = $_SESSION['id'];
$info = mysqli_query($conn, "select * from login where userid='$uid'");
$p = mysqli_fetch_array($info);

if (isset($_POST["submit"])) {
	if (update($_POST) > 0) {
		echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'info_akun.php';
            </script>";
	} else {
		echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'info_akun.php';
            </script>";
	}
}

date_default_timezone_set("Asia/Jakarta");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Akun - SERCOB</title>
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
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                        <li><a href="index.php"><i class="ti-home"></i><span>Home</span></a></li>
                        <li><a href="../index.php"><i class="ti-dashboard"></i><span>Kembali ke Halaman Awal</span></a></li>
                        <li class="active">        
                            <a href="info_akun.php"><i class="ti-panel"></i><span>Kelola Akun</span></a>
                        </li>
                        <li>        
                            <a href="diskusi.php"><i class="ti-comments"></i><span>Panel Diskusi</span></a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="ti-share-alt"></i><span>Logout</span></a>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
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
                                            <!--
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
                                            //
                                            -->
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
            <h2>Edit Akun User</h2>
            <br>
            <form action="" method="post">
            <div class="form-group" >
                <label for="exampleFormControlInput6">Foto Profil</label>
                <img src="../images/<?php echo $p['gambar']; ?>" width="40" style="margin-bottom: 2px"><br>
                <input name="" type="" class="form-control" value="<?php echo $p['gambar'] ?>" style="width: 345px" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $p['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="buat password baru" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Nama</label>
                <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="nama" value="<?php echo $p['namalengkap']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput4">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat anda" value="<?php echo $p['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput5">No. Telepon</label>
                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="nomor telepon anda" value="<?php echo $p['notelp']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
        <p>© 2021 SERCOB. All Rights Reserved</p>
        </div>
    </footer>
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