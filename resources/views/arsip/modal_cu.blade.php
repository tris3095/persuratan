<div id="modal_cu" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form role="form" id="modalForm" name="modalForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="mb-3">
                        <label for="recipient-tanggal" class="col-form-label">Tanggal</label>
                        <input class="datepicker form-control" type="text" id="tanggal" name="tanggal"
                            placeholder={{ date('d-m-Y') }}>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-no_surat" class="col-form-label">Nomor Surat</label>
                        <input type="text" maxlength="30" class="form-control" id="no_surat" name="no_surat"
                            placeholder="sr/002/2019" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-instansi" class="col-form-label">Instansi</label>
                        <input type="text" maxlength="100" class="form-control" id="instansi" name="instansi"
                            placeholder="Kominfo" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        {{-- <label for="recipient-file" class="col-form-label">File</label> --}}
                        <input type="file" name="file" accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-jabatan" class="col-form-label">Jenis Surat</label>
                        <select id="jenis_surat" name="jenis_surat" class="form-select">
                            <option value="" hidden>Pilih Jenis Surat</option>
                            <option value='masuk'>Masuk</option>
                            <option value='keluar'>Keluar</option>
                            <option value='keliping'>Keliping Media Cetak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
