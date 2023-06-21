@extends('layout.default')

@section('content')
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Purchasing Order</h3>
              </div>
              
                
              <div class="card-body">
              
              
              <a href="{{'shipment'}}" type="submit" class="btn btn-md btn-success mb-3" >Bayar</a>
              <!-- error -->
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                                <th >No PRO</th>
                                <th >Tanggal</th>
                                <th >Nama Barang</th>
                                <th >Jumlah</th>
                                <th >Satuan</th>
                                <th >harga</th>
                                <th >Total</th>
                                <th >Options</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts_po as $post)
                                <tr>
                                  <td>{{ $post->no_pro }}</td>
                                  <td>{{ $post->tanggal }}</td>
                                  <td>{{ $post->nama_barang }}</td>
                                  <td>{{ $post->jumlah_barang }}</td>
                                  <td>{{ $post->satuan }}</td> 
                                  <td>{{ $post->harga }}</td> 
                                  <td>
                                    <?php 
                                      $str_harga = preg_replace("/} {/","", $post->harga);
                                      $str_jumlah = preg_replace("/} {/","", $post->jumlah_barang);
                                      $int_harga=(int)$str_harga;
                                      $int_jumlah=(int)$str_jumlah;
                                   $int_total=$int_jumlah*$int_harga;
                                   $str_total=(string)$int_total;
                                   echo $int_total;
                                   ?>
                                   </td> 
                                  <td>
                                  <form method="POST" action="{{url('payment')}}">
                @csrf
                                  <label><button  name="id" class="btn btn-info btn-sm"  type="submit" Value="{{$post->id}}"> 
                                 
                                      <i class="fas fa-pencil-alt">
                                      </i>
                                    Edit
                                      </button>
                                      </label>
                                      
              </form>
                                        
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
</div>
        
@endsection
