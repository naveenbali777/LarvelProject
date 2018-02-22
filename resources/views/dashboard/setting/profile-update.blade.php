<div class="col-sm-12 setting-title" >
    <div style="cursor:pointer"><span><i class="fa fa-user"></i></span> Profile</div>
    <div class="pull-right" >
        <a href="{{ route('deactivate.profile') }}" style="color:#f40404;text-decoration:none"> <span><i class="fa  fa-user-times"></i></span> Deactivate Account </a><br>
        <span id="psd_set" class="pointer"><i class="fa fa-user-secret"></i> Password Change</span> 
    </div>

</div>

<br><br>

<div class="col-sm-12 col-xs-12 mar-bet"> 
    <div class="row">
        <div class="templ-box">
            <div class="row">
                <form method="POST" action="{{route('update.profile')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Email</div>
                        <div class="col-sm-9"><input type="text" style="width:100%" readonly="readonly" value="{{decrypt(Auth::user()->email).' (Read-Only)'}}"></div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                         <div class="col-sm-3">Name</div>
                         <div class="col-sm-9"><input type="text" style="width:100%" name="name" placeholder="R X Jordon" required="required" value="{{decrypt(Auth::user()->name)}}"></div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Phone</div>
                        <div class="col-sm-9"><input class="form-control" placeholder="Phone" name="phone" required="" value="{{ old('phone') }}" type="text"></div>
                    </div>
                     @if ($errors->has('phone'))
                        <span class="help-block profileError">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Address</div>
                        <div class="col-sm-9"><input class="form-control" name="address" placeholder="Address" required="" value="{{ old('address') }}" type="text"></div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">City</div>
                        <div class="col-sm-9"><input class="form-control" name="city" placeholder="City" required="" value="{{ old('city') }}" type="text"></div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">State</div>
                        <div class="col-sm-9"><input class="form-control" name="state" placeholder="State" required="" value="{{ old('state') }}" type="text"></div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-3">Zip</div>
                        <div class="col-sm-9"><input class="form-control" placeholder="Zip" name="zip" value="{{ old('zip') }}" type="text"></div>
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