@extends('admin.layout.app')
@section('admintitle','Admin| Manual Question Form')
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
                    <h1>Manual Question</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manual Question</li>
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
                            <h3 class="card-title">Manual Question</h3>
                            <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{route('admin.manualQuestionPost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Subject <span class="text-danger">*</span></label>
                                            <select class="form-control" name="subject_id" id="subject">
                                            <option value="" selected disabled>Choose Subject</option>
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <span class="text-danger font-weight-bold">
                                            @error('subject_id')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Question <span class="text-danger">*</span></label>
                                            <textarea type="text" name="question" class="form-control" id="" placeholder=""></textarea>
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('question')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Option 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="option1" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('option1')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Option 2 <span class="text-danger">*</span></label>
                                            <input type="text" name="option2" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('option2')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Option 3 <span class="text-danger">*</span></label>
                                            <input type="text" name="option3" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('option3')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Option 4 <span class="text-danger">*</span></label>
                                            <input type="text" name="option4" class="form-control" id="" placeholder="">
                                        </div>
                                        <span class="text-danger font-weight-bold">
                                            @error('option4')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Choose Correct Answer <span class="text-danger">*</span></label>
                                            <select class="form-control" name="answer" id="answer">
                                                <option value="a">Option 1</option>
                                                <option value="b">Option 2</option>
                                                <option value="c">Option 3</option>
                                                <option value="d">Option 4</option>
                                            </select>
                                        </div>

                                        <span class="text-danger font-weight-bold">
                                            @error('answer')
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
    CKEDITOR.replace('question');
</script>
<script>
    $('#subject').select2();
    $('#answer').select2();
</script>


@endpush