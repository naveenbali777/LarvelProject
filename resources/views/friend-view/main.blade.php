@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            @include('dashboard.sidebar')

            <div class="col-sm-10 rsidebar">

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['route' => 'my-group','icon' => 'fa fa-users', 'title' => $frd_name."'s Folders", 'subTitle' => 'Share Friend Events'])

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 p-left">   
                                
                                @yield('sub-content')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection