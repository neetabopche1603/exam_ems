@extends('admin.layout.app')
@section('admintitle','Admin| See All User')
@section('main-container')
<div class="content-wrapper">

  <!-- Notifications -->

  <!-- @if(session()->has('info'))
    <div class="alert alert-info">
        {{ session()->get('info') }}
    </div>
@endif -->
  <!-- Notifications -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Student's</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> Show User's Task List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <h3 class="card-title">User List</h3>
              <a href="{{route('admin.addStudentForm')}}" class="float-right btn btn-warning text-dark"> <i class="fa fa-plus"></i> </i> Add</a>
            </div>
            <!-- /.card-header -->
            @if ($msg = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $msg }}</strong>
            </div>
            @elseif (Session::get('delete'))                        
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ Session::get('faild') }}</strong>
            </div>

            @elseif (Session::get('faild'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ Session::get('faild') }}</strong>
            </div>
            @endif
            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
            <table id="studentlist" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach ($users as $user)
                    <tr>
                    <td>{{$i++}}</td>
                    <td><img src="/student_image/{{ $user->student_image }}" width="100px" height="100PX"></td>
                        <td>{{$user->name}}</td>
                        <td>
                        @if ($user->status==1)
                        <span class="badge badge-success">Active</span>
                        @elseif ($user->status==0)
                        <span class="badge badge-danger">Dective</span>
                        @endif  
                      </td>
                        <td>
                            <a href="{{url('admin/view-student')}}/{{$user->id}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{url('admin/edit-student')}}/{{$user->id}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"></i> </a>
                            <a href="{{url('admin/delete-student')}}/{{$user->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure Delete this Data')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

                  
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
@push('script')
<script>
  $(document).ready(function() {
    $('#studentlist').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>

@endpush