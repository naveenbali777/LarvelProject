<div class="title">
    <img src="{{ asset('images/logo-only.png') }}">
    <h2>HereAfter Legacy</h2>
    <small>Your digital footprints</small>
</div>
<hr>
<div class="login-form" id="loginpage">
    <h3>Login</h3>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="col-sm-12">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autocomplete="off" auto required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <span class="forgot pull-right">Forgot Password</span>
            <br>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-green">Login</button> 
            </div>
            <br>
            <div class="dumy"></div>
            <div class="col-sm-12 text-center">
                <hr>
                <button type="button" id="signup" class="btn btn-green">Not a member yet? Register</button> 
                <hr>
            </div>
        </div>
        <br> <br>
    </form>
</div>