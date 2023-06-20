<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NOERI KITCHEN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>/assets/img/1.png" rel="icon">
  <link href="<?php echo base_url(); ?>/assets/img/1.png" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet')?>"/ >
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet')?>"/ >
  <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet')?>"/ >
  <link href="<?php echo base_url('assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet')?>"/ >
  <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet')?>"/ >

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Baker
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
      <a href="" class="logo"><img src="<?php echo base_url();?>/assets/img/1.png" alt="" class="img-fluid"></a>
      <a href="">Noeri Kitchen</a>
      </h1>

      <nav id="navbar" class="navbar">
        <ul> 
          <li><a class="nav-link scrollto active" href="<?php echo site_url('C_Noeri/LinkOrder')?>">Order</a></li>
          <li><a class="nav-link scrollto" href="<?php echo site_url('C_Noeri/LinkPesanan')?>">Pesanan Anda</a></li>
          <li><a class="nav-link scrollto" href="">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Welcome to Noeri Kitchen</h1>
      <h2>"Simphomi Rasa, Pesta untuk Jiwa"</h2>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

  
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Daftar Menu</h2>
          <ol>
            <li>Home</li>
            <li>Daftar Menu</li>
          </ol>
        </div>

        
    </div>
</section><!-- End Breadcrumbs -->


    <section class="inner-page">
    <section id="portfolio" class="portfolio">
      <div class="container">

      

        <div class="section-title">
          <h2>DAFTAR MENU</h2>
          <p>Berikut daftar menu yang tersedia di restoran kami.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Food</li>
              <li data-filter=".filter-card">Drink</li>
              <li data-filter=".filter-web">Snacks</li>
            </ul>
          </div>
        </div>


        <div class="row portfolio-container">
            
            <?php
		    	foreach($data_makanan as $row){    
		    ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" >
            <img src="<?php echo base_url();?>/assets/img/menu/<?= $row->foto_menu; ?>"  class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $row->nama_menu; ?> </h4>
              <p>RP. <?=number_format($row->harga,0,"",".")?> </p> 
              <p><a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_Noeri/tambahKeranjang/'). $row->id_menu?>"><i class="bx bx-plus"></i>Tambah ke pesanan</a></p>
              
              
            </div>
          </div>

          <?php
          }
          ?>

            <?php
		    	foreach($data_minuman as $row){    
		    ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card" >
            <img src="<?php echo base_url();?>/assets/img/menu/<?= $row->foto_menu; ?>"  class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $row->nama_menu; ?> </h4>
              <p>RP. <?=number_format($row->harga,0,"",".")?> </p>
              
              <p><a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_Noeri/tambahKeranjang/'). $row->id_menu?>"><i class="bx bx-plus"></i>Tambah ke pesanan</a></p>
              
            </div>
          </div>

          <?php
          }
          ?>

            <?php
		    	foreach($data_snack as $row){    
		    ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" >
            <img src="<?php echo base_url();?>/assets/img/menu/<?= $row->foto_menu; ?>"  class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $row->nama_menu; ?> </h4>
              <p>RP. <?=number_format($row->harga,0,"",".")?> </p>
              
              <p><a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_Noeri/tambahKeranjang/'). $row->id_menu?>"><i class="bx bx-plus"></i>Tambah ke pesanan</a></p>
              
            </div>
          </div>

          <?php
          }
          ?>
          
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    </section>

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Noeri Kitchen</h3>
            <p>
              Jl. Setia budi No 241 <br>
              Bandung, Indonesia<br>
              <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> <p>noeri_kitchen@gmail.com<br>noeri.kitchen@gmail.com</p>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Delivery Order</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ala carte</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Prasmanan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Noeri Kitchen</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>

</body>

</html>