<div class="col-sm-12 setting-title">
    <div class="row">
        <div  class="col-md-2 col-xs-12"></div>
        <div class="col-md-10 col-xs-12"><span><i class="fa fa-folder"></i></span> Create New Folder </div>
    </div>
</div>

<br><br>

<div class="col-sm-12 mar-bet"> 
    <div class="row">
        <div  class="col-md-3 col-xs-12"></div>
        <div class="col-md-9 col-xs-12">
            <div class="templ-box">
                    <form method="POST" action="{{ route('my-cloud.create') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag">Folder Name </div>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Folder Name" required="required">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-tag">Type </div>
                                </div>
                                <div class="col-sm-9">
                                    <select name="type"> 
                                        <option value="0">Public</option>
                                        <option value="1">Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button class="templ-btn"> Save </button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
    </div>
</div>