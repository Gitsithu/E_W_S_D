<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/backend/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/backend//assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend//assets/libs/css/style.css">
    <link rel="stylesheet" href="/backend//assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="/"><img class="logo-img" src="https://www.logo-designer.co/wp-content/uploads/2016/12/2016-rbl-logo-design-university-of-greenwich.png" width="300" height="150" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
            <!-- this is written for alert the message box when user take action -->
            <div class="row">
                 @if (session('success'))
                 <div class="flash-message col-md-12">
                     <div class="alert alert-success ">
                         {{session('success')}}
                     </div>
                 </div>
                 @elseif(session('fail'))
                 <div class="flash-message col-md-12">
                     <div class="alert alert-danger">
                         {{session('fail')}}
                     </div>
                 </div>
                
                 @endif
                       @if (count($errors) > 0)
                                       <div class="content mt-3">
                                           <!-- div class=row content start -->
                                           <div class="animated fadeIn">
                                               <!-- div class=FadeIn start -->
                                               <div class="card">
                                                   <!-- card start -->
                                   
                                                   <div class="card-body">
                                                       <!-- card-body start -->
                                   
                                   
                                                       <div class="row">
                                                           <!-- div class=row One start -->
                                                           @foreach ($errors->all() as $error)
                                                           <div class="col-md-12">
                                                               <!-- div class=col 12 One start -->
                                                               <p class="text-danger">* {{ $error }}</p>
                                                           </div><!-- div class=col 12 One end -->
                                                           @endforeach
                                                       </div><!-- div class=row One end -->
                                   
                                   
                                                   </div> <!-- card-body end -->
                                   
                                               </div><!-- card end -->
                                           </div><!-- div class=FadeIn start -->
                                       </div><!-- div class=row content end -->
                                       @endif
                                 </div>
                                 <!-- this is end for alert the message box when user take action -->

            <!-- this is wriiten to carry the data to the certain route -->
            <form method="POST" action="{{ route('login') }}">
       @csrf
        <div class="form-group">
          <input type="email" id="email" class="form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
         @enderror
 
        </div>
        <div class="form-group">
          <input type="password" id="password" class="form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
       @enderror
        </div>
        <div class="form-group">
        <div class="form-check">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="custom-control-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                    {{ __('Login') }}
                </button>

          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif
     
        </div>
      </form>
       <!-- this is end to carry the data to the certain route -->            
            </div>
            
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/backend//assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/backend//assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>