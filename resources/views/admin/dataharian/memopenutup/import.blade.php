<form action="/import/memopenutup" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade ml-auto mr-auto" id="mauimport" tabindex="-1" role="dialog" area-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Import data untuk memo penutup</h4>
        </div>
        <div class="modal-body">     
          <div class="input-group mb-3">
              <input type="file" class="form-control" placeholder="Cari..." name="import">
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">Import Data</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>