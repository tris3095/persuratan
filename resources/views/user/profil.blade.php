@extends('layouts.layout')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Profil</div>
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
            <form role="form" id="modalForm" name="modalForm">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" maxlength="50" class="form-control" id="nama" name="nama"
                            value="{{ Auth::user()->nama }}" placeholder="Andi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" maxlength="50" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}" placeholder="andi@gmail.com" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-jabatan" class="col-form-label">Jabatan</label>
                        <input type="text" maxlength="50" class="form-control" id="jabatan" name="jabatan"
                            value="{{ Auth::user()->getJabatan->nama }}" placeholder="Karo" autocomplete="off" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-password" class="col-form-label">Password</label>
                        <input type="password" maxlength="16" class="form-control" id="password" name="password"
                            placeholder="******" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
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
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
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
                        let data = formdata;
                        data.append("_method", 'PATCH');
                        $.ajax({
                            processData: false,
                            contentType: false,
                            data: data,
                            url: "{{ route('user.profil.update') }}",
                            type: "POST",
                            enctype: 'multipart/form-data',
                            dataType: 'json',
                            success: function(data) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                });
                                setTimeout(function() {
                                    location.replace(
                                        "{{ route('user.profil') }}"
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
                });
            });
        })
    </script>
@endsection
