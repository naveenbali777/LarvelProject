<?php

namespace HereAfterLegacy\Models;

use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model
{
    protected $table="user_login_log";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'last_login'
    ];


    /**
     * User Detail
     *
     * @return HereAfterLegacy\Model\User
     */
    public function user()
    {
        return $this->belongsTo('HereAfterLegacy\Models\User', 'user_id');
    }

}
