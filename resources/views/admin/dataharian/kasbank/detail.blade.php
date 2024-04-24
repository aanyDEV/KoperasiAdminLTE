@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Masukan Koreksi Data Kas Bank</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Kas Bank</i>
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
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <p>{{ $data->tanggal }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis</label>
                                    <p>{{ $data->jenis }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Bukti</label>
                                    <p>{{ $data->nomor_bukti }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Perkiraan</label>
                                    <p>{{ $data->nomor_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Perkiraan Lawan</label>
                                    <p>{{ $data->nomor_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsi</label>
                                    <p>{{ $data->deskripsi }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">UBL</label>
                                    <p>{{ $data->ubl }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Uang</label>
                                    <p>{{ $data->jumlah_uang }}</p>
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