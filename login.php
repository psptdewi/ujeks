<?php
include 'koneksi.php';
$noHP = $_POST['noHP'];
$pwd = md5($_POST['pwd']);
$login    = mysqli_query($koneksi, "select * from user where noHP='$noHP' and pwd='$pwd'");
$result   = mysqli_num_rows($login);
if($result>0){
    $user = mysqli_fetch_array($login);
    session_start();
    $_SESSION['noHPPemesan'] = $user['noHP'];
    $_SESSION['role'] = $user['role'];
    if ($user['role']=="User") {
	    header("location:menu.html");
    }
    elseif ($user['role']=="Driver") {
    	header("location:index.html");
    }
}else{
	?>
	<html>
	<script type="text/javascript">
		alert('No Hp atau Password tidak sesuai. Silahkan diulang kembali!');
    document.location='indexlogin.html';
	</script>
	</html>
	<?php
}?>