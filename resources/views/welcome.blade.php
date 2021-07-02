<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cappuccino Delivery</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset ('assets/picture/favicon.png')}}" rel="icon">
    <link href="{{asset ('assets/picture/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="icon" type="image/x-icon" href="{{asset ('picture/Frame1.png')}}" />


    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=''">

    <!-- Vendor CSS Files -->
    <link href="{{asset ('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/aos/aos.css" rel="stylesheet')}}">
    <link href="{{asset ('assets/vendor/remixicon/remixicon.css" rel="stylesheet')}}">
    <link href="{{asset ('assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet')}}">
    <link href="{{asset ('assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet')}}">

  <!-- Template Main CSS File -->
  <link href="{{asset ('css/LandingPage.css')}}" rel="stylesheet">
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-xl align-items-center justify-content-center">
      <a href="LandingPage.html" class="logo d-flex align-items-center justify-content-center">
        <img src="{{asset ('picture/Frame2.png')}}" alt="">
        <span>CAPPUCCINO<br>DELIVERY</span>
      </a>
      <nav id="navbar" class="navbar">
        <i class="bi mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Banner Section ======= -->
  <section id="banner" class="banner d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex align-items-center">
          <h2 class="slide1 front" >WE DELIVERY <br></h2>
          <div class="slide2 front">
            <h1 >AESTHETI </h1>
            <h1 class="change-color-text-slide2 front">CS</h1>
          </div>
          <div class="slide3 front">
            <h2>IN EVERY</h2>
            <h2 class="change-color-text-slide3">&nbsp;CUP</h2>
          </div>
            <div class="text-center text-lg-start">
              <a href="{{ route('orderpage') }}" class="btn-try-now front d-flex">
                <span>Try now</span>
                <i class="size-icon bi bi-chevron-double-right"></i>
              </a>
            </div>
        </div>
        <div class="col-lg-6 banner-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset ('picture/coffee_pic1.png')}}" class="img-fluid back" alt="">
        </div>
        <div class="col-lg-6 banner-coffee" data-aos="fade-out" data-aos-delay="200">
          <img src="{{asset ('picture/coffee_bean.png')}}" class="img-fluid" alt="">
        </div>
    </section>
    <!-- End Banner -->

    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="line"></div>
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="box container-coffee" data-aos="fade-up" data-aos-delay="200">
                            <div class="container-button-atmosphere">
                                <button class="button-img">
                                  <div class="img-color-atmosphere"></div>
                                  <p class="img-text-atmosphere">ATMOSPHERE</p>
                                </button>
                            </div>
                        </div>
                        <p class="text_p">An unique place where everyone feels emotions through the sensation of new tastes and gaining new experience.</p>
                    </div>

                    <div class="col-lg-4">
                        <div class="box container-coffee" data-aos="fade-up" data-aos-delay="400">
                            <div class="container-button-atmosphere">
                                <button class="button-img3">
                                  <div class="img-color-atmosphere"></div>
                                  <p class="img-text-impression">IMPRESSION</p>
                                </button>
                            </div>
                        </div>
                        <p class="text_p">Learn about coffee as an art. Get an experience that you have never met before with new unforgettable flavors.</p>
                    </div>

                    <div class="col-lg-4">
                        <div class="box container-coffee" data-aos="fade-up" data-aos-delay="600">
                            <div class="container-button-atmosphere">
                                <button class="button-img4">
                                  <div class="img-color-atmosphere"></div>
                                  <p class="img-text-quality" >QUALITY</p>
                                </button>
                            </div>
                        </div>
                        <p class="text_p">Only high-quality products and a time-tested system that will deliver maximum comfort.</p>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Blog Section -->
        <footer id="footer" class="footer container">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center justify-content-center footer-info">
              <img src="{{asset ('picture/Frame2.png')}}" alt="">
              <span>CAPPUCCINO<br>DELIVERY</span>
            </a>
          </div>

          <div class="col-lg-8 footer-links">
            <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bi bi-facebook"></i>&nbsp;cappuccino.com</a><br>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i>&nbsp;_ilovecappu</a><br>
              <a href="#" class="telephone-fill"><i class="bi bi-telephone-fill bx bxl-telephone-fill"></i>&nbsp;0898536271</a><br>
              <a href="#" class="building"><i class="bi bi-building bx bxl-building"></i>&nbsp;86-88 Cao Thắng, phường 4, quận 3, Hồ Chí Minh</a><br>
            </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset ('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset ('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset ('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset ('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset ('js/LandingPage.js')}}"></script>

</body>

</html>





