<?php

namespace HereAfterLegacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoldersPermission extends Model
{
    use SoftDeletes;

    protected $table = "folder_permission";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'folder_id', 'get_permission_userid'
    ];
}
