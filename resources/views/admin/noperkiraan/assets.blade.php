@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Nomer Perkiraan</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Nomer Perkiraan</i>
@endsection
@section('title')
    <title>KoperasiPG | No Perkiraan</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <a href="{{ route('admin.np.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="{{ route('admin.np.assets') }}?export=pdf" class="btn btn-danger ml-3 mb-3">Export PDF</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Import Nomer Perkiraan</h3>

                                <div class="card-tools">
                                    <form action="{{ route('admin.np.index') }}" method="GET">
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
                                            <th>Created_by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->id }}</td>
                                                <td>{{ $d->kode }}</td>
                                                <td>{{ $d->uraian }}</td>
                                                <td>{{ $d->created_by }}</td>
                                            </tr>
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
    @include('admin.noperkiraan.import')
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@endsection