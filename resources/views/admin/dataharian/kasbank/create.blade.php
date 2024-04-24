@extends('admin.layout.main')
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Data Harian / Data Kas Bank</i>
@endsection
@section('title')
    <title>KoperasiPG | Kas Bank</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            @if ($data == null)
                <div class="container-fluid">
                    <form action="{{ route('admin.kb.create') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6 mt-3 ml-auto mr-auto">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Data</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal:</label>
                                                    <input type="date" class="form-control" id="tanggal"
                                                        name="tanggal">
                                                </div>
                                                @error('tanggal')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis">Jenis</label>
                                                <select class="form-control" id="jenis" name="jenis">
                                                    <option value="masuk">Masuk</option>
                                                    <option value="keluar">Keluar</option>
                                                </select>
                                                @error('tanggal')
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
            @else
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <form id="dataForm" action="{{ route('admin.kb.json') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" class="form-control" id="tanggal"
                                                            name="tanggal" value="{{ $data }}" readonly>
                                                    </div>
                                                    @error('tanggal')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jenis</label>
                                                    <input class="form-control" id="jenis" name="jenis"
                                                        value="{{ $jenis }}" readonly>
                                                    @error('jenis')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Nomor Bukti</label>
                                                    <input class="form-control" id="nobukti" name="nomor_bukti"
                                                        value="{{ $no_bukti }}">
                                                    @error('nomor_bukti')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Nomor Perkiraan</label>
                                                    <input class="form-control" id="nomor_perkiraan2"
                                                        name="nomor_perkiraan2" maxlength="10" required
                                                        onchange="getNamaPerkiraan()">
                                                    <div id="searchResults2" class="mt-2"></div>
                                                    @error('nomor_perkiraan2')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Nomor Perkiraan Lawan</label>
                                                    <input class="form-control" id="nomor_perkiraan" name="nomor_perkiraan"
                                                        maxlength="10" required onchange="getNamaPerkiraan()">
                                                    <div id="searchResults" class="mt-2"></div>
                                                    @error('nomor_perkiraan')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Deskripsi</label>
                                                    <input class="form-control" id="deskripsi" name="deskripsi">
                                                    <div id="searchResults" class="mt-2"></div>
                                                    @error('deskripsi')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jenis</label>
                                                    <select class="form-control" id="ubl" name="ubl" required>
                                                        <option value="" disabled selected>Pilih UBL</option>
                                                        <option value="upah">Upah</option>
                                                        <option value="bahan">Bahan</option>
                                                        <option value="lain-lain">Lain-lain</option>
                                                    </select>
                                                    @error('ubl')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jumlah Uang</label>
                                                    <input class="form-control" type="text" name="jumlah_uang">
                                                    <input type="hidden" class="form-control" id="uraian"
                                                        name="created_by" value="{{ Auth::user()->name }}">
                                                    @error('deskripsi')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('admin.kb.index') }}" class="btn btn-success"
                                                    style="color: white;">Selesai</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="table-responsive">
                            <table class="table" id="dataContainer">
                                @if ($jenis == 'Masuk')
                                    <thead class="thead-primary bg-info">
                                    @else
                                        <thead class="thead-warning bg-danger">
                                @endif
                                <tr>
                                    <th>Nomor Perkiraan Lawan</th>
                                    <th>Deskripsi</th>
                                    <th>UBL</th>
                                    <th>Jumlah Uang</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                        $('#dataForm')[0].reset();
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            function getData() {
                $.ajax({
                    url: '/api/kb/{{ $no_bukti }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Bersihkan kontainer sebelum menambahkan data baru
                        $('#dataContainer tbody').empty();
                        console.log(data);
                        // Lakukan iterasi terhadap data dan tampilkan di halaman
                        var dataContainer = $('#dataContainer');
                        data.data.forEach(function(item) {
                            var row = $('<tr>');
                            row.append($('<td>').text(item.nomor_perkiraan_lawan));
                            row.append($('<td>').text(item.deskripsi));
                            row.append($('<td>').text(item.ubl));
                            row.append($('<td>').text(item.jumlah_uang.toLocaleString()));
                            $('#dataContainer tbody').append(row);
                            // console.log(item.tanggal);
                            // totalAmount += parseFloat(item.jumlah_uang);
                        });
                        var totalRow = $('<tr>');
                        totalRow.append('<td colspan="3"><b>Total Jumlah Uang:</b></td>');
                        totalRow.append($('<td>').text(data.jumlah));
                        $('#dataContainer tbody').append(totalRow);
                        // Panggil fungsi lagi setelah beberapa waktu
                        setTimeout(getData, 1000); // Panggil setiap 5 detik (5000 milidetik)
                    },
                    error: function(error) {
                        // Tampilkan pesan kesalahan jika terjadi
                        console.log(error);

                        // Coba panggil lagi setelah beberapa waktu jika terjadi kesalahan
                        setTimeout(getData, 1000); // Panggil setiap 5 detik (5000 milidetik)
                    }
                });
            }

            // Panggil fungsi pertama kali
            getData();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#nomor_perkiraan').on('input', function() {
                var nomorPerkiraan = $(this).val();

                // Kirim permintaan Ajax ke server
                $.ajax({
                    url: '/api/np/' + nomorPerkiraan,
                    type: 'GET',
                    success: function(data) {
                        // Kosongkan elemen searchResults sebelum menambahkan data baru
                        $('#searchResults').empty();

                        // Iterasi melalui data dan tambahkan elemen div untuk setiap item
                        $.each(data, function(index, item) {
                            $('#searchResults').append('<div class="dropdown-item">' +
                                item.kode + ' | ' + item.uraian + '</div>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#searchResults').on('click', '.dropdown-item', function() {
                // Get the text content of the clicked item
                var selectedItemText = $(this).text();
                var parts = selectedItemText.split('|').map(function(part) {
                    return part.trim();
                });

                // Extract nomor_perkiraan from the text (assuming it is separated by '|')
                var nomorPerkiraan = selectedItemText.split('|')[0].trim();

                // Set the value of nomor_perkiraan input
                $('#nomor_perkiraan').val(nomorPerkiraan);
                // Extract uraian from the data attribute
                var uraian = parts[1];
                console.log(uraian);
                // Set the value of nama_perkiraan input
                $('#nama_perkiraan').val(uraian);
                // Clear the dropdown after selecting an item (optional)
                $('#searchResults').empty();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#nomor_perkiraan2').on('input', function() {
                var nomorPerkiraan = $(this).val();

                // Kirim permintaan Ajax ke server
                $.ajax({
                    url: '/api/np/' + nomorPerkiraan,
                    type: 'GET',
                    success: function(data) {
                        // Kosongkan elemen searchResults sebelum menambahkan data baru
                        $('#searchResults2').empty();

                        // Iterasi melalui data dan tambahkan elemen div untuk setiap item
                        $.each(data, function(index, item) {
                            $('#searchResults2').append('<div class="dropdown-item">' +
                                item.kode + ' | ' + item.uraian + '</div>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#searchResults2').on('click', '.dropdown-item', function() {
                // Get the text content of the clicked item
                var selectedItemText = $(this).text();
                var parts = selectedItemText.split('|').map(function(part) {
                    return part.trim();
                });

                // Extract nomor_perkiraan from the text (assuming it is separated by '|')
                var nomorPerkiraan = selectedItemText.split('|')[0].trim();

                // Set the value of nomor_perkiraan input
                $('#nomor_perkiraan2').val(nomorPerkiraan);
                // Extract uraian from the data attribute
                var uraian = parts[1];
                console.log(uraian);
                // Set the value of nama_perkiraan input
                $('#nama_perkiraan2').val(uraian);
                // Clear the dropdown after selecting an item (optional)
                $('#searchResults2').empty();
            });
        });
    </script>
@endsection