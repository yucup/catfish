<?php  
$id_admin = $_SESSION['admin']['id_admin'];

// 2. menampilkan data admin berdasarkan id_admin pelogin
$ambil_admin = $koneksi->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ");
$detail_admin = $ambil_admin->fetch_assoc();

echo "<pre>";
print_r($id_admin);
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>profil</title>
</head>
<body>
<div class="container">
	<div class="row">
		<img src="gambar/<?php echo ""; ?>">
	</div>
</div>
</body>
</html>