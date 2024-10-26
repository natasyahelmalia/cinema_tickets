<?php 
include '../koneksi.php';

session_start();

if($_SESSION['status'] != "login"){
	header("location:login/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pencarian Film</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Form Pencarian</h2>
		<form action="index.php" method="get" class="search-form">
			<label for="cari">Cari :</label>
			<input type="text" name="cari" id="cari" placeholder="Masukkan judul film">
			<input type="submit" value="Cari">
		</form>

		<?php 
		if (isset($_GET['cari']) && !empty($_GET['cari'])) {
			$cari = $_GET['cari'];
			echo "<p class='search-result'>Hasil pencarian dari kata <b>".$cari."</b></p>";
		}
		?>

		<table class="film-table">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Film</th>
					<th>Durasi</th>
					<th>Kategori Film</th>
				</tr>
		</thead>
		<tbody>
				<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($con,"SELECT * FROM film WHERE judul_film LIKE '%".$cari."%'");				
				} else {
					$data = mysqli_query($con,"SELECT * FROM film");		
				}

				$no = 1;
				while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['judul_film']; ?></td>
					<td><?php echo $d['durasi']; ?></td>
					<td><?php echo $d['kategori_film']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<a href="../" class="back-button">Kembali</a>
	</div>
</body>
</html>