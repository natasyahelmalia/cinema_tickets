<?php 
include "../koneksi.php";

$id_jadwal = $_GET['id_jadwal'];
$jml_tiket = $_GET['jumlah_tiket'];
$harga = $_GET['harga'];
$tanggal = $_GET['tanggal'];

$query_jadwal = mysqli_query($con, "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'") or die(mysqli_error($con));
$data_jadwal = mysqli_fetch_array($query_jadwal);

$id_film = $data_jadwal['id_film'];
$id_studio = $data_jadwal['id_studio'];

$query_film = mysqli_query($con, "SELECT judul_film FROM film WHERE id_film='$id_film'") or die(mysqli_error($con));
$data_film = mysqli_fetch_array($query_film);

mysqli_query($con, "INSERT INTO tiket (id_jadwal, tanggal, jml_kursi, harga) VALUES ('$id_jadwal', '$tanggal', '$jml_tiket', '$harga')");

$query_tiket = mysqli_query($con, "SELECT * FROM tiket ORDER BY id_tiket DESC LIMIT 1") or die(mysqli_error($con));
$data_tiket = mysqli_fetch_array($query_tiket);
$id_tiket = $data_tiket['id_tiket'];

$query_studio = mysqli_query($con, "SELECT jumlah_kursi FROM studio WHERE id='$id_studio'") or die(mysqli_error($con));
$data_studio = mysqli_fetch_array($query_studio);

$jumlah_kursi_tersedia = intval($data_studio['jumlah_kursi']);
$kursi_baru = $jumlah_kursi_tersedia - $jml_tiket;

if ($kursi_baru >= 0) {
	mysqli_query($con, "UPDATE studio SET jumlah_kursi='$kursi_baru' WHERE id='$id_studio'") or die(mysqli_error($con));
} else {
	echo "<script>alert('Jumlah tiket melebihi jumlah kursi tersedia!'); window.location.href = 'detail_tiket.php?id_jadwal=$id_jadwal';</script>";
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak Tiket</title>
	<link rel="stylesheet" href="style_cetak.css">
</head>
<body>
	<div class="container">
		<h2>Cetak Tiket</h2>
		<div id="printableArea">
			<table class="table">
				<tr>
					<td>Nomor Tiket</td>
					<td><?php echo htmlspecialchars($id_tiket); ?></td>
				</tr>
				<tr>
					<td>Studio</td>
					<td><?php echo htmlspecialchars($id_studio); ?></td>
				</tr>    
				<tr>
					<td>Jam Tayang</td>
					<td><?php echo htmlspecialchars($data_jadwal['jam_tayang']); ?></td>
				</tr>    
				<tr>
					<td>Film</td>
					<td><?php echo htmlspecialchars($data_film['judul_film']); ?></td>
				</tr>    
				<tr>
					<td>Jumlah Tiket</td>
					<td><?php echo htmlspecialchars($jml_tiket), ' Tiket'; ?></td>
				</tr>    
				<tr>
					<td>Total Bayar</td>
					<td><?php echo "Rp ", htmlspecialchars($harga); ?></td>
				</tr>    
				<tr>
					<td>Tanggal</td>
					<td><?php echo htmlspecialchars($tanggal); ?></td>
				</tr>    
			</table>
		</div>
		<div class="button-container">
				<a href="../index.php" class="btn">Halaman Utama</a>
		</div>
	</div>
</body>
</html>