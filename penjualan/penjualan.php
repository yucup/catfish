<?php  

$tampil_penjualan = array();
if (isset($_POST['mulai'])) 
{
	$mulai = $_POST['mulai'];
	$selesai = $_POST['selesai'];

	$ambil_penjualan = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON penjualan.id_produk = produk.id_produk WHERE tgl_penjualan BETWEEN '$mulai' AND '$selesai' ");
}
else
{
	$mulai = '';
	$selesai = '';
	$ambil_penjualan = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON penjualan.id_produk = produk.id_produk");
}

while ($detail_penjualan = $ambil_penjualan->fetch_assoc()) 
{
	$tampil_penjualan[] = $detail_penjualan;
}
?>
<div class=" container">
	<div class="row mt-5">
		<h2 class="text-center text-success">Laporan Penjualan</h2>
		<hr>
		<div class="col-md-4">
			<form method="post">
				<label>Mulai</label>
				<input type="date" name="mulai" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Selesai</label>
				<input type="date" name="selesai" class="form-control">
			</div>
			<div class="col-md-4 mt-4">
				<button class="btn btn-primary">FILTER</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 my-5">
			<a href="index.php?page=tambah_penjualan" class="btn btn-outline-primary">+ Tambah</a>
			<a href="penjualan/laporan.php" target="_blank" class="btn btn-outline-info">Cetak Laporan</a>
			<table class="table table-bordered table-striped table-hover my-3">
				<thead class="text-center">
					<th>No</th>
					<th>nama produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Harga Total</th>
					<th>tgl penjualan</th>
					<th>opsi</th>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					<?php $total_kilo = 0 ?>
					<?php foreach ($tampil_penjualan as $key => $value): ?>
						<?php $hasil = $total+=$value['harga_total_penjualan']; ?>
						<?php $hasil_kilo = $total_kilo += $value['jumlah_penjualan']; ?>
						<tr class="text-center">
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_produk"]; ?></td>
							<td><?php echo "Rp. " . $value['harga_penjualan']; ?></td>
							<td><?php echo "Kg " . $value['jumlah_penjualan']; ?></td>
							<td><?php echo "Rp. " . number_format($value['harga_total_penjualan']); ?></td>
							<td><?php echo date("l, d M Y", strtotime($value['tgl_penjualan'])); ?></td>
							<td>
								<a href="index.php?page=edit_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-warning">Edit</a>
								<a href="index.php?page=hapus_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr class="text-center">
						<td></td>
						<td></td>
						<th>Total</th>
						<th><?php echo "Kg " . $hasil_kilo; ?></th>
						<th>
							<?php if (empty($hasil)) 
							{
								echo "0";
							} else
							{
								echo "Rp. " . number_format($hasil);
							} ?>
						</th>
						<td></td>
						<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>