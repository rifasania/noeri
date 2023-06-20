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
      <a href="">noeriKitchen</a>
      </h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Welcome to Noeri Kitchen</h1>
      <h2>"Simfoni Rasa, Pesta untuk Jiwa"</h2>
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
            <li><a href="<?php echo site_url('C_Noeri/index')?>">Home</a></li>
            <li>Daftar Menu</li>
          </ol>
        </div>

        
    </div>
</section><!-- End Breadcrumbs -->


    <section class="inner-page">
    <section id="portfolio" class="portfolio">
      <div class="container">

      

        <div class="section-title">
          <h2>FORM PEMBAYARAN</h2>
          <p>Silakan lengkapi form berikut.</p>
        </div>
        

        
     
                            <?php
                                $total_harga = 0;
                                if($keranjang = $this->cart->contents())
                                {
                                    foreach($keranjang as $item)
                                    {
                                        $total_harga = $total_harga + $item['subtotal'];
                                    }
                                }
                            ?>
                      
  

  <section id="contact" class="contact">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">
       
            <?php echo form_open('C_Noeri/AksiAddPesanan'); ?>
              
              <div class="form-group mt-3">
                <label>Nama :</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
              </div>
              <div class="form-group mt-3">
                <label>Total Belanja :</label>
                <input type="text" class="form-control" name="total_harga" id="total_harga" value="<?php echo number_format($total_harga, 0,',','.')  ?>" disabled>
              </div>
              <div class="form-group mt-3">
                <label>Pilih Metode Pembayaran :</label>
                <select class="form-control form-select" name="id_pembayaran">
                        <?php             
                           //ulangi untuk semua elemen
                           foreach ($bayar as $row){
                        ?>    
                               <option value="<?= $row->id_pembayaran; ?>"><?= $row->metode_bayar; ?></option>

                        <?php       
                           }            
                        ?>
                      </select>
              </div>
              <input type="hidden" name="id_status_pesanan" value="1" > 
              <input type="hidden" name="total_harga" value="<?= $total_harga; ?>" > 
            
              <div class="align-middle text-center">
                    <input class="btn btn-warning w-50 my-4 mb-2" type="submit" value="PESAN" name="submit">  
                  </div>
              
                  <?php echo form_close(); ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Baker</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Baker</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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