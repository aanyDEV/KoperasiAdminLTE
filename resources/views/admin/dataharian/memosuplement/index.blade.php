@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Masukan Koreksi Data Memo Suplement</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Memo Suplement</i>
@endsection
@section('title')
    <title>KoperasiPG | Memo Suplement</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <a href="{{ route('admin.ms.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="#" data-toggle="modal" data-target="#mauimport" class="btn btn-success mb-3 ml-3">Import File</a>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{ route('admin.ms.index') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Search" value="{{ $request->get('search') }}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Uraian</th>
                                            <th>Dibuat oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/photo-user/' . $d->image) }}" alt=""
                                                        width="50"></td>
                                                <td>{{ $d->ktp->nik ?? '' }}</td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>
                                                    <a href="{{ route('admin.ms.detail', ['id' => $d->id]) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="{{ route('admin.ms.edit', ['id' => $d->id]) }}"
                                                        class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                                    <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah kamu yakin ingin menghapus data memo suplement
                                                                <b>{{ $d->name }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('admin.ms.delete', ['id' => $d->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Ya,
                                                                    Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('admin.dataharian.memosuplement.import')
@endsection