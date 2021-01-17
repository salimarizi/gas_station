@extends('layouts.app')

@section('content')

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Harga</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="btn btn-primary float-right" id="btn_add">Tambah Data</button>
            <br><br>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Harga Modal</th>
                  <th>Harga Jual</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($salim = 1)
                @foreach ($prices as $price)
                  <tr>
                    <td>{{ $salim++ }}</td>
                    <td>{{ $price->type }}</td>
                    <td>{{ $price->date }}</td>
                    <td>{{ number_format($price->price) }}</td>
                    <td>{{ number_format($price->cost) }}</td>
                    <td>
                      <button type="button" class="btn btn-success btn_edit" onclick="showModelEdit({{ $price->id }}, '{{ $price->type }}', '{{ $price->cost }}', '{{ $price->price }}')">Edit</button>
                      <button type="button" class="btn btn-danger btn_delete" onclick="showModelHapus({{ $price->id }})">Hapus</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Portfolio Details Section -->

<!-- ======= Popup Section ======= -->
<section id="modal_add" class="popup-graybox">
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px">
    <h4 style="color: black">Form Harga</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form action="{{ url('prices') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-3">
            Tipe :
          </div>
          <div class="col-md-3">
            <select class="form-control" name="type">
              <option value="solar">Solar</option>
              <option value="pertalite">Pertalite</option>
              <option value="pertamax">Pertamax</option>
              <option value="pertamax_turbo">Pertamax Turbo</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Harga Modal :
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" name="cost" value="Harga Modal">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Harga Jual :
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" name="price" value="Harga Jual">
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

<!-- ======= Popup Section ======= -->
<section id="modal_edit" class="popup-graybox">
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px">
    <h4 style="color: black">Form Harga</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form id="form_edit" action="{{ url('prices') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-3">
            Tipe :
          </div>
          <div class="col-md-3">
            <select class="form-control" name="type" id="type">
              <option value="solar">Solar</option>
              <option value="pertalite">Pertalite</option>
              <option value="pertamax">Pertamax</option>
              <option value="pertamax_turbo">Pertamax Turbo</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Harga Modal :
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" id="cost" name="cost" value="Harga Modal">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Harga Jual :
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" id="price" name="price" value="Harga Jual">
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

<!-- ======= Popup Section ======= -->
<section id="modal_delete" class="popup-graybox">
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px; height: 240px">
    <h4 style="color: black">Form Review</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form id="form_delete" action="{{ url('prices') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="row">
          <div class="col-md-12">
            Apakah Anda yakin akan menghapus data ini?
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12" style="text-align: right">
            <button type="button" class="btn btn-default close-btn">Kembali</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
        <br>
      </form>
    </div>
  </div>
</section>
<!-- end Popup Section-->
@endsection

@section('js')
<script type="text/javascript">
  $('#btn_add').on('click', () => {
    $('#modal_add').show()
  })

  showModelEdit = (id, type, cost, price) => {
    $('#modal_edit').show()
    $('#form_edit').attr('action', "{{ url('prices') }}/" + id)
    $('#type').val(type)
    $('#cost').val(cost)
    $('#price').val(price)
  }

  showModelHapus = (id) => {
    $('#modal_delete').show()
    $('#form_delete').attr('action', "{{ url('prices') }}/" + id)
  }

  $('.close-btn').on('click', () => {
    $('#modal_add').hide()
    $('#modal_edit').hide()
    $('#modal_delete').hide()
  })
</script>
@endsection
