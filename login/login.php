<?php  
include '../connection.php';
?>

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
		<div class="col-md-5 offset-md-4 circel-rounded mt-5 p-5 bg-white shadow">
			<form method="post">
				<h2 class="text-center">LOGIN</h2>
				<hr>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input class="form-control" type="text" name="nama_admin">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input class="form-control" type="text" name="password_admin">
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" type="submit" name="klik">Klik</button>
					<a href="register.php" class="btn btn-danger">Register</a>
				</div>
			</form>
		</div>
	</div>
</body>
<?php  
if (isset($_POST['klik'])) 
{
	$nama_admin = $_POST['nama_admin'];
	$password_admin = $_POST['password_admin'];

	$ambil = $connection->query("SELECT * FROM admin WHERE nama_admin = '$nama_admin' AND password_admin = '$password_admin'");

	$takes = $ambil->num_rows;

	// echo $takes;

	if ($takes==1) 
	{
		$ambil_admin = $ambil->fetch_assoc();
		$_SESSION["admin"] = $ambil_admin;
		echo "<script>alert=('selamat datang')</script>";
		echo "<script>location='../index.php'</script>";
	}
	else
	{
		echo "<script>alert=('data salah')</script>";
		echo "<script>location='login.php'</script>";

	}
}

?>