@extends('layout.default')

@section('content')
<div class="content-wrapper">
<div class="row">
          
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Deskripsi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="card-body">
                        Berikut adalah program sederhana yang digunakan untuk sistem inventory.
                        <br>
                        Adapun beberapa menu untuk dideskripsikan sebagaimana fungsinya, yaitu:
                        <br>
                        -PRO (Purchase Request Order): Digunakan untuk Pesan Barang, 
                        <br>
                        -PO (Purchase Order): Digunakan untuk Menu Pembayaran,
                        <br>
                        -GR (Goods Received): Digunakan untuk Penerimaan Barang,
                        <br>
                        -SIN (Store Issue Note): Digunakan untuk Pengeluaran Barang,
                        <br>
                        -Stock Balance: Untuk Menampilkan stok persediaan barang digudang,
<br>
                        Fitur yang sudah jalan: <br>
                        -PRO <br>
                        -PO <br>
                        -GRN <br>

                        Tahap Pengerjaan Berikutnya: <br>
                        - Multiuser, <br>
                        - SIN,<br>
                        - Laporan Stock, <br>
                        - Pengoptimalan Javascript Untuk Mempermudah User, <br>
                        - Source Code yang belum rapi.
                    </div>
                    <
                  </div>
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
</div>
@endsection