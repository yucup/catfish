<?php  
include 'connection.php';

// if (!isset($_SESSION['admin'])) 
// {
//   echo "<script>alert=('daftar anjir')</script>";
//   echo "<script>location='login/login.php'</script>";
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">


<link href="boostrap/css/bootstrap.css" rel="stylesheet">
<link href="boostrap/css/npm i bootstrap-icons" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
      <a class="btn btn-danger" href="login/logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=profil">
              Profil
            </a>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              Dashboard
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=produk">
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=perlengkapan">
              Perlengkapan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=penjualan">
              Penjualan
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php  
  if (!isset($_GET["page"])) 
  {
    include 'dashboard.php';
  }

  // profil
  elseif ($_GET['page']=="profil")
  {
    include 'profil/profil.php';
  }

  // produk
  elseif ($_GET["page"]=="produk")
  {
   include 'produk/produk.php';
  }
  elseif ($_GET["page"]=="tambah_produk") 
  {
    include 'produk/tambah_produk.php';
  }
  elseif ($_GET["page"]=="edit_produk") 
  {
    include 'produk/edit_produk.php';
  }
  elseif($_GET["page"]=="hapus_produk")
  {
    include 'produk/hapus_produk.php';
  }

  //perlengkapan
  elseif ($_GET["page"]=="perlengkapan") 
  {
    include 'perlengkapan/perlengkapan.php';
  }
  elseif ($_GET["page"]=="tambah_perlengkapan") 
  {
    include 'perlengkapan/tambah_perlengkapan.php';
  }
  elseif ($_GET['page']=="edit_perlengkapan") 
  {
    include 'perlengkapan/edit_perlengkapan.php';
  }
  elseif ($_GET['page']=="hapus_perlengkapan") 
  {
    include 'perlengkapan/hapus_perlengkapan.php';
  }

  // Penjualan
  elseif ($_GET['page']=='penjualan') 
  {
    include 'penjualan/penjualan.php';
  }
  elseif ($_GET['page']=='tambah_penjualan') 
  {
    include 'penjualan/tambah_penjualan.php';
  }
  elseif ($_GET['page']=='hapus_penjualan') 
  {
    include 'penjualan/hapus_penjualan.php';
  }
  elseif ($_GET['page']=='edit_penjualan') 
  {
    include 'penjualan/edit_penjualan.php';
  }
  ?>
      
    </main>
  </div>
</div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
