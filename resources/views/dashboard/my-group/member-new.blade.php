<div class="col-sm-12 setting-title">
    <div><span><i class="fa fa-link"></i></span> Send New Invitations </div>
</div>

<br><br>

<div class="col-sm-12 mar-bet"> 
    <div class="row">
        <div  class="col-md-3 col-xs-12">Member Info</div>
        <div class="col-md-9 col-xs-12">
            <div class="templ-box">
                    <form method="POST" action="{{ route('my-group.invite') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag"> Name </div>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="R X Jordon" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag"> Email </div>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" placeholder= "rxjd@hearafterlegacy.com" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag"> Relation </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="rel" placeholder="Friend" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="row">
                                @if(count($private_folders) > 0)
                                <div class="col-sm-3">
                                    <div class="input-tag"> Private Folder</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        @foreach($private_folders as $ptfolder)
                                            <div class="col-sm-3">
                                                <div class="form-group">                                           
                                                    <input type="checkbox" name="folder[]" value="{{$ptfolder->id}}" > {{ ucfirst($ptfolder->name)}}                                            
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                @endif                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                @if(count($public_folders) > 0)
                                <div class="col-sm-3">
                                    <div class="input-tag"> Public Folder</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        @foreach($public_folders as $pbfolder)
                                            <div class="col-sm-3">
                                                <div class="form-group">                                           
                                                    <input type="checkbox" name="folder[]" value="{{$pbfolder->id}}" > {{ ucfirst($pbfolder->name)}}                                            
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag"> Send Invitation On </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="radio" name="plan" onclick="$('#show-date').hide();" value="now" checked> Now
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="radio" name="plan" onclick="$('#show-date').show();" value="later"> Later
                                            <p style="display:none" id="show-date">Date: <input type="text" id="datepicker" placeholder="date" name="plan_date"></p>
                                            @if ($errors->has('plan_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('plan_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="radio" name="plan" onclick="$('#show-date').hide();" value="hereafter"> Hereafter
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button class="templ-btn">Send Invite</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
    </div>
</div>


@push('scripts')
<script>
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>
@endpush