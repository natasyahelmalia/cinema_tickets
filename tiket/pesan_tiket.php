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
					<th>Tanggal</th>
					<th>Harga Tiket</th>
					<th>Jam Tayang</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$tanggal = $_GET['tanggal'];
				$query_mysql = mysqli_query($con, "SELECT film.judul_film, jadwal.id_jadwal, jadwal.id_studio, harga.harga, jadwal.jam_tayang 
																					FROM film 
																					INNER JOIN jadwal ON film.id_film = jadwal.id_film
																					INNER JOIN harga ON film.kategori_film = harga.kategori") 
																					or die(mysqli_error($con));
				$nomor = 1;
				while ($data = mysqli_fetch_array($query_mysql)) {
					$harga = $data['harga'];

					$dayOfWeek = date('N', strtotime($tanggal));
					if ($dayOfWeek == 6 || $dayOfWeek == 7) {
						$harga += 10000;
					}
				?>
				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo htmlspecialchars($data['judul_film']); ?></td>
					<td><?php echo htmlspecialchars($data['id_studio']); ?></td>
					<td><?php echo htmlspecialchars($tanggal); ?></td>
					<td><?php echo "Rp " . number_format($harga); ?></td>
					<td>
						<a class="link-detail" href="#" onclick="navigateToDetail(<?php echo $data['id_jadwal']; ?>, '<?php echo $tanggal; ?>', '<?php echo number_format($harga); ?>')">
						<?php echo htmlspecialchars($data['jam_tayang']); ?>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<tr>
			<td>Jumlah Tiket yang Dipesan	: </td>
			<td><input name="jmltiket" type="number" id="jumlahtiket" required min="1" placeholder="Masukkan Jumlah Tiket"></td>
		</tr>
		<div class="navigation">
			<a href="index.php" class="btn">Kembali</a>
		</div>
	</div>

	<script>
	function navigateToDetail(id_jadwal, tanggal, harga) {
		const jumlahTiket = document.getElementById('jumlahtiket').value;

		if (!jumlahTiket || jumlahTiket <= 0) {
			alert("Jumlah tiket harus lebih dari 0 dan tidak boleh kosong!");
			return;
		}

		window.location.href = "detail_tiket.php?id_jadwal=" + id_jadwal + "&tanggal=" + encodeURIComponent(tanggal) + "&harga=" + encodeURIComponent(harga) + "&jumlah_tiket=" + jumlahTiket;
	}
	</script>
</body>
</html>