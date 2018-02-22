<?php

namespace HereAfterLegacy\Repositories;

use HereAfterLegacy\Models\Folders;
use HereAfterLegacy\Models\FoldersPermission;
use HereAfterLegacy\Models\Documents;

class FolderRepository extends BaseRepository
{

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\Folders
     */
    protected $folders;

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\FoldersPermission
     */
    protected $folders_permission;

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\Documents
     */
    protected $documents;

    /**
     * Create a new FolderRepository instance.
     *
     * @param  App\Models\Folders         $folders
     * @return void
     */
    public function __construct(Folders $folders, FoldersPermission $folders_permission,Documents $documents) {
        $this->model = $folders;
        $this->folderspermission = $folders_permission;
        $this->documents = $documents;
    }


    /**
     * Saves or Updates Folders
     *
     * @param  array                           $request
     * @param  integer                         $user_id
     * @return boolean
     */
    public function storeFolder($request, $user_id)
    {
        $folder = new $this->model;
        $folder->name = $request['name'];
        $folder->user_id = $user_id;
        $folder->private = $request['type'];
        return $folder->save();
    }

    public function storeFile($request, $userId, $folderId, $filename)
    {
        $file = new $this->documents;
        $file->title            = $request['name'];
        $file->original_name    = $request['doc']->getClientOriginalName();
        $file->file_type        = $request['doc']->getClientOriginalExtension();
        $file->file_size        = $request['doc']->getClientSize();
        $file->save_file_name   = $filename;
        $file->user_id          = $userId;
        $file->folder_id        = $folderId;
        return $file->save();
    }

    public function getAllFileSize($user_id)
    {        
        return $this->documents->where('user_id',$user_id)->sum('file_size');
    }

    public function getFile($user_id, $file_id)
    {        
        return $this->documents->where('user_id',$user_id)->where('id',$file_id)->first();
    }

    public function getFolders($user_id)
    {        
        return $this->model->where('user_id',$user_id)->get();
    }

    public function getPrivateFolders($user_id)
    {        
        return $this->model->where('user_id',$user_id)->where('private','1')->get();
    }

    public function getPublicFolders($user_id)
    {        
        return $this->model->where('user_id',$user_id)->where('private','0')->get();
    }

    public function getMyFolder($id)
    {        
        return $this->model->where('id',$id)->first();
    } 

    public function getInvitedPrivateFolders($invite_id)
    {        
        return $this->folderspermission->where('invite_id',$invite_id)
                           ->join('folders','folders.id', '=','folder_permission.folder_id')
                           ->where('folders.private','1')->get()->toArray();
    }

    public function getInvitedPublicFolders($invite_id)
    {        
        return $this->folderspermission->where('invite_id',$invite_id)
                           ->join('folders','folders.id', '=','folder_permission.folder_id')
                           ->where('folders.private','0')->get()->toArray();
    }

    public function getFolderFiles($userId, $folderId)
    {        
        return $this->documents->where('user_id',$userId)->where('folder_id',$folderId)->get();
    }


    /*public function getInvitedPrivateFolders($user_id,$email)
    {        
        return $this->folderspermission->where('given_by_userid',$user_id)
                           ->where('get_permission_email',$email)
                           ->join('folders','folders.id', '=','folder_permission.folder_id')
                           ->where('folders.private','1')->get()->toArray();
    }

    public function getInvitedPublicFolders($user_id,$email)
    {        
        return $this->folderspermission->where('given_by_userid',$user_id)
                           ->where('get_permission_email',$email)
                           ->join('folders','folders.id', '=','folder_permission.folder_id')
                           ->where('folders.private','0')->get()->toArray();
    }*/

    public function deletePermission($user_id,$email)
    {        
        return $this->folderspermission->where('given_by_userid',$user_id)
                           ->where('get_permission_email',$email)->delete();

    }

    public function deletePermissionByFolderid($fid)
    {        
        return $this->folderspermission->where('folder_id',$fid)->delete();
                           
    }
    public function destroyFile($user_id, $file_id)
    {        
        return $this->documents->where('user_id',$user_id)->where('id',$file_id)->delete();
    }


    
}