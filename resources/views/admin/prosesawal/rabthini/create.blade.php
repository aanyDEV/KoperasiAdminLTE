@extends('admin.layout.main')
@section('judul')
    <i class="fas" style="font-size: 20px;">Isi RAB Tahun ini</i>
@endsection
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / RAB Tahun ini</i>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.rti.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="number" class="form-control" id="tahun" min="1900" max="2099"
                                                name="tahun" required>
                                            @error('tahun')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Perkiraan</label>
                                            <select class="form-control" id="nomor_perkiraan"
                                                name="nomor_perkiraan" required onchange="setnoper()"> 
                                                @foreach ( $noper as $n )
                                                    <option value="{{ $n->kode }}">{{ $n->kode }} | {{ $n->uraian }}</option>
                                                @endforeach
                                            </select>
                                            @error('nomor_perkiraan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Perkiraan</label>
                                            <input type="text" name="nama_perkiraan" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('nama_perkiraan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Januari</label>
                                            <input type="text" name="rab_januari" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_januari')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Februari</label>
                                            <input type="number" name="rab_februari" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_februari')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Maret</label>
                                            <input type="number" name="rab_maret" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_maret')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB April</label>
                                            <input type="number" name="rab_april" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_april')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Mei</label>
                                            <input type="number" name="rab_mei" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_mei')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Juni</label>
                                            <input type="number" name="rab_juni" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_juni')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Juli</label>
                                            <input type="number" name="rab_juli" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_juli')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Agustus</label>
                                            <input type="number" name="rab_agustus" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_agustus')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB September</label>
                                            <input type="number" name="rab_september" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_september')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Oktober</label>
                                            <input type="number" name="rab_oktober" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_oktober')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB November</label>
                                            <input type="number" name="rab_november" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_november')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RAB Desember</label>
                                            <input type="number" name="rab_desember" class="form-control"
                                                id="exampleInputEmail1" required>
                                            @error('rab_desember')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="created_by" class="form-control"
                                                id="exampleInputEmail1" value="{{ auth()->user()->name }}">
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
@section('scripts')
    <script>
        function noper() {
            var sb = document.getElementById('nomor_perkiraan');
            var sv = sb.options[sb.selectedIndex].text;
            var p = sv.split('|');
            var ur = p[1].trim();
            document.getElementById('nama_perkiraan').value = ur;
        }
    </script>
@endsection