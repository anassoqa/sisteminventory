@extends('layout.default')

@section('content')
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Purchase Request Order</h3>
              </div>
              <div class="card-body">
              <a href="{{url('create_pro')}}" class="btn btn-md btn-success mb-3">TAMBAH PRO</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                                <th >No PRO</th>
                                <th >Tanggal</th>
                                <th >Nama Barang</th>
                                <th >Jumlah</th>
                                <th >Satuan</th>
                                <th >Departement</th>
                                <th >Remark</th>
                                <th >Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts_pro as $post)
                                <tr>
                                  <td>{{ $post->nomor_pro }}</td>
                                  <td>{{ $post->tanggal }}</td>
                                  <td>{{ $post->nama_barang }}</td>
                                  <td>{{ $post->jumlah_barang }}</td>
                                  <td>{{ $post->satuan }}</td>
                                  <td>{{ $post->departement }}</td>                                
                                  <td>{{ $post->remark }}</td>
                                  <td>{{ $post->status }}</td>
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