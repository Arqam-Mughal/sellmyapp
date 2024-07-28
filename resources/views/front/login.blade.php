{{-- @extends('layout.main') --}}
@extends('front.layout.main')

@section('content')

<div class="wrapper">
    <div class="container text-center">
        @if(Session::has('error'))
                  <div class="alert alert-danger text-center">
                    {{ Session::get('error') }}
                  </div>
        @endif

        <h1 class="underlined-title">Log In</h1>
        <div class="login-form-wrapper" id="theme-my-login">
            <p class="sign-in-text">Sign-in to your SellMyApp account</p>
            <form class="login-form" name="loginform" id="loginform" action="{{ route('front.authenticate') }}"
                method="post">

                @csrf
                <div class="form-row" style="display: none">
                    or
                </div>
                <input type="text" name="name" value="{{ old('name') }}" id="user_login" class="input form-control @error('name')is-invalid @enderror" value="" size="20"
                    placeholder="Username" />
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="password" name="password" id="user_pass" class="input form-control @error('password')is-invalid @enderror" value="" size="20"
                    placeholder="Password" />

                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                <label for="bot_question">Security question:<br />
                    <strong>How much is 5 + 1?</strong><br />
                </label>

                <input type="text" name="bot_question" id="bot_question" class="input" autocomplete="off" value=""
                    size="20" />
                <input type="hidden" name="bot_question_number" class="input" value="5" />

                <input type="hidden" name="_wp_original_http_referer"
                    value="https://www.sellmyapp.com/downloads/sweet-sugar-match-3-mini-game/" />

                <div class="form-row remember-me-row">
                    <label>
                        <div class="sma-checkbox">
                            <input type="checkbox" name="rememberme" value="forever" id="rememberme" />

                            <div class="sma-checkbox-display"></div>
                        </div>
                        Remember Me
                    </label>
                </div>

                <input type="hidden" name="intented" value="{{ session('intented') }}">
                <input class="btn btn-lg btn-default" type="submit" name="wp-submit" id="wp-submit" value="Login" />

                <div class="form-row">
                    <a href="{{ route('front.register') }}" id="signup_change_tooltip">I don't have an account</a>
                </div>
                <a href="#" class="small-grey-link">Forgot your password?</a>
            </form>
        </div>

    </div>
</div><!-- wrapper -->


@endsection

@section('title', 'Login')
