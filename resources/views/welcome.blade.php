@extends('layouts.app')

@section('content')
<!-- ======= Icon Boxes Section ======= -->
<section id="pricing" class="pricing">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="box">
          <div class="icon"><img src="{!! asset('assets/img/product/pertamax.png') !!}" style="width: 80%; height: 80%"></div>
          <h4><sup>Rp</sup>{{ number_format($prices['pertamax']) }}<span> / liter</span></h4>
          <ul>
            <li>Warna Visual : <font color="#1e90ff">Biru</font></li>
            <li>Kadar Oktan : 92</li>
            <li>Massa Maks : 770 kg / m<sup>3</sup></li>
            <li>Massa Min : 715 kg / m<sup>3</sup></li>
          </ul>
          <div class="btn-wrap">
            <a href="#" id="button" class="btn-buy">Transaksi</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
        <div class="box featured">
          <div class="icon"><img src="{!! asset('assets/img/product/pertamaxturbo.png') !!}" style="width: 80%; height: 80%"></div>
          <h4><sup>Rp</sup>{{ number_format($prices['pertamax_turbo']) }}<span> / liter</span></h4>
          <ul>
            <li>Warna Visual : <font color="red">Merah</font></li>
            <li>Kadar Oktan : 98</li>
            <li>Massa Maks : 770 kg / m<sup>3</sup></li>
            <li>Massa Min : 715 kg / m<sup>3</sup></li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Transaksi</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
        <div class="box">
          <div class="icon"><img src="{!! asset('assets/img/product/pertalite.png') !!}" style="width: 80%; height: 80%"></div>
          <h4><sup>Rp</sup>{{ number_format($prices['pertalite']) }}<span> / liter</span></h4>
          <ul>
            <li>Warna Visual : <font color="#32cd32">Hijau</font></li>
            <li>Kadar Oktan : 91</li>
            <li>Massa Maks : 770 kg / m<sup>3</sup></li>
            <li>Massa Min : 715 kg / m<sup>3</sup></li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Transaksi</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
        <div class="box">
          <span class="advanced">Advanced</span>
          <div class="icon"><img src="{!! asset('assets/img/product/biosolar.png') !!}" style="width: 80%; height: 80%"></div>
          <h4><sup>Rp</sup>{{ number_format($prices['solar']) }}<span> / liter</span></h4>
          <ul>
            <li>Warna Visual : <font color="orange">Kuning</font></li>
            <li>Kadar Oktan : 51</li>
            <li>Massa Maks : 770 kg / m<sup>3</sup></li>
            <li>Massa Min : 715 kg / m<sup>3</sup></li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Transaksi</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Icon Boxes Section -->

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="footer-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4 style="color: #f6b024">Member</h4>
          <p>Silahkan Cek poin member anda di sini dengan memasukkan ID member anda</p>
        </div>
        <div class="col-lg-6">
          <form action="" method="post">
            <input type="text" name="idMember" placeholder="ID Member"><input type="submit" value="Cek">
          </form>
        </div>
      </div>
    </div>
  </div>

  <br>

  <div class="footer-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4 style="color: #f6b024">Penilaian</h4>
          <p>Silahkan berikan penilaian anda kepada pelayanan pegawai kami dengan memasukkan nomor transaksi</p>
        </div>
        <div class="col-lg-6">
          <form action="" method="post">
            <input type="text" name="email" placeholder="Nomor Transaksi"><input type="submit" value="Cek">
          </form>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Cta Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Penghargaan</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Sarah Jhonson</h4>
            <span>Product Manager</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>William Anderson</h4>
            <span>CTO</span>
            <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Amanda Jepson</h4>
            <span>Accountant</span>
            <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Team Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Hubungi Kami</h2>
    </div>

    <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

      <div class="col-lg-5">
        <div class="info">
          <div class="address">
            <i class="icofont-google-map"></i>
            <h4>Lokasi:</h4>
            <p>Jln. Sukakarya No. 14, Sukajadi, Bandung</p>
          </div>

          <div class="email">
            <i class="icofont-envelope"></i>
            <h4>Email:</h4>
            <p>engen@ashiap.com</p>
          </div>

          <div class="phone">
            <i class="icofont-phone"></i>
            <h4>Telepon:</h4>
            <p>(022) 8888</p>
          </div>

        </div>

      </div>

      <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Keterangan"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Pesan anda telah terkirim. Terima kasih !</div>
          </div>
          <div class="text-center"><button type="submit">Kirim Pesan</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
@endsection
