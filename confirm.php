<?php
include 'koneksi.php';
$noHP = $_GET['noHP'];
$tglPesanan=date('Y/m/d');

session_start();
$dari=$_SESSION['dari'];
$tujuan=$_SESSION['tujuan'];
$biaya=$_SESSION['biaya'];
$noHPPemesan=$_SESSION['noHPPemesan'];

$sql = "INSERT INTO pesanan (tglPesanan,dari,tujuan,biaya,pemesan,driver) VALUES ('$tglPesanan','$dari','$tujuan','$biaya','$noHPPemesan','$noHP')"; 
	$q = $koneksi->query($sql);
	if($q==TRUE){
		echo "Simpan Data Sukses";
		header("location:menu.html");
	}else{
		echo "".$koneksi->error;
	}
?>