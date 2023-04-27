<?php  

$perlengkapan = array();
if (isset($_POST['mulai'])) 
{
	$mulai = $_POST['mulai'];
	$selesai = $_POST['selesai'];

	$ambil_perlengkapan = $connection->query("SELECT * FROM perlengkapan WHERE tgl_perlengkapan BETWEEN '$mulai' AND '$selesai' ");
}
else
{
	$mulai = '';
	$selesai = '';
	$ambil_perlengkapan = $connection->query("SELECT * FROM perlengkapan");
}

while ($detail_perlengkapan = $ambil_perlengkapan->fetch_assoc()) 
{
	$perlengkapan[] = $detail_perlengkapan;
}
?>

<div class="container">
	<div class="row mt-5">
		<h2 class="text-center text-success">Perlengkapan</h2>
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
		<div class="col shadow rounded bg-white mt-3">
			<a href="index.php?page=tambah_perlengkapan" class="btn btn-outline-primary">+ Tambah</a>
			<table class=" my-2 table table-bordered table-striped table-hover">
				<thead class="text-center">
					<th>No</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga @</th>
					<th>Harga Total</th>
					<th>Tanggal</th>
					<th>Foto</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					<?php foreach ($perlengkapan as $key => $value): ?>
						<?php $hasil = $total+=$value['harga_total_perlengkapan'] ?>
						<tr class="text-center">
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_perlengkapan']; ?></td>
							<td><?php echo $value['jumlah_perlengkapan']; ?></td>
							<td><?php echo "Rp " . number_format($value['harga_perlengkapan']); ?></td>
							<td><?php echo "Rp " . number_format($value['harga_total_perlengkapan']); ?></td>
							<td><?php echo date("l, d M Y", strtotime($value['tgl_perlengkapan'])); ?></td>
							<td><?php echo $value['foto_perlengkapan']; ?></td>
							<td>
								<a href="index.php?page=edit_perlengkapan&id=<?php echo $value['id_perlengkapan']; ?>" class="btn btn-warning">Edit</a>
								<a href="index.php?page=hapus_perlengkapan&id=<?php echo $value['id_perlengkapan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th></td>
						<th></th>
						<th></th>
						<th class="text-center">Total</th>
						<th>
							<?php if (empty($hasil)){
								echo "0";
								?>

							<?php } else {

								?>
								<?php echo "Rp. " . number_format($hasil); ?>
							<?php } ?>
						</th>
					</tfoot>
				</table>
			</div>
		</div>
	</div>