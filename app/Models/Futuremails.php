<?php

namespace HereAfterLegacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Futuremails extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = "future_email_templates";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email', 'subject', 'message',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
    ];
}
