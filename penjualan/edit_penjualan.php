<?php 
$id_penjualan = $_GET['id'];
$ambil_penjualan = $connection->query("SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");

$penjualan = $ambil_penjualan->fetch_assoc();

$produk = array();
$takes = $connection->query("SELECT * FROM produk");
while ($ambil = $takes->fetch_assoc()) 
{
	$produk[] = $ambil;
}

// echo "<pre>";
// print_r($produk);
// echo "</pre>";
?>
<div class="container">
	<div class="row">
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white offset-3">
			<h2 class="text-center text-success">Edit</h2>
			<hr>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<select class="form-control" name="id_produk">
						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value['id_produk']; ?>" <?php 
							if ($value['id_produk']==$penjualan['id_produk']) 
							{
								echo "selected";
							}
						?>><?php echo $value['nama_produk']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		<div class="mb-3">
			<label class="form-label">Kg</label>
			<input type="number" name="jumlah_penjualan" value="<?php echo $penjualan['jumlah_penjualan'];?>" class="form-control">
		</div>
		<div class="mb-3">
			<label class="form-label">Harga</label>
			<input type="number" name="harga_penjualan" value="<?php echo $penjualan['harga_penjualan']; ?>" class="form-control">
		</div>
		<button class="btn btn-primary" name="edit" type="submit">Edit</button>
	</form>
</div>
</div>
</div>
<?php  
if (isset($_POST['edit'])) 
{
	$id_produk = $_POST['id_produk'];
	$jumlah_penjualan = $_POST['jumlah_penjualan'];
	$harga_penjualan = $_POST['harga_penjualan'];
	$harga_total_penjualan = $jumlah_penjualan * $harga_penjualan;

	$connection->query("UPDATE penjualan SET id_produk = '$id_produk',
		jumlah_penjualan = '$jumlah_penjualan',
		harga_penjualan = '$harga_penjualan',
		harga_total_penjualan = '$harga_total_penjualan' WHERE id_penjualan = '$id_penjualan'");


	echo "<script>location='index.php?page=penjualan'</script>";
}
?>