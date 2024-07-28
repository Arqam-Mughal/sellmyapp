{{-- @extends('layout.main') --}}
@extends('front.layout.main')

@section('content')

<div class="wrapper"><div class="container text-center">
  <h1 class="underlined-title">Register</h1>
<div class="login-form-wrapper" id="theme-my-login">
<p class="bigger">Sign up is 100% FREE!</p>

<form name="registerform" class="register-form" id="registerform"
action="{{ route('front.registerStore') }}" method="post">

@csrf

<div class="form-row">
or
</div>
  <div class="form-row">
<label for="user_login">Username:</label>
<input type="text" name="name" id="name" class="input @error('name')is-invalid @enderror"
     value="" size="20"/>

</div>
@error('name')
     <p class="text-danger">{{ $message }}</p>
     @enderror

<div class="form-row">
<label for="user_email">Email:</label>
<input type="text" name="email" id="email" class="input @error('email')is-invalid @enderror"
     value="" size="20"/>

</div>
@error('email')
     <p class="text-danger">{{ $message }}</p>
     @enderror

<div class="form-row">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="input @error('password')is-invalid @enderror"
         value="" size="20"/>

    </div>
    @error('password')
     <p class="text-danger">{{ $message }}</p>
     @enderror

    <div class="form-row">
        <label for="c_password">Confirm Password:</label>
        <input type="password" name="c_password" id="c_password" class="input"
             value="" size="20"/>

        </div>
        @error('c_password')
     <p class="text-danger">{{ $message }}</p>
     @enderror


{{-- <div class="form-row security-question">
          <label for="bot_question">Security question:<br/>
  <strong>How much is 8 + 1?</strong> --}}
</label>

{{-- <input type="text" name="bot_question" id="bot_question" class="input"
     autocomplete="off"
     value="" size="20"/>
<input type="hidden" name="bot_question_number" class="input" value="8"/> --}}
{{-- </div> --}}



{{-- <input type="text" class="important-question" name="important_question" value="" autocomplete="off"/> --}}

<input class="btn btn-lg btn-default btn-submit" type="submit" name="submit"
 id="submit" value="Sign Up"/>

{{-- <input type="hidden" name="redirect_to" value="https://www.sellmyapp.com/thanks-for-signing-up-to-sell-my-app"/> --}}
{{-- <input type="hidden" name="instance" value=""/> --}}
{{-- <input type="hidden" name="action" value="register"/> --}}
</form>
<p>By clicking 'Sign Up' You agree to our <a href="https://www.sellmyapp.com/developer-terms-conditions">terms
& conditions</a>.<br/><span class="bigger">A password will be e-mailed to you.</span></p>

<div class="form-row">
<a href="#">I already have an account</a>
</div>
<a href="https://www.sellmyapp.com/lostpassword/" class="small-grey-link">Forgot your password?</a>
</div>

</div>
</div><!-- wrapper -->

@endsection

@section('title', 'Register')
