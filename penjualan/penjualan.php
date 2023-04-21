<?php  
$jual = array();
$ambil = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk");

while ($takes = $ambil->fetch_assoc()) 
{
	$jual[] = $takes;
}

$tampil_penjualan = array();
if (isset($_POST['mulai'])) 
{
	$mulai = $_POST['mulai'];
	$selesai = $_POST['selesai'];
	$ambil_penjualan = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk WHERE tgl_penjualan BETWEEN '$mulai' AND '$selesai'");
}
else
{
	$mulai = '';
	$selesai = '';
	$ambil_penjualan = $connection->query("SELECT * FROM penjualan");
}

while ($detail_penjualan = $ambil_penjualan->fetch_assoc()) 
{
	$tampil_penjualan[] = $detail_penjualan;
}

// echo "<pre>";
// print_r($jual);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<h2 class="text-center text-success mt-5">Penjualan</h2>
		<hr>
		<div class="col-md-4 mt-4">
			<form method="post">
				<label>Mulai</label>
				<input type="date" name="mulai" class="form-control">
			</div>
			<div class="col-md-4 mt-4">
				<label>Selesai</label>
				<input type="date" name="selesai" class="form-control">
			</div>
			<div class="col-md-4 mt-5">
				<button class="btn btn-primary">FILTER</button>
			</div>
		</form>
	</div>

	<div class="row">
		<div class="col shadow rounded bg-white mt-3">
			<table class="table table-bordered table-striped table-hover mt-3">
				<thead class="text-center">
					<th>No</th>
					<th>Nama / Ukuran</th>
					<th>Kolam</th>
					<th>Jumlah</th>
					<th>Harga @</th>
					<th>Harga Total</th>
					<th>Tanggal</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<a href="index.php?page=tambah_penjualan" class="btn btn-outline-info">+ Tambah</a>
					<?php $total = 0 ?>
					<?php foreach ($jual as $key => $value): ?>
						<?php $total_seluruh = $total+=$value['harga_total_penjualan']; ?>
						<tr class="text-center">
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_produk']; ?></td>
							<td><?php echo $value['kolam_produk']; ?></td>
							<td><?php echo $value['jumlah_penjualan']; ?></td>
							<td><?php echo "Rp. " . number_format($value['harga_produk']); ?></td>
							<td><?php echo "Rp " . number_format($value['harga_total_penjualan']); ?></td>
							<td><?php echo date("l, d M Y", strtotime($value['tgl_penjualan'])); ?></td>	
							<td>
								<a href="index.php?page=edit_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-primary">Edit</a>
								<a href="index.php?page=hapus_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr class="text-center">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Total</td>
						<td><b><?php echo "Rp. " . number_format($total_seluruh); ?></b></td>
					</tr>
				</tfoot>
			</div>
		</div>
	</div>