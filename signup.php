<?php

	include 'koneksi.php';
	
	$noHP = trim($_POST['noHP']);
	$pwd = md5($_POST['pwd']);
	$nama = trim($_POST['nama']); 
	$JK = trim($_POST['JK']); 
	$role = trim($_POST['role']); 

	$sql = "INSERT INTO user (noHP,pwd,nama,JK,role) VALUES ('$noHP','$pwd','$nama','$JK','$role')"; 
	$q = $koneksi->query($sql);
	if($q==TRUE){
		echo "";
	}else{
		echo "".$koneksi->error;
	}
	 header("location: indexlogin.html");
?>