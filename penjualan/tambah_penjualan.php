<?php  
$produk = array();
$ambil_produk = $connection->query("SELECT * FROM produk ORDER BY kolam_produk");
while ($takes_produk = $ambil_produk->fetch_assoc())
{
	$produk[] = $takes_produk;
}

// echo "<pre>";

?>

<div class="container">
	<div class="row">
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white">
			<h2 class="text-center text-danger">Table Harga</h2>
			<hr>
			<table class="table table-bordered table-striped text-center">
				<thead>
					<th>No</th>
					<th>Nama</th>
					<th>Kolam</th>
					<th>Harga @</th>
				</thead>
				<tbody>
					<?php foreach ($produk as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_produk']; ?></td>
							<td><?php echo $value['kolam_produk']; ?></td>
							<td><?php echo "Rp. " . $value['harga_produk']; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white">
			<h2 class="text-center text-success">Tambah Penjualan</h2>
			<hr>
			<form method="post">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<select class="form-control" name="id_produk">
						<option>-- Pilih Opsi --</option>
							<?php foreach ($produk as $key => $value): ?>
								<option value="<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?>
								</option>

							<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Jumlah</label>
					<input type="number" name="jumlah_penjualan" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Harga</label>
					<input type="number" class="form-control" name="harga_penjualan">
				</div>
				<div class="mb-3">
					<label class="form-label">Tanggal</label>
					<input type="date" name="tgl_penjualan" class="form-control">
				</div>
				<button class="btn btn-primary" name="tambah" type="submit">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php  
if (isset($_POST['tambah'])) 
{
	$id_produk = $_POST['id_produk'];
	$jumlah_penjualan = $_POST['jumlah_penjualan'];
	$harga_penjualan = $_POST['harga_penjualan'];
	$harga_total_penjualan = $jumlah_penjualan * $harga_penjualan;
	$tgl_penjualan = $_POST['tgl_penjualan'];

	$connection->query("INSERT INTO penjualan (id_produk,jumlah_penjualan,harga_penjualan,harga_total_penjualan,tgl_penjualan) VALUES ('$id_produk','$jumlah_penjualan','$harga_penjualan','$harga_total_penjualan','$tgl_penjualan')");

	echo "<script>location='index.php?page=penjualan'</script>";
}
?>