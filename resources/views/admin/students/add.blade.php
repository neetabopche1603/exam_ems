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
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Users</li>
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
                            <h3 class="card-title">Add Users</h3>
                            <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{route('admin.studentRegister')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Mobile <span class="text-danger">*</span></label>
                                            <input type="number" name="mobile" class="form-control" id="" placeholder="Enter Mobile">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('mobile')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Email">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="" placeholder="Enter password">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Comfirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Enter Comfirm Password ">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('password_confirmation')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Image <span class="text-danger">*</span></label>
                                            <input type="file" name="student_image" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('student_image')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Address <span class="text-danger">*</span></label>
                                            <!-- <textarea name="stu_address" id="stu_address" cols="30" rows="10"></textarea> -->
                                            <input type="text" name="stu_address" class="form-control" placeholder="Enter Address">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('stu_address')
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