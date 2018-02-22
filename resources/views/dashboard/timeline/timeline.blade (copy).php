@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <!-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
            
                <div class="panel-body">
                    You are logged in!
                </div>
            </div> -->
            
            <div class="col-sm-2 lsidebar">
                <div class="row">
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-dashboard"></i></div>
                            <div class="col-xs-9">Dashboard</div>  
                        </div>

                    </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-gear"></i></div>
                            <div class="col-xs-9">Timeline</div>  
                        </div>

                    </div>
                </div>
                <div class="row">    
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-cloud"></i></div>
                            <div class="col-xs-9">my Cloud</div>  
                        </div>

                    </div>
                </div>
                <div class="row">               
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-rss"></i></div>
                            <div class="col-xs-9">my Feed </div>  
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-users"></i></div>
                            <div class="col-xs-9">my Groups</div>  
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 sidebar-col">
                        <div class="row">
                            <div class="col-xs-3 sidebar-icon"><i class="fa fa-gear"></i></div>
                            <div class="col-xs-9">Settings</div>  
                        </div>
                    </div>  
                </div>           
            </div>           
           

            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12 titlebox">
                        <div class="row">
                            <div class="col-xs-2 dashboard-icon"><i class="fa fa-gear"></i></div>        
                            <div class="col-xs-10 heading">TIMELINE<span class="h-tagline">List of events</span></div>
                        </div>
                    </div>
                </div>

                <div class="row">             

                
                    <div class="col-sm-12">
                        <div class="row">

                            <div class="col-xs-2">
                                <div class="row">
                                    <div class="col-sm-12 set-title">2017</div>
                                    <div class="col-sm-12 set-title active">2016</div>
                                    <div class="col-sm-12 set-title">2015</div>
                                    <div class="col-sm-12 set-title">2014</div>
                                    <div class="col-sm-12 set-title">older</div>
                                </div>
                            </div> 
                            
                            <div class="col-xs-10 p-left">   
                                <div class="row">  
                                    <div  class="col-sm-12 timeline-title">
                                        <div>Stories from 2016</div>
                                    </div>              
                                    <br>
                                    <div  class="col-sm-12 mar-post"> 
                                        <div class="row">                              
                                            <div class="col-sm-3">
                                                <img src="{{ asset('images/timeline-sample.png') }}">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="story-title">Finibus Bonorum et Malorum</div><br>
                                                <div>Himenaeos hac vestibulum commodo lectus potenti rhoncus natoque natoque habitant aliquet parturient vel lorem fermentum lectus natoque suspendisse sapien mus a sed.</div><br><br>
                                                <div><span>Author:</span><span class="blue-text">Cicero</span></div>
                                                <div><span>Date:</span><span class="blue-text">2017,23rd Feb</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--second-->

                                    <div  class="col-sm-12 mar-post"> 
                                        <div class="row">                              
                                            <div class="col-sm-3">
                                                <img src="{{ asset('images/timeline-sample.png') }}">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="story-title">Finibus Bonorum et Malorum</div><br>
                                                <div>Himenaeos hac vestibulum commodo lectus potenti rhoncus natoque natoque habitant aliquet parturient vel lorem fermentum lectus natoque suspendisse sapien mus a sed.</div><br><br>
                                                <div><span>Author:</span><span class="blue-text">Cicero</span></div>
                                                <div><span>Date:</span><span class="blue-text">2017,23rd Feb</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- third -->

                                    <div  class="col-sm-12 mar-post"> 
                                        <div class="row">                              
                                            <div class="col-sm-3">
                                                <img src="{{ asset('images/timeline-sample.png') }}">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="story-title">Finibus Bonorum et Malorum</div><br>
                                                <div>Himenaeos hac vestibulum commodo lectus potenti rhoncus natoque natoque habitant aliquet parturient vel lorem fermentum lectus natoque suspendisse sapien mus a sed.</div><br><br>
                                                <div><span>Author:</span><span class="blue-text">Cicero</span></div>
                                                <div><span>Date:</span><span class="blue-text">2017,23rd Feb</span></div>
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
    </div>
</div>
@endsection
