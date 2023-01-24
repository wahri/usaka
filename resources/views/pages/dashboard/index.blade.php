@extends('layouts.app')

@section('title', 'PSDKP | Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome, {{ Auth::user()->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $project }}</h3>
                                <p>Jumlah Project</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('dashboard.archive.index') }}" class="small-box-footer">Check Dokumen <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
