<?php

namespace HereAfterLegacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthenticateAccounts extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = "authenticate_account";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'main_user_id','authenticator_id','authenticator_user_id', 'otp' ];

    /**
     * User Detail
     *
     * @return HereAfterLegacy\Model\User
     */
    public function user()
    {
        return $this->belongsTo('HereAfterLegacy\Models\User', 'main_user_id');
    }
        
}
