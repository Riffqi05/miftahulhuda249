<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Pesantren</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .article {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .article img {
            transition:all .4s ease;
            width: 100px;
            height: 100px;
            border-radius: 8px;
            margin-right: 20px;
            object-fit: cover;
        }
        .article .deskripsi{
            font-size:0.9rem
        }
        .article-content {
            flex: 1;
        }
       .article:hover img {
        transform:scale(1.2);
       }
        .article .date {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 8px;
        }
        .article .title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
        .title {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .subtitle {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }
        .author {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .author img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .author-info {
            font-size: 14px;
            color: #777;
        }
        .tags {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .tag {
            background-color: #e0e0e0;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }
        .image {
            border-radius:10px 120px 10px 10px;

background: #333;
            overflow:hidden;
            margin-bottom: 20px;
        }
        .image img:hover {
            transform:scale(1.2);
        }
        .image img {
            transition:all .4s ease;
            object-fit:cover;
            width: 100%;
            height:60vh;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- Bagian Logo Pesantren dan Alamat Teks Berjalan -->
<div class="header-top">
    <div class="header-content">
        <!-- Ganti 'logo.png' dengan path logo pesantren -->
        <img src="assets/images/logo.png" alt="Logo Pesantren" class="logo-pesantren">
        <div class="alamat-pesantren">
            <marquee behavior="scroll" direction="left" style="color: white;">Dusun Bojong Sukamulya RT/RW 39/15, Rawa, Lumbung, Ciamis Regency, West Java 46258</marquee>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav>
<div class="logo">
        <a href="index.php">
            <img src="assets/images/logo-navbar.png" alt="Logo Pesantren" class="navbar-logo">
        </a>
    </div>
    <ul class="navbar-menu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="#">Profil</a>
            <ul>
                <li><a href="visimisi.php">Visi dan Misi</a></li>
                <li><a href="sejarah.php">Sejarah</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
            </ul>
        </li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="program.php">Program</a></li>
        <li><a href="fasilitas.php">Fasilitas</a></li>
        <li><a href="galeri.php">Galeri</a></li>
        <li><a href="contact.php">Kontak</a></li>
        <li><a href="login.php" class="login-button">Login</a></li>
    </ul>
</nav>

<?php if (!isset($hideCarousel) || !$hideCarousel): ?>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/cr1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p>Selamat datang di Official Website.</p>
          <h2>PONDOK PESANTREN</h2>
          <h1>MIFTAHUL HUDA 249</h1>
        </div>
        <div class="carousel-overlay"></div> <!-- Overlay baru -->
    </div>
    <div class="carousel-item">
      <img src="assets/images/cr2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p>Selamat datang di Official Website.</p>
          <h2>PONDOK PESANTREN</h2>
          <h1>MIFTAHUL HUDA 249</h1>
        </div>
        <div class="carousel-overlay"></div> <!-- Overlay baru -->
    </div>
    <div class="carousel-item">
      <img src="assets/images/cr3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p>Selamat datang di Official Website.</p>
          <h2>PONDOK PESANTREN</h2>
          <h1>MIFTAHUL HUDA 249</h1>
        </div>
        <div class="carousel-overlay"></div> <!-- Overlay baru -->
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>