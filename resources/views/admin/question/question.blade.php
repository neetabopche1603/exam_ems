@extends('admin.layout.app')
@section('admintitle','Admin| Questions')
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
                    <h1>Questions</h1>
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
                            <h3 class="card-title">Add Questions</h3>
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
                                            <label for="">Import Excel File</label>
                                            <a href="{{route('import.question')}}" class="btn btn-success">Click</a>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Manual Question Upload</label>
                                            <a href="{{route('admin.manualQuestion')}}" class="btn btn-primary">Click</a>
                                        </div>

                                    </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    @Add Questions
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
        <h3 class="text-center text-light">Show All Questions</h3>
    </div>
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <table id="subject_list" class="display nowrap table-bordered text-center table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Subject Name</th>
                    <th>Question</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @forelse ($questions as $question)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$question->subject}}</td>
                    <td>{{$question->question}}</td>
                    <td>{{$question->a}}</td>
                    <td>{{$question->b}}</td>
                    <td>{{$question->c}}</td>
                    <td>{{$question->d}}</td>
                    <td style="text-transform: uppercase;">{{$question->answer}}</td>
                    <td>
                        <a href="{{url('admin/edit-ques')}}/{{$question->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a href="{{url('admin/delete-ques')}}/{{$question->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure delete Subject')"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    </td>
                </tr>
                @empty
                <h4 class="text-center">Questions Not Available.</h4>
                @endforelse


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