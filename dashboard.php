<?php  
// modal 
$modal = array();
$ambil_modal = $connection->query("SELECT * FROM modal");
$takes_modal = $ambil_modal->fetch_assoc();

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

// Jumlah Penjualan (Kg)
$jumlah_penjualan = array();
$takes = $connection->query("SELECT SUM(jumlah_penjualan) AS kilo FROM penjualan");
$detail_kilo = $takes->fetch_assoc();

// berapa karung
$ambil = $detail_kilo['kilo'];
$hasil_seluruh_kilo = $ambil / 30; //hari

// perlengkapan
$perlengkapan = array();
$ambil_perlengkapan = $connection->query("SELECT SUM(harga_total_perlengkapan) AS jumlah FROM perlengkapan");

$detail_perlengkapan = $ambil_perlengkapan->fetch_assoc();

// Keuntungan dan Kerugian
$modal_awal = $takes_modal['modal'];
$keuntungan_penjualan = $detail_penjualan['jumlah'];
$keuntungan_perlengkapan = $detail_perlengkapan['jumlah'];
$detail_seluruh = $modal_awal - $keuntungan_perlengkapan + $keuntungan_penjualan;



// echo "<pre>";
// print_r($penjualan);
// echo "</pre>";
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-3">
			<h1 class="text-center">Produk</h1>
			<hr>
			<?php foreach ($produk as $key => $value): ?>
				<div class="card bg-primary border-0 mt-2" >
					<div class="card-body text-center">
						<h2 class="card-text text-white"><?php echo $value['nama_produk']; ?></h2>
						<h3><?php echo $value['jumlah_produk']; ?></h3>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="col-3">
			<h1 class="text-center">Penjualan</h1>
			<hr>
			<div class="card bg-warning border-0 mt-2" >
				<div class="card-body text-center">
					<h2 class="text-center text-white">Modal Awal</h2>
					<h3><?php echo "Rp. " . number_format($takes_modal['modal']); ?></h3>
				</div>
			</div>	
			<div class="card bg-info border-0 mt-2" >
				<div class="card-body text-center">
					<h2 class="text-center text-white">Hasil Jual</h2>
					<h3><?php echo "Rp. " . number_format($detail_penjualan['jumlah']); ?></h3>
				</div>
			</div>	
			<div class="card bg-secondary border-0 mt-2" >
				<div class="card-body text-center">
					<h2 class="text-center text-white">Perlengkapan</h2>
					<h3><?php echo "Rp. " . number_format($detail_perlengkapan['jumlah']); ?></h3>
				</div>
			</div>	
			<div class="card bg-info border-0 mt-2" >
				<div class="card-body text-center">
					<h2 class="card-text text-white">Hasil Jual Kilo</h2>
					<h3><?php echo "Kg. " . $detail_kilo['kilo']; ?></h3>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h1 class="text-center">Untung dan Rugi</h1>
			<hr>
			<div class="card-body text-center">
				<?php if (0 >= $detail_seluruh) 
				{
					include 'rugi.php';
				}
				else
				{
					include 'untung.php';
				}
				?>
			</div>	
		</div>
	</div>
	<div class="row">
		<p>Hasil pemberian pakan lele <b><?php echo "Kg. " . $hasil_seluruh_kilo; ?><b></p>
	</div>
</div>

