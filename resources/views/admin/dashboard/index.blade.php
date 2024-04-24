@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Dashboard</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Dashboard</i>
@endsection
@section('title')
    <title>KoperasiPG | Dashboard</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 mt-3">
                        <div class="card card-primary card-outline" id="ac1">
                            <a class="d-block w-100" data-toggle="collapse" href="#co1">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 1: Mengisi Nomor Perkiraan
                                    </h4>
                                </div>
                            </a>
                            <div id="co1" class="collapse" data-parent="#ac1">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Nomor Perkiraan
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Isi kode dan uraian sesuai dengan yang di tentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline" id="ac2">
                            <a class="d-block w-100" data-toggle="collapse" href="#co2">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 2: Mengisi Rab Tahun Ini
                                    </h4>
                                </div>
                            </a>
                            <div id="co2" class="collapse" data-parent="#ac2">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Proses Awal
                                        </li>
                                        <li>
                                            Pilih menu Isi RAB Tahun ini
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Isi tahun untuk RAB nya
                                        </li>
                                        <li>
                                            Isikan RAB setiap bulannya
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline" id="ac3">
                            <a class="d-block w-100" data-toggle="collapse" href="#co3">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 3: Isi Proses Saldo Awal
                                    </h4>
                                </div>
                            </a>
                            <div id="co3" class="collapse" data-parent="#ac3">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Proses Awal
                                        </li>
                                        <li>
                                            Isi Proses Saldo Awal
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Isi nomor perkiraan, nama perkiraan, jenis, dan saldo awal sesuai dengan yang di tentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline" id="ac4">
                            <a class="d-block w-100" data-toggle="collapse" href="#co4">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 4: Koreksi Masukan Data Kas Bank
                                    </h4>
                                </div>
                            </a>
                            <div id="co4" class="collapse" data-parent="#ac4">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Data Harian
                                        </li>
                                        <li>
                                            Klik Masukan Koreksi Data Kas/Bank
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Pilih tanggal dan jenis dengan yang di tentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6 mt-3">
                        <div class="card card-primary card-outline" id="ac5">
                            <a class="d-block w-100" data-toggle="collapse" href="#co5">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 5: Masukan Koreksi Data Memorial
                                    </h4>
                                </div>
                            </a>
                            <div id="co5" class="collapse" data-parent="#ac5">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Data Harian
                                        </li>
                                        <li>
                                            Klik Masukan Koreksi Data Memorial
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Pilih tanggal sesuai dengan yang di tentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline" id="ac6">
                            <a class="d-block w-100" data-toggle="collapse" href="#co6">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 6: Masukan Koreksi Data Memo Suplement
                                    </h4>
                                </div>
                            </a>
                            <div id="co6" class="collapse" data-parent="#ac6">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Data Harian
                                        </li>
                                        <li>
                                            Pilih menu Koreksi Data Memo Suplement
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Pilih tanggal sesuai dengan yang ditentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline" id="ac7">
                            <a class="d-block w-100" data-toggle="collapse" href="#co7">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Langkah ke 7: Masukan Koreksi Data Memo Penutup
                                    </h4>
                                </div>
                            </a>
                            <div id="co7" class="collapse" data-parent="#ac7">
                                <div class="card-body">
                                    <p class="card-text">Ikuti langkah berikut ini:</p>
                                    <ul>
                                        <li>
                                            Pilih menu Data Harian
                                        </li>
                                        <li>
                                            Pilih menu Masukan Koreksi Data Memo Penutup
                                        </li>
                                        <li>
                                            Klik Tambah Data
                                        </li>
                                        <li>
                                            Pilih tanggal sesuai dengan yang di tentukan
                                        </li>
                                        <li>
                                            Kemudian submit
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">Lihat Tutorial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
@endsection
