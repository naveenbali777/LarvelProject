@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.sidebar')

            <div class="col-sm-10">

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['icon' => 'fa fa-gear', 'title' => 'TIMELINE', 'subTitle' => 'List of events'])

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">

                            @include('dashboard.timeline.panel-menu')

                            <!-- NEW POST START -->


                            <!-- NEW POST END -->

                            <!-- TIMELINE START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left">   
                                <div class="row">  
                                    <div  class="col-xs-12 setting-title"> Stories from 2016 </div>

                                    @include('dashboard.timeline.post-existing')

                                </div> 
                            </div>

                            <!-- TIMELINE END -->                   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
