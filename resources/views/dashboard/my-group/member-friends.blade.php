@if( $friends->count() > 0 )
<div class="col-sm-12 setting-title">
    <div><span><i class="fa fa-link"></i></span> Invitations Received </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Shared</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>

@foreach($friends as $frnd)
        <tr>
            <td>{{ decrypt($frnd->name) }}</td>
            <td>@if( $frnd->folder > 0 )
                <a href="{{ route('friend.page', $frnd->id) }}" >Folders</a>
            @else
                {{  '-' }}</td>
            @endif
            
            <td><a href="http://ec2-34-194-166-171.compute-1.amazonaws.com/hereafter_blog/members/{{$frnd->nickName }}/?q={{$frnd->q}}&wpiq={{$frnd->wpId}}"> Micro-Site </a></td>
        </tr>
@endforeach
    </tbody>
</table>
@endif
