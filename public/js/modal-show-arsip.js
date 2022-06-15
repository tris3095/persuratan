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
            $("#modal_cu .modal-title").text("Tambah Surat Arsip");
            $("#modal_cu #no_surat").val("");
            $("#modal_cu #instansi").val("");
            $("#modal_cu #file").val("");
            $("#modal_cu #jenis_surat").val("");
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var no_surat = el.data('no_surat');
            var instansi = el.data('instansi');
            var files = el.data('files');
            var jenis_surat = el.data('jenis_surat');
            $("#modal_cu .modal-title").text("Ubah Surat Arsip");
            $("#modal_cu #no_surat").val(no_surat);
            $("#modal_cu #instansi").val(instansi);
            $("#modal_cu #file").val(files);
            $("#modal_cu #jenis_surat").val(jenis_surat);
            $("#modal_cu #id").val(id);
        }
    })

    $('#modal-delete').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");

        var id = el.data('id');
        var no_surat = el.data("no_surat");

        $("#modal-delete #id").val(id);
        $("#modal-delete .modal-title").text("Hapus Arsip");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus surat arsip " + no_surat +
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