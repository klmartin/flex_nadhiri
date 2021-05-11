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
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
   <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">

</head>
<!-- Body -->
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.1.2/dist/alpine.js" defer></script>
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
            <a href="/flex_nadhiri/admin-dashboard" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/flex_nadhiri/manage-members" class="nav-link">Members</a>
          </li>
           <li class="nav-item">
            <a href="/flex_nadhiri/view-pledges" class="nav-link">Pledges</a>
          </li>
          
           <li class="nav-item">
              <a href="/flex_nadhiri/manage-payments" class="nav-link">Payments</a>
          </li> 
          <li class="nav-item">
              <a href="/flex_nadhiri/manage-events" class="nav-link">Events</a>
          </li>
          <li class="nav-item">
            <a href="/flex_nadhiri/make-report" class="nav-link">Reports</a>
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
            <a href="/flex_nadhiri/member-dashboard" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/flex_nadhiri/member-profile" class="nav-link">Profile</a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">Pledges</a>
          </li>
       
          <li style="position: fixed; left: 1005px;">
            <a class="nav-link">Welcome! {{Auth::user()->name}}</a>
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

   
    <!-- /.content-header -->