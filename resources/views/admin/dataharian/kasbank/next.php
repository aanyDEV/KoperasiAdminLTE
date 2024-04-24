@extends('admin.layout.main')
@section('lokasi')
    <i class="fas mr-1" style="font-size: 20px;">Home / Kas Bank</i>
@endsection
@section('title')
    <title>KoperasiPG | Kas Bank</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.kb.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <input type="date" class="form-control" id="tanggal" name="tanggal">
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
                                            @error('jenis')
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
  $(document).ready(function () {
  $('#dataForm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
          type: 'post',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function (response) {
              console.log(response);
              $('#dataForm')[0].reset();
          }
      });
  });
});
</script>
@endsection