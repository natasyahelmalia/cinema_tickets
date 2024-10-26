<?php
include '../koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($con,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);
 
if( $cek > 0 ) {
	session_start();
	$_SESSION['name'] = $data['name'];
	$_SESSION['status'] = "login";
	header("location:../index.php");
} else {
	echo
	"<script type='text/javascript'>
		alert('Username atau Password yang anda masukan salah!');
		window.location.href='index.php';
	</script>";
}

?>