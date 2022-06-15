$(function () {
    $(document).on('click', "#view-item", function () {
        $(this).addClass('view-item-trigger-clicked');
        $('#modal_r').modal('show');
    })

    $(document).on('click', "#create-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })

    $(document).on('click', "#update-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })

    $(document).on('click', "#send-item", function () {
        $(this).addClass('send-item-trigger-clicked');
        $('#modal_send').modal('show');
    })

    $(document).on('click', "#delete-item", function () {
        $(this).addClass('delete-item-trigger-clicked');
        $('#modal-delete').modal('show')
    })

    $('#modal_r').on('show.bs.modal', function () {
        var el = $(".view-item-trigger-clicked");
        var tanggal = el.data('tanggal');
        var no_surat = el.data('no_surat');
        var instansi = el.data('instansi');
        var file = el.data('file');
        var perihal = el.data('perihal');
        var keterangan = el.data('keterangan');

        $("#modal_r .modal-title").text("Surat Masuk");
        $("#modal_r #tanggal").text(tanggal);
        $("#modal_r #no_surat").text(no_surat);
        $("#modal_r #instansi").text(instansi);
        $("#modal_r #file").text(file);
        $("#modal_r #perihal").text(perihal);
        $("#modal_r #keterangan").text("Keterangan : " + keterangan);
        if (keterangan != "") {
            $("#modal_r #keterangan").attr("hidden", false);
        } else {
            $("#modal_r #keterangan").attr("hidden", true);
        }
    })

    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        if (el.data('title') == "create") {
            $("#modal_cu .modal-title").text("Tambah Surat Masuk");
            $("#modal_cu #no_surat").val("");
            $("#modal_cu #instansi").val("");
            $("#modal_cu #perihal").val("");
            $("#modal_cu #keterangan").val("");
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var tanggal = el.data('tanggal');
            var no_surat = el.data('no_surat');
            var instansi = el.data('instansi');
            var perihal = el.data('perihal');
            var keterangan = el.data('keterangan');
            $("#modal_cu .modal-title").text("Ubah Surat Masuk");
            $("#modal_cu #tanggal").val(tanggal);
            $("#modal_cu #no_surat").val(no_surat);
            $("#modal_cu #instansi").val(instansi);
            $("#modal_cu #perihal").val(perihal);
            $("#modal_cu #keterangan").val(keterangan);
            $("#modal_cu #id").val(id);
        }
    })

    $('#modal_send').on('show.bs.modal', function () {
        var el = $(".send-item-trigger-clicked");
        var id = el.data('id');
        var id_disposisi = el.data('id_disposisi');
        var no_surat = el.data('no_surat');
        $("#modal_send .modal-title").text("Kirim Surat Masuk");
        $("#modal_send #id_disposisi").val(id_disposisi);
        $("#modal_send #no_surat").val(no_surat);
        $("#modal_send #id").val(id);
    })

    $('#modal-delete').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");

        var id = el.data('id');
        var no_surat = el.data("no_surat");

        $("#modal-delete #id").val(id);
        $("#modal-delete .modal-title").text("Hapus Surat");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus surat " + no_surat +
            " ini ?");

    })

    $('#modal_r').on('hide.bs.modal', function () {
        $('.view-item-trigger-clicked').removeClass('view-item-trigger-clicked')
        $("#modal_r").trigger("reset");
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