<?php

include "koneksi.php";

$sql = "CREATE DATABASE ujeks";
$q = $koneksi->query($sql);
if ($q== TRUE){
	echo "Basisdata 'ujeks' sukses dibuat";
}else{
	echo "Gagal membuat basis data 'ujeks'.".$koneksi->error;
}
$koneksi->close();
?>