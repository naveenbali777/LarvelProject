@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            @include('dashboard.sidebar')

            <div class="col-sm-10 rsidebar">

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['route' => 'setting','icon' => 'fa fa-gear', 'title' => $account_owner."'s Account Login", 'subTitle' => "Control User's Account Here"])

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