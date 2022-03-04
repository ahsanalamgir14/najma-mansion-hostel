@extends('layouts.app')

@section('content')

<div class="auth-wrapper">
    <div class="bg-light p-4 col-lg-5 col-md-8 col-sm-11 mx-auto auth-form rounded">
        <div class="text-center my-3">
            <img class="login_logo" src="../../storage/logo.png" alt="Najma Mansion Hostel" width="150px">
        </div>
        <h4 class="text-secondary text-center mb-4">{{ __('Enter New Password') }}</h4>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf 

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="changePasswordType()">
                            <span class="type-text" style="display:none"><div><i class="fa fa-eye"></i></div></span>
                            <span class="type-pass"><div><i class="fa fa-eye-slash"></i></div></span>
                        </span>
                    </div>
                </div>
                
                @error('password')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="changeConfirmPasswordType()">
                            <span class="confirm-type-text" style="display:none"><div><i class="fa fa-eye"></i></div></span>
                            <span class="confirm-type-pass"><div><i class="fa fa-eye-slash"></i></div></span>
                        </span>
                    </div>
                </div>
                @error('confirm-password')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center my-2">
                <div>
                    <button type="submit" class="btn btn-block btn-primary mt-4">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
function changePasswordType(){
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

function changeConfirmPasswordType(){
    var type = $("#password-confirm").attr('type');
    switch (type) {
        case 'password':
        {
            $("#password-confirm").attr('type', 'text');
            $(".confirm-type-text").show();
            $(".confirm-type-pass").hide();
            return;
        }
        case 'text':
        {
            $("#password-confirm").attr('type', 'password');
            $(".confirm-type-text").hide();
            $(".confirm-type-pass").show();
            return;
            }
        }
    }
</script>