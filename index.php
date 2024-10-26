<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
		include 'koneksi.php';
			
		session_start();
			
		if($_SESSION['status'] !="login"){
				header("location:login/index.php");
		}
	?>

	<div class="container">
		<h1>Selamat Datang!</h1>
		<div class="welcome-message">
			<?php 
					echo "Hai, Selamat Datang <b>" . $_SESSION['name'] . "</b>";
				?>
		</div>
		<div class="nav-links">
			<a href="pencarian/index.php">Cari Film</a>
			<a href="daftar/index.php">Daftar Film</a>
			<a href="logout.php" style="background-color: #dc3545;">Keluar</a>
		</div>
	</div>
</body>
</html>