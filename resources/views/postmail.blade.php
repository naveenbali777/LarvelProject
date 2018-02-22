@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">            
            <div class="col-sm-2 lsidebar">
                <div class="row">
                    <a href="{{ route('home') }}">
                        <div class="col-sm-12 sidebar-col">
                            <div class="row">
                                <div class="col-xs-3 sidebar-icon"><i class="fa fa-dashboard"></i></div>
                                <div class="col-xs-9">Dashboard</div>  
                            </div>
                        </div>
                    </a>
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
                    <a href="{{ route('settings') }}">
                        <div class="col-sm-12 sidebar-col">
                            <div class="row">
                                <div class="col-xs-3 sidebar-icon"><i class="fa fa-gear"></i></div>
                                <div class="col-xs-9">Settings</div>  
                            </div>
                        </div>
                    </a>  
                </div>           
            </div>          

            <div class="col-sm-10">

            @include('layouts.alert-boxes')

                <div class="row">
                    <div class="col-sm-12 titlebox">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 dashboard-icon"><i class="fa fa-gear"></i></div>        
                            <div class="col-md-10 col-sm-9 heading">SETTINGS<span class="h-tagline">Control over from here</span></div>
                        </div>
                    </div>
                </div>

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">

                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-12 set-title">Profile Settings</div>
                                    <div class="col-sm-12 set-title active" id="email_set">Posthumous Emails</div>
                                    <div class="col-sm-12 set-title">Password Settings</div>
                                    <div class="col-sm-12 set-title" id="authent_set">Authenticators</div>
                                    <div class="col-sm-12 set-title" id="dead_plan_set">Death Plan</div>
                                    <div class="col-sm-12 set-title">Delete Account</div>
                                </div>
                            </div> 
                            
                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_email">   
                                <div class="row">  
                                    <div  class="col-xs-12 setting-title">
                                        <div><span><i class="glyphicon glyphicon-envelope"></i></span> Future E-Mail Settings</div>
                                    </div>
                                    @for($i=0; $i < count($fu_detail);$i++) 
                                    <form method="POST" action="{{ route('future.email.template') }}">
                                        {{ csrf_field() }}    
                                        <input type="hidden" name="type" value="{{$fu_detail[$i]['type']}}" required="required"> 
                                        <input type="hidden" name="email_auth_id" value="{{$fu_detail[$i]['id']}}" required="required">       
                                        <div  class="col-sm-12 mar-bet">
                                            <div class="row">
                                                <div  class="col-md-2 col-xs-4">{{$fu_detail[$i]['type']}}</div>
                                                <div  class="col-md-5 col-xs-8">
                                                    <input type="email" style="width:100%" name="sender" value="{{ $fu_detail[$i]['email'] }}" placeholder="example@hereafterlegacy.com" required="required">
                                                </div>
                                                <div  class="col-md-3 col-xs-8" id="view{{$i +1}}"><a href="javascript:;" class="btn templ-btn">VIEW TEMPLATE</a></div>
                                                <div  class="col-md-2 col-xs-4"><button class="templ-btn">UPDATE</button> </div>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                        <div  class="col-sm-12 mar-bet" id="temp{{$i +1}}">                                   
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10 col-xs-12">
                                                <div class="templ-box">
                                                    <div class="row">
                                                        <div class="col-sm-12 mar-bet">
                                                            <div class="col-sm-2">Subject</div>
                                                            <div class="col-sm-10"><input type="text" style="width:100%" name="sub" value="{{ $fu_detail[$i]['subject'] }}" placeholder="Subject" required="required"></div>
                                                        </div>
                                                        <div class="col-sm-12 mar-bet">
                                                            <div class="col-sm-2">Message</div>
                                                            <div class="col-sm-10"><textarea name="msg" class="txt-box">{{ $fu_detail[$i]['message'] }}</textarea> </div>
                                                        </div>
                                                        <div class="col-sm-12 mar-bet">
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endfor
                                    
                                    <!--second-->
                                    @if(count($fu_detail) <= 3)                                    
                                        @for($k = count($fu_detail); $k < 3 ; $k++)

                                        <form method="POST" action="{{ route('future.email.template') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="type" value="{{ ($k == 0) ? 'Executor' : 'Authenticator' }}" required="required">
                                            <div  class="col-sm-12 mar-bet">
                                                <div class="row">
                                                    <div  class="col-md-2 col-xs-4">{{ ($k == 0) ? 'Executor' : 'Authenticator' }}</div>
                                                    <div  class="col-md-5 col-xs-8">
                                                        <input type="email" style="width:100%" name="sender" placeholder="example@hereafterlegacy.com" required="required">
                                                    </div>
                                                    <div  class="col-md-3 col-xs-8" id="view{{$k +1}}"><a href="javascript:;" class="btn templ-btn">VIEW TEMPLATE</a></div>
                                                    <div  class="col-md-2 col-xs-4"><button class="templ-btn">UPDATE</button> </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                            <div  class="col-sm-12 mar-bet" id="temp{{$k +1}}">                                    
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10 col-xs-12">
                                                    <div class="templ-box">
                                                        <div class="row">
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-2">Subject</div>
                                                                <div class="col-sm-10"><input type="text" style="width:100%" name="sub" placeholder="Subject" required="required"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-2">Message</div>
                                                                <div class="col-sm-10"><textarea name="msg" class="txt-box">Your Message Here</textarea> </div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endfor
                                    @endif
                               

                                </div> 



                            </div>

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_authent">   
                                <div class="row">  
                                    <div  class="col-md-12 col-xs-12 setting-title">
                                        <div><span><i class="fa fa-link"></i></span> Authenticator Settings</div>
                                    </div>


                                    <div  class="col-sm-12 mar-bet" id="auth_head" style="{{ (count($au_detail) > 0) ? 'display: block' : 'display: none' }}">
                                        <div class="row blue-text">
                                            <div  class="col-sm-3">Type</div>
                                            <div class="col-sm-3">Name</div>
                                            <div class="col-sm-4">Email</div>
                                            <div class="col-sm-2">Relation</div>    
                                        </div>
                                    </div>

                                  

                                    <div  class="col-sm-12 mar-bet">
                                        <div class="row" id="auth_exet"> 
                                        @foreach ($au_detail as $detail)                                          
                                            <div  class="col-sm-3">{{$detail->type}}</div>
                                            <div class="col-sm-3">{{$detail->name}}</div>
                                            <div class="col-sm-4">{{$detail->email}}</div>
                                            <div class="col-sm-2">{{$detail->relation}}</div>
                                        @endforeach                                           
                                        </div>
                                    </div>

                                    <!--second-->

                                    <br><br>

                                    <div class="col-sm-12 setting-title">
                                        <div><span><i class="fa fa-link"></i></span> Add New</div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-12 mar-bet"> 
                                        <div class="row">                                   
                                            <div  class="col-md-3 col-xs-12">Authenticator/Executor</div>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="templ-box">
                                                    <div class="row">
                                                        <form method="POST" action="">
                                                            {{ csrf_field() }}
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-3">Name</div>
                                                                <div class="col-sm-9"><input type="text" style="width:100%" name="name" placeholder="R X Jordon" required="required"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-3">Email</div>
                                                                <div class="col-sm-9"><input type="text" style="width:100%" name="email" placeholder= "rxjd@hearafterlegacy.com" required="required"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-3">Relation</div>
                                                                <div class="col-sm-9"><input type="text" style="width:100%" name="rel" placeholder="Friend" required="required"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-3">Type</div>
                                                                <div class="col-sm-9">
                                                                    <select name="type">
                                                                        <option value="Authenticator">Authenticator</option>
                                                                        <option value="Executor">Executor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 mar-bet">
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9"><button class="templ-btn">SAVE</button></div>
                                                            </div>
                                                        </form>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div> 

                            </div>

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_death_plan">   
                                <div class="row">  
                                    <div  class="col-sm-12 setting-title">
                                        <div><span><i class="fa fa-link"></i></span> Setup Death Plan</div>
                                    </div>
                                    <form method="POST" action="{{ route('death.plan') }}">
                                        {{ csrf_field() }}                                        

                                        <div  class="col-sm-12 mar-bet">
                                            <div class="row">
                                            @if(count($dp_detail) > 0)

                                            <div  class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="now" {{ ($dp_detail->opt == 'now') ? 'checked' : '' }}> Now</div>
                                                <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').show();" value="later"  {{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? 'checked' : '' }}>Later
                                                <p style="{{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? '' : 'display:none' }}" id="show-date">Date: <input type="text" id="datepicker" placeholder="date" name="plan_date" value="{{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? $dp_detail->opt : '' }}"></p> </div>                                
                                                <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="hereafter" {{ ($dp_detail->opt == 'hereafter') ? 'checked' : '' }}>Hereafter</div>                                                       
                                            </div> 


                                            @else

                                            <div  class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="now"> Now</div>
                                                <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').show();" value="later" > Later
                                                <p style="display:none" id="show-date">Date: <input type="text" id="datepicker" placeholder="date" name="plan_date"></p> </div>                                
                                                <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="hereafter"> Hereafter</div>                                                       
                                            </div>

                                            @endif
                                        </div> 

                                        <br><br>

                                        <div class="col-sm-12 mar-bet">
                                            <button class="templ-btn pull-right">Active</button>
                                        </div> 
                                    </form>                                  

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
