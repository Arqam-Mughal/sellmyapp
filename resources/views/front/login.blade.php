{{-- @extends('layout.main') --}}
@extends('front.layout.main')

@section('content')

<div class="wrapper">
    <div class="container text-center">
                <h1 class="underlined-title">Log In</h1>
            <div class="login-form-wrapper" id="theme-my-login">
        <p class="sign-in-text">Sign-in to your SellMyApp account</p>
        <form class="login-form" name="loginform" id="loginform"
          action="/login/" method="post">
                <div class="form-row" style="display: none">
            or
        </div>
        <input type="text" name="log" id="user_login" class="input"
               value="" size="20"
               placeholder="Username"/>
                <input type="password" name="pwd" id="user_pass" class="input" value=""
               size="20" placeholder="Password"/>
                <label for="bot_question">Security question:<br/>
            <strong>How much is 5 + 1?</strong><br/>
        </label>

        <input type="text" name="bot_question" id="bot_question" class="input"
               autocomplete="off"
               value="" size="20"/>
        <input type="hidden" name="bot_question_number" class="input" value="5"/>
        
        <input type="hidden" name="_wp_original_http_referer" value="https://www.sellmyapp.com/downloads/sweet-sugar-match-3-mini-game/" />

        <div class="form-row remember-me-row">
            <label>
                <div class="sma-checkbox">
                    <input type="checkbox" name="rememberme"
                           value="forever"
                           id="rememberme"/>

                    <div class="sma-checkbox-display"></div>
                </div>
                Remember Me            </label>
        </div>

        <input type="text" class="important-question" name="important_question" value="" autocomplete="off"/>

        <input class="btn btn-lg btn-default" type="submit" name="wp-submit"
               id="wp-submit"
               value="Login"/>
        <input type="hidden" name="redirect_to" value="https://www.sellmyapp.com/wp-admin/"/>
        <input type="hidden" name="instance" value=""/>
        <input type="hidden" name="action" value="login"/>

        <div class="form-row">
            <a href="https://www.sellmyapp.com/register" id="signup_change_tooltip">I don't have an account</a>
        </div>
        <a href="https://www.sellmyapp.com/lostpassword/" class="small-grey-link">Forgot your password?</a>
    </form>
</div>

</div>
</div><!-- wrapper -->


@endsection