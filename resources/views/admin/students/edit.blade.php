@extends('admin.layout.app')
@section('admintitle','Admin| Edit User Form')
@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit User</h3>
                            <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{route('admin.studentUpdate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="" value="{{$edituserForm->id}}">
                            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{$edituserForm->name}}" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Mobile</label>
                                            <input type="number" name="mobile" value="{{$edituserForm->mobile}}" class="form-control" id="" placeholder="Enter Mobile">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('mobile')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Email</label>
                                            <input type="email" name="email" value="{{$edituserForm->email}}" class="form-control" id="" placeholder="Enter Email" disabled>
                                            <span class="text-danger">email won't update</span>
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Password</label>
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
                                            <label for="">Status</label>
                                            <input type="radio" name="status" id="" value="1" {{ $edituserForm->status == 1 ? 'checked' : '' }}/>Active 
                                            <input type="radio" name="status" id=""  value="0" {{ $edituserForm->status == 0 ? 'checked' : '' }}/>Dective

                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('status')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Image</label>
                                            <input type="file" name="student_image" class="form-control" id="" placeholder="">
                                            <img src="{{ asset('student_image/'.$edituserForm->student_image) }}" width="100" height="100" alt="image">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('student_image')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Status</label>
                    
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('status')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Address</label>
                                            <!-- <textarea name="stu_address" id="stu_address" cols="30" rows="10"></textarea> -->
                                            <input type="text" name="stu_address" value="{{$edituserForm->stu_address}}" class="form-control" placeholder="Enter Address">
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
                                <button type="submit" class="btn btn-primary">Update</button>
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
    CKEDITOR.replace('stu_address');
</script>

@endpush