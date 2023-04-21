<?php  
$edit_produk = $_GET['id'];
$ambil_produk = $connection->query("SELECT * FROM produk WHERE id_produk = '$edit_produk' ");
$edit = $ambil_produk->fetch_assoc();
?>
<div class="container">
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-3">
			<h2 class="text-center text-success">Edit <?php echo $edit['nama_produk']; ?></h2>
			<hr>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama_produk" class="form-control" value="<?php echo $edit['nama_produk']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Jumlah</label>
					<input type="text" name="jumlah_produk" class="form-control" value="<?php echo $edit['jumlah_produk']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Harga</label>
					<input type="number" name="harga_produk" class="form-control" value="<?php echo $edit['harga_produk']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Kolam</label>
					<input type="text" name="kolam_produk" class="form-control" value="<?php echo $edit['kolam_produk']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Karung</label>
					<input type="text" name="karung_produk" class="form-control" value="<?php echo $edit['kolam_produk']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Foto</label>
					<input type="file" name="karung_produk" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit" name="edit">Edit</button>
			</form>
		</div>
		<div class="col-md-5 p-5 my-5">
			<img src="produk/foto/<?php echo $edit['foto_produk']; ?>" width="400">
		</div>
	</div>
</div>
<?php
if (isset($_POST['edit'])) 
{
	$nama_produk = $_POST['nama_produk'];
	$jumlah_produk = $_POST['jumlah_produk'];
	$harga_produk = $_POST['harga_produk'];
	$kolam_produk = $_POST['kolam_produk'];
	$karung_produk = $_POST['karung_produk'];

	$foto_name = $_FILES['foto_produk']['name'];
	$foto_tmp = $_FILES['foto_produk']['tmp_name'];
	move_uploaded_file($foto_tmp, "produk/foto/$foto_name");

	if (empty($foto_name)) 
	{
		$connection->query("UPDATE produk SET nama_produk = '$nama_produk',
			jumlah_produk = '$jumlah_produk',
			harga_produk = '$harga_produk',
			kolam_produk = '$kolam_produk',
			karung_produk = '$karung_produk' WHERE id_produk = '$edit_produk' ");
	}
	else
	{
		$connection->query("UPDATE produk SET nama_produk = '$nama_produk',
			jumlah_produk = '$jumlah_produk',
			harga_produk = '$harga_produk',
			kolam_produk = '$kolam_produk',
			karung_produk = '$karung_produk', 
			foto_produk = '$foto_name' WHERE id_produk = '$edit_produk' ");
		move_uploaded_file($foto_tmp, "produk/foto/$foto_name");
	}

	echo "<script>location='index.php?page=produk'</script>";
}
?>