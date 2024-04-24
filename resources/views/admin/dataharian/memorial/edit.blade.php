@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Masukan Koreksi Data Memorial</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Memorial</i>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid mt-3">
                <form action="{{ route('admin.mr.update', ['id' => $data->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        @if ($data->image)
                                            <img src="{{ asset('storage/photo-user/' . $data->image) }}" width="100"
                                                height="100px" alt="">
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="photo">
                                            <small>Upload foto jika ingin menggantinya</small>
                                            @error('photo')
                                                <br>
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                name="email" value="{{ $data->email }}" placeholder="Enter email">
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                id="exampleInputEmail1" value="{{ $data->name }}"
                                                placeholder="Enter Name">
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="Password">
                                            @error('password')
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
