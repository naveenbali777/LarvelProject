<?php

namespace HereAfterLegacy\Http\Controllers;

use Auth;
use HereAfterLegacy\Repositories\FriendFoldersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FriendsController extends Controller
{
	/**
     * The Repository instance.
     *
     * @var HereAfterLegacy\Repository\FriendFoldersRepository
     */
    protected $friendsfolders;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FriendFoldersRepository $friendsfolders) {
        $this->friendsfolders = $friendsfolders;
    }


    public function index($frd_id)
    {        
        $frd_name = $this->friendName($frd_id);
        $frd_folders = $this->friendsfolders->getFriendsFolders(Auth::user()->id, $frd_id);        	
        return view('friend-view.folders', compact('frd_name','frd_folders'));
    }

    public function friendDocuments($frd_id, $folder_id)
    {
        $frd_name = $this->friendName($frd_id);
        $folderExists = $this->friendsfolders->getFolderExists(Auth::user()->id, $frd_id, $folder_id); 

        if($folderExists){
            $allFiles = $this->friendsfolders->getFolderFiles($frd_id, $folder_id);
            return view('friend-view.show-files', compact('frd_name','allFiles','frd_id'));
        }else{
            return redirect()->back()->with('error-message', 'Invalid Request');
        } 

    }

    public function downloadFile($frd_id, $folder_id, $fileId)
    {
        $folderExists = $this->friendsfolders->getFolderExists(Auth::user()->id, $frd_id, $folder_id); 

        if($folderExists){
            $file = $this->friendsfolders->getSingleFile($fileId);
            if($file){
                return response()->file(storage_path("app/public/".$file->save_file_name));
                //return response()->download(storage_path("app/public/".$file->save_file_name),$file->original_name);
            }else{
                return redirect()->back()->with('error-message', 'Invalid Request');
            } 
        }else{
            return redirect()->back()->with('error-message', 'Invalid Request');
        } 

    }

    private function friendName($fid)
    {        
        return decrypt($this->friendsfolders->getUserName($fid));       
    }

    
}
