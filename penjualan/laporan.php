<?php  
$connection = new mysqli("localhost","root","","catfish");

$laporan = array();
$ambil = $connection->query("SELECT * FROM penjualan LEFT JOIN produk ON penjualan.id_produk = produk.id_produk");

while($detail = $ambil->fetch_assoc())
{
	$laporan[] = $detail;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan</title>
</head>
<body>
	<h1>Laporan Penjualan</h1>
	<hr>
	<table border="1" width="80%" style="margin-left: 10%;">
		<thead>
			<tr>
				<th>No</th>
				<th>nama produk</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Harga Total</th>
				<th>tgl penjualan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($laporan as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value["nama_produk"]; ?></td>
				<td><?php echo $value['jumlah_penjualan']; ?></td>
				<td><?php echo "Rp. " . $value['harga_penjualan']; ?></td>
				<td><?php echo "Rp. " . number_format($value['harga_total_penjualan']); ?></td>
				<td><?php echo $value['tgl_penjualan']; ?></td>

			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<script>
		window.print();
	</script>
</body>
</html>