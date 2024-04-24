@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Isi Proses Saldo Awal</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Proses Awal / Proses Saldo Awal</i>
@endsection
@section('title')
    <title>KoperasiPG | Proses Saldo Awal</title>
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
                        <divc class="row">
                            <div class="col">
                                <a href="{{ route('admin.psa.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                                <a href="#" data-toggle="modal" data-target="#mauimport"
                                    class="btn btn-success mb-3 ml-3">Import File</a>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-3 col-6">
                                            <div class="description-block border-right">
                                                <h5 class="description-header">Status</h5>
                                                <span class="description-text">{{ $status }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-6">
                                            <div class="description-block border-right">
                                                <h5 class="description-header">Selisih</h5>
                                                <span
                                                    class="description-text">Rp.{{ number_format($selisih, 0, ',', '.') }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-6">
                                            <div class="description-block border-right">
                                                <h5 class="description-header">Jumlah Debit</h5>
                                                <span
                                                    class="description-text">Rp.{{ number_format($debit, 0, ',', '.') }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-6">
                                            <div class="description-block">
                                                <h5 class="description-header">Jumlah Kredit</h5>
                                                <span
                                                    class="description-text">Rp.{{ number_format($kredit, 0, ',', '.') }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-footer -->
                                <div class="card">
                                    <div class="card-body table-responsive pt-3 pl-3 pr-3">
                                        <table id="psaTable" class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Perkiraan</th>
                                                    <th>Nama Perkiraan</th>
                                                    <th>Jenis</th>
                                                    <th>Saldo Awal</th>
                                                    <th>Created_by</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->nomor_perkiraan }}</td>
                                                        <td>{{ $d->nama_perkiraan }}</td>
                                                        <td>{{ $d->jenis }}</td>
                                                        <td>Rp.{{ number_format($d->saldo_awal, 0, ',', '.') }}</td>
                                                        <td>{{ $d->created_by }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.psa.detail', ['id' => $d->id]) }}"
                                                                class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                            <a href="{{ route('admin.psa.edit', ['id' => $d->id]) }}"
                                                                class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                                            <a data-toggle="modal"
                                                                data-target="#modal-hapus{{ $d->id }}"
                                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                                Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah kamu yakin ingin menghapus data Proses Saldo
                                                                        Awal
                                                                        <br><b>Nomor Perkiraan:
                                                                            {{ $d->nomor_perkiraan }}</b><br><b>Nama
                                                                            Perkiraan:
                                                                            {{ $d->nama_perkiraan }}</b><br><b>Jenis:
                                                                            {{ $d->jenis }}</b><br><b>Saldo Awal:
                                                                            {{ $d->saldo_awal }}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('admin.psa.delete', ['id' => $d->id]) }}"
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
    @include('admin.prosesawal.prosessaldoawal.import')
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
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        title: null,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    }
                ],
            })
        });
    </script>
@endsection
