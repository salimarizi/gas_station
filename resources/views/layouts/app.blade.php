<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Engen</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{!! asset('assets/img/favicon.png') !!}" rel="icon">
  <link href="{!! asset('assets/img/apple-touch-icon.png') !!}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{!! asset('assets/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/icofont/icofont.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/boxicons/css/boxicons.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/animate.css/animate.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/remixicon/remixicon.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/venobox/venobox.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets/vendor/aos/aos.css') !!}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">
  @yield('css')
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">engen@ashiap.com</a></li>
          <li><i class="icofont-phone"></i> (022) 8888 </li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Senin-Minggu 09.00 - 17.00</li>
        </ul>
      </div>
      <div class="cta">
        @guest
            <a href="{{ route('login') }}" class="scrollto">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="scrollto" style="background: #1DA75B">Register</a>
            @endif
        @else
          <a class="scrollto" href="{{ route('home') }}" style="background: #1DA75B">
              {{ Auth::user()->name }}
          </a>

          <a class="scrollto" style="background: #FF4455" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        @endguest
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}" class="scrollto">Engen</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Beranda</a></li>
          @if (@Auth::user()->role == 'admin')
            <li><a href="{{ url('employees') }}">Karyawan</a></li>
            <li><a href="{{ url('outlets') }}">Outlet</a></li>
          @else
            <li><a href="#team">Penghargaan Pegawai</a></li>
            <li><a href="#contact">Hubungi Kami</a></li>
          @endif
          <!-- <li><a href="#">Portfolio</a></li> -->
          <!-- <li><a href="#">Team</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li> -->
          <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Engen</span></h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
        </div>
      </div>

      <!-- Slide 2 -->
      <!-- <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div> -->

      <!-- Slide 3 -->
      <!-- <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>-->

    </div>
  </section><!-- End Hero -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Popup Section ======= -->
  <section id="modal" class="popup-graybox">
    <div class="ebook-popup-sec" style="background: linear-gradient(rgba(246, 176, 36, 0.6), rgba(232, 218, 95, 0.6)), url(assets/img/hero-bg.jpg) fixed center center; background-size: cover; background-color: #0b2e13;" >
      <h2 data-edit="text" style="font-family: Poppins; color: #05579E">Pertamax</h2>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
      <div class="ebook-email-sec">
        <input type="email" class="ebookemail-input1" data-edit="placeholder" placeholder="Jumlah Uang">
        <input type="email" class="ebookemail-input2" data-edit="placeholder" placeholder="ID Member (Opsional)">
        <button class="ebook-input-btn" type="submit" style="font-family: Poppins">Lanjutkan Transaksi</button>
        <button class="ebook-cls-btn close-btn">X</button>
      </div>
    </div>
  </section>
  <!-- end Popup Section-->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#header">Tentang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#cta">Member & Penilaian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Penghargaan Pegawai</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">

          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi Kami</h4>
            <p>
              Jln. Sukakarya No.14<br>
              Sukajasi, Bandung 40163<br>
              Indonesia<br><br>
              <strong>Telepon:</strong> (022) 8888<br>
              <strong>Email:</strong> engen@ashiap.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Engen</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{!! asset('assets/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/jquery.easing/jquery.easing.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/php-email-form/validate.js') !!}"></script>
  <script src="{!! asset('assets/vendor/owl.carousel/owl.carousel.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/venobox/venobox.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/aos/aos.js') !!}"></script>

  <!-- Template Main JS File -->
  <script src="{!! asset('assets/js/main.js') !!}"></script>

  <!-- Script Popup-->
  <script>
    var modal = document.getElementById("modal");
    var btn = document.getElementById("button");
    var btnClose = document.getElementsByClassName("ebook-cls-btn close-btn")[0];
    btn.onclick = function () {
      modal.style.display = "block";
    }
    btnClose.onclick = function () {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }
  </script>
  @yield('js')

  </footer>
</body>

</html>
