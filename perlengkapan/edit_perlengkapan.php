<?php  
$edit = $_GET['id'];
$edit_perlengkapan = $connection->query("SELECT * FROM perlengkapan WHERE id_perlengkapan = '$edit'");

$takes = $edit_perlengkapan->fetch_assoc();

// echo "<pre>";
// print_r($takes);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-5 p-5 my-5 shadow rounded bg-white">
			<h2 class="text-center text-success">Edit <?php echo $takes['nama_perlengkapan']; ?></h2>
			<hr>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama_perlengkapan" class="form-control" value="<?php echo $takes['nama_perlengkapan']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Jumlah</label>
					<input type="number" name="jumlah_perlengkapan" class="form-control" value="<?php echo $takes['jumlah_perlengkapan']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Harga @</label>
					<input type="number" name="harga_perlengkapan" class="form-control" value="<?php echo $takes['harga_perlengkapan']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Tanggal</label>
					<input type="date" name="tgl_perlengkapan" class="form-control" value="<?php echo $takes['tgl_perlengkapan']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Foto</label>
					<input type="file" name="foto_perlengkapan" class="form-control">
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" type="submit" name="edit">Edit</button>
				</div>
			</div>
			<div class="col-md-5">
				<img src="perlengkapan/foto/<?php echo $takes['foto_perlengkapan']; ?>" width=500>
			</div>
		</form>
	</div>
</div>
<?php  
if (isset($_POST['edit'])) 
{
	$nama_perlengkapan = $_POST['nama_perlengkapan'];
	$jumlah_perlengkapan = $_POST['jumlah_perlengkapan'];
	$harga_perlengkapan = $_POST['harga_perlengkapan'];
	$harga_total_perlengkapan = $jumlah_perlengkapan * $harga_perlengkapan;
	$tgl_perlengkapan = $_POST['tgl_perlengkapan'];

	$foto_name = $_FILES['foto_perlengkapan']['name'];
	$foto_tmp = $_FILES['foto_perlengkapan']['tmp_name'];

	if (empty($foto_name)) 
	{
		$connection->query("UPDATE perlengkapan SET nama_perlengkapan = '$nama_perlengkapan',
			jumlah_perlengkapan = '$jumlah_perlengkapan',
			harga_perlengkapan = '$harga_perlengkapan',
			harga_total_perlengkapan = '$harga_total_perlengkapan',
			tgl_perlengkapan = '$tgl_perlengkapan' WHERE id_perlengkapan = '$edit' ");
	}
	else
	{
		$connection->query("UPDATE perlengkapan SET nama_perlengkapan = '$nama_perlengkapan',
			jumlah_perlengkapan = '$jumlah_perlengkapan',
			harga_perlengkapan = '$harga_perlengkapan',
			harga_total_perlengkapan = '$harga_total_perlengkapan',
			tgl_perlengkapan = '$tgl_perlengkapan',
			foto_perlengkapan = '$foto_name' WHERE id_perlengkapan = '$edit' ");
		move_uploaded_file($foto_tmp, "perlengkapan/foto/$foto_name");
	}

	echo "<script>location='index.php?page=perlengkapan'</script>";
}
?>