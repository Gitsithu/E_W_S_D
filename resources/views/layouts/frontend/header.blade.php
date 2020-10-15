<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags Must come first in the head; any other head content must come after these tags -->

    <!-- Title -->
    <title>University of GreenWich | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="/frontend/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/frontend/css/style.css">


<!-- Preloader -->
<div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="/"><h3>University of Green Wich</h3></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/">Home</a></li>
                                @if(Auth::check())
                                @if(Auth::user()->role_id == 4)
                                <li><a href="/faculty">Faculty</a></li>
                                @else
                                <li><a href="/guest_faculty">Faculty</a></li>
                                @endif
                                @else
                                <li><a href="/faculty">Faculty</a></li>
                                @endif
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="#">More</a>
                                    <ul class="dropdown">
                                        <li><a href="/contact">Contact</a></li>
                                        @if(Auth::check())
                                        @if(Auth::user()->role_id == 4)
                                        <li><a href="/submission">Submitted History</a></li>
                                        @else
                                        @endif
                                        @else
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="/search"  method="post">
                                {{ csrf_field() }}
                                    <input type="search" name="q" id="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

<!-- Register / Login -->
           
            @guest
                  <a class="btn" href="{{ route('login') }}">Login</a>
              
              @if (Route::has('register'))
              
                      <a class="btn" href="{{ route('register') }}">Register</a>
            
              @endif
             @else
                                <div class="login-state d-flex align-items-center">
                                <div class="user-name mr-30">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="/home">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>   
                                      </div>
                                    </div>
                                </div>
                                <div class="userthumb">
                                <img src="{{ Auth::user()->image }}">
                                </div>
                            </div>
                            <!-- Register / Login -->
                            
                            @endguest  
                  
              
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>