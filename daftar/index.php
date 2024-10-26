<?php 
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Film</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Film</h2>
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
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$data = mysqli_query($con, "SELECT * FROM film WHERE judul_film LIKE '%".$cari."%'");				
				} else {
					$data = mysqli_query($con, "SELECT * FROM film");		
				}
				
				$no = 1;
				while ($d = mysqli_fetch_array($data)) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo htmlspecialchars($d['judul_film']); ?></td>
					<td><?php echo htmlspecialchars($d['durasi']); ?> Menit</td>
					<td><?php echo htmlspecialchars($d['kategori_film']); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="navigation">
			<a href="../" class="back-button">Kembali</a>
			<a href="pesan_tiket.php" class="btn">Pesan Tiket</a>
		</div>
	</div>
</body>
</html>