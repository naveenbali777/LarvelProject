@for($i=0; $i < count($fu_detail);$i++) 
    <form method="POST" action="{{ route('future.email.template') }}" class="futuer_email">
        {{ csrf_field() }}        
        <input type="hidden" name="email_auth_id" value="{{$fu_detail[$i]['id']}}" required="required">       
        <div  class="col-sm-12 mar-bet">
            <div class="row">
                <div  class="col-md-5 col-xs-8">{{ $fu_detail[$i]['email'] }}</div>
                <div  class="col-md-2 col-xs-8 view_edit">
                    <a href="javascript:;" class="btn templ-btn">  Edit  </a>
                </div>                
                <div  class="col-md-2 col-xs-8">
                    <a href="javascript:;" id="{{ $fu_detail[$i]['id'] }}" data-method="delete" button type="button" class="btn btn-danger btn-xs delete-future-email" name="delete"><i class="fa fa-trash"></i> Delete</button></a>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div  class="col-sm-12 mar-bet temp_edit" >                                   
            <div class="col-md-2"></div>
            <div class="col-md-10 col-xs-12">
                <div class="templ-box">
                    <div class="row">
                        <div class="col-sm-12 mar-bet">
                            <div class="col-sm-2">Email</div>
                            <div class="col-sm-10"><input type="email" style="width:100%" name="sender" value="{{ $fu_detail[$i]['email'] }}" placeholder="example@hereafterlegacy.com" required="required"></div>
                        </div>
                    
                        <div class="col-sm-12 mar-bet">
                            <div class="col-sm-2">Subject</div>
                            <div class="col-sm-10"><input type="text" style="width:100%" name="sub" value="{{ $fu_detail[$i]['subject'] }}" placeholder="Subject" required="required"></div>
                        </div>
                        <div class="col-sm-12 mar-bet">
                            <div class="col-sm-2">Message</div>
                            <div class="col-sm-10"><textarea name="msg" class="txt-box" placeholder="Your Message Here" required="required">{{ $fu_detail[$i]['message'] }}</textarea> </div>
                        </div>
                        <div class="col-sm-12 mar-bet">
                            <button class="templ-btn pull-right">Save</button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </form>
@endfor