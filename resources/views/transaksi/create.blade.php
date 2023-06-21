@extends('layout.default')
@section('sidebar')
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               
          <li class="nav-item">
            <a href="/pro" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Purchase Request Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
</li>
<li class="nav-item">
            <a href="/po" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Purchase Order 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
</li>
<li class="nav-item">
            <a href="/grn" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Goods Received 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
</li>
<li class="nav-item">
            <a href="/sin" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Store Issued
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
</li>
            
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3 class="text-center display-4">Add Goods Issue Page</h3>
            <form action="{{route('transaksi.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="search" class="form-control form-control-lg" placeholder="masukan ID Barang" name="id" id="id">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-lg btn-default" onclick="tambahItem()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                        <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            
                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>

                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-info">Tambah</button>
                            </div>
                        </div>
                       
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Textarea Disabled</label>
                        <textarea class="form-control" rows="9" placeholder="Enter ..." disabled></textarea>
                      </div>
                    </div>
                    </div> 
                  
                
                    
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </form>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">General Elements</h3>
              
              </div>
            </div>
      </div>
  </section>
</div>
        
@endsection