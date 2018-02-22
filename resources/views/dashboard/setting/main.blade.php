@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.sidebar')

            <div class="col-sm-10">

                <div class="row" id="set-err-alt"></div>

                @include('layouts.alert-boxes')

                @include('dashboard.title-box', ['route' => 'setting','icon' => 'fa fa-gear', 'title' => 'SETTINGS', 'subTitle' => 'Control over from here'])

                <div class="row"> 
                
                    <div class="col-sm-12">
                        <div class="row">

                            @include('dashboard.setting.panel-menu')
                            
                            <!-- POSTHUMOUS EMAIL START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_email">   
                                <div class="row">  
                                    <div  class="col-xs-12 setting-title">
                                        <div><span><i class="glyphicon glyphicon-envelope"></i></span> Future E-Mail Settings <span class="pull-right pointer ad-nw" id="view_new">Add New</span></div>
                                    </div>


                                    @include('dashboard.setting.future-emails')

                                    @include('dashboard.setting.empty-future-emails')


                                </div> 
                            </div>

                            <!-- POSTHUMOUS EMAIL END -->

                            <!-- AUTHENTICATORS START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_authent">   
                                <div class="row">  

                                    @include('dashboard.setting.authenticate-accounts')

                                    <!--second-->

                                    <br><br>
                                    
                                    @include('dashboard.setting.authenticator-existing')

                                    <!--second-->

                                    <br><br>

                                    @include('dashboard.setting.authenticator-new')
                                    

                                </div> 

                            </div>

                            <!-- AUTHENTICATORS END -->

                            <!-- DEATH PLAN START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_death_plan">   
                                <div class="row">  
                                    
                                    @include('dashboard.setting.death-plan')

                                </div> 
                            </div>

                            <!-- DEATH PLAN END -->

                             <!-- PROFILE START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_profile" style="{{ (old('password_setting_check') == 1) ? 'display:none' : '' }}">   
                                <div class="row">  
                                    
                                    @include('dashboard.setting.profile-update')

                                </div> 
                            </div>

                            <!-- PROFILE END -->

                            <!-- PROFILE START -->

                            <div class="col-md-10 col-sm-9 col-xs-12 p-left" id="setting_psd" style="{{ (old('password_setting_check') == 1) ? 'display:block' : '' }}">   
                                <div class="row">  
                                    
                                    @include('dashboard.setting.password-update')

                                </div> 
                            </div>

                            <!-- PROFILE END -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
