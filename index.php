<?php
session_start();
require "functions.php";

// Ambil id_user dari session
$id_user = isset($_SESSION["id_user"]) ? (int)$_SESSION["id_user"] : 0;

// Query data profil pengguna
$profil = query("SELECT * FROM user_212279 WHERE 212279_id_user = '$id_user'");

// Pastikan data ditemukan sebelum mengaksesnya
if (!empty($profil)) {
    $profil = $profil[0]; // Ambil data pertama dari hasil query
} else {
    $profil = array(); // Atau kosongkan profil jika tidak ditemukan
    
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GO FIELD</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body> 
  <!-- Navbar -->
  <div class="container">
    <nav class="navbar bg-tranparancy navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="GOFIELD.png" alt="Logo" width="70" height="50" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#TestimoniPengguna">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#Questions">Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="Page" href="#contact">Contact</a>
            </li>
            <?php
            if (isset($_SESSION['id_user'])) {
              echo '
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user/lapangan.php">Lapangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user/bayar.php">Pembayaran</a>
            </li>
            ';
            }
            ?>
          </ul>
          <?php
          if (isset($_SESSION['id_user'])) {
            // jika user telah login, tampilkan tombol profil dan sembunyikan tombol login
            echo '<a href="user/profil.php" data-bs-toggle="modal" data-bs-target="#profilModal" class="btn btn-inti"><i data-feather="user"></i></a>';
          } else {
            // jika user belum login, tampilkan tombol login dan sembunyikan tombol profil
            echo '<a href="login.php" class="btn btn-inti" type="submit">Login</a>';
          }
          
          ?>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Navbar -->

  <!-- Modal Profil -->
  <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profilModalLabel">Profil Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-4 my-5">
                <img src="img/<?= $profil["212279_foto"]; ?>" alt="Foto Profil" class="img-fluid ">
              </div>
              <div class="col-8">
                <h5 class="mb-3"><?= $profil["212279_username"]; ?></h5>
                <p><?= $profil["212279_jenis_kelamin"]; ?></p>
                <p><?= $profil["212279_email"]; ?></p>
                <p><?= $profil["212279_no_handphone"]; ?></p>
                <p><?= $profil["212279_alamat"]; ?></p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#editProfilModal" class="btn btn-inti">Edit Profil</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Profil -->

  <!-- Edit profil -->
  <div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog edit modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfilModalLabel">Edit Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="fotoLama" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_foto"]; ?>">
          <div class="modal-body">
            <div class="row justify-content-center align-items-center">
              <div class="mb-3">
                <img src="img/<?= $profil["212279_foto"]; ?>" alt="Foto Profil" class="img-fluid ">
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                  <input type="text" name="212279_nama_lengkap" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_nama_lengkap"]; ?>">
                </div>
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if ($profil['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($profil['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="212279_" class="form-label">No Telp</label>
                  <input type="number" name="212279_no_handphone" 212279_ class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_no_handphone"]; ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_email"]; ?>">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">212279_alamat</label>
                <input type="text" name="212279_alamat" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_alamat"]; ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto : </label>
                <input type="file" name="212279_foto" class="form-control" id="exampleInputPassword1">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-inti" name="simpan" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->

 <!-- Bagian Jumbotron -->
<section class="jumbotronSlider" id="home">
    <div id="jumbotronCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indikator Carousel -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#jumbotronCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#jumbotronCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#jumbotronCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Item Carousel -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="jumbotron">
                    <video autoplay muted loop playsinline class="d-block w-100" style="object-fit: cover;">
                        <source src="video/bultangslide.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="jumbotron">
                    <video autoplay muted loop playsinline class="d-block w-100" style="object-fit: cover;">
                        <source src="video/bultangslide2.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="jumbotron">
                    <video autoplay muted loop playsinline class="d-block w-100" style="object-fit: cover;">
                        <source src="video/bultangslide3.mp4" type="video/mp4">
                    </video>
                    <div class="jumbotron-content">
                        <a href="user/lapangan.php" class="btn btn-inti">Pesan Sekarang</a>
                    </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</section>
<!-- Akhir Bagian Jumbotron -->

<!-- content -->
 <!-- Testimoni -->
 <section class="testimonial" id="TestimoniPengguna">
    <div class="container">
      <h2 class="text-center">Testimoni Pengguna</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-body">
              <p class="card-text">"Lapangan sangat bersih dan nyaman, cocok untuk bermain bersama teman-teman."</p>
              <p class="card-footer text-end">- Selviani</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-body">
              <p class="card-text">"Fasilitasnya lengkap dan stafnya ramah. Pasti akan booking lagi."</p>
              <p class="card-footer text-end">- Aprillia</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-body">
              <p class="card-text">"Lokasinya strategis dan harga sewa sangat terjangkau."</p>
              <p class="card-footer text-end">- Yusti Adhami</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-body">
              <p class="card-text">"Sewa lapangan badminton di sini sangat terjangkau dan fasilitasnya sangat memadai. Saya pasti akan sering datang lagi."</p>
              <p class="card-footer text-end">- Astina</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-body">
              <p class="card-text">"Saya sangat menikmati bermain di lapangan badminton ini. Penerangannya sempurna dan fasilitas pendukungnya lengkap."</p>
              <p class="card-footer text-end">- Hardiana</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimoni -->

  <!-- FAQ -->
  <section class="faq" id="Questions">
    <div class="container">
      <h2 class="text-center">Pertanyaan Umum</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Bagaimana cara melakukan booking?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Anda dapat melakukan booking melalui tombol "Booking" yang tersedia di website kami atau menghubungi nomor layanan pelanggan kami.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Apa saja fasilitas yang tersedia di lapangan?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Fasilitas yang tersedia meliputi ruang ganti, kamar mandi, area parkir, dan kantin.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Apakah ada diskon untuk booking dalam jumlah banyak?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Ya, kami menawarkan diskon khusus untuk booking dalam jumlah banyak. Silakan hubungi layanan pelanggan kami untuk informasi lebih lanjut.
            </div>
          </div>
        </divclass>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End FAQ -->

  <!-- Contact -->
  <section id="contact" class="bg-transparancy py-5">
    <div class="container">
      <h2 class="text-center">Hubungi Kami</h2>
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" placeholder="Masukkan nama anda">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan email anda">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Pesan</label>
              <textarea class="form-control" id="message" rows="3" placeholder="Tulis pesan anda"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact -->

<!-- End Main Content -->

<!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container text-center">
      <p>&copy; 2024 Booking Badminton. All rights reserved.</p>
    </div>
  </footer>
  <!-- End Footer -->
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>
