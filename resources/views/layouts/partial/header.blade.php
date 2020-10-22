
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/backend/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/backend/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend/assets/libs/css/style.css">
    <link rel="stylesheet" href="/backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/backend/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="/backend/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="/backend/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/backend/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="/backend/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>E_W_S_D</title>

<style>
    #max-card{
        width:100% !Important;
    }
</style>
</head>
<body style="overflow-x:hidden;">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="/home"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">                  

             <!-- Authentication Links -->
             @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       Welcome {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Profile') }}
                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        
        </div>
      </li>

    </ul>
  </nav>
 
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->

    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
     
            <nav class="navbar navbar-expand-lg bg-white fixed-top" >
                <a class="navbar-brand" href="index.html">UOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                       
                        @guest
                        <li>  
                            <a class="btn" href="{{ route('login') }}">Login</a></li>
                             @if (Route::has('register'))
                        <li><a class="btn" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @else
                            <li style="font-size:24px; padding-top:4px; padding-left:6px;"><a class="nav-link" href="{{ route('register') }}">{{ Auth::user()->name }}</a></li>
                            <li class="nav-item"><img class="nav-link" src="{{ Auth::user()->image }}" width="80px" height="65px"></li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>  
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->

        <!-- this is written for the backend view -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column" >
                            <li class="nav-divider">
                                Menu
                            </li>
                            <!-- this is wrriten for user with role id 1 -->
                            @if(Auth::user()->role_id==1)

                            <li class="nav-item ">
                                <a class="nav-link " href="/backend/middle/dashboard/"  ><i class="fas fa-list-ul"></i>Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/user/create" ><i class="fa fa-address-card"></i>Account Create</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/home/"><i class="fas fa-address-book"></i>User List</a>
                       
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/backend/academicyear/"  ><i class="fas fa-list-ul"></i>Academic Year</span></a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/faculty/"><i class="fas fa-book"></i>Faculty List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/submission/"><i class="fas fa-file-alt"></i>Contributions List</a>
                            </li>
                            <li class="nav-divider">
                                Report
                            </li> 

                            

                            <li class="nav-item">
                                <a class="nav-link" href="/backend/middle/contribution"><i class="fas fa-newspaper"></i>Contribution Report List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/middle/contributor"><i class="fas fa-newspaper"></i>Contributor Report List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/middle/percentage"><i class="fas fa-newspaper"></i>Percentage Report List</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/backend/report/comment"><i class="fas fa-newspaper"></i>Contribution per without comment Report List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/report/after_comment"><i class="fas fa-newspaper"></i>Contribution per after 14 days without comment Report List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/log/activities"><i class="fas fa-chart-line"></i>Analytics of Use</a>
                            </li>
                            <!-- this is end for user with role id 1 -->

                            <!-- this is wrriten for user with role id 2 or 3 -->
                            @else
                            <li class="nav-item ">
                                <a class="nav-link " href="/backend/middle/dashboard/"  ><i class="fas fa-list-ul"></i>Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/submission"><i class="fas fa-file-alt"></i>Contributions List</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="/backend/faculty/" ><i class="fas fa-book"></i>Faculty List</a>
                            </li>

                            @endif
                            <!-- this is end for user with role id 2 or 3 -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- this is written for the backend view -->
        
           
 <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->