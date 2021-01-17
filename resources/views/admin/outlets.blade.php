@extends('layouts.app')

@section('content')

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Outlet</h4>
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
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($salim = 1)
                @foreach ($outlets as $outlet)
                  <tr>
                    <td>{{ $salim++ }}</td>
                    <td>{{ $outlet->name }}</td>
                    <td>{{ $outlet->address }}</td>
                    <td>
                      <button type="button" class="btn btn-success btn_edit" onclick="showModelEdit({{ $outlet->id }}, '{{ $outlet->name }}', '{{ $outlet->address }}')">Edit</button>
                      <button type="button" class="btn btn-danger btn_delete" onclick="showModelHapus({{ $outlet->id }})">Hapus</button>
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
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px; height: 300px">
    <h4 style="color: black">Form Outlet</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form action="{{ url('outlets') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-3">
            Nama :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" placeholder="Nama Outlet">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Alamat :
          </div>
          <div class="col-md-7">
            <input type="address" class="form-control" name="address" placeholder="Alamat">
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
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px; height: 300px">
    <h4 style="color: black">Form Outlet</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form id="form_edit" action="{{ url('outlets') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-3">
            Nama :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" placeholder="Nama Outlet" id="outlet_name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Alamat :
          </div>
          <div class="col-md-7">
            <input type="address" class="form-control" name="address" placeholder="Alamat" id="outlet_address">
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
      <form id="form_delete" action="{{ url('outlets') }}" method="post">
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

  showModelEdit = (id, name, address) => {
    $('#modal_edit').show()
    $('#form_edit').attr('action', "{{ url('outlets') }}/" + id)
    $('#outlet_name').val(name)
    $('#outlet_address').val(address)
  }

  showModelHapus = (id) => {
    $('#modal_delete').show()
    $('#form_delete').attr('action', "{{ url('outlets') }}/" + id)
  }

  $('.close-btn').on('click', () => {
    $('#modal_add').hide()
    $('#modal_edit').hide()
    $('#modal_delete').hide()
  })
</script>
@endsection
