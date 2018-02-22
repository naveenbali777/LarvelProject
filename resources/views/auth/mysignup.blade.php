<div class="container-fluid signupContainer">
    <div class="overLay"></div>
    <div class="row">
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
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Enter username" autocomplete="off" auto required autofocus>
                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter password" autocomplete="off" auto required autofocus>
                        <input id="cpassword" type="password" class="form-control" name="cpassword" value="{{ old('cpassword') }}" placeholder="Re-enter password" autocomplete="off" auto required autofocus>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter e-mail address" autocomplete="off" auto required autofocus>
                        <input id="dob" type="text" class="form-control" name="dob" placeholder="Enter your birthday" required>
                        <button type="submit" class="form-control btn btn-orange">SIGN UP</button>
                        <a href="#" class="allreadylogin">Allready have an account? Sign in</a>
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