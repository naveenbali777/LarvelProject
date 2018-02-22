@if( $all_folders->count() > 0 )
<div class="col-sm-12 setting-title">
    <div><span><i class="fa fa-folder"></i></span> Folders </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Delete</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        
    </tr>

@foreach($all_folders as $folder)
        <tr>
            <td>{{$folder->name}}</td>
            <td>{{ ($folder->private == 1) ? 'Private': 'Public' }}</td>
            <td><a href="javascript:;" id="{{ $folder->id }}" data-method="delete" button type="button" class="btn btn-danger btn-xs delete-folder" name="delete"><i class="fa fa-trash"></i> Delete</button></a> 
            </td>
            <td><a href="{{ route('View.upload-file', $folder->id) }}" button type="button" class="btn btn-info btn-xs" name="delete">View</a> </td>
      
        </tr>
@endforeach
    </tbody>
</table>
@endif