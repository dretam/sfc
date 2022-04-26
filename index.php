<?php
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $subject = "About SFC Services";

    $mail_header = "From:" . $name . "<" . $email . ">" . " <" . $phone . ">\r\n";

    $recipient = "suwarnadwipa.floracenter@gmail.com";

    mail($recipient, $subject, $message, $mail_header)
        or die("Error!");

    echo "<div class='teal lighten-2 white-text text-white center'>
            Mail sent! Thank you, $name! We will reply your mail ASAP!
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>";
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

    <style>
        @media only screen and (min-width: 993px) {
            .navbar-fixed .container {
                width: 75% !important;
            }
        }

        .services .container .row .col .card-panel {
            padding-bottom: 80px !important;
        }
    </style>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SFC | Company Profile</title>
</head>

<body id="home" class="scrollspy">

    <?php include 'header.php'; ?>

    <!-- Slider -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="img/ss/2.jpg">
                <div class="caption bottom-align" style="margin-top:30px;">
                    <h4 style="font-family: 'Shrikhand', cursive; font-weight: bold; color: #F5F5DC;">Suwarnadwipa Flora Center (SFC)</h4>
                    <h5 style="font-family: Lemon/Milk; color: #F5F5DC;">Enjoy The Green of Sumatera</h5>
                    <h6 style="font-family: 'Nunito', sans-serif; color: #F5F5DC;">Rasakan pesona puspa secara lebih nyata dalam teknologi virtual reality</h6>
                </div>
            </li>
            <li>
                <img src="img/ss/5.jpg">
                <div class="caption right-align" style="margin-top:30px;">
                    <h4 style="font-family: 'Shrikhand', cursive; font-weight: bold; color: #F5F5DC">Suwarnadwipa Flora Center (SFC)</h4>
                    <h5 style="font-family: Lemon/Milk; color: #F5F5DC">Enjoy The Green of Sumatera</h5>
                    <h6 style="font-family: 'Nunito', sans-serif; color: #F5F5DC">Rasakan pesona puspa secara lebih nyata dalam teknologi virtual reality</h6>
                </div>
            </li>
            <li>
                <img src="img/ss/4.jpg">
                <div class="caption center-align" style="margin-top:30px;">
                    <h4 style="font-family: 'Shrikhand', cursive; font-weight: bold; color: #F5F5DC">Suwarnadwipa Flora Center (SFC)</h4>
                    <h5 style="font-family: Lemon/Milk; color: #F5F5DC">Enjoy The Green of Sumatera</h5>
                    <h6 style="font-family: 'Nunito', sans-serif; color: #F5F5DC">Rasakan pesona puspa secara lebih nyata dalam teknologi virtual reality</h6>
                </div>
            </li>
        </ul>
    </div>

    <!-- About -->
    <div id="about" class="about scrollspy">
        <div class="container">
            <div class="row">
                <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">About Us</h3>
                <div class="col m6 s12">
                    <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">We Are Professionals</h5>
                    <p class="light justify" style="font-family: 'Nunito', sans-serif; color: #669966;">Suwarnadwipa Flora Center (SFC) merupakan platform virtual event yang didukung oleh SVCC Indonesia untuk membantu klien membuat event virtual dan hybrid dengan lebih nyata mulai dari konferensi, webinar hingga expo secara efektif dan efisien pada dunia puspa Sumatera.
                    </p>
                </div>
                <div class="col m6 s12 light">
                    <p style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">Virtual Event Organizing</p>
                    <div class="progress">
                        <div class="determinate" style="width: 90%"></div>
                    </div>
                    <p style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">Virtual Event Design</p>
                    <div class="progress">
                        <div class="determinate" style="width: 87%"></div>
                    </div>
                    <p style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">Webinar Organizing</p>
                    <div class="progress">
                        <div class="determinate" style="width: 85%"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m12 s12 center yt">
                    <iframe class="video" style="border-radius: 25px;" width="560" height="315" src="https://www.youtube.com/embed/2eFoInNP8G4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients -->
    <div id="clients" class="parallax-container scrollspy">
        <div class="parallax"><img src="img/ss/8.jpg"></div>

        <div class="container clients">
            <h3 class="teksC center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Our Clients</h3>
            <br>
            <div class="row">
                <div class="col m4 s12 center thumb">
                    <img src="img/clients/athon-official.png" alt="1" style="margin-top:15px;">
                </div>
                <div class="col m4 s12 center thumb">
                    <img src="img/clients/fina-official.png" alt="1" style="margin-top:15px;">
                </div>
                <div class="col m4 s12 center thumb">
                    <img src="img/clients/itdri.png" alt="1">
                </div>
            </div>
            <div class="row">
                <div class="col m3 s12 center">
                </div>
                <div class="col m3 s12 center thumb">
                    <img src="img/clients/bri.png" alt="1" style="margin-top:25px;">
                </div>
                <div class="col m3 s12 center thumb">
                    <img src="img/clients/itb.png" alt="1">
                </div>
                <div class="col m3 s12 center">
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
    <section id="services" class="services grey lighten-3 scrollspy">
        <div class="container">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Our Services</h3>
            <div class="row">
                <div class="col m6 s12 thumb">
                    <div class="card-panel center">
                        <i class="fa-solid fa-tv medium" style="color: #669966;"></i>
                        <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966; text-align: center;">Webinar</h5>
                        <p style="font-family: 'Nunito', sans-serif; color: #669966;">Hadirkan Webinar dengan jangkauan lebih dari 6000+ pengunjung yang dilengkapi berbagai fitur interaktif dan gamifikasi.</p>
                        <div class="col s3"></div>
                        <a href="https://demo.svcc.io/" target="_blank">
                            <button type='submit' class='col s6 btn btn-large waves-effect' style="border-radius: 25px; font-family: 'Nunito', sans-serif; background-color: #669966;">Go to Demo</button>
                        </a>
                        <div class="col s3"></div>
                    </div>
                </div>
                <div class="col m6 s12 thumb">
                    <div class="card-panel center">
                        <i class="fa-solid fa-vr-cardboard medium" style="color: #669966;"></i>
                        <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966; text-align: center;">Virtual Expo</h5>
                        <p style="font-family: 'Nunito', sans-serif; color: #669966;">Berikan pengalaman imersif pada pengunjung acara dengan desain 3D beresolusi hingga 4K, latar musik dan terintegrasi dengan media sosial.</p>
                        <div class="col s3"></div>
                        <a href="https://sfc-expo.000webhostapp.com/sfc-expo/" target="_blank">
                            <button class='col s6 btn btn-large waves-effect' style="border-radius: 25px; font-family: 'Nunito', sans-serif; background-color: #669966;">Go to Demo</button>
                        </a>
                        <div class="col s3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m12 s12 thumb" id="demo">
                    <center>
                        <iframe style="margin: auto;" width="853" height="480" src="https://www.artsteps.com/embed/624fb7b9ce9398fb2479cb7f/853/480" frameborder="0" allowfullscreen></iframe>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio scrollspy">
        <div class="container">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Portfolio</h3>
            <div class="row">
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/portfolio/7lil.png" alt="1.jpg">
                    <p class="center"><a href="https://fcc-itdri.id/" target="_blink" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">FINA (Festival Ikan Nusantara) 2021</a></p>
                    <div class="card-panel grey lighten-3 center">
                        <p class="center" style="font-family: 'Nunito', sans-serif; margin-top: -7px; margin-bottom: -7px; color: #669966;">FINA (Festival Ikan Nusantara) merupakan pameran virtual yang bertujuan mengedukasi masyarakat untuk mengoptimalkan potensi perikanan di Indonesia.</p>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/portfolio/11lil.png" alt="11lil.png" style="margin-bottom: 20px;">
                    <p class="center"><a href="https://demoday.thegreaterhub.id/expo" target="_blink" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">SBM ITB Demo Day</a></p>
                    <div class="card-panel grey lighten-3 center">
                        <p class="center" style="font-family: 'Nunito', sans-serif; color: #669966;">SBM ITB Demo Day merupakan pameran virtual yang menampilkan berbagai inovasi dari mahasiswa SBM ITB.</p>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/portfolio/10lilil.png" alt="10lilil.png" style="margin-bottom: 20px;">
                    <p class="center"><a href="https://fest.itdri.id/expo" target="_blink" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">ITDRI Fest</a></p>
                    <div class="card-panel grey lighten-3 center">
                        <p class="center" style="font-family: 'Nunito', sans-serif; color: #669966;">ITDRI Festival merupakan pagelaran virtual event yang menampilkan hasil karya inovasi talent digital ITDRI.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article -->
    <section id="article" class="article grey lighten-3 scrollspy">
        <div class="container">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Article</h3>
            <div class="row">
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/artikel/2.jpg" alt="bunga bangkai.jpg" style="margin-bottom: 20px;">
                    <p class="center"><a href="article-1.php" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">Mengenal Flora Endemik Pulau Sumatera yang Mengagumkan</a></p>
                    <div class="card-panel center">
                        <p class="center" style="font-family: 'Nunito', sans-serif; color: #669966;">Banyak dari kita yang masih belum mengetahui keanekaragaman flora di Indonesia, khususnya di Pulau Sumatera.</p>
                        <div class="Read">
                            <a href="article-1.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/artikel/7.jpg" alt="7.png" style="margin-bottom: 20px;">
                    <p class="center"><a href="article-2.php" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">Kerusakan Hutan Pulau Sumatera Sangat Merugikan</a></p>
                    <div class="card-panel center">
                        <p class="center" style="font-family: 'Nunito', sans-serif; color: #669966;">Keanekaragaman flora tersebar di berbagai wilayah Indonesia, salah satunya di Pulau Sumatera. Namun sangat disayangkan flora-flora tersebut sudah banyak yang langka bahkan punah.</p>
                        <div class="Read">
                            <a href="article-2.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img class="materialboxed responsive-img" src="img/artikel/sfcs.png" alt="sfcs.png" style="margin-bottom: 20px;">
                    <p class="center"><a href="article-3.php" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">Makin Asyik, Eksplorasi Keindahan Pesona Flora Sumatera dengan SFC</a></p>
                    <div class="card-panel center">
                        <p style="font-family: 'Nunito', sans-serif; color: #669966;">Keindahan pesona flora Sumatera memberikan ketertarikan bagi masyarakat Sumatera dan penikmat flora untuk dapat mengenali dan menikmati pesonanya.</p>
                        <div class="Read">
                            <a href="article-3.php">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="faq scrollspy">
        <div class="container">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Frequently Asked Questions (FAQ)</h3>
            <div class="row">
                <div class="col m1 s12"></div>
                <div class="col m10 s12 thumbnail">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"><i class="material-icons">quiz</i>Kenapa harus menggunakan virtual event?</div>
                            <div class="collapsible-body white" style="font-family: 'Nunito', sans-serif; color: #669966;"><span>Virtual event memiliki potensi luar biasa dalam meningkatkan keterlibatan audiens dan mempromosikan merek atau produk Anda. Dengan menggunakan virtual event SFC, Anda dapat menjangkau ribuan audiens dengan tampilan event yang menarik didukung dengan teknologi terkini. Nikmati beragam produk SFC dan rasakan banyak keuntungan dengan virtual event.</span></div>
                        </li>
                        <li>
                            <div class="collapsible-header" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"><i class="material-icons">quiz</i>Di mana saya dapat mengetahui pricing jika ingin menggunakan produk SFC?</div>
                            <div class="collapsible-body white" style="font-family: 'Nunito', sans-serif; color: #669966;"><span>Jika Anda ingin mengetahui rincian harga dari produk kami, silakan menghubungi kami di panel kontak yang tertera.</span></div>
                        </li>
                        <li>
                            <div class="collapsible-header" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"><i class="material-icons">quiz</i>Apakah layanan SFC dapat custom by request?</div>
                            <div class="collapsible-body white" style="font-family: 'Nunito', sans-serif; color: #669966;"><span>Untuk semua layanan seperti landing page dan virtual booth dapat dikustomisasikan sesuai kebutuhan dan keinginan konsumen.</span></div>
                        </li>
                        <li>
                            <div class="collapsible-header" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"><i class="material-icons">quiz</i>Apakah konsultasi yang saya lakukan akan dikenakan biaya?</div>
                            <div class="collapsible-body white" style="font-family: 'Nunito', sans-serif; color: #669966;"><span>Anda akan mendapatkan konsultasi secara gratis hanya pada pertemuan pertama. Konsultasi selanjutnya akan dikenakan biaya.</span></div>
                        </li>
                        <li>
                            <div class="collapsible-header" style="font-family: Lemon/Milk; font-weight: bold; color: #669966;"><i class="material-icons">quiz</i>Apakah saya bisa mendapatkan pelayanan secara offline/onsite? </div>
                            <div class="collapsible-body white" style="font-family: 'Nunito', sans-serif; color: #669966;"><span>SFC akan memberikan layanan untuk kebutuhan acara Anda secara offline atau onsite seperti penyediaan camera equipment, dll.</span></div>
                        </li>
                    </ul>
                </div>
                <div class="col m1 s12"></div>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact" class="contact grey lighten-3 scrollspy">
        <div class="container">
            <h3 class="center" style="font-family: 'Red Hat Display', cursive; font-weight: bold; color: #669966;">Contact Us</h3>
            <div class="row">
                <div class="col m5 s12 thumbnail">
                    <div class="card-panel center white-text" style="background-color: #669966;">
                        <i class="medium material-icons">call</i>
                        <h5 style="font-family: Lemon/Milk; font-weight: bold; text-align: center;">Contact</h5>
                        <p>You can contact us on <a href="https://wa.wizard.id/7e411b" target="_blink" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: white;">WhatsApp</a></p>
                    </div>
                    <ul class="collection with-header">
                        <li class="collection-header">
                            <h4 style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">Our Office</h4>
                        </li>
                        <li class="collection-item" style="font-family: 'Nunito', sans-serif; color: #669966;">SFC (Suwarnadwipa Flora Center)</li>
                        <li class="collection-item"><a href="https://goo.gl/maps/hqndzRQx48HYoJ5P6" target="_blink" style="font-family: 'Nunito', sans-serif; font-weight: bold; color: #669966;">Jl. Prof. HM. Yamin Sh No.2, Kesawan, Kec. Medan Bar., Kota Medan, Sumatera Utara 20236</a></li>
                        <li class="collection-item" style="font-family: 'Nunito', sans-serif; color: #669966;">North Sumatera, Indonesia</li>
                        <li class="collection-item">
                            <a href="https://www.instagram.com/suwarnadwipa.floracenter/" target="_blink"><i class="fa-brands fa-instagram" style="font-size:40px; color: #669966;"></i></a>
                            <a href="https://www.youtube.com/channel/UCLmiW7rqeyxKAmo_TSCQbZg" target="_blink"><i class="fa-brands fa-youtube" style="font-size:40px; margin-left: 10px; color: #669966;"></i></a>
                            <a href="https://www.linkedin.com/company/smarteye-id/" target="_blink"><i class="fa-brands fa-linkedin" style="font-size:40px; margin-left: 10px; color: #669966;"></i></a>
                            <a href="" target="_blink"><i class="fa-brands fa-tiktok" style="font-size:35px; margin-left: 10px; color: #669966;"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col m7 s12 thumbnail">
                    <form action="" method="post">
                        <div class="card-panel">
                            <h5 style="font-family: Lemon/Milk; font-weight: bold; color: #669966;">Please fill in this form!</h5>
                            <div class="input-field">
                                <input type="text" name="name" id="name" required class="validate">
                                <label for="name" style="font-family: 'Nunito', sans-serif; color: #669966;">Name</label>
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" id="email" class="validate" required>
                                <label for="email" style="font-family: 'Nunito', sans-serif; color: #669966;">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="phone" id="phone" required>
                                <label for="phone" style="font-family: 'Nunito', sans-serif; color: #669966;">Phone Number</label>
                            </div>
                            <div class="input-field">
                                <textarea name="message" id="message" class="materialize-textarea" required></textarea>
                                <label for="message" style="font-family: 'Nunito', sans-serif; color: #669966;">Message</label>
                            </div>
                            <button type="submit" name="submit" value="submit" class="btn" style="background-color: #669966;">Send</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </section>

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