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
                <form action="{{ route('admin.np.update', ['id' => $data->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6 mt-3 ml-auto mr-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode</label>
                                            <input type="text" name="kode" class="form-control"
                                                id="kode" value="{{ $data->kode }}"
                                                placeholder="Enter Name">
                                            @error('kode')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Uraian</label>
                                            <input type="text" name="uraian" class="form-control"
                                                id="uraian" value="{{ $data->uraian }}">
                                            @error('uraian')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</b utton>
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
