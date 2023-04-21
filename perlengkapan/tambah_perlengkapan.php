<div class="container">
	<div class="row">
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white offset-3">
			<h2 class="text-center text-success">Tambah</h2>
			<hr>
			<form method="post" enctype="multipart/form-data">
				<label class="form-label">Nama</label>
				<input type="text" name="nama_perlengkapan" class="form-control">
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_perlengkapan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Harga @</label>
					<input type="number" name="harga_perlengkapan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="date" name="tgl_perlengkapan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Foto</label>
					<input type="file" name="foto_perlengkapan" class="form-control">
				</div>
				<div class="mb-3">
					<button class="btn btn-outline-primary" name="tambah" type="submit">Tambah</button>
				</div>
			</form>		
		</div>
	</div>
</div>
<?php  
if (isset($_POST['tambah'])) 
{
	$nama_perlengkapan = $_POST['nama_perlengkapan'];
	$jumlah_perlengkapan = $_POST['jumlah_perlengkapan'];
	$harga_perlengkapan = $_POST['harga_perlengkapan'];
	$harga_total_perlengkapan = $jumlah_perlengkapan * $harga_perlengkapan;
	$tgl_perlengkapan = $_POST['tgl_perlengkapan'];

	$foto_name = $_FILES['foto_perlengkapan']['name'];
	$foto_tmp = $_FILES['foto_perlengkapan']['tmp_name'];
	move_uploaded_file($foto_tmp, "perlengkapan/foto/$foto_name");

	$connection->query("INSERT INTO perlengkapan (nama_perlengkapan,jumlah_perlengkapan,harga_perlengkapan,harga_total_perlengkapan,tgl_perlengkapan,foto_perlengkapan) VALUES ('$nama_perlengkapan','$jumlah_perlengkapan','$harga_perlengkapan','$harga_total_perlengkapan','$tgl_perlengkapan','$foto_name')");

	echo "<script>location='index.php?page=perlengkapan'</script>";
}
?>