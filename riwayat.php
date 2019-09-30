<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ujeks &mdash; Unisi Ojek Syar'i</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<?php

	include 'koneksi.php';
	session_start();
    $noHPPemesan=$_SESSION['noHPPemesan'];
    ?>
	<body>
	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><a href="index.html">Ujeks</a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="index2.html">Home</a></li>
						<li class="cta"><a href="menu.html">Menu Utama</a></li>
						<li class="cta"><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="fh5co-cta text-left" style="color: black; font-size: 18px; margin-top: -50px; margin-left: 180px; margin-right: 50px;">
		<table class="table-bordered table-condensed text-center" style="color: black; background-color: white; font-size: 15px;">
		<tr align="center" style="background-color: #abd9e8"><th width="10px" class="text-center">ID</th><th width="100px" class="text-center">Tanggal</th><th width="250px" class="text-center">Lokasi Asal</th><th width="250px" class="text-center">Tujuan</th><th width="50px" class="text-center">Biaya</th><th width="250px" class="text-center">Driver</th></tr>
		<?php

		$sql = "SELECT * FROM pesanan WHERE pemesan='$noHPPemesan'";
		$q = $koneksi->query($sql);
		if($q->num_rows > 0){
			while($baris=$q->fetch_assoc()){
				$ID = $baris['IDPesanan'];
				$tglPesanan = $baris['tglPesanan'];
				$dari = $baris['dari'];
				$tujuan = $baris['tujuan'];
				$biaya = $baris['biaya'];
				$driver = $baris['driver'];

				echo "<tr><td>$ID</td>";
				echo "<td>$tglPesanan</td>";
				echo "<td>$dari</td>";
				echo "<td>$tujuan</td>";
				echo "<td>Rp.$biaya</td>";
				$sql1 = "SELECT * FROM user WHERE noHP='$driver'";
				$q1 = $koneksi->query($sql1);
				if($q1->num_rows > 0){
				while($baris1=$q1->fetch_array()){
				$nmdriver= $baris1['nama'];
				echo "<td>$nmdriver</td></tr>";
				}
				}else{
				echo "Data Tidak Ditemukan";
			}
			}
		}else{
			echo "Data Tidak Ditemukan";
		}
		$koneksi->close();
		?>
	</table>
	</div>
	<div class="col-md-12 fh5co-copyright text-center">
				<p>Tim Sholehah<span>Copyright &copy; 2018</span></p>	
			</div>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

	</div>
</body>
</html>