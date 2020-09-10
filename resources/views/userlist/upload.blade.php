@extends('layouts.global')
@section("title") Create @endsection
@section("pageTitle") Upload Data @endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Upload File</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action="{{ url ('/userlist')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="uploadFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" accept=".csv" class="custom-file-input  {{ $errors->has('file') ? 'is-invalid':'' }}" id="uploadFile" required="">
                        <label class="custom-file-label" for="">Choose CSV file</label>
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                      </div>
 
                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div> -->
                    </div>
                  </div>
                  <div class="form-check">
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1"> <i>Check me out</i> </label> -->
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Submit">
              </div>
              </form>
            </div>
          </div>
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
{{-- @endsection --}}
@stop

@push('css')
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">    
@endpush

@push('scripts')
<!-- Moment -->
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<!-- DatePicker -->
<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
  $(function () {
    //Custom file input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
        
  });

</script>
@endpush
