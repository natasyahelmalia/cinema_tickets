<?php 
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Tiket</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style_detail.css">
</head>
<body>
	<div class="container">
		<h2 style='text-align: center; color: #333;'>Detail Tiket</h2>

		<?php 
		$id_jadwal = $_GET['id_jadwal'];
		$tanggal = $_GET['tanggal'];
		$harga = $_GET['harga'];
		$harga = floatval(str_replace(['Rp ', ','], '', $harga));
		$jml_tiket = intval($_GET['jumlah_tiket']);
		$harga = $harga * $jml_tiket;
		if ($harga >= 150000) {
			$harga *= 0.9;
		}
		$query_mysql = mysqli_query($con, "SELECT DISTINCT j.*, s.jumlah_kursi FROM jadwal j INNER JOIN studio s ON j.id_studio = s.id WHERE id_jadwal='$id_jadwal'") or die(mysqli_error($con));
		$data = mysqli_fetch_array($query_mysql);

		$id_film = $data['id_film'];
		$query_mysql2 = mysqli_query($con, "SELECT * FROM film WHERE id_film='$id_film'") or die(mysqli_error($con));
		$data2 = mysqli_fetch_array($query_mysql2);
		?>

		<form action="cetak_tiket.php?id_jadwal=<?php echo $data['id_jadwal']; ?>&tanggal=<?php echo urlencode($tanggal); ?>&jumlah_tiket=<?php echo $jml_tiket; ?>&harga=<?php echo $harga; ?>" method="post" class="detail-form" onsubmit="return confirmSubmit()">
			<table class="table">
				<tr>
					<td>Film</td>
					<td><?php echo htmlspecialchars($data2['judul_film']); ?></td>
				</tr>	
				<tr>
					<td>Studio</td>
					<td><?php echo htmlspecialchars($data['id_studio']); ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td><?php echo htmlspecialchars($tanggal); ?></td>
				</tr>	
				<tr>
					<td>Total Bayar</td>
					<td><?php echo "Rp ", htmlspecialchars($harga); ?></td>
				</tr>
				<tr>
					<td>Jam Tayang</td>
					<td><?php echo htmlspecialchars($data['jam_tayang']); ?></td>
				</tr>	
				<tr>
					<td>Jumlah Kursi Tersedia</td>
					<td><?php echo htmlspecialchars($data['jumlah_kursi']); ?></td>
				</tr>
				<tr>
					<td>Jumlah Tiket</td>
					<td><?php echo htmlspecialchars($jml_tiket); ?></td>
				</tr>
				<tr class="form-actions">
					<td colspan="2">
						<div class="button-container">
							<a href="pesan_tiket.php" class="btn">Kembali</a>
							<input type="submit" value="Simpan" class="btn save-btn">
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

<script>
	function confirmSubmit() {
		return confirm("Apakah kamu yakin akan melanjutkan transaksi ini?");
	}
</script>

</html>