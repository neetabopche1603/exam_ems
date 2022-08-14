@extends('user.layouts.app')
@section('title','Student Exam Portal')
@section('content')
<div class="container">
   <div class="card">
    <div class="card-body">
    <table id="exam" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Timing</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                   @foreach ($exams as $exam)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$exam->subject}}</td>
                    <td>30 Minut</td>
                        <td>
                            <a href="{{url('user/join-exam')}}/{{$exam->id}}" class="btn btn-primary btn-sm">Join Exam</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
   </div>
</div>
@endsection
@push('script')
<script>
  $(document).ready(function() {
    $('#exam').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>
@endpush