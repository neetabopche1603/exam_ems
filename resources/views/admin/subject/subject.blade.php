@extends('admin.layout.app')
@section('admintitle','Admin| Add Subject Form')
@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!-- Notifications Start-->
@if ($msg = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $msg }}</strong>
            </div>
           
            @elseif (Session::get('faild'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ Session::get('faild') }}</strong>
            </div>
            @endif
<!-- Notifications End-->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Subject</li>
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
                            <h3 class="card-title">Add Subject</h3>
                            <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{route('admin.subjectStore')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Subject <span class="text-danger">*</span></label>
                                            <input type="text" name="subject" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('subject')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-2 mt-lg-4 form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    @Add Subject
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
</div>

<!-- /.row -->
<!-- Subject Table Code Start -->
<div class="subject">
@if (session::get('delete'))
    <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ Session::get('delete') }}</strong>
            </div>
    @endif
<div class="card-header mt-5 bg-dark">
    <h3 class="text-center text-light">Show All Subject</h3>
</div>
<div class="card shadow p-3 mb-5 bg-white rounded">
    <table id="subject_list" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
@foreach ($subjectData as $subjectdatas )
            <tr>
                <td>{{$i++}}</td>
                <td>{{$subjectdatas->id}}</td>
                <td>{{$subjectdatas->subject}}</td>
                <td>
                <a href="{{route('admin.indexQuestion')}}" class="btn btn-primary btn-sm">Add Qestions </a>

                    <a href="{{url('admin/delete-subject')}}/{{$subjectdatas->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure delete Subject')"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#subject_list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

@endpush