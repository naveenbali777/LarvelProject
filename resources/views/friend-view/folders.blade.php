
@extends('friend-view.main')

@section('sub-content')

@if(count($frd_folders) > 0)

    <div class="row">
        <div  class="col-sm-12 mar-bet">
            <div class="row">
                <div class="col-md-2 col-sm-3"></div>        
                <div class="col-md-10 col-sm-9">
                    <!-- <div class="story-title"><span><i class="fa fa-folder"></i></span>Friends Folder </div> -->         

                        <div class="setting-title">
                            <div><span><i class="fa fa-folder"></i></span> Friends Folders </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>

                            @foreach($frd_folders as $folder)
                                <tr>
                                    <td>{{$folder->name}}</td>                                                
                                    <td><a href="{{ route('friend.folder.files', [$folder->given_by_userid,$folder->id]) }}" button type="button" class="btn btn-info btn-xs">Files</a> </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    

                </div>
        </div>
    </div>

@endif

@endsection
