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
	</html>

<?php

	include 'koneksi.php';
	$dari = $_POST['dari'];
	$tujuan = $_POST['tujuan'];
	session_start();
    $noHPPemesan=$_SESSION['noHPPemesan'];
    $_SESSION['dari']=$dari;
    $_SESSION['tujuan']=$tujuan;


/* the neighbors array */
$neighbors['Universitas Islam Indonesia'] = array('Gajebo' => 6, 'Penyetan Mas Kobis' => 12, 'Apotek UII' => 10, 'Chicken Hits' => 8);
$neighbors['Gajebo'] = array('Universitas Islam Indonesia' => 6);
$neighbors['Penyetan Mas Kobis'] = array('Universitas Islam Indonesia' => 12, 'Apotek UII' => 4, 'Waroeng Steak' => 4);
$neighbors['Waroeng Steak'] = array('Penyetan Mas Kobis' => 4);
$neighbors['Apotek UII'] = array('Universitas Islam Indonesia' => 10, 'Penyetan Mas Kobis' => 4);
$neighbors['Chicken Hits'] = array('Universitas Islam Indonesia' => 8);

function dijkstra($neighbors, $start) {
  $closest = $start;
  while (isset($closest)) {
    $marked[$closest] = 1;
    /* loop through each neighbor for this $closest node and 
     * and store the distance and route in an array */
    foreach ($neighbors[$closest] as $vertex => $distance) {
      /* if we already have the route and distance, skip */
      if (isset($marked[$vertex]))
        continue;
      /* distance from $closest to $vertex */
      $dist = (isset($paths[$closest][0]) ? $paths[$closest][0] : 0) + $distance;
      /* if we dont have a path to $vertex yet, create it. 
       * If this distance is shorter, override the existing one */

      if (!isset($paths[$vertex]) || ($dist < $paths[$vertex][0])) {

        $paths[$vertex][] = $closest;
        $paths[$vertex][0] = $dist;
      }
	  
    }
    unset($closest);
    /* Find the next node we should create a path for */
    foreach ($paths as $vertex => $path) {
      if (isset($marked[$vertex]))
        continue;
      $distance = $path[0];
      if ((!isset($min) || $distance < $min) || !isset($closest)) {
        $min = $distance;
        $closest = $vertex;
      }
	  
    }
  }
  return $paths;
}

//untuk titik awal pencarian rute
$point=$dari;

//untuk memanggil fungsi 
$paths = dijkstra($neighbors, $point);

$jarakterdekat=$paths[$tujuan][0];
$biaya = 2500*$jarakterdekat;
?>

<html>
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
						<li class="cta"><a href="pesanojek2.php">Batalkan Pesanan</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	</div>

	<div class="fh5co-cta text-left" style="color: black; font-size: 20px; margin-top: -70px; margin-left: 250px;">
		<table>
			<tr>
				<td width="1000px">Lokasi Anda</td>
				<td width="1000px">Tujuan Anda</td>
			</tr>
			<tr>
				<td><b>
					<?php echo $dari;?>
				</b></td>
				<td><b>
					<?php echo $tujuan;?>
				</b></td>
			</tr>
			<tr>
				<td width="1000px"><br>Jarak Terdekat</td>
				<td width="1000px"><br>Biaya</td>
			</tr>
			<tr>
				<td><b>
					<?php echo $jarakterdekat;?>
				 km</b></td>
				<td><b>Rp.
					<?php echo $biaya;
					$_SESSION['biaya']=$biaya;
					?>
				</b></td>

			</tr>
		</table>
	</div>
		<div class="fh5co-cta text-left" style="color: black; font-size: 18px; margin-top: -260px; margin-left: 250px; margin-right: 200px;">
		<br>Pilih Driver
		</html>
		<?php
		$sql1 = "SELECT * FROM user WHERE noHP='$noHPPemesan'";
		$q1 = $koneksi->query($sql1);
		if($q1->num_rows > 0){
			while($baris1=$q1->fetch_array()){
				$JK= $baris1['JK'];
			}
		}
		$sql = "SELECT * FROM user WHERE role='Driver' AND JK='$JK'";
		$q = $koneksi->query($sql);
		echo "<table class='table-bordered table-condensed text-center' style='font-size: 15px;'>
		<tr align='center' style='background-color: #abd9e8'>
		<th width='40px' class='text-center'>No</th><th width='400px' class='text-center'>Nama Driver</th><th width='250px' class='text-center'>No HP</th><th class='text-center'>Action</th>
		</tr>";
		$no = 0;
		if($q->num_rows > 0){
			while($baris=$q->fetch_assoc()){
                $no++ ;
				$nama = $baris["nama"];
				$noHP = $baris["noHP"];
				echo "<tr><td>$no</td>";
				echo "<td>$nama</td>";
				echo "<td>$noHP</td>";
				echo "<td><a href='confirm.php?noHP=$noHP' class='btn' style='background-color: #5bc0de;'>Pilih Driver</a></td></tr>";
			}
			echo "</table>";
		}else{
			echo "Data Tidak Ditemukan";
		}
		$koneksi->close();
		?>
		<html>
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

	</body>
</html>