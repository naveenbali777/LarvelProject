
<div class="container-fluid loginContainer" >
 
    <div class="overLay"></div>
    <div id="er-alt">@include('layouts.alert-boxes')</div>
    <div class="row" id="loginpage">
        <div class="col-sm-12">
            <div class="loginbox">                
                <div class="row innerContent">
                    <div class="col-sm-12">
                        <div class="sitelogo"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="sitelogotxt"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-blue"></div>
                            <div class="text-blue">User login</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autocomplete="off" auto required autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <button type="submit" class="form-control btn btn-blue">LOG IN</button>
                    </form>
                        <a href="#" class="forgotpwd forgot">forgot password?</a>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-orange"></div>
                            <div class="text-orange">New user signup</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" id="signup" class="form-control btn btn-orange">NOT A MEMBER? SIGN UP HERE</button>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-red"></div>
                            <div class="text-red">Get connected through</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="socialbox">
                            <a href="#"><span class="faceBook"></span></a>
                            <a href="#"><span class="twitter"></span></a>
                            <a href="#"><span class="gPlus"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="signup-page">
        <div class="col-sm-12">
            <div class="signupbox">                
                <div class="row innerContent">
                    <div class="col-sm-12">
                        <div class="sitelogo"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="sitelogotxt"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-orange"></div>
                            <div class="text-orange">New user signup</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                     <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First Name" autocomplete="off" required autofocus>
                        <span class="help-block fnameError">
                            <strong></strong>
                        </span>

                        <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name" autocomplete="off" required autofocus>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autocomplete="off" required>

                        <span class="help-block emailError">
                            <strong></strong>
                        </span>

                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        <span class="help-block passwordError">
                            <strong></strong>
                        </span>

                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                       
                        <button type="submit" class="form-control btn btn-orange">SIGN UP</button>
                     </form>
                        <a href="#" class="allreadylogin" id="login">Allready have an account? Sign in</a>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-red"></div>
                            <div class="text-red">Get connected through</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="socialbox">
                            <a href="#"><span class="faceBook"></span></a>
                            <a href="#"><span class="twitter"></span></a>
                            <a href="#"><span class="gPlus"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="recover">
        <div class="col-sm-12">
            <div class="loginbox">                
                <div class="row innerContent">
                    <div class="col-sm-12">
                        <div class="sitelogo"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="sitelogotxt"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-blue"></div>
                            <div class="text-blue">Recover Password</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{ route('password.recover.request') }}">
                        {{ csrf_field() }}
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ $email or old('email') }}" required autofocus>
                        <span class="help-block recoverEmailError">
                            <strong></strong>
                        </span>
                        <button type="submit" class="form-control btn btn-blue">RECOVER PASSWORD</button>
                        </form>
                        <a href="javascript:;" class="forgotpwd login-page-btn">Back</a>
                    </div>                   
                    
                    <div class="col-sm-12">
                        <div class="userlinebox">
                            <div class="line-red"></div>
                            <div class="text-red">Get connected through</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="socialbox">
                            <a href="#"><span class="faceBook"></span></a>
                            <a href="#"><span class="twitter"></span></a>
                            <a href="#"><span class="gPlus"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</div>



