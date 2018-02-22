<div>    
   <p>Hi{{ !empty($user) ? ' '.$user : '' }},</p>
   <p>{{ $invited_by }} hasn't login into HereAfterlegacy.com from last 90 days so we are contacting you as {{ $invited_by }} has made you authenticator of his profile. </p>
   <p>So can you verify that {{ $invited_by }} is alive or not ?</p> 
   <p><br>
   If {{ $invited_by }} is DEAD then <a href="{{ $link }}">click here </a> </p>  

   <p><br> 
   HereafterLegacy.com Team</p>

</div>  