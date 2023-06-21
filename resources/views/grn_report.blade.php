@extends('layout.default')

@section('content')
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Goods Received Page</h3>
              </div>
              <form method="POST" action="{{ route('store_grn') }}">
              @csrf
              <div class="card-body">
              <button type="submit" class="btn btn-md btn-success mb-3">POSTING</button>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                                <th >Id Barang</th>
                                <th >Tanggal Terima</th>
                                <th >Nomor Shipment</th>
                                <th >Nama Barang</th>
                                <th >Jumlah</th>
                                <th >Satuan</th>
                                <th >harga</th>
                                <th >Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tb_grn as $post)
                                <tr>
                                  <td>{{ $post->id_barang }}</td>
                                  <td>{{ $post->tanggal_grn }}</td>
                                  <td>{{ $post->id_shipment }}</td>
                                  <td>{{ $post->nama_barang }}</td>
                                  <td>{{ $post->jumlah }}</td>
                                  <td>{{ $post->satuan }}</td>
                                  <td>{{ $post->harga }}</td><td> <?php 
                                      $str_harga = preg_replace("/} {/","", $post->harga);
                                      $str_jumlah = preg_replace("/} {/","", $post->jumlah_barang);
                                      $int_harga=(int)$str_harga;
                                      $int_jumlah=(int)$str_jumlah;
                                   $int_total=$int_jumlah*$int_harga;
                                   $str_total=(string)$int_total;
                                   echo $int_total;
                                   ?></td>
                                </tr>
                                @endforeach
                  </tbody>
                 
                </table>
              </div>
            </div>
          </div>
          </div>
          </div>
                                      </form>
</div>
        
@endsection