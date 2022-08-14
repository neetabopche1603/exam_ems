@extends('admin.layout.app')
@section('admintitle','Admin| See All Student Result')
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
          <h1>Result's</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active"> Show Result List</li>
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

              <h3 class="card-title">Result List</h3>
              <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
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
              <strong>{{ Session::get('delete') }}</strong>
            </div>

            @elseif (Session::get('faild'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ Session::get('faild') }}</strong>
            </div>
            @endif
            <div class="card-body shadow-lg p-3 mb-0 bg-white rounded">
            <table id="result" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach ($results as $result)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->subject}}</td>
                    <td>{{$result->result}}</td>
                        <td>
                            <a href="{{url('admin/delete-result')}}/{{$result->id}}" onclick="return confirm('Are Sure Delete This Data')" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                            
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
    $('#result').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>

@endpush