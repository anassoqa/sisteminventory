@extends('layout.default')

@section('content')
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
            <h2 class="text-center display-4">Search Goods ID</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <form action="{{ route('store_sin_tmp') }}" method="POST" enctype="multipart/form-data">
                @csrf      
                  <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <hr>
        <a href="{{url('create_pro')}}" class="btn btn-md btn-success mb-3">POSTING</a>
        <table  class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>harga</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  @foreach ($tb_sin_temp as $post)
                  <tbody>
                        <tr>
                          <td>{{ $post->id_barang }}</td>
                          <td>{{ $post->nama_barang }}</td>
                          <td>{{ $post->jumlah_sin }}</td>
                          <td>{{ $post->satuan }}</td>
                          <td>{{ $post->harga }}</td>
                          <td> <?php 
                                      $str_harga = preg_replace("/} {/","", $post->harga);
                                      $str_jumlah = preg_replace("/} {/","", $post->jumlah_sin);
                                      $int_harga=(int)$str_harga;
                                      $int_jumlah=(int)$str_jumlah;
                                   $int_total=$int_jumlah*$int_harga;
                                   $str_total=(string)$int_total;
                                   echo $int_total;
                                   ?></td>
                        </tr>
                  </tbody>
                  @endforeach
                </table>

</section>     
</div>
        
@endsection