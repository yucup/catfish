<?php  
$hapus = $_GET['id'];
$connection->query("DELETE FROM perlengkapan WHERE id_perlengkapan = '$hapus'");

echo "<script>location='index.php?page=perlengkapan'</script>";
?>