@if( $invitations->count() > 0 )
<div class="col-sm-12 setting-title">
    <div><span><i class="fa fa-link"></i></span> Invitations Sent </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Relation</th>
            <th>Private Folders</th>
            <th>Public Folders</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

@foreach($invitations as $invitation)
        <tr>
            <td>{{ $invitation->name }}</td>
            <td>{{ $invitation->email }}</td>
            <td>{{ $invitation->relation }}</td>

            <td>{{ ($invitation->privateFolders) ? $invitation->privateFolders : '-' }}</td>            
            <td>{{ ($invitation->publicFolders) ? $invitation->publicFolders : '-' }}</td>

            <td>{{ (strtotime($invitation->invite_on) > time() || $invitation->set_invitation == 'hereafter' ) ? 'Scheduled': ($invitation->status == 0 ? 'Request Sent' : ($invitation->status == 1 ? 'Invitation Accepted' : 'Unknown Status')) }}</td>
            <td>{{ $invitation->set_invitation == 'hereafter' ? 'Hearafter' : Date('d M, Y', strtotime($invitation->invite_on)) }}</td>
            <td>@if((strtotime($invitation->invite_on) > time() || $invitation->set_invitation == 'hereafter') && $invitation->status == 0)
                    <a href="javascript:;" id="{{$invitation->id}}" data-method="delete" button type="button" class="btn btn-danger btn-xs delete-invite" name="delete"><i class="fa fa-trash"></i></button></a>
                @else
                {{'-'}}
                @endif
            </td>
        </tr>
@endforeach
    </tbody>
</table>
@endif