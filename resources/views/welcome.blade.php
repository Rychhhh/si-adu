<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ajukla - Landing Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('landingpage/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('landingpage/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('landingpage/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <h1><a href="index.html">Siadu</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="hero-text" data-aos="zoom-out">
      <h2>Welcome to AjukLa</h2>
      <p>Website untuk menerima pengajuan masyarakat</p>
      @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/main') }}" class="btn-get-started scrollto">Get Started</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-secondary">Log in</a>
              <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-secondary">Register</a>
            @endauth
        </div>
    @endif
    
    </div>

    <div class="product-screens">

      <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
        <img src="assets/img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
        <img src="assets/img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3" data-aos="fade-up">
        <img src="assets/img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="section-bg">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Tentang Kami</h3>
          <span class="section-divider"></span>
          <p class="section-description">
           Website ini saya buat untuk menampung data pengajuan dari masyarakat yang bisa dikelola oleh <br> admin maupun petugas dari masyarakat yang menggunakan dan tentu website ini sangat simple digunakan. 
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
            <img src="{{ asset('landingpage/assets/img/about-img.jpg') }}" alt="">
          </div>

          <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
            <h2>Manfaat dari Website Ini</h2>
            <ul>
              <li><i class="bi bi-check-circle"></i> Simple.</li>
              <li><i class="bi bi-check-circle"></i> Mudah dipahami.</li>
              <li><i class="bi bi-check-circle"></i> Cepat Ditanggapi.</li>
              <li><i class="bi bi-check-circle"></i> Dapat Dipercaya.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= More Features Section ======= -->
    <section id="more-features" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description text-center">Ada beberapa fitur-fitur yang unik di website ini.</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="bi bi-briefcase"></i></div>
              <h4 class="title"><a href="">Pengajuan Dan Tanggapan</a></h4>
              <p class="description">User Atau masyarakat dapat memberi pengajuan dan Petugas bisa menanggapi pengajuan tersebut.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Status Proses </a></h4>
              <p class="description">Dapat melihat status proses dengan jelas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="bi bi-bar-chart"></i></div>
              <h4 class="title"><a href="">Fitur Profile</a></h4>
              <p class="description">Dapat  menambahkan foto profile dan mengubah data profile .</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="bi bi-binoculars"></i></div>
              <h4 class="title"><a href="">User</a></h4>
              <p class="description">Kelola User Gampang Dan Tampilan Sistem</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End More Features Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-md-2">
            <img src="assets/img/clients/client-1.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-2.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-3.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-4.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-5.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-6.png" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pertanyaan Yang Sering Muncul</h3>
          <span class="section-divider"></span>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apakah disini bisa melihat proses pengajuan yang dibuat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Bisa dilihat dari semua role.  
            </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apakah sehabis menanggapi , bisa memberi tanggapan lagi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Tentu bisa, karena disini bebas berapa kali menanggapi tapi jangan SPAM ya.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Berapa Role didalam project ini? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Disini hanya ada 3 role yaitu antara lain petugas, pengaju/masyarakat, admin
              </p>
            </div>
          </li>
        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <span class="section-divider"></span>
          <p class="section-description">Perkenalan tentang anggota team kami.</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('images/myimages.jpg') }}" alt=""></div>
              <h4>Rayhan Rizki Putra</h4>
              <span>CEO & </span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>


      </div>
    </section><!-- End Team Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-start text-center">
          <div class="copyright">
            &copy; Copyright <strong>Avilon</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="{{ url('/') }}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landingpage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landingpage/assets/js/main.js') }}"></script>

</body>

</html>