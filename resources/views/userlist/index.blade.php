@extends('layouts.global')
@section("title") Userlist @endsection
@section("pageTitle") Data Userlist @endsection

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

          {{-- <div class="dt-buttons"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
              Filter
             </button> &nbsp;&nbsp;
          </div> --}}
          
          <table id="tableData" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>User Status</th>
              <th>Role</th>
              <th>Created Date</th>
              <th>Last Login Date</th>
              <th>Last Content Access</th>
              <th>Audience</th>
              <th>UserPolicyAgreement</th>
              <th>Account Created</th>
              <th>Account Deactive</th>
              <th>License Business</th>
              <th>License Tech</th>
              <th>License Productivity</th>
              <th>License SLDP</th>
              <th>License Digital Trans</th>
              <th>License Skillsoft Essensials</th>
              <th>License Skillsoft Addvance</th>
              <th>License Skillsoft Expert</th>
              <th>Relation</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($userlist as $q)
                
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $q->userId }}</td>
              <td>{{ $q->firstName .' '.$q->lastName }}</td>
              <td>{{ $q->emailAddress }}</td>
              <td>{{ $q->userStatus }}</td>
              <td>{{ $q->role }}</td>
              <td>{{ $q->createdDate }}</td>
              <td>{{ $q->lastLoginDate }}</td>
              <td>{{ $q->lastContentAccess }}</td>
              <td>{{ $q->audience }}</td>
              <td>{{ $q->userPolicyAgreementDate }}</td>
              <td>{{ $q->accountCreated }}</td>
              <td>{{ $q->accountDeactive }}</td>
              <td>{{ $q->licenseBusiness }}</td>
              <td>{{ $q->licenseTech }}</td>
              <td>{{ $q->licenseProductivity }}</td>
              <td>{{ $q->licenseSldp }}</td>
              <td>{{ $q->licenseDigitalTrans }}</td>
              <td>{{ $q->licenseSkillsoftEssensials }}</td>
              <td>{{ $q->licenseSkillsoftAdvance }}</td>
              <td>{{ $q->licenseSkillsoftExpert }}</td>
              <td>{{ $q->relation }}</td>
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

<!-- Modal -->
{{-- <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('report/data') }}">
          <div class="form-group">
            <label for="" class="col-form-label">User ID:</label>
            <input type="text" name="userid" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Employee Name:</label>
            <input type="text" name="name" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Company Name:</label>
            <select name="company" id="selectCompany" class="form-control">
              <option value="">Select Company</option>
              <option value="Kaplan Higher Education Academy Pte Ltd">Kaplan Higher Education Academy Pte Ltd</option>
              <option value="Kaplan Higher Education Institute Pte Ltd">Kaplan Higher Education Institute Pte Ltd</option>
              <option value="Kaplan Learning Institute Pte Ltd">Kaplan Learning Institute Pte Ltd</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Course Title:</label>
            <input type="text" name="course_title" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Course Type:</label>
            <input type="text" name="course_type" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Department:</label>
            <select name="department" id="department" class="form-control select2">
              <option value="">Select Department</option>
              <option value="Academic Planning & Support Office">Academic Planning & Support Office</option>
              <option value="Admission Office">Admission Office</option>
              <option value="Curriculum & Assessment Team">Curriculum & Assessment Team</option>
              <option value="Domestic Sales">Domestic Sales</option>
              <option value="Employability and Industry Engagement">Employability and Industry Engagement</option>
              <option value="Entrepreneurship Dev & Grad Emp Centre">Entrepreneurship Dev & Grad Emp Centre</option>
              <option value="Examination Office">Examination Office</option>
              <option value="Facilities & Operations">Facilities & Operations</option>
              <option value="Finance">Finance</option>
              <option value="Forney Corporation">Forney Corporation</option>
              <option value="Graduate Services">Graduate Services</option>
              <option value="Human Resource">Human Resource</option>
              <option value="Information Technology">Information Technology</option>
              <option value="International Sales">International Sales</option>
              <option value="Kaplan Higher Education Academy-Genesis">Kaplan Higher Education Academy-Genesis</option>
              <option value="Kaplan Language Ctr LECT">Kaplan Language Ctr LECT</option>
              <option value="Kaplan Language Ctr PM">Kaplan Language Ctr PM</option>
              <option value="Kaplan Partner Services HK">Kaplan Partner Services HK</option>
              <option value="Kaplan Publishing">Kaplan Publishing</option>
              <option value="KF - Academic">KF - Academic</option>
              <option value="KF Sales">KF Sales</option>
              <option value="Lecturer Management">Lecturer Management</option>
              <option value="Management Office">Management Office</option>
              <option value="Marketing & Communications">Marketing & Communications</option>
              <option value="O Level Prep School">O Level Prep School</option>
              <option value="Partnership Development & Acad Gov">Partnership Development & Acad Gov</option>
              <option value="Program Management">Program Management</option>
              <option value="Regional Office">Regional Office</option>
              <option value="Regulations, Quality and Compliance">Regulations, Quality and Compliance</option>
              <option value="School of Diploma Studies (PM)">School of Diploma Studies (PM)</option>
              <option value="School of Foundation & Languages">School of Foundation & Languages</option>
              <option value="School of Post Graduate Studies">School of Post Graduate Studies</option>
              <option value="SRO">SRO</option>
              <option value="Student Enrollment Office">Student Enrollment Office</option>
              <option value="Student Financial Services">Student Financial Services</option>
              <option value="Student Guidance & Counselling Services">Student Guidance & Counselling Services</option>
              <option value="Teaching">Teaching</option>
              <option value="Technology & Analytics">Technology & Analytics</option>
              <option value="Undergrad & Postgrad Studies">Undergrad & Postgrad Studies</option>
            </select>
          </div>

          <div class="form-group">
            <label for="" class="col-form-label">Employee Type:</label>
            <select name="staff_type" id="staff_type" class="form-control">
              <option value="">Employee Type</option>
              <option value="Academic Staff">Academic Staff</option>
              <option value="International">International</option>
              <option value="Kaplan Trainee">Kaplan Trainee</option>
              <option value="Non-Academic Staff">Non-Academic Staff</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Job Grade:</label>
            <select name="job_grade" id="job_grade" class="form-control">
              <option value="">Job Grade</option>
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="M1">M1</option>
              <option value="M2">M2</option>
              <option value="NE1">NE1</option>
              <option value="NE2">NE2</option>
            </select>
          </div>
          <hr>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Start Date:</label>
            <input type="text" data-date-format='ddmmyyyy' aria-modal="8" name="startdate" class="form-control" id="dateStart" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">End Date:</label>
            <input type="text" data-date-format='ddmmyyyy' aria-modal="8" name="enddate" class="form-control" id="dateEnd" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div> --}}
<!-- End Modal -->
  
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
      ],
      "scrollY" : true,
      "scrollX" : true,
      "dom": "Bfrtip",
      "buttons": [
            {
                'extend':    'excelHtml5',
                'text':      'Export',
                'titleAttr': 'Export Excel',
                'title': '',
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