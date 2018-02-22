<?php

namespace HereAfterLegacy\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = "documents";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'folder_id', 'title', 'user_id', 'original_name'
    ];

}
