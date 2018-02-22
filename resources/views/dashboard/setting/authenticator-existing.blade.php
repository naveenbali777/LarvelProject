<div  class="col-md-12 col-xs-12 setting-title" style="{{ (count($au_detail) > 0) ? 'display: block' : 'display: none' }}">
    <div><span><i class="fa fa-link"></i></span> Authenticator Settings</div>
</div>


<div  class="col-sm-12 mar-bet" id="auth_head" style="{{ (count($au_detail) > 0) ? 'display: block' : 'display: none' }}">
    <div class="row blue-text">
        <div  class="col-sm-2">Type</div>
        <div class="col-sm-3">Name</div>
        <div class="col-sm-4">Email</div>
        <div class="col-sm-2">Relation</div>  
        <div class="col-sm-1">Action</div>  
    </div>
</div>

<div  class="col-sm-12 mar-bet" id="auth_exet">

@foreach ($au_detail as $detail) 
    <div class="row">                                         
        <div  class="col-sm-2">{{$detail->type}}</div>
        <div class="col-sm-3">{{$detail->name}}</div>
        <div class="col-sm-4">{{$detail->email}}</div>
        <div class="col-sm-2">{{$detail->relation}}</div>
        <div class="col-sm-1 del_authonticator" id="{{$detail->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></div>
    </div>
@endforeach                                           
    
</div>
