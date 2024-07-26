{{-- @extends('layout.main') --}}
@extends('front.layout.main')

@section('content')

<div class="wrapper">    <div class="container">
  <h1 class="underlined-title">Vendor registration</h1>

  <div class="pr-edit-4-steps">
      <div class="line-1">
          <div class="step step-1 filled">
              <div class="circle">1</div>
              <div class="step-label">Login details</div>
          </div>
          <div class="step step-2">
              <div class="circle">2</div>
              <div class="step-label">User profile</div>
          </div>
      </div><div class="line-2">
          <div class="step step-3">
              <div class="circle">3</div>
              <div class="step-label">Vendor profile</div>
          </div>
      </div><div class="line-3">
          <div class="step step-4">
              <div class="circle">4</div>
              <div class="step-label">Payment details</div>
          </div>
      </div>
  </div>

  <form class="form-horizontal pr-edit-form" method="post"
        action="https://www.sellmyapp.com/vendor-registration/">
      <div class="form-group">
          <label class="col-sm-4">Login:<span class="red">*</span></label>

          <div class="second-column col-sm-16 col-lg-13">
              <input type="text" name="login"
                     value=""/>
          </div>
      </div>
                  <div class="form-group">
          <label for="user-email" class="col-sm-4">Email:<span class="red">*</span></label>

          <div class="second-column col-sm-16 col-lg-13">
              <input type="text" id="user-email" name="email"
                     value=""/>
          </div>
      </div>
                  <div class="form-group">
          <label for="user-password" class="col-sm-4">Password:<span class="red">*</span></label>

          <div class="second-column col-sm-16 col-lg-13">
              <input type="password" id="user-password" name="password" maxlength="30"
                     value=""/>
          </div>
      </div>
                  <div class="form-group">
          <label for="retype-password" class="col-sm-4">Retype password:<span class="red">*</span></label>

          <div class="second-column col-sm-16 col-lg-13">
              <input type="password" id="retype-password" name="retype_password" maxlength="30"
                     value=""/>
          </div>
      </div>
                  <div class="form-group">
                          <label for="bot-question" class="col-sm-4">
              Security question:<span class="red">*</span><br/>
              How much is 14 + 1?
          </label>

          <div class="second-column col-sm-16 col-lg-13">
              <input type="text" id="bot-question" name="bot_question" autocomplete="off"
                     value=""/>
              <input type="hidden" name="bot_question_number"
                     value="14"/>
          </div>
      </div>
                  <input type="text" class="important-question" name="important_question" value="" autocomplete="off"/>
      <div class="text-center">
          <input type="submit" class="btn btn-default btn-lg" value="Next step"/>
      </div>
              </form>
</div>
</div><!-- wrapper -->
  
@endsection