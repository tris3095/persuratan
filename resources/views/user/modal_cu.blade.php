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
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" maxlength="50" class="form-control" id="nama" name="nama"
                            placeholder="Andi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" maxlength="50" class="form-control" id="email" name="email"
                            placeholder="andi@gmail.com" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-jabatan" class="col-form-label">Jabatan</label>
                        <select id="id_jabatan" name="id_jabatan" class="form-select">
                            <option value="" hidden>Pilih Jabatan</option>
                            @foreach ($data_jabatan as $item)
                                <option value='{{ $item->id }}'>{{ $item->nama_singkat ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label id="password" class="col-form-label">Password Default " 123456 "</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
