<?php  
$hapus = $_GET['id'];

$connection->query("DELETE FROM penjualan WHERE id_penjualan = '$hapus'");

echo "<script>location='index.php?page=penjualan'</script>";
?>