$(function () {
    $(document).on('click', "#create-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })

    $(document).on('click', "#update-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })

    $(document).on('click', "#delete-item", function () {
        $(this).addClass('delete-item-trigger-clicked');
        $('#modal-delete').modal('show')
    })

    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        if (el.data('title') == "create") {
            $("#modal_cu .modal-title").text("Tambah Jabatan");
            $("#modal_cu #nama").val("");
            $("#modal_cu #nama_singkat").val("");
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var nama = el.data('nama');
            var nama_singkat = el.data('nama_singkat');
            $("#modal_cu .modal-title").text("Ubah Jabatan");
            $("#modal_cu #nama").val(nama);
            $("#modal_cu #nama_singkat").val(nama_singkat);
            $("#modal_cu #id").val(id);
        }
    })

    $('#modal-delete').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");

        var id = el.data('id');
        var nama = el.data("nama");

        $("#modal-delete #id").val(id);
        $("#modal-delete .modal-title").text("Hapus Jabatan");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus jabatan " + nama +
            " ini ?");

    })

    $('#modal_cu').on('hide.bs.modal', function () {
        $('.create-item-trigger-clicked').removeClass('create-item-trigger-clicked')
        $("#modal_cu").trigger("reset");
    })

    $('#modal-delete').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#modal-delete").trigger("reset");
    })
})