@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Masukan Koreksi Data Memo Suplement</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Memo Suplement</i>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid mt-3">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail User</h3>
                            </div>
                            <div class="card-body">
                                @if ($data->image)
                                    <img src="{{ asset('storage/photo-user/' . $data->image) }}" width="100"
                                        height="100px" alt="">
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <p>{{ $data->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('users.nama') }}</label>
                                    <p>{{ $data->name }}</p>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('users.type_rumah') }}</th>
                                            <th>{{ __('users.harga_rumah') }}</th>
                                            <th>{{ __('users.Lokasi Rumah') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->rumahs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->type_rumah }}</td>
                                                <td>{{ $item->harga_rumah }}</td>
                                                <td>{{ $item->lokasi_rumah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection
