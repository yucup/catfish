<?php  
// produk
$produk = array();
$ambil_produk  = $connection->query("SELECT * FROM produk");
while ($takes = $ambil_produk->fetch_assoc()) 
{
	$produk[] = $takes;
}

// penjualan
$penjualan = array();
$takes = $connection->query("SELECT SUM(harga_total_penjualan) AS jumlah FROM penjualan");

$detail_penjualan = $takes->fetch_assoc();

// perlengkapan
$perlengkapan = array();
$ambil_perlengkapan = $connection->query("SELECT SUM(harga_total_perlengkapan) AS jumlah FROM perlengkapan");

$detail_perlengkapan = $ambil_perlengkapan->fetch_assoc();

// keuntungan
$keuntungan_penjualan = $detail_penjualan['jumlah'];
$keuntungan_perlengkapan = $detail_perlengkapan['jumlah'];
$detail_seluruh = $keuntungan_penjualan + $keuntungan_perlengkapan;
// echo "<pre>";
// print_r($penjualan);
// echo "</pre>";
?>

<div class="container">
	<div class="row">
		<h1 class="text-center">Produk</h1>
		<hr>
		<?php foreach ($produk as $key => $value): ?>
			<div class="col-3">
				<div class="card bg-primary border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="card-text text-white"><?php echo $value['nama_produk']; ?></h2>
						<h3><?php echo $value['jumlah_produk']; ?></h3>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row mt-5">
		<h1 class="text-center">Penjualan</h1>
		<hr>
		<div class="col-3">
			<div class="card bg-warning border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="text-center text-white">Modal Awal</h2>
						<h3>Rp. 5.000.000</h3>
					</div>
				</div>	
		</div>
		<div class="col-3">
			<div class="card bg-info border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="text-center text-white">Hasil P</h2>
						<h3><?php echo "Rp. " . number_format($detail_penjualan['jumlah']); ?></h3>
					</div>
				</div>	
		</div>
		<div class="col-3">
			<div class="card bg-primary border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="text-center text-white">Perlengkapan</h2>
						<h3><?php echo "Rp. " . number_format($detail_perlengkapan['jumlah']); ?></h3>
					</div>
				</div>	
		</div>
	</div>
	<div class="row mt-5">
		<h1 class="text-center">Keuntungan dan Kerugian</h1>
		<hr>
		<div class="col-3">
			<div class="card bg-primary border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="text-center text-white">Keuntungan</h2>
						<h3><?php echo "Rp. " . number_format($detail_seluruh); ?></h3>
					</div>
				</div>	
		</div>
		<div class="col-3">
			<div class="card bg-danger border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="text-center text-white">Kerugian</h2>

					</div>
				</div>	
		</div>
	</div>
</div>

