@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Nomer Perkiraan</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Nomer Perkiraan</i>
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.np.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6 mt-3 ml-auto mr-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="kode" placeholder="Masukan kode...">
                            @error('kode')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Uraian</label>
                              <input type="text" name="uraian" class="form-control" id="exampleInputEmail1" placeholder="Masukan Uraian...">
                              @error('uraian')
                                  <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="user" class="form-control" id="exampleInputEmail1" value="{{ auth()->user()->name }}">
                            @error('user')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>
@endsection