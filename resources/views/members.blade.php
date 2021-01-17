@extends('layouts.app')

@section('content')

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail member</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-2">Nama: </div>
              <div class="col-md-4">{{ Auth::user()->name }}</div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">Poin: </div>
              <div class="col-md-4">{{ $points }}</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-2">Motor: </div>
              <div class="col-md-6">{{ @$motocycle ? $motocycle->name.' - '.$motocycle->police_number : 'Nama Motor - Plat Nomor' }}</div>
              <div class="col-md-4">
                <button type="button" id="btn_motocycle" class="btn btn-primary">Kelola Motor</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">Mobil: </div>
              <div class="col-md-6">{{ @$car ? $car->name.' - '.$car->police_number : 'Nama Mobil - Plat Nomor' }}</div>
              <div class="col-md-4">
                <button type="button" id="btn_car" class="btn btn-primary">Kelola Mobil</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Tipe</th>
                  <th>Liter</th>
                  <th>Harga/Liter</th>
                  <th>Bintang</th>
                  <th>Review</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($salim = 1)
                @foreach ($transactions as $transaction)
                  <tr>
                    <td>{{ $salim++ }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->price->type }}</td>
                    <td>{{ $transaction->liters }}</td>
                    <td>{{ number_format($transaction->price->price) }}</td>
                    <td>{{ $transaction->stars }}</td>
                    <td>{{ $transaction->reviews }}</td>
                    <td>
                      @if ($transaction->reviews == null)
                        <button type="button" class="btn btn-success btn_review" onclick="showModelReview({{ $transaction->id }})">Review</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ======= Popup Section ======= -->
    <section id="modal_motocycle" class="popup-graybox">
      <div class="ebook-popup-sec" style="background: linear-gradient(rgba(246, 176, 36, 0.6), rgba(232, 218, 95, 0.6)), url(assets/img/hero-bg.jpg) fixed center center; background-size: cover; background-color: #0b2e13;" >
        <h2 data-edit="text" style="font-family: Poppins; color: #05579E">Form Motor</h2>
  <!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
        <div class="ebook-email-sec">
          <form action="{{ url('vehicles') }}" method="post">
            @csrf
            <input type="hidden" name="type" value="motocycle">
            <input type="text" name="name" class="ebookemail-input1" data-edit="placeholder" placeholder="Nama Motor" value="{{ @$motocycle->name }}">
            <input type="text" name="police_number" class="ebookemail-input2" data-edit="placeholder" placeholder="Plat Nomor" value="{{ @$motocycle->police_number }}">
            <button class="ebook-input-btn" type="submit" style="font-family: Poppins">Simpan Data Motor</button>
          </form>
          <button class="ebook-cls-btn close-btn">X</button>
        </div>
      </div>
    </section>
    <!-- end Popup Section-->

    <!-- ======= Popup Section ======= -->
    <section id="modal_car" class="popup-graybox">
      <div class="ebook-popup-sec" style="background: linear-gradient(rgba(246, 176, 36, 0.6), rgba(232, 218, 95, 0.6)), url(assets/img/hero-bg.jpg) fixed center center; background-size: cover; background-color: #0b2e13;" >
        <h2 data-edit="text" style="font-family: Poppins; color: #05579E">Form Mobil</h2>
  <!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
        <div class="ebook-email-sec">
          <form action="{{ url('vehicles') }}" method="post">
            @csrf
            <input type="hidden" name="type" value="car">
            <input type="text" name="name" class="ebookemail-input1" data-edit="placeholder" placeholder="Nama Mobil" value="{{ @$car->name }}">
            <input type="text" name="police_number" class="ebookemail-input2" data-edit="placeholder" placeholder="Plat Nomor" value="{{ @$car->police_number }}">
            <button class="ebook-input-btn" type="submit" style="font-family: Poppins">Simpan Data Mobil</button>
          </form>
          <button class="ebook-cls-btn close-btn">X</button>
        </div>
      </div>
    </section>
    <!-- end Popup Section-->


    <!-- ======= Popup Section ======= -->
    <section id="modal_review" class="popup-graybox">
      <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px">
        <h4 style="color: black">Form Review</h4>
        <hr>
  <!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
        <div class="ebook-email-sec" style="text-align: left">
          <form action="{{ url('reviews') }}" method="post">
            @csrf
            <input type="hidden" name="transaction_id" id="transaction_id">
            <div class="row">
              <div class="col-md-3">
                Bintang :
              </div>
              <div class="col-md-3">
                <select class="form-control" name="stars">
                  @for ($i=1; $i < 6; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                Review :
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <textarea name="reviews" class="form-control" rows="3"></textarea>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12" style="text-align: right">
                <button type="button" class="btn btn-default close-btn">Kembali</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            <br>
          </form>
        </div>
      </div>
    </section>
    <!-- end Popup Section-->

  </div>
</section><!-- End Portfolio Details Section -->
@endsection

@section('js')
<script type="text/javascript">
  $('#btn_motocycle').on('click', () => {
    $('#modal_motocycle').show()
  })

  $('#btn_car').on('click', () => {
    $('#modal_car').show()
  })

  $('.close-btn').on('click', () => {
    $('#modal_motocycle').hide()
    $('#modal_car').hide()
    $('#modal_review').hide()
  })

  showModelReview = (transaction_id) => {
    $('#transaction_id').val(transaction_id)
    $('#modal_review').show()
  }
</script>
@endsection
