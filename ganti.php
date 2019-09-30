<?php
include 'koneksi.php';
$pwdlama = md5($_POST['pwdlama']);
$pwdbaru = md5($_POST['pwdbaru']);
session_start();
$noHP=$_SESSION['noHPPemesan'];

$sql = "SELECT * FROM user WHERE noHP='$noHP' AND pwd='$pwdlama'";
    $q = $koneksi->query($sql);
    
    if($q->num_rows > 0){
        $sql1 = "UPDATE user SET pwd='$pwdbaru' WHERE noHP='$noHP'";
        $q1 = $koneksi->query($sql1);
        header("location:indexlogin.html");
    }else{
?>
	<html>
	<script type="text/javascript">
		alert('Password tidak sesuai. Silahkan diulang kembali!');
    document.location='akun.php';
	</script>
	</html>
	<?php
}?>