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

    $(document).on('click', "#reset-item", function () {
        $(this).addClass('reset-item-trigger-clicked');
        $('#modal-reset').modal('show')
    })

    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        if (el.data('title') == "create") {
            $("#modal_cu .modal-title").text("Tambah User");
            $("#modal_cu #nama").val("");
            $("#modal_cu #email").val("");
            $("#modal_cu #id_jabatan").val("");
            $("#modal_cu #password").attr("hidden", false);
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var nama = el.data('nama');
            var email = el.data('email');
            var id_jabatan = el.data('id_jabatan');
            $("#modal_cu .modal-title").text("Ubah User");
            $("#modal_cu #nama").val(nama);
            $("#modal_cu #email").val(email);
            $("#modal_cu #id_jabatan").val(id_jabatan);
            $("#modal_cu #password").attr("hidden", true);
            $("#modal_cu #id").val(id);
        }
    })

    $('#modal-delete').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");

        var id = el.data('id');
        var nama = el.data("nama");

        $("#modal-delete #id").val(id);
        $("#modal-delete .modal-title").text("Hapus User");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus user " + nama + " ini ?");

    })

    $('#modal-reset').on('show.bs.modal', function () {
        var el = $(".reset-item-trigger-clicked");

        var id = el.data('id');
        var nama = el.data("nama");

        $("#modal-reset #id").val(id);
        $("#modal-reset .modal-title").text("Reset Password User");
        $("#modal-reset .isi").text("Apakah anda yakin ingin mereset password user " + nama +
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

    $('#modal-reset').on('hide.bs.modal', function () {
        $('.reset-item-trigger-clicked').removeClass('reset-item-trigger-clicked')
        $("#modal-reset").trigger("reset");
    })
})