@extends('layouts.app')

@section('content')

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Karyawan</h4>
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
                  <th>Outlet</th>
                  <th>Email</th>
                  <th>Tanggal Lahir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($salim = 1)
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $salim++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->outlet->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>
                      <button type="button" class="btn btn-success btn_edit" onclick="showModelEdit({{ $user->id }}, '{{ $user->name }}', {{ $user->outlet_id }}, '{{ $user->email }}', '{{ $user->dob }}')">Edit</button>
                      <button type="button" class="btn btn-danger btn_delete" onclick="showModelHapus({{ $user->id }})">Hapus</button>
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
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px; height: 400px">
    <h4 style="color: black">Form Karyawan</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form action="{{ url('employees') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-3">
            Nama :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" placeholder="Nama Karyawan">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Outlet :
          </div>
          <div class="col-md-7">
            <select class="form-control" name="outlet_id">
              @foreach ($outlets as $outlet)
                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Email :
          </div>
          <div class="col-md-7">
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Tanggal Lahir :
          </div>
          <div class="col-md-7">
            <input type="date" class="form-control" name="dob" placeholder="Tanggal Lahir">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Password :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="password" placeholder="Password">
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
  <div class="ebook-popup-sec" style="background: white; padding-bottom: 20px; height: 400px">
    <h4 style="color: black">Form Karyawan</h4>
    <hr>
<!--      <h3 data-edit="text">Subscribe to our email newsletter and get updates on the latest tech tutorials and special offers!</h3>-->
    <div class="ebook-email-sec" style="text-align: left">
      <form id="form_edit" action="{{ url('employees') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-3">
            Nama :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" placeholder="Nama Karyawan" id="employee_name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Outlet :
          </div>
          <div class="col-md-7">
            <select class="form-control" name="outlet_id" id="outlet">
              @foreach ($outlets as $outlet)
                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Email :
          </div>
          <div class="col-md-7">
            <input type="email" class="form-control" name="email" placeholder="Email" id="employee_email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Tanggal Lahir :
          </div>
          <div class="col-md-7">
            <input type="date" class="form-control" name="dob" placeholder="Tanggal Lahir" id="employee_dob">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            Password :
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="password" placeholder="Password">
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
      <form id="form_delete" action="{{ url('users') }}" method="post">
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

  showModelEdit = (id, name, outlet, email, dob) => {
    $('#modal_edit').show()
    $('#form_edit').attr('action', "{{ url('employees') }}/" + id)
    $('#employee_name').val(name)
    $('#outlet').val(outlet)
    $('#employee_email').val(email)
    $('#employee_dob').val(dob)
  }

  showModelHapus = (id) => {
    $('#modal_delete').show()
    $('#form_delete').attr('action', "{{ url('employees') }}/" + id)
  }

  $('.close-btn').on('click', () => {
    $('#modal_add').hide()
    $('#modal_edit').hide()
    $('#modal_delete').hide()
  })
</script>
@endsection
