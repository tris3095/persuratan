<div id="modal_cu" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form role="form" id="modalForm" name="modalForm">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="mb-3">
                        <label for="recipient-nama" class="col-form-label">Nama Jabatan</label>
                        <input type="text" maxlength="50" class="form-control" id="nama" name="nama"
                            placeholder="Kepala Biro" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-nama_singkat" class="col-form-label">Nama Singkat Jabatan</label>
                        <input type="text" maxlength="50" class="form-control" id="nama_singkat" name="nama_singkat"
                            placeholder="Karo" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
