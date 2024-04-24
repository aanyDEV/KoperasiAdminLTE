@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Isi RAB Tahun ini</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / RAB Tahun ini</i>
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
                                    <label for="exampleInputEmail1">Tahun</label>
                                    <p>{{ $data->tahun }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Perkiraan</label>
                                    <p>{{ $data->nomor_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Perkiraan</label>
                                    <p>{{ $data->nama_perkiraan }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Januari</label>
                                    <p>{{ $data->rab_januari }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Februari</label>
                                    <p>{{ $data->rab_februari }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Maret</label>
                                    <p>{{ $data->rab_maret }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB April</label>
                                    <p>{{ $data->rab_april }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Mei</label>
                                    <p>{{ $data->rab_mei }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Juni</label>
                                    <p>{{ $data->rab_juni }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Juli</label>
                                    <p>{{ $data->rab_juli }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Agustus</label>
                                    <p>{{ $data->rab_agustus }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB September</label>
                                    <p>{{ $data->rab_september }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Oktober</label>
                                    <p>{{ $data->rab_oktober }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB November</label>
                                    <p>{{ $data->rab_november }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAB Desember</label>
                                    <p>{{ $data->rab_desember }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Created by</label>
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
