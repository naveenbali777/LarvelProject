@if(count($au_ac_detail) > 0)

<div  class="col-md-12 col-xs-12 setting-title">
    <div><span><i class="fa fa-vcard"></i></span> Transferred - Accounts </div>
</div>

<div  class="col-sm-12 mar-bet">
    <div class="row">		

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Account Holder</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>

            @foreach($au_ac_detail as $account)
                <tr>
                    <td>{{ decrypt($account->user->name)}}</td>
                    <td><a href="{{ route('sent.otp.login',$account->token ) }}">Login</a></td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>        

    </div>
</div>

@endif
