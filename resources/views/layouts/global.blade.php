<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Custom Report | @yield("title")</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">


  <!-- pace-progress -->
  <link rel="stylesheet" href="{{asset('lte/plugins/pace-progress/themes/custom/pace-theme-flat-top.css')}}">

  @stack('css')
  

  <style>
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #434689 !important;
    }
    table.dataTable tbody th,
    table.dataTable tbody td {
        white-space: nowrap !important;
    }
  </style>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="dropdown d-none d-md-block">
        <i class="right fas fa-user-circle"></i>
        @if(\Auth::user())
        <button class="btn dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown" aria-expanded="false">
        Hi, {{Auth::user()->name}}
        </button>
        @endif 
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
          {{-- <a href="#" class="dropdown-item">Profile</a>
          <a href="#" class="dropdown-item">Setting</a> --}}
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          {{-- <a href="{{route("logout")}}" class="dropdown-item">Sign Out</a> --}}
        </div>
      </div>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{asset('lte/dist/img/logo.png')}}" alt="Logo Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
          <span class="brand-text font-weight-light">Netpolitan </span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link {{ (request()->is('/') or request()->is('home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ (request()->is('upload') or request()->is('report/create')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Insert Data
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('upload') }}" class="nav-link">
                  &nbsp;&nbsp;&nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('report/create') }}" class="nav-link">
                  &nbsp;&nbsp;&nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ (request()->is('report') or request()->is('report/data') or request()->is('report/filter') ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                View Data
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('report/data') }}" class="nav-link">
                  &nbsp;&nbsp;&nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>Internal Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('report/') }}" class="nav-link">
                  &nbsp;&nbsp;&nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>Percipio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('user') }}" class="nav-link {{ (request()->is('user')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('coursetype') }}" class="nav-link {{ (request()->is('coursetype')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Course Type
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield("pageTitle")</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield("content")
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="http://netpolitanteam.com">Netpolitan</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- pace-progress -->
<script src="{{asset('lte/plugins/pace-progress/pace.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- page script -->
@stack('scripts')
</body>
</html>
