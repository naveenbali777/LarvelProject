<?php

namespace HereAfterLegacy\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use HereAfterLegacy\Http\Controllers\Controller;
use Auth;
use HereAfterLegacy\Repositories\FolderRepository;

class MyCloudController extends Controller
{

	/**
     * The Repository instance.
     *
     * @var HereAfterLegacy\Repository\FolderRepository
     */
    protected $folders;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FolderRepository $folders) {
        $this->folders = $folders;
    }


    public function index()
    {        
        if ( Auth::check() ) {
        	$all_folders = $this->folders->getFolders(Auth::user()->id); 
            $all_files_size = $this->folders->getAllFileSize(Auth::user()->id); 
            $remaining_size = round((10000000 - $all_files_size) / 1000000, 2);
            /*echo $all_files_size;

            echo "<pre>";
            print_r($all_files_size);
            die('stop');*/

            return view('dashboard.my-cloud.main', compact('all_folders','remaining_size'));
        }
        
    }

    public function createFolder(Request $request) {

    	if ( Auth::check() ) {

    		$user_id = Auth::user()->id;

    		$this->validate($request, [
               'name' => 'required|string|max:250|unique:folders,name,NULL,id,user_id,'.$user_id.',deleted_at,NULL'
            ]);

    		$save = $this->folders->storeFolder($request,$user_id);
    		return redirect()->route('my-cloud');
            
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }

    }

    public function uploadForm($id)
    {
        
        if ( Auth::check() ) {
            $user_id = Auth::user()->id;
            $all_files = $this->folders->getFolderFiles(Auth::user()->id, $id);
            $all_files_size = $this->folders->getAllFileSize(Auth::user()->id); 
            $remaining_size = round((10000000 - $all_files_size) / 1000000, 2);

            return view('dashboard.my-cloud.upload-file', compact('all_files','id','remaining_size'));
        }

    }
 
    public function uploadSubmit($id, Request $request)
    {
        
        if ( Auth::check() ) {

            $user_id = Auth::user()->id;

            $this->validate($request, [
               'doc' => 'required|max:20000'
            ]);

            $all_files_size = $this->folders->getAllFileSize(Auth::user()->id); 
            $remaining_size = (10000000 - $all_files_size);
            $current_filesize = $request->doc->getClientSize();

           /* echo $request->doc->getClientSize();

            echo "<pre>";
            print_r($request->all());
            die('stop'); */

            if ( $remaining_size > $current_filesize ) {

                $document   = $request->doc;
                $filename   = $document->store(date('Y/m/d'));

                $save = $this->folders->storeFile($request, $user_id, $id, $filename);           

                return redirect()->back()->with('success-message', "File uploaded successfully");
            } else {
                return redirect()->back()->with('error-message', "Don't have sufficient space to upload this file.");
            }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
    }

    public function downloadFile($id)
    {
        if ( Auth::check() ) {

            $user_id = Auth::user()->id;
            $entry = $this->folders->getFile($user_id, $id);

            if($entry){
                return response()->download(storage_path("app/public/".$entry->save_file_name),$entry->original_name);
            } else {
                return redirect()->route('root')->with('error-message', 'Invalid Request');
            }

        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
    }

    public function deleteFolder($id)
    {        
        if( auth::check() ){

           $row = $this->folders->getById($id);

           if ($row) {                
                $this->folders->destroy($id);
                $this->folders->deletePermissionByFolderid($id);

                return redirect()->back()->with('success-message', "success");
	        } else {
	            return redirect()->back()->with('error-message', 'Invalid Request');
	        }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
        
    }

    public function deleteFile($id)
    {        
        if ( Auth::check() ) {
            $user_id = Auth::user()->id;
            $row = $this->folders->getFile($user_id, $id);

           if ($row) {                
                $this->folders->destroyFile($user_id, $id);
                return redirect()->back()->with('success-message', "success");
            } else {
                return redirect()->back()->with('error-message', 'Invalid Request');
            }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
        
    }


}
