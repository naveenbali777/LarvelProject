<div class="col-sm-12 setting-title" >
    <div style="cursor:pointer"><span><i class="fa fa-user-secret"></i></span> Password Change</div>
    <div class="pull-right" >
        <a href="{{ route('deactivate.profile') }}" style="color:#f40404;text-decoration:none"> <span><i class="fa  fa-user-times"></i></span> Deactivate Account </a><br>
        <span class="profile_set pointer"><i class="fa fa-user"></i> Profile</span>  
    </div>

</div>

<br><br>

<div class="col-sm-12 col-xs-12 mar-bet"> 
    <div class="row">
        <div class="templ-box">
            <div class="row">
                <form method="POST" action="{{route('update.password')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Email</div>
                        <div class="col-sm-9"><input type="text" style="width:100%" readonly="readonly" value="{{decrypt(Auth::user()->email).' (Read-Only)'}}"></div>
                    </div>                    
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Old password</div>
                        <div class="col-sm-9"><input class="form-control" placeholder="OLD Password" name="old_password" required="" value="{{ old('old_password') }}" type="password"></div>
                    </div>
                     @if ($errors->has('old_password'))
                        <span class="help-block profileError">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                    @endif
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">New password</div>
                        <div class="col-sm-9"><input id="password" class="form-control" name="password" placeholder="Password" required="" value="{{ old('password') }}" type="password"></div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block profileError">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Confirm New password</div>
                        <div class="col-sm-9"><input id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}" required="" type="password"></div>
                    </div>

                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9"><button class="templ-btn">SAVE</button></div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>