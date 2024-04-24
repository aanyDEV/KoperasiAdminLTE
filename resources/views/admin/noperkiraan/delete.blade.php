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
                <p>Apakah kamu yakin ingin menghapus data nomer perkiraan
                    <b>{{ $d->name }}</b>
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <form
                    action="{{ route('admin.np.delete', ['id' => $d->id]) }}"
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