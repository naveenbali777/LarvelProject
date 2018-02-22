@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.sidebar')

            <div class="col-sm-10">

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['route' => 'my-cloud','icon' => 'fa fa-cloud', 'title' => 'Folders', 'subTitle' => 'Control folders over here'])

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 p-left">   
                                <div class="row">
                                    <!-- EXISTING -->
                                    <div  class="col-md-2 col-xs-12"></div>                                    
                                    <div class="col-md-10 col-xs-12">

                                    <div class="col-sm-12">
                                    <!-- <a href="http://ec2-34-194-166-171.compute-1.amazonaws.com/hereafter_blog" class="pull-right">My Micro-Site</a> -->

                                    <div> <span>Total Size: 10 Mb</span> 
                                    <span class="pull-right">Remaining Size: {{ $remaining_size }} Mb</span></div>
    
                                    </div>
                                       @include('dashboard.my-cloud.folder-existing')
                                    </div>                                    

                                    <br><br>

                                    <!-- NEW -->
                                        @include('dashboard.my-cloud.folder-new')

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