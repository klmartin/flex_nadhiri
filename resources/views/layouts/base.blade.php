<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="/css/app.min.css" rel="stylesheet">
  <livewire:styles/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('css/googlecss.css')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
   <!-- IonIcons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('memberprofile.css')}}">
  <script src="{{asset('js/iconify.min.js')}}"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
</head>
<!-- Body -->
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <script src="{{asset('js/alpine.js')}}" defer></script>
   <livewire:scripts/>

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
       
        <span class="brand-text font-weight-light">Flex Nadhiri</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if(Route::has('login'))
           @auth
           @if(Auth::user()->role == 'admin')
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/admin-dashboard" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/manage-members" class="nav-link">Members</a>
          </li>
           <li class="nav-item">
            <a href="/view-pledges" class="nav-link">Pledges</a>
          </li>
          
           <li class="nav-item">
            <a href="/manage-payments" class="nav-link">Payments</a>
          </li>
           <li class="nav-item">
            <a href="/manage-events" class="nav-link">Events</a>
          </li>
           <li class="nav-item">
            <a href="/make-report" class="nav-link">Reports</a>
          </li>

         <li style="position: absolute;left: 1060px;">
            <a class="nav-link">Welcome! {{Auth::user()->name}}</a>
          </li>
        </ul>

      </div>
      
       @else
             <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/member-dashboard" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/member-profile" class="nav-link">Profile</a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">Pledges</a>
          </li>
          <li style="position: fixed; left: 1005px;">
            <a class="nav-link">Welcome! {{Auth::user()->name}} </a>
          </li>
        </ul>

      </div>
       @endif
        @endif
         @endif   
                                 


      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
       
        <!-- MY ACCOUNT Dropdown Menu -->
        <li class="nav-item dropdown" style="margin: 0; top: 5px;">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="iconify" data-icon="codicon:account" data-inline="false"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">MY ACCOUNT</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="iconify" data-icon="carbon:user-profile" data-inline="false"></i>  My Profile
            </a>
             @if(Auth::user()->role == 'admin')
            <a href="#" class="dropdown-item">
              <i class="iconify" data-icon="ri:team-fill" data-inline="false"></i>  Team Members
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a href="route('logout" class="dropdown-item dropdown-footer" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}</a>
                              </form>
          </div>
        </li>
         <!--  ENDING MY ACCOUNT Dropdown Menu -->
      </ul>
    </div>
  </nav>

   <!-- Content Header (Page header) -->
   

    

    {{$slot}}




    <!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE App --><!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- END PAGE REQUIRED SCRIPTS -->
  <!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/dashboard3.js')}}"></script>

  <script src="{{asset('js/highcharts.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/userlinechart.js')}}"></script>
  </body>
</html>