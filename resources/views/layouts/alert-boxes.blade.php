@if( Session::has('success-message') )
        <div class="row">
            <div class="col-sm-12">
@if(Route::is('root') || Route::is('password.recover.form'))
                <br>
@endif
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('success-message') }}
                </div>
            </div>
        </div>
@endif
@if( Session::has('info-message') )
        <div class="row">
            <div class="col-sm-12">
@if(Route::is('root') || Route::is('password.recover.form'))
                <br>
@endif
                <div class="alert alert-info fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('info-message') }}
                </div>
            </div>
        </div>
@endif
@if( Session::has('warning-message') )
        <div class="row">
            <div class="col-sm-12">
@if(Route::is('root') || Route::is('password.recover.form'))
                <br>
@endif
                <div class="alert alert-warning fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('warning-message') }}
                </div>
            </div>
        </div>
@endif
@if( Session::has('error-message') )
        <div class="row">
            <div class="col-sm-12">
@if(Route::is('root') || Route::is('password.recover.form'))
                <br>
@endif
                <div class="alert alert-danger fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('error-message') }}
                </div>
            </div>
        </div>
@endif