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
                <form action="{{ route('admin.psa.update', ['id' => $data->id]) }}" method="POST"
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
                                            <label for="exampleInputEmail1">Nomor Perkiraan</label>
                                            <input type="text" class="form-control" id="nomper"
                                                name="nomor_perkiraan" value="{{ old('nomor_perkiraan', $data->nomor_perkiraan) }}">
                                            </select>
                                            @error('nomor_perkiraan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Perkiraan</label>
                                            <input type="text" class="form-control" id="naper"
                                                name="nama_perkiraan" value="{{ $data->nama_perkiraan }}">
                                            @error('nama_perkiraan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis</label>
                                            <select class="form-control" id="jenis" name="jenis">
                                                <option value="debit" {{ old('jenis', $data->jenis) == 'debit' ? 'selected' : '' }}>Debit</option>
                                                <option value="kredit" {{ old('jenis', $data->jenis) == 'kredit' ? 'selected' : '' }}>Kredit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Saldo Awal</label>
                                            <input type="number" class="form-control" id="tahun"
                                                name="saldo_awal" value="{{ $data->saldo_awal }}">
                                            @error('saldo_awal')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="created_by" class="form-control" id="exampleInputEmail1" value="{{ auth()->user()->name }}">
                                            @error('created_by')
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
