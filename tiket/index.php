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
				$data = mysqli_query($con, "SELECT * FROM film");				
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
			<form action="pesan_tiket.php" method="get">
				<label for="tanggal">Pilih Tanggal:</label>
				<input type="date" id="tanggal" name="tanggal" required>
				<br><br>
				<a href="../" class="btn back-button">Kembali</a>
				<input type="submit" class="btn" value="Lanjut">
			</form>
		</div>
	</div>
</body>
</html>