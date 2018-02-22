
<div id="new_auth" style="{{ ($au_detail->count() <= 1) ? 'display: block' : 'display: none' }}">
    <div class="col-sm-12 setting-title" >
        <div><span><i class="fa fa-user-plus"></i></span> Add New</div>
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
                                <span class="help-block emailError">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-sm-12 mar-bet">
                                <div class="col-sm-3">Relation</div>
                                <div class="col-sm-9"><input type="text" style="width:100%" name="rel" placeholder="Friend" required="required"></div>
                            </div>
                            <div class="col-sm-12 mar-bet">
                                <div class="col-sm-3">Type</div>
                                <div class="col-sm-9">
                                    <select name="type" id="exe-type" required="required">
                                        <option value="">Select</option>
                                        <option value="Authenticator" id="atr" style="{{ ($au_detail->count() == 1) ? (($au_detail[0]['type'] == 'Authenticator') ? 'display: none' : 'display: block' ) : 'display: block' }}">Authenticator</option>
                                        <option value="Executor" id="extr" style="{{ ($au_detail->count() == 1) ? (($au_detail[0]['type'] == 'Executor') ? 'display: none' : 'display: block' ) : 'display: block' }}">Executor</option>
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
