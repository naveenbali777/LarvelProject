
@extends('friend-view.main')

@section('sub-content')
    <div class="row">
        <div  class="col-sm-12 mar-bet">
            <div class="row">
                <div class="col-md-2 col-sm-3"></div>        
                <div class="col-md-10 col-sm-9">         

                        <div class="setting-title">
                            <div><span><i class="fa fa-folder-open"></i></span> Files </div>
                            <a href="{{ route('friend.page', $frd_id) }}" style="float:right" >Back</a>
                        </div>

                        @if(count($allFiles) > 0)

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>show</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>

                            @foreach($allFiles as $file)
                                <tr>
                                    <td>{{$file->title}}</td>
                                    <td>{{$file->file_type}}</td>                                                
                                    <td><a href="{{ route('friend.download.files', [$file->user_id,$file->folder_id,$file->id,'Document_'.base64_encode($file->id).date('Y-m-d').'.'.$file->file_type]) }}" target="_blank" button type="button" class="btn btn-info btn-xs">View</a> </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                    {{ 'Not Found' }} 


                    @endif

                </div>
        </div>
    </div>



@endsection
