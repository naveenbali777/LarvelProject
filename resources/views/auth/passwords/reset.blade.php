@extends('layouts.app')

@section('content')
<div class="container-fluid loginContainer">
 @include('layouts.alert-boxes')
    <div class="overLay"></div>
    <div class="row">
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
                            <div class="text-blue">Reset Password</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <form class="form-horizontal" method="POST" action="{{ route('password.reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        <button type="submit" class="form-control btn btn-blue">RESET PASSWORD</button>
                        </form>                        
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
@endsection