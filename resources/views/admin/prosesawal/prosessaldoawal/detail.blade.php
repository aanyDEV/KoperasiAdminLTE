@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Isi Proses Saldo Awal</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Proses Saldo Awal</i>
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
                                    <label for="exampleInputEmail1">Nomor Perkiraan</label>
                                    <p>{{ $data->nomor_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Perkiraan</label>
                                    <p>{{ $data->nama_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis</label>
                                    <p>{{ $data->jenis }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Saldo Awal</label>
                                    <p>{{ $data->saldo_awal }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Created_by</label>
                                    <p>{{ $data->created_by }}</p>
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