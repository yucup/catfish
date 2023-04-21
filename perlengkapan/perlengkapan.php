<?php  
$perlengkapan = array();
$ambil = $connection->query("SELECT * FROM perlengkapan");

while ($takes = $ambil->fetch_assoc()) 

{
	 $perlengkapan[] = $takes;
}

// echo "<pre>";
// print_r($perlengkapan);
// echo "</pre>";
?>
<div class="container">
	<div class="row">
		<div class="col p-5 my-5 shadow rounded bg-white">
			<h2 class="text-center text-success">Perlengkapan</h2>
			<hr>
			<a href="index.php?page=tambah_perlengkapan" class="btn btn-outline-primary">+ Tambah</a>
			<table class=" my-2 table table-bordered table-striped table-hover">
				<thead class="text-center">
					<th>No</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga @</th>
					<th>Harga Total</th>
					<th>Foto</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					<?php $total = 0 ?>
					<?php foreach ($perlengkapan as $key => $value): ?>
						<?php $hasil = $total+=$value['harga_total_perlengkapan'] ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_perlengkapan']; ?></td>
							<td><?php echo $value['jumlah_perlengkapan']; ?></td>
							<td><?php echo "Rp " . number_format($value['harga_perlengkapan']); ?></td>
							<td><?php echo "Rp " . number_format($value['harga_total_perlengkapan']); ?></td>
							<td><?php echo $value['foto_perlengkapan']; ?></td>
							<td class="text-center">
								<a href="index.php?page=edit_perlengkapan&id=<?php echo $value['id_perlengkapan']; ?>" class="btn btn-warning">Edit</a>
								<a href="index.php?page=hapus_perlengkapan&id=<?php echo $value['id_perlengkapan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th></td>
					<th>Total</th>
					<th></th>
					<th></th>
					<th><?php echo "Rp. " . number_format($hasil); ?></th>
				</tfoot>
			</table>
		</div>
	</div>
</div>