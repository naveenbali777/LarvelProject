<div>
    <form method="POST" action="{{ route('future.email.template') }}">
        {{ csrf_field() }}        
        <div  class="col-sm-12 mar-bet">                                    
            <div class="col-md-2"></div>
            <div class="col-md-10 col-xs-12">                
                <div class="row">
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-2">Title</div>
                        <div class="col-sm-10"><input type="email" style="width:100%" name="sender" placeholder="Finibus Bonorum et Malorum" required="required"></div>
                    </div>
                    
                    <div class="col-sm-12 mar-bet">
                        <div class="col-sm-2">Description</div>
                        <div class="col-sm-10"><textarea name="msg" class="txt-box" placeholder="Description" required="required"></textarea> </div>
                    </div>
                    <div class="col-sm-12 mar-bet">
                        <button class="templ-btn pull-right">Save</button>
                    </div>
                </div>    
                
            </div>
        </div>
    </form>
</div>