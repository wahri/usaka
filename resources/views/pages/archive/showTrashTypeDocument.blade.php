@extends('layouts.app')

@section('title', 'PSDKP | USER')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">{{ $typeDocument->name }}</h1> --}}
                        <a href="/dashboard/archive/{{ $typeDocument->id }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Archive Management</li>
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
                    <div class="col-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Kategori Arsip Dokumen</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col">
                                        <table id="typeDocumentById" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    {{-- @foreach ($inputFormat as $eachInput)
                                                        <th>{{ $eachInput['name'] }}</th>
                                                    @endforeach --}}
                                                    <th>{{ $inputFormat[0]->name }}</th>
                                                    <th>Room</th>
                                                    <th>Locker</th>
                                                    <th>Rack</th>
                                                    <th>Box</th>
                                                    <th>File Document</th>
                                                    <th width="10%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($documentArchive as $i => $eachDocument)
                                                    <tr>
                                                        <td class="text-center">{{ $i + 1 }}</td>
                                                        {{-- @foreach ($eachDocument->documentInfos as $eachInfo)
                                                            <td>{{ $eachInfo['value'] }}</td>
                                                        @endforeach --}}
                                                        <td>{{ $eachDocument->documentInfos[0]->value }}</td>
                                                        <td>{{ $eachDocument->room->name }}</td>
                                                        <td>{{ $eachDocument->locker->code }}</td>
                                                        <td>{{ $eachDocument->rack->code }}</td>
                                                        <td>{{ $eachDocument->box->code }}</td>
                                                        <td class="text-center">
                                                            <a href="/fileDocument/{{ $eachDocument->file }}"
                                                                class="btn btn-info btn-sm" target="_blank">Download</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('dashboard.archive.restore.document', $eachDocument->id) }}"
                                                                class="btn btn-success btn-sm btn-block">Restore</a>
                                                            <a href="{{ route('dashboard.archive.deletepermanent.document', $eachDocument->id) }}"
                                                                class="btn btn-danger btn-sm btn-block">Delete Permanent</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
            $("#typeDocumentById").DataTable({
                "responsive": true,
            })
        });
    </script>
@endpush


{{-- THIS STYLE ONLY RENDER FOR THIS PAGE --}}
@push('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
