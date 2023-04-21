<div class="container">
	<div class="row">
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white offset-3">
			<h2 class="text-center text-success">Tambah</h2>
			<hr>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Jumlah</label>
					<input type="number" name="jumlah_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Harga</label>
					<input type="number" name="harga_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Kolam</label>
					<input type="number" name="kolam_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Karung</label>
					<input type="number" name="karung_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Foto</label>
					<input type="file" name="foto_produk" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php  
if (isset($_POST['tambah'])) 
{
	$nama_produk = $_POST['nama_produk'];
	$jumlah_produk = $_POST['jumlah_produk'];
	$harga_produk = $_POST['harga_produk'];
	$kolam_produk = $_POST['kolam_produk'];
	$karung_produk = $_POST['karung_produk'];

	$foto_name = $_FILES['foto_produk']['name'];
	$foto_tmp = $_FILES['foto_produk']['tmp_name'];
	move_uploaded_file($foto_tmp, "produk/foto/$foto_name");

	// echo "$harga_total_produk";

	$connection->query("INSERT INTO produk (nama_produk,jumlah_produk,harga_produk,kolam_produk,karung_produk,foto_produk) VALUES ('$nama_produk','$jumlah_produk','$harga_produk','$kolam_produk','$karung_produk','$foto_name')");

	echo "<script>location='index.php?page=produk'</script>";
}
?>