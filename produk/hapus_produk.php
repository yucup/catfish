<?php  
$hapus = $_GET['id'];

$connection->query("DELETE FROM produk WHERE id_produk = '$hapus'");
$connection->query("DELETE FROM penjualan WHERE id_produk = '$hapus'");


echo "<script>location='index.php?page=produk'</script>";
?>