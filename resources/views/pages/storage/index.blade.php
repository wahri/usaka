@extends('layouts.app')

@section('title', 'PSDKP | USER')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <button type="button" class="btn btn-success btn-sm mb-4" data-toggle="modal" data-target="#addRoomModal">
                            <i class="fas fa-plus mr-2"></i> Tambah Ruangan
                        </button>
                        <div class="row">
                            @foreach ($data_ruangan as $ruang)
                                <div class="col-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i
                                                class="fas fa-boxes"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text d-flex justify-content-between">
                                                {{ $ruang->name }}
                                                <div class="text-right">
                                                    <button class="btn btn-sm btn-warning" name="edit" data-id="{{ $ruang->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" name="delete" data-id="{{ $ruang->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </div>
                                            </span>
                                            <span class="info-box-number">
                                                {{ $ruang->lockers->count() }}
                                                <small>Locker</small>
                                            </span>
                                            <a href="{{ route('dashboard.storage.room', $ruang->id) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-plus"></i> Tambah Locker
                                            </a>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
             {{-- add room modal --}}
            </div>
        <!-- /.content -->
    </div>

   {{-- add room modal --}}
   <form action="{{ route('dashboard.storage.create.room') }}" id="addRoomForm" method="post">
    @csrf
    <div class="modal fade" id="addRoomModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Ruang :</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

{{-- edit room modal --}}
<form id="editRoomForm" method="POST">
    @csrf
    <div class="modal fade" id="editRoomModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ruang</h4>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Ruang :</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

@endsection

{{-- THIS SCRIPT ONLY RENDER FOR THIS PAGE --}}
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script>
        $(function() {
            let addRoomModal = $("div#addRoomModal");
            let editRoomModal = $("div#editRoomModal");
            let addRoomForm = $("form#addRoomForm");
            let editRoomForm = $("form#editRoomForm");

            // let userListTable = $('#userListTable').DataTable({
            //     searching: true,
            //     autoWidth: false,
            //     processing: true,
            //     serverSide: true,
            //     pageLength: 10,
            //     ajax: {
            //         url: "{{ route('dashboard.user.get.user-datatable') }}",
            //         type: 'POST',
            //         headers: {
            //             'X-CSRF-TOKEN': "{{ csrf_token() }}"
            //         }
            //     },
            //     columns: [{
            //             data: 'name',
            //             name: 'name',
            //             defaultContent: "-"
            //         },
            //         {
            //             data: 'username',
            //             name: 'username',
            //             defaultContent: "-"
            //         },
            //         {
            //             data: 'created_at',
            //             name: 'created_at',
            //             defaultContent: "-",
            //             render: function(data, type, row) {
            //                 return moment(data).format("LLL");
            //             }
            //         },
            //         {
            //             data: 'updated_at',
            //             name: 'updated_at',
            //             defaultContent: "-",
            //             render: function(data, type, row) {
            //                 return moment(data).format("LLL");
            //             }
            //         },
            //         {
            //             data: 'roles',
            //             name: 'roles.name',
            //             defaultContent: "-",
            //             render: function(data, type, row) {
            //                 switch (data) {
            //                     case "Admin":
            //                         return `
            //                     <span class="badge badge-success">${data}</span>
            //                     `
            //                         break;

            //                     case "User":
            //                         return `
            //                         <span class="badge badge-primary">${data}</span>
            //                         `
            //                         break;
            //                 }

            //             }
            //         },
            //         {
            //             render: function(data, type, row) {
            //                 return `
            //                 <div class="form-group">
            //                     <button data-id=${row.id} name="edit"  class="btn btn-success">
            //                         <i class="fas fa-edit"></i>
            //                     </button>
            //                     <button data-id=${row.id} name="delete" class="btn btn-danger">
            //                         <i class="fas fa-trash"></i>
            //                     </button>
            //                 </div>
            //             `
            //             }
            //         },

            //     ],
            // });

            //submit form action
            addRoomForm.on("submit", function(event) {
                event.preventDefault();
                let form = $(this);
                let url = $(this).attr("action");
                let data = $(this).serialize();

                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    success: function(res) {
                        showNotification(res.message, "success", 3000);
                        userListTable.ajax.reload();
                        addRoomModal.modal("toggle");
                        form[0].reset();
                        location.reload()
                    },
                    error: function(res) {
                        let data = res.responseJSON;
                        showNotification(data.message, "error", 3000);
                    }
                })


            })


            editRoomForm.on("submit", function(event) {
                event.preventDefault();
                let form = $(this);
                let url = $(this).attr("action");
                let data = $(this).serialize();

                $.ajax({
                    url: url,
                    type: "PUT",
                    data: data,
                    dataType: "JSON",
                    success: function(res) {
                        showNotification(res.message, "success", 3000);
                        // userListTable.ajax.reload();
                        editRoomModal.modal("toggle");
                        form[0].reset();
                        location.reload()
                    },
                    error: function(res) {
                        let data = res.responseJSON;
                        showNotification(data.message, "error", 3000);
                    }
                })


            })


            //delete button action
            $(document).on("click", "button[name='delete']", function() {
                let id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "klik yes untuk menghapus ruangan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `{{ route('dashboard.storage.delete.room', ['']) }}/${id}`,
                            type: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            dataType: "JSON",
                            success: function(res) {
                                showNotification(res.message, "success", 3000);
                                location.reload()
                            },
                            error: function(res) {
                                let data = res.responseJSON;
                                showNotification(res.message, "error", 3000);
                            }
                        })
                    }
                })
            })


            //edit button action
            $(document).on("click", "button[name='edit']", function() {
                let id = $(this).attr('data-id');

                $.ajax({
                    url: `{{ route('dashboard.storage.show.room', ['']) }}/${id}`,
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    dataType: "JSON",
                    success: function(res) {
                        let data = res.data;
                       editRoomModal.find("input[name='name']").val(data.name);

                       editRoomModal.modal("toggle");
                       editRoomForm.attr("action", `{{ route('dashboard.storage.update.room', ['']) }}/${id}`)
                       console.log('tes')
                    }
                });
            });


        });
    </script>
@endpush


{{-- THIS STYLE ONLY RENDER FOR THIS PAGE --}}
@push('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
