@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="index.html">Beranda</a></li>
      <li>Detail Transaksi</li>
    </ol>
    <h2>Detail Transaksi</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="portfolio-details-container">

      <div class="owl-carousel portfolio-details-carousel">
        <img src="{!! asset('assets/img/hero-bg.jpg') !!}" class="img-fluid" alt="">
      </div>

      <div class="portfolio-info" style="border-radius: 15px">
        <img src="{!! asset('assets/img/product/pertamax.png') !!}" style="width: 250px; height: 100%;">
        <table border="0" style="margin: auto">
          <tr>
            <td><strong>Nama Produk</strong></td>
            <td>&nbsp;&nbsp;:&nbsp;</td>
            <td>&nbsp;{{ $price->type }}</td>
          </tr>
          <tr>
          <td><strong>Poin Member</strong></td>
          <td>&nbsp;&nbsp;:&nbsp;</td>
          <td>&nbsp;400 Poin</td>
          </tr>
          <tr>
            <td><strong>Harga/liter</strong></td>
            <td>&nbsp;&nbsp;:&nbsp;</td>
            <td><sup>Rp</sup>&nbsp;{{ number_format($price->price) }},-</td>
          </tr>
        </table>
      </div>

    </div>

    <div class="portfolio-description">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h4 style="color: rgba(5, 87, 158, 0.9)">Pengisian</h4>
              <form action="{{ url('transactions') }}" method="post">
                @csrf
                <input type="hidden" name="type" value="{{ $type }}">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="police_number" placeholder="Plat Nomor">
                  </div>
                  <div class="col-md-2">
                    <input type="number" class="form-control" name="liters" placeholder="Liter">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Portfolio Details Section -->
@endsection
