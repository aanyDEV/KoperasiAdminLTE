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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 mt-3 ml-auto mr-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Id</label>
                                    <p>{{ $data->id }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode</label>
                                    <p>{{ $data->kode }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Uraian</label>
                                    <p>{{ $data->uraian }}</p>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection