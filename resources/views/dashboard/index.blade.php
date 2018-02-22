@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            @include('dashboard.sidebar')

            <div class="col-sm-10 rsidebar">

                @include('dashboard.title-box', ['route' => 'dashboard', 'icon' => 'fa fa-dashboard', 'title' => 'DASHBOARD', 'subTitle' => 'Start from here'])
                
                <div class="row">

                    <div class="col-xs-2 rsidebar-box">
                        <div class="sub-box">Invites <br><span class="digt">05</span> </div>
                    </div>        
                    <div class="col-xs-2 rsidebar-box">
                        <div class="sub-box">Groups <br><span class="digt">14</span> </div>
                    </div>
                    <div class="col-xs-2 rsidebar-box">
                        <div class="sub-box">Stories <br><span class="digt">67</span> </div>
                    </div>        
                    <div class="col-xs-2 rsidebar-box">
                        <div class="sub-box">Folders <br><span class="digt">04</span> </div>
                    </div>
                    <div class="col-xs-2 rsidebar-box">
                        <div class="sub-box">Mails <br><span class="digt">26</span> </div>
                    </div>

                </div>
                
                <div class="row">

                    <div class="col-sm-12">
                        <div class="col-sm-6 rsidebar-vbox">
                            <iframe width="450" height="315" src="https://www.youtube.com/embed/ODTuekcrtlQ" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12 heading1">Hereafterlegacy.com</div>
                            <div class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
