<?php 
include "koneksi.php"; 
$sql= "CREATE TABLE user(
noHP int(13) PRIMARY KEY, 
pwd varchar(50) NOT NULL, 
nama varchar(150) NOT NULL, 
JK enum('Pria','Wanita'),
role enum('User','Driver')
)";

$q = $koneksi->query($sql); 
if ($q === TRUE){ 
 echo "Tabel User sukses dibuat."; 
}else{ 
 echo "Gagal membuat tabel. ".$koneksi->error; 
} 
$koneksi->close(); 
?>