@extends('layouts.layout')

@section('style')
    <link href="{{ asset('plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Surat</div>
        <div class="ps-3">
            <span>Keluar</span>
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
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor Surat</th>
                            <th>Instansi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_surat as $item)
                            @if ($item->jenis_surat == 'masuk')
                                @php $file = substr($item->file, 20) @endphp
                            @else
                                @php $file = substr($item->file, 21) @endphp
                            @endif
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M', strtotime($item->tanggal)) }},
                                    {{ date('Y', strtotime($item->tanggal)) }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->instansi }}</td>
                                <td><a target="_blank"
                                        href="{{ asset('storage') }}/{{ substr($item->file, 7) }}">{{ $file }}</a>
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                            id="view-item" data-id="{{ $item->id }}"
                                            data-tanggal="{{ date('d M', strtotime($item->tanggal)) }}, {{ date('Y', strtotime($item->tanggal)) }}"
                                            data-no_surat="{{ $item->no_surat }}"
                                            data-instansi="{{ $item->instansi }}" data-perihal="{{ $item->perihal }}"
                                            data-file="{{ $file }}" data-keterangan="{{ $item->keterangan }}"
                                            data-status_surat="Selesai" data-bs-placement="bottom" title="Views"><i
                                                class="bi bi-eye-fill"></i></a>
                                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                            id="update-item" data-title="update" data-id="{{ $item->id }}"
                                            data-tanggal="{{ date('d M', strtotime($item->tanggal)) }}, {{ date('Y', strtotime($item->tanggal)) }}"
                                            data-no_surat="{{ $item->no_surat }}"
                                            data-instansi="{{ $item->instansi }}" data-perihal="{{ $item->perihal }}"
                                            data-keterangan="{{ $item->keterangan }}" data-bs-placement="bottom"
                                            title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        @if (Auth::user()->id_jabatan == '1')
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                id="delete-item" data-id="{{ $item->id }}"
                                                data-no_surat="{{ $item->no_surat }}" data-bs-placement="bottom"
                                                title="Delete"><i class="bi bi-trash-fill"></i></a>
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
    @include('surat.modal_cu')
    @include('surat.modal_r')
    @include('modals.delete')
@endsection
@section('script')
    <script src="{{ asset('plugins/datetimepicker/js/legacy.js') }}"></script>
    <script src="{{ asset('plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('plugins/datetimepicker/js/picker.time.js') }}"></script>
    <script src="{{ asset('plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('js/form-file-upload.js') }}"></script>
    <script src="{{ asset('js/form-date-time-pickes.js') }}"></script>
    <script src="{{ asset('js/modal-show-surat_keluar.js') }}"></script>

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
                        tanggal: {
                            required: true
                        },
                        no_surat: {
                            required: true
                        },
                        instansi: {
                            required: true
                        },
                        perihal: {
                            required: true
                        },
                        file: {
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
                                url: "{{ route('surat.keluar.create') }}",
                                type: "POST",
                                enctype: 'multipart/form-data',
                                dataType: 'json',
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.success
                                    });
                                    setTimeout(function() {
                                        $('#modal_cu').modal('hide');
                                        location.replace(
                                            "{{ route('surat.keluar.index') }}"
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
                                        $('#btnsubmit').html('Simpan');
                                        $('#btnsubmit').attr("disabled",
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
                                url: "{{ route('surat.keluar.update') }}",
                                type: "POST",
                                enctype: 'multipart/form-data',
                                dataType: 'json',
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.success
                                    });
                                    setTimeout(function() {
                                        $('#modal_cu').modal('hide');
                                        location.replace(
                                            "{{ route('surat.keluar.index') }}"
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
                                        $('#btnsubmit').html('Simpan');
                                        $('#btnsubmit').attr("disabled",
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
                    url: "{{ route('surat.keluar.delete') }}",
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
                            location.replace("{{ route('surat.keluar.index') }}")
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
        });
    </script>
@endsection
