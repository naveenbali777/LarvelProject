<!-- BEGIN REGISTER CONTENT -->
  <div id="signup-page">
    
    <div class="login-form">
      <h3>Register</h3>
      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        
        <div class="col-sm-12">
          <div class="form-group">
            <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First Name" autocomplete="off" required autofocus>
            <span class="help-block fnameError">
                <strong></strong>
            </span>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name" autocomplete="off" required autofocus>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autocomplete="off" required>

            <span class="help-block emailError">
                <strong></strong>
            </span>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password (atleast one alphabet,one numeric and one special character)" required>

            <span class="help-block passwordError">
                <strong></strong>
            </span>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">                            
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>   
          </div>
        </div>   
          <br>
          <div class="row">
            <div class="col-sm-6">
               <button type="submit" class="btn btn-green">Register</button>
            </div>
            <div class="col-sm-6 text-right">
                <span id="login">already a member? Login</span>
          </div>
        </div>
        <br> <br>
      </form>
    </div>
  </div>

<!-- END REGISTER CONTENT -->