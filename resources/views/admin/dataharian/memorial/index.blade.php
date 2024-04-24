@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Masukan Koreksi Data Memorial</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Memorial</i>
@endsection
@section('title')
    <title>KoperasiPG | Memorial</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <a href="{{ route('admin.mr.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="#" data-toggle="modal" data-target="#mauimport" class="btn btn-success mb-3 ml-3">Import File</a>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nomor Bukti</th>
                                            <th>Nomor Perkiraan</th>
                                            <th>Deskripsi</th>
                                            <th>UBL</th>
                                            <th>Jumlah Uang</th>
                                            <th>Jenis</th>
                                            <th>Created_By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->nomor_bukti }}</td>
                                                <td>{{ $d->nomor_perkiraan }}</td>
                                                <td>{{ $d->deskripsi }}</td>
                                                <td>{{ $d->ubl }}</td>
                                                <td>{{ $d->jumlah_uang }}</td>
                                                <td>{{ $d->jenis }}</td>
                                                <td>{{ $d->created_by }}</td>
                                                <td>
                                                    <a href="{{ route('admin.mr.detail', ['id' => $d->id]) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="{{ route('admin.mr.edit', ['id' => $d->id]) }}"
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
                                                            <p>Apakah kamu yakin ingin menghapus data memorial
                                                                <br><b>Tanggal: {{ $d->tanggal }}</b><br><b>NOmor Bukti: {{ $d->nomor_bukti }}</b><br><b>Nomor Perkiraan: {{ $d->nomor_perkiraan }}</b><br><b>Deskripsi: {{ $d->deskripsi }}</b><br><b>UBL: {{ $d->ubl }}</b><br><b>Jumlah Uang: {{ $d->jumlah_uang }}</b><br><b>Jenis: {{ $d->jenis }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('admin.mr.delete', ['id' => $d->id]) }}"
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
    @include('admin.dataharian.memorial.import')
@endsection
@section('scripts')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#psaTable").DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        title: null,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        title: null,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    }
                ],
            })
        });
    </script>
@endsection