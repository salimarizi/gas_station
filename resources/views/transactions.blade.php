@extends('layouts.app')

@section('css')
  <style media="screen">
    .custom-switch-lg .custom-control-label::before {
      left: -2.25rem;
      width: 3rem;
      border-radius: 1.5rem;
    }

    .custom-switch-lg .custom-control-label::after {
      top: calc(.25rem + 3px);
      left: calc(-2.25rem + 4px);
      width: calc(1.5rem - 6px);
      height: calc(1.5rem - 6px);
      border-radius: 1.5rem;
    }

    .custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
      transform: translateX(1.4rem);
    }

    .custom-switch-lg .custom-control-label::before {
      height: 1.5rem;
    }

    .custom-switch-lg .custom-control-label {
      padding-left: 1.5rem;
      line-height: 1.7rem;
    }
  </style>
@endsection

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
        @if ($type == 'pertamax')
          <img src="{!! asset('assets/img/product/pertamax.png') !!}" style="width: 250px; height: 100%;">
        @elseif ($type == 'pertamax_turbo')
          <img src="{!! asset('assets/img/product/pertamaxturbo.png') !!}" style="width: 250px; height: 100%;">
        @elseif ($type == 'pertalite')
          <img src="{!! asset('assets/img/product/pertalite.png') !!}" style="width: 250px; height: 100%;">
        @elseif ($type == 'solar')
          <img src="{!! asset('assets/img/product/biosolar.png') !!}" style="width: 250px; height: 100%;">
        @endif
        <table border="0" style="margin: auto">
          <tr>
            <td><strong>Nama Produk</strong></td>
            <td>&nbsp;&nbsp;:&nbsp;</td>
            <td>&nbsp;{{ $price->type }}</td>
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
                <input type="hidden" name="member_id" id="member_id">
                <div class="row">
                  <div class="col-md-4">
                    Liter :
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <input type="number" id="liter" class="form-control" name="liters" placeholder="Liter">
                  </div>
                  <div class="col-md-4" id="total_price">
                    Rp. 0,-
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    Plat Nomor :
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" id="police_number" class="form-control" name="police_number" placeholder="Plat Nomor">
                  </div>
                  <div class="col-md-4" id="member_name">
                    Nama Member :
                  </div>
                  <div class="col-md-2" id="member_point">
                    0 point
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4" id="pay_with_point" style="display: none">
                    Konversi uang ke Poin:
                  </div>
                  <div class="col-md-2" id="switch_pay_with_point" style="display: none">
                    <p class="custom-control custom-switch custom-switch-lg">
                      <input class="custom-control-input" id="customSwitch7" type="checkbox" name="use_point">
                      <label class="custom-control-label font-italic" for="customSwitch7">Gunakan Poin?</label>
                    </p>
                  </div>
                </div>
                <hr>
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

@section('js')
<script type="text/javascript">
  $('#liter').on('change', () => {
    $('#total_price').text('Rp. ' + {{ $price->price }} * $('#liter').val())
  })

  $('#police_number').on('change', () => {
    $.ajax({
      type: 'GET',
      url: "{{ url('getMemberFromPoliceNumber') }}/" + $('#police_number').val(),
      success: (data) => {
        if (data != 0) {
          $('#member_id').val(data.member_id)
          $('#member_name').text("Nama Member :" + data.member_name)
          $('#member_point').text(data.point_member + " poin")
          if (Math.floor(data.point_member / 150) != 0) {
            $('#pay_with_point').show()
            $('#switch_pay_with_point').show()
          }

          $('#pay_with_point').text("Konversi uang ke Poin: " + (Math.floor(data.point_member / 150) * 10000))
        }else {
          $('#member_id').val(0)
          $('#member_name').text("Nama Member : Tidak diketahui")
          $('#member_point').text("0 poin")
          $('#pay_with_point').hide()
        }
      },
      error: (error) => {
        console.log(error);
      }
    })
  })
</script>
@endsection
