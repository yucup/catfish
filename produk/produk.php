<?php 	 
$produk = array();
$ambil = $connection->query("SELECT * FROM produk");

while ($takes = $ambil->fetch_assoc()) 
{
		$produk[] = $takes;
}

// echo "<pre>";
// print_r($produk);
// echo "</pre>";

?>
<div class="container">
	<div class="row my-5">
			<div class="col shadow rounded bg-white">
			<h2 class="text-center text-success">Produk</h2>
			<hr>
			<a href="index.php?page=tambah_produk" class="btn btn-outline-info ">+ Tambah</a>
			<table class="table table-bordered table-striped table-hover my-3">
				<thead class="text-center">
					<th>No</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga @</th>
					<th>Kolam</th>
					<th>Karung</th>
					<th>Foto</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					<?php foreach ($produk as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>	
						<td><?php echo $value['nama_produk']; ?></td>	
						<td class="text-center"><?php echo $value['jumlah_produk']; ?></td>	
						<td class="text-center"><?php echo "Rp " . number_format($value['harga_produk']); ?></td>						
						<td class="text-center"><?php echo $value['kolam_produk']; ?></td>	
						<td class="text-center"><?php echo $value['karung_produk']; ?></td>	
						<td class="text-center"><?php echo $value['foto_produk']; ?></td>	
						<td class="text-center">
							<a href="index.php?page=edit_produk&id=<?php echo $value['id_produk']; ?>" class="btn btn-warning">Edit</a>
							<a href="index.php?page=hapus_produk&id=<?php echo $value['id_produk']; ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>