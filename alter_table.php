<?php 
include "koneksi.php"; 
$sql = "ALTER TABLE pesanan 
ADD FOREIGN KEY (pemesan) REFERENCES user(noHP)"; 
$q = $koneksi->query($sql); 
if ($q === TRUE){ 
 echo "Tabel Pesanan sukses diubah. "; 
}else{ 
 echo "Gagal mengubah tabel. ".$koneksi->error; 
} 
$sql1 = "ALTER TABLE pesanan 
ADD FOREIGN KEY (driver) REFERENCES user(noHP)"; 
$q1 = $koneksi->query($sql1); 
if ($q1 === TRUE){ 
 echo "Tabel Pesanan1 sukses diubah. "; 
}else{ 
 echo "Gagal mengubah tabel. ".$koneksi->error; 
} 
$koneksi->close(); 
?>