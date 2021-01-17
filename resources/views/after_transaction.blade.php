@extends('layouts.app')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
          <h2 align="center">Transaksi Berhasil</h2>
      </div>
  </section><!-- End Breadcrumbs -->

  <!--Invoice-->
  <div class="container">
      <div class="page-header">
      </div>
      <div class="container">
          <div class="row">
              <div class="col-md-6 offset-3 body-main">
                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-3"> <img class="img img-fluid" alt="Invoice Template" src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" /> </div>
                          <div class="col-md-9 text-right">
                              <h4 style="color: #f6b024;"><strong>Engen</strong></h4>
                              <p>Jln. Sukakarya No.14</p>
                              <p>(022) 8888</p>
                              <p>engen@ashiap.com</p>
                          </div>
                      </div> <br />
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <h2>FAKTUR</h2>
                              <h5>04854654101</h5>
                          </div>
                      </div> <br />
                      <div>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>
                                      <h5>Produk</h5>
                                  </th>
                                  <th>
                                      <h5>Jumlah</h5>
                                  </th>
                                  <th>
                                      <h5>Harga</h5>
                                  </th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td class="col-md-9">{{ $transaction->price->type }}</td>
                                  <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $transaction->liters }} liter </td>
                                  <td class="col-md-3 text-right"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ number_format($transaction->liters * $transaction->price->price) }} </td>
                              </tr>
                              <tr>
                                  <td class="text-right">
                                  </td>
                                  <td class="text-left">
                                      <p> <strong>Diskon: </strong> </p>
                                  </td>
                                  <td class="text-right">
                                      <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $transaction->discount ? number_format($transaction->discount) : '-' }} </strong> </p>
                                  </td>
                              </tr>
                              <tr style="color: #f6b024;">
                                  <td class="text-right">
                                  </td>
                                  <td class="text-left">
                                      <h4><strong>Total:</strong></h4>
                                  </td>
                                  <td class="text-right">
                                      <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ number_format($transaction->liters * $transaction->price->price - $transaction->discount) }} </strong></h4>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <div>
                          <div class="col-md-12">
                              <p><b>Tanggal :</b>{{ $transaction->created_at->format('d M Y') }}</p> <br />
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
