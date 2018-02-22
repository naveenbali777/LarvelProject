@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.sidebar')

            <div class="col-sm-10">

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['route' => 'my-group','icon' => 'fa fa-users', 'title' => 'Invites', 'subTitle' => 'Control groups over here'])

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 p-left">   
                                <div class="row"> 
                                @if( $friends->count() > 0 || $invitations->count() > 0 )

                                    <!-- <div  class="col-md-12 col-xs-12 setting-title">
                                        <div><span><i class="fa fa-link"></i></span> Group Members </div>
                                    </div>  -->
                                @endif

                                    <!-- EXISTING -->
                                    <div  class="col-sm-12 mar-bet">
                                        @include('dashboard.my-group.member-existing')
                                    </div>

                                    <br><br>

                                    <!-- Friends -->
                                    <div  class="col-sm-12 mar-bet">
                                        @include('dashboard.my-group.member-friends')
                                    </div>

                                    <br><br>

                                    <!-- NEW -->
                                    <div  class="col-sm-12 mar-bet">
                                        @include('dashboard.my-group.member-new')
                                    </div>

                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection