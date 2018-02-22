<!-- BEGIN FORGOT CONTENT -->
<div id="recover">
    
        <div class="login-form">
            <h3>Reset Password</h3>
            <form class="form-horizontal" method="POST" action="{{ route('password.recover.request') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        <span class="help-block recoverEmailError">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <a href="javascript:;" class="btn btn-info login-page-btn pull-right">Back</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-green">
                            RESET PASSWORD
                        </button>
                    </div>
                </div>
            </form>
        </div>        
    
</div>
<!-- END FORGOT CONTENT -->