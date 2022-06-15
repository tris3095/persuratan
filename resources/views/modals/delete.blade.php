<div id="modal-delete" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id="deleteForm" name="deleteForm">
                    {{ csrf_field() }}
                    @method('delete')
                    <div class="card-body">
                        <div class="isi"></div>
                        <input type="hidden" name="id" id="id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btndelete" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>