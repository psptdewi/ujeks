<?php 
include "koneksi.php"; 

$sql = "CREATE TABLE pesanan ( 
IDPesanan int(13) PRIMARY KEY AUTO_INCREMENT, 
tglPesanan date,
dari varchar(100) NOT NULL, 
tujuan varchar(100) NOT NULL,
biaya int(100) NOT NULL, 
pemesan varchar(13) NOT NULL,
driver varchar(13) NOT NULL
)"; 
$q = $koneksi->query($sql); 
if ($q === TRUE){ 
 echo "Tabel Pesanan sukses dibuat."; 
}else{ 
 echo "Gagal membuat tabel. ".$koneksi->error; 
} 
$koneksi->close(); 
?>