<?php  
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.108.0">
	<title>Dashboard Template · Bootstrap v5.3</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">


	<link href="../boostrap/css/bootstrap.css" rel="stylesheet">
	<link href="boostrap/css/npm i bootstrap-icons" rel="stylesheet">


	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5 offset-md-4 circel-rounded bg-white shadow p-5 my-5">
				<h2 class="text-center">Register</h2>
				<hr>
				<form method="post" enctype="multipart/form-data">
					<div class="mb-2">
						<label class="form-label">Nama</label>
						<input type="text" name="nama_admin" class="form-control">
					</div>
					<div class="mb-2">
						<label class="form-label">Alamat</label>
						<input type="text" name="alamat_admin" class="form-control">
					</div>
					<div class="mb-2">
						<label class="form-label">Tanggal Lahir</label>
						<input type="date" name="tgl_admin" class="form-control">
					</div>
					<div class="mb-2">
						<label class="form-label">Password</label>
						<input type="Password" name="password_admin" class="form-control">
					</div>
					<div class="mb-2">
						<label class="form-label">Foto</label>
						<input type="file" name="foto_admin" class="form-control">
					</div>

					<button class="btn btn-outline-info" type="submit" name="kirim">Klik</button>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php  
if (isset($_POST['kirim'])) 
{
	$nama_admin = $_POST['nama_admin'];
	$alamat_admin = $_POST['alamat_admin'];
	$tgl_admin = $_POST['tgl_admin'];
	$password_admin = $_POST['password_admin'];

	$foto_name = $_FILES['foto_admin']['name'];
	$foto_tmp = $_FILES['foto_admin']['tmp_name'];
	move_uploaded_file($foto_tmp, "../profil/$foto_name");

	$connection->query("INSERT INTO admin (nama_admin,alamat_admin,tgl_admin,password_admin,foto_admin) VALUES ('$nama_admin','$alamat_admin','$tgl_admin','$password_admin','$foto_name')");

	echo "<script>location='login.php'</script>";

}
?>