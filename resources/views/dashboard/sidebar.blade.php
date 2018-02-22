<div class="col-sm-2 lsidebar">
    <div class="row">
        <a href="{{ route('dashboard') }}">
            <div class="col-sm-12 sidebar-col{{
                Route::is('dashboard') ? ' active' : '' 
            }}">
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-dashboard"></i></div>
                    <div class="col-xs-9">Dashboard</div>  
                </div>
            </div>
        </a>
    </div>
    <div class="row"> 
        <div class="col-sm-12 sidebar-col">
            <a href="http://ec2-34-194-166-171.compute-1.amazonaws.com/hereafter_blog">
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-gear"></i></div>
                    <div class="col-xs-9">Timeline</div>  
                </div>
            </a>
        </div>
    </div>
    <div class="row">    
        <a href="{{ route('my-cloud') }}">
            <div class="col-sm-12 sidebar-col{{ (Request::route()->getPrefix() == '/my-cloud') ? ' active' : ''}}" >
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-cloud"></i></div>
                    <div class="col-xs-9">Folders</div>  
                </div>
            </div>
        </a>        
    </div>    
    <!-- <div class="row">               
        <div class="col-sm-12 sidebar-col">
            <a href="javascript:;">
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-rss"></i></div>
                    <div class="col-xs-9">my Feed </div>  
                </div>
            </a>
        </div>
    </div> -->
    <div class="row">
        <a href="{{ route('my-group') }}">
            <div class="col-sm-12 sidebar-col{{ (Request::route()->getPrefix() == '/my-group') ? ' active' : '' }}" >
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-users"></i></div>
                    <div class="col-xs-9">Invites</div>  
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <a href="{{ route('setting') }}">
            <div class="col-sm-12 sidebar-col{{
                Route::is('setting') ? ' active' : '' 
            }}">
                <div class="row">
                    <div class="col-xs-3 sidebar-icon"><i class="fa fa-gear"></i></div>
                    <div class="col-xs-9">Settings</div>  
                </div>
            </div>
        </a>  
    </div>
</div>