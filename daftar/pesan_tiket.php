<?php 
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pesan Tiket</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style_pesan.css">
</head>
<body>
	<div class="container">
		<h2>Pesan Tiket</h2>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Film</th>
					<th>Studio</th>
					<th>Jam Tayang</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$query_mysql = mysqli_query($con, "SELECT film.judul_film, jadwal.id_jadwal, jadwal.id_studio, jadwal.jam_tayang 
																					FROM film 
																					JOIN jadwal ON film.id_film = jadwal.id_film") 
																					or die(mysqli_error($con));
				$nomor = 1;
				while ($data = mysqli_fetch_array($query_mysql)) {
				?>
				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo htmlspecialchars($data['judul_film']); ?></td>
					<td><?php echo htmlspecialchars($data['id_studio']); ?></td>
					<td><a class="link-detail" href="detail_tiket.php?id_jadwal=<?php echo $data['id_jadwal']; ?>"><?php echo htmlspecialchars($data['jam_tayang']); ?></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="navigation">
				<a href="index.php" class="btn">Kembali</a>
		</div>
	</div>
</body>
</html>