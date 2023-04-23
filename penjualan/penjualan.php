<?php  
// $tampil_penjualan = array();
// $ambil = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk");

// while ($takes = $ambil->fetch_assoc()) 
// {
// 	$tampil_penjualan[] = $takes;
// }

// penanggalan

$no = 1;
if (isset($_GET['mulai']) && isset(($_GET['selesai']))) 
{

	$data = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk WHERE tgl_penjualan BETWEEN '".$_GET['mulai']."' and '".$_GET['selesai']."'");
}
else
{
	$koneksi = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk");
}



?>
<div class="container">
	<div class="row">
		<h2 class="text-center text-success mt-5">Penjualan</h2>
		<hr>
		<div class="col-md-4 mt-4">
			<form method="get">
				<label>Mulai</label>
				<input type="date" name="mulai" class="form-control">
			</div>
			<div class="col-md-4 mt-5">
				<input type="date" name="selesai" class="form-control">
			</div>
			<div class="col-md-4 mt-5">
				<button class="btn btn-primary" type="submit">Filter</button>
			</div>
		</form>
	</div>

	<div class="row">
		<div class="col shadow rounded bg-white mt-3">
			<table class="table table-bordered table-striped table-hover mt-3">
				<thead class="text-center">
					<th>No</th>
					<th>Nama / Ukuran</th>
					<th>Kolam</th>
					<th>Jumlah</th>
					<th>Harga @</th>
					<th>Harga Total</th>
					<th>Tanggal</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<a href="index.php?page=tambah_penjualan" class="btn btn-outline-info">+ Tambah</a>
					<?php $total = 0 ?>
					<?php while ($data = mysqli_fetch_array($koneksi))
					{ ?>
						<?php $total_seluruh = $total+=$data['harga_total_penjualan'];?>
						<tr class="text-center">
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nama_produk']; ?></td>
							<td><?php echo $data['kolam_produk']; ?></td>
							<td><?php echo $data['jumlah_penjualan']; ?></td>
							<td><?php echo "Rp. " . number_format($data['harga_produk']); ?></td>
							<td><?php echo "Rp " . number_format($data['harga_total_penjualan']); ?></td>
							<td><?php echo date("l, d M Y", strtotime($data['tgl_penjualan'])); ?></td>	
							<td>
								<a href="index.php?page=edit_penjualan&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-primary">Edit</a>
								<a href="index.php?page=hapus_penjualan&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						<?php  
					}
						?>
				</tbody>
				<tfoot>
					<tr class="text-center">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Total</td>
						<td><b><?php echo "Rp. " . number_format($total_seluruh); ?></b></td>
					</tr>
						
				</tfoot>
			</div>
		</div>
	</div>