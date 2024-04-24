@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Isi RAB Tahun ini</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Proses Awal / RAB Tahun ini</i>
@endsection
@section('title')
    <title>KoperasiPG | RAB Tahun ini</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <a href="{{ route('admin.rti.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="#" data-toggle="modal" data-target="#mauimport" class="btn btn-success mb-3 ml-3">Import File</a>

                        <div class="card">
                            <div class="card-body table-responsive pt-3 pl-3 pr-3">
                                <table id="rabTable" class="table table-hover text-nowrap table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Nomor Perkiraan</th>
                                            <th>Nama Perkiraan</th>
                                            <th>RAB Januari</th>
                                            <th>RAB Februari</th>
                                            <th>RAB Maret</th>
                                            <th>RAB April</th>
                                            <th>RAB Mei</th>
                                            <th>RAB Juni</th>
                                            <th>RAB Juli</th>
                                            <th>RAB Agustus</th>
                                            <th>RAB September</th>
                                            <th>RAB Oktober</th>
                                            <th>RAB November</th>
                                            <th>RAB Desember</th>
                                            <th>Created_by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->tahun }}</td>
                                                <td>{{ $d->nomor_perkiraan }}</td>
                                                <td>{{ $d->nama_perkiraan }}</td>
                                                <td>{{ $d->rab_januari }}</td>
                                                <td>{{ $d->rab_februari }}</td>
                                                <td>{{ $d->rab_maret }}</td>
                                                <td>{{ $d->rab_april }}</td>
                                                <td>{{ $d->rab_mei }}</td>
                                                <td>{{ $d->rab_juni }}</td>
                                                <td>{{ $d->rab_juli }}</td>
                                                <td>{{ $d->rab_agustus }}</td>
                                                <td>{{ $d->rab_september }}</td>
                                                <td>{{ $d->rab_oktober }}</td>
                                                <td>{{ $d->rab_november }}</td>
                                                <td>{{ $d->rab_desember }}</td>
                                                <td>{{ $d->created_by }}</td>
                                                <td>
                                                    <a href="{{ route('admin.rti.detail', ['id' => $d->id]) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="{{ route('admin.rti.edit', ['id' => $d->id]) }}"
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
                                                            <p>Apakah kamu yakin ingin menghapus data RAB tahun ini
                                                                <br><b>Id: {{ $d->id }}</b><br><b>Tahun: {{ $d->tahun }}</b><br><b>Nomor Perkiraan: {{ $d->nomor_perkiraan }}</b><br><b>Nama Perkiraan: {{ $d->nama_perkiraan }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('admin.rti.delete', ['id' => $d->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal" style="text-align: left;">Close</button>
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
    @include('admin.prosesawal.rabthini.import')
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $("#rabTable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        title: null,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        title: null,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }
                    }
                ],
            })
            }
        );
    </script>
@endsection