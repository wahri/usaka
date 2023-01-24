@extends('layouts.app')

@section('title',"PSDKP | Team")

@section('content')
<!-- Content Wrapper. Contains page content -->
<form method="POST" id="addTeam" action="{{ route('dashboard.team.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between">
                    <div class="col-sm-6">
                        <h1 class="m-0">Team</h1>
                    </div><!-- /.col -->
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

    
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="mr-3" for="name">Nama :</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="mr-3" for="role">Role :</label>
                                                <input type="text" id="role" name="role" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="mr-3" for="description">Keterangan :</label>
                                                <textarea name="description" class="wysiwyg"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group ">
                                                <div class="preview mb-2">
                                                    <img id="file-ip-1-preview">
                                                </div>
                                                <label class="mr-3" for="file-ip-1">Upload Image</label>
                                                <input type="file" id="file-ip-1" accept="image/*" name="image"
                                                    onchange="showPreview(event);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
    </div>
</form>

<!-- /.content-wrapper -->
@endsection

{{-- THIS SCRIPT ONLY RENDER FOR THIS PAGE --}}
@push('script')
   <script>
       
    //    $(function(){

    //        let addTeam = $("form#addTeam");


    //         addTeam.on("submit",function(event){
    //             event.preventDefault();

    //             let data = $(this).serialize();
    //             // console.log(data);
                

    //             $.ajax({
    //                 url:"{{ route('dashboard.team.store') }}",
    //                 method:"POST",
    //                 data:data,
    //                 dataType:"JSON",
    //                 success:function(res){
    //                     showNotification(res.message, "success", 3000);
    //                     window.location.href = "{{ route('dashboard.team.index') }}";
    //                 },
    //                 error:function(res){
    //                     let data = res.responseJSON;
    //                     showNotification(data.message, "error", 3000);
    //                 }
                    
    //             })
    //         })


    //    });

       function showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-1-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
   </script>
@endpush


{{-- THIS STYLE ONLY RENDER FOR THIS PAGE --}}
@push('style')
<style>

</style>
@endpush

