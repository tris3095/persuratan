<div id="modal_send" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form role="form" id="sendForm" name="sendForm">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="no_surat" name="no_surat">
                    <input type="text" class="form-control" id="id_disposisi" name="id_disposisi">
                    <div class="mb-3">
                        <label for="recipient-disposisi" class="col-form-label">Disposisi</label>
                        <select id="disposisi" name="disposisi" class="form-select">
                            <option value="" hidden>Pilih Jabatan</option>
                            @foreach ($data_jabatan as $item)
                                <option value='{{ $item->id }}'>{{ $item->nama_singkat ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        {{-- <label for="recipient-file" class="col-form-label">File</label> --}}
                        <input type="file" name="file" accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-catatan" class="col-form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsend" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
