
@extends('authenticate-accounts.main')

@section('sub-content')

    <div class="row">
        <div  class="col-sm-12 mar-bet">
            <div class="row">
                <div class="col-md-2 col-sm-3"></div>        
                <div class="col-md-10 col-sm-9">        

                    <div class="setting-title">
                        <span><i class="fa fa-vcard"></i></span> Login - <span style="font-size:10px;color:#000">Please check your email for OTP..</span>

                    </div>
                    
                    <div class="templ-box">
                        <div class="row">
                            <form method="POST" action="{{ route('account.login',$key ) }}">
                                {{ csrf_field() }}
                                <div class="col-sm-12 mar-bet">
                                    <div class="col-sm-3"> OTP </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="otp_code" placeholder="xyz123" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12 mar-bet">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9"><button class="templ-btn">Login</button></div>
                                </div>
                            </form>
                        </div>    
                    </div>               

                </div>
            </div>
        </div>
    </div>

@endsection
