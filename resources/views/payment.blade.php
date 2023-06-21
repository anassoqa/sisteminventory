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
              <form method="POST" action="{{url('store_payment')}}">
                @csrf
                
              <div class="card-body">
              <button type="submit" class="btn btn-md btn-success mb-3" >Proccess</button>
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID</th>
                                <th >Nama Barang</th>
                                <th >Jumlah</th>
                                <th >Satuan</th>
                                <th >harga</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts_payment as $post)
                                <tr><td>
                                    <input type="text" name="id" value="{{ $post->id }}" placeholder="{{ $post->id }}">                            
                            <!-- error message untuk title -->
                            
                            </td>
                                  <td><input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ $post->nama_barang }}" placeholder="{{ $post->nama_barang }}">
                                  <input type="hidden" name="id" value="{{ $post->id }}">                            
                            <!-- error message untuk title -->
                            @error('nomor_pro')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </td>
                                  <td><input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" value="{{ $post->jumlah_barang }}" placeholder="{{ $post->jumlah_barang }}">
                            
                            <!-- error message untuk title -->
                            @error('jumlah_barang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                                   </td>
                                  <td><input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ $post->satuan }}" placeholder="{{ $post->satuan }}">
                            
                            <!-- error message untuk title -->
                            @error('satuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                                   </td> 
                                  <td>
                                  <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $post->harga }}" placeholder="{{ $post->harga }}">
                            
                            <!-- error message untuk title -->
                            @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror</td> 
                                  
                                </tr>
                                @endforeach
                  </tbody>
                 
                </table>
              </div>
              </form>
            </div>
          </div>
          </div>
          </div>
</div>
        
@endsection
