@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="auth-wrapper">
    <div class="bg-light p-4 col-lg-5 col-md-8 col-sm-11 mx-auto auth-form rounded">
        <div class="text-center">
            <img class="login_logo" src="storage/logo.png" alt="Najma Mansion Hostel" width="150px">
        </div>
        <!-- <h6 class="text-secondary text-center mb-4">Login</h6> -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input id="email" type="email" class="form-control" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group mb-3">
                     <input id="password" type="password" class="form-control" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password" autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="changeType()">
                            <span class="type-text" style="display:none"><div><i class="fa fa-eye"></i></div></span>
                            <span class="type-pass"><div><i class="fa fa-eye-slash"></i></div></span>
                        </span>
                    </div>
                </div>
            </div>
            
            @error('email')
                <span class="invalid-feedback d-inline" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback d-inline" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <button  type="submit" class="btn btn-block btn-primary mt-4" >Login</button>
        </form>
        <div class="text-center my-2">
            <div>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgotten password
                </a>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

<script>
function changeType(){
var type = $("#password").attr('type');
switch (type) {
    case 'password':
    {
        $("#password").attr('type', 'text');
        $(".type-text").show();
        $(".type-pass").hide();
        return;
    }
    case 'text':
    {
        $("#password").attr('type', 'password');
        $(".type-text").hide();
        $(".type-pass").show();
        return;
        }
    }

}
</script>