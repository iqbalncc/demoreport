@extends('layouts.global')
@section("title") Home @endsection
@section("pageTitle") Data @endsection

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card table-responsive">
        <!-- /.card-header -->
        <div class="card-body">
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @elseif(session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif
          {{-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-excel"></i> Export</a>  --}}

          <div class="dt-buttons"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
              Filter
             </button> &nbsp;&nbsp;
          </div>
          
          <table id="tableData" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Employee Name</th>
              <th>Company</th>
              <th>Employee Type</th>
              <th>Department</th>
              <th>Designation</th>
              <th>Job Grade</th>
              <th>Date Join</th>
              <th>Course Title</th>
              <th>Course Type</th>
              <th>Provider</th>
              <th>Course Hours</th>
              <th>Date Start</th>
              <th>Date End</th>
              <th>Course Fees</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($reports as $q)
                
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $q->user_id }}</td>
              <td>{{ $q->employee_name }}</td>
              <td>{{ $q->company_name }}</td>
              <td>{{ $q->staff_type }}</td>
              <td>{{ $q->department }}</td>
              <td>{{ $q->designation }}</td>
              <td>{{ $q->job_grade }}</td>
              <td>{{ $q->date_join }}</td>
              <td>{{ $q->course_title }}</td>
              <td>{{ $q->course_type }}</td>
              <td>{{ $q->provider }}</td>
              <td>{{ $q->course_hours }}</td>
              <td>{{ $q->date_start }}</td>
              <td>{{ $q->date_end }}</td>
              <td>{{ $q->course_fees }}</td>
              <td>
                <a href="/report/{{ $q->id }}/edit" class="btn btn-warning btn-xs"> <i class="fas fa-pen" ></i></a>
                &nbsp;
                <form class="d-inline" action="{{route('report.destroy', [$q->id])}}" method="POST" onsubmit="return confirm('Delete data?')">
                  @csrf 
                  <input type="hidden" value="DELETE" name="_method">
                  <button class="btn btn-danger btn-xs" type="submit"> <i class="fas fa-trash"></i></button>
                </form>
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
</section>
{{-- @endsection --}}
  
@stop


@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">   
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">  
<!-- DataRange -->
<link rel="stylesheet" href="{{asset('lte/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


@endpush


@push('scripts')
<!-- Data Tables -->
<script src="{{asset('lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<!-- DataRange -->
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('lte/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    
    $("#tableData").DataTable({
      "pageLenght" : 10,
      "columnDefs": [
        { "width": "30", "targets": 0 },
        { "width": "100px", "targets": 1 },
        { "width": "210px", "targets": 2 },
        { "width": "280px", "targets": 3 },
        { "width": "180px", "targets": 4 },
        { "width": "200px",  "targets": 5 },
        { "width": "250px", "targets": 6 },
        { "width": "80px", "targets": 7 },
        { "width": "200px", "targets": 8 },
        { "width": "300px", "targets": 9 },
        { "width": "150px", "targets": 10 },
        { "width": "350px", "targets": 11 },
        { "width": "150px", "targets": 12 },
        { "width": "150px", "targets": 13 },
        { "width": "150px", "targets": 14 },
        { "width": "150px", "targets": 15 },
      ],
      "scrollY" : true,
      "scrollX" : true,
      "dom": "Bfrtip",
      "buttons": [
            {
                'extend':    'csvHtml5',
                'text':      'Export',
                'titleAttr': 'Export CSV',
                // 'exportOptions': {
                //     'columns': [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                // },
                // 'className': 'btn btn-primary glyphicon glyphicon-save-file'
            },
        ]
    });
    $(".buttons-html5").addClass("btn");

    //Date range picker
    $('#dateStart').datepicker({
      autoclose: true
    });
    $('#dateEnd').datepicker({
      autoclose: true
    });

    $('.select2').select2()
    
  });
</script>
@endpush