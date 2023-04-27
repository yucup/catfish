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
<div class="container bg-white rounded p-5 shadow my-5 border-top border-primary border-5">
	<div class="row">
			<h6>Laporan Penjualan</h6>
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
				<div class="col-md-4 mt-2">
					<button class="btn btn-primary">FILTER</button>
			</form>
				</div>
		</div>
	<div class="row">
		<div class="col-md-12 mt-2">
			<a href="index.php?page=tambah_penjualan" class="btn btn-outline-primary">+ Tambah</a>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<th>No</th>
					<th>nama produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Harga Total</th>
					<th>tgl penjualan</th>
					<th>opsi</th>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					<?php foreach ($tampil_penjualan as $key => $value): ?>
						<?php $hasil = $total+=$value['harga_total_penjualan']; ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_produk"]; ?></td>
							<td><?php echo $value['jumlah_penjualan']; ?></td>
							<td><?php echo "Rp. " . $value['harga_penjualan']; ?></td>
							<td><?php echo "Rp. " . number_format($value['harga_total_penjualan']); ?></td>
							<td><?php echo $value['tgl_penjualan']; ?></td>
							<td>
								<a href="index.php?page=edit_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-warning">Edit</a>
								<a href="index.php?page=hapus_penjualan&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Total</td>
						<td><?php echo "Rp. " . number_format($hasil); ?></td>
					</tr>
				</tfoot>
			</table>
			<a href="penjualan/laporan.php" target="_blank" class="btn btn-primary">Laporan</a>
		</div>
	</div>
</div>
</div>