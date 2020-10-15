@include('layouts.frontend.header')
@yield('content')

<section class="ftco-section contact-section" style="margin-top:60px; margin-bottom:100px;">
<div class="container">
 <!-- this is wriiten to carry the data to the certain route -->
<form method="POST" action="{{ route('register') }}" style="margin-top:50px;" enctype="multipart/form-data"">
       @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1" style="text-align:center;">Registrations Form</h3>
                <p style="text-align:center;">Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required="" placeholder="Username" autocomplete="name">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" value="{{ old('email') }}"placeholder="E-mail" autocomplete="email">
                    @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required="" placeholder="Password">
                    @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="phone" required="" value="{{ old('phone') }}" placeholder="Your Phone" autocomplete="off">
                    @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Address..." class="form-control form-control-lg" name="address" value="{{ old('address') }}"></textarea>
                    @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">{{ __('Register') }}</button>
                </div>
                <a class="btn btn-link" href="{{ route('login') }}">
              {{ __('Already Account?') }}
               </a>
            </div>
        </div>
    </form>
 <!-- this is wriiten to carry the data to the certain route -->
</section>

    
@include('layouts.frontend.footer')