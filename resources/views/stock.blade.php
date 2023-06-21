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
                        <th rowspan="2" style="text-align:center; vertical-align:middle;" >
                            ID Barang
                        </th>
                        <th rowspan="2" style="text-align:center; vertical-align:middle;" >
                            Nama Barang
                        </th>
                        <th rowspan="2" style="text-align:center; vertical-align:middle;" >Harga</th>
                        <th colspan="3" style="text-align:center;">IN</th>
                        <th colspan="3" style="text-align:center;">OUT</th>
                        <th colspan="3" style="text-align:center;">ClOSING</th>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Total</th>                        
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Total</th>                        
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tb_stock as $post)
                                <tr>
                                  <td>{{ $post->id_barang }}</td>
                                  <td>{{ $post->nama_barang }}</td>
                                  <td>{{ $post->harga }}</td>
                                  <td>{{ $post->jumlah }}</td>
                                  <td>{{ $post->satuan }}</td>
                                  <td> <?php 
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