@extends('layouts.layout')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Jabatan</div>
        <div class="ps-3">
            <span>User</span>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" id="create-item" data-title="create">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save"
                        viewBox="0 0 16 16">
                        <path
                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z">
                        </path>
                    </svg> Data</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Nama Singkat Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_jabatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nama_singkat }}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                            id="update-item" data-title="update" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama }}" data-nama_singkat="{{ $item->nama_singkat }}"
                                            data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        @if (Auth::user()->id_jabatan == '1')
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                id="delete-item" data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama }}" data-bs-placement="bottom" title="Delete"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('jabatan.modal_cu')
    @include('modals.delete')
@endsection
@section('script')
    <script src="{{ asset('js/modal-show-jabatan.js') }}"></script>

    {{-- action --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.addMethod("valueNotEquals", function(value, element, arg) {
                return arg !== value;
            }, "Value must not equal arg.");
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#btnsubmit').click(function(e) {
                $('#modalForm').validate({
                    rules: {
                        nama: {
                            required: true
                        },
                        nama_singkat: {
                            required: true
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },

                    submitHandler: function(form) {
                        $('#btnsubmit').html('Proses Simpan..');
                        $('#btnsubmit').attr("disabled", true);
                        var formdata = new FormData(form);

                        if ($("#modal_cu #id").val() == "") {
                            $.ajax({
                                processData: false,
                                contentType: false,
                                data: formdata,
                                url: "{{ route('jabatan.create') }}",
                                type: "POST",
                                enctype: 'multipart/form-data',
                                dataType: 'json',
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.success
                                    });
                                    setTimeout(function() {
                                        $('#modal_cu').modal(
                                            'hide');
                                        location.replace(
                                            "{{ route('jabatan.index') }}"
                                        )
                                    }, 2200);
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                    jQuery('.alert-danger').hide();
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Data gagal ditambah'
                                    });
                                    setTimeout(function() {
                                        $('#btnsubmit').html(
                                            'Simpan');
                                        $('#btnsubmit').attr(
                                            "disabled",
                                            false);
                                    }, 2200);
                                }
                            });
                        } else {
                            let data = formdata;
                            data.append("_method", 'PATCH');
                            $.ajax({
                                processData: false,
                                contentType: false,
                                data: data,
                                url: "{{ route('jabatan.update') }}",
                                type: "POST",
                                enctype: 'multipart/form-data',
                                dataType: 'json',
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.success
                                    });
                                    setTimeout(function() {
                                        $('#modal_cu').modal(
                                            'hide');
                                        location.replace(
                                            "{{ route('jabatan.index') }}"
                                        )
                                    }, 2200);
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                    jQuery('.alert-danger').hide();
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Data gagal diubah'
                                    });
                                    setTimeout(function() {
                                        $('#btnsubmit').html(
                                            'Simpan');
                                        $('#btnsubmit').attr(
                                            "disabled",
                                            false);
                                    }, 2200);
                                }
                            });
                        }
                    }
                });
            });

            $('#btndelete').click(function(e) {
                e.preventDefault();
                $(this).html('Proses Hapus...');
                $('#btndelete').attr("disabled", true);
                var form = $('#deleteForm')[0];
                var formdata = new FormData(form);
                $.ajax({
                    processData: false,
                    contentType: false,
                    data: formdata,
                    url: "{{ route('jabatan.delete') }}",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        });
                        setTimeout(function() {
                            $('#modal-delete').modal('hide');
                            location.replace(
                                "{{ route('jabatan.index') }}")
                        }, 2200);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        jQuery('.alert-danger').hide();
                        Toast.fire({
                            icon: 'error',
                            title: 'Data gagal dihapus'
                        });
                        setTimeout(function() {
                            $('#btndelete').html('Hapus');
                            $('#btndelete').attr("disabled", false);
                        }, 2200);
                    }
                });
            });
        })
    </script>
@endsection
