@extends('admin.layout.app')
@section('admintitle','Admin| User-register Form')
@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Notifications -->
 <!-- @if(session()->has('info'))
    <div class="alert alert-warning">
        {{ session()->get('info') }}
    </div>
        @elseif ($deleteMsg = Session::get('deleteMsg'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $deleteMsg }}</strong>
        </div>
        @elseif (Session::get('faild'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('faild') }}</strong>
        </div>
        @endif -->
        <!-- Notifications -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Import Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Import Questions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    @if ($msg = Session::get('msg'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msg }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Import Questions</h3>
                            <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{route('imported.question')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
                                <div class="row">
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Choose File <span class="text-danger">*</span></label>
                                            <input type="file" name="import_que" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('import_que')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@push('script')
<script>
                CKEDITOR.replace( 'stu_address' );
            </script>
    
@endpush