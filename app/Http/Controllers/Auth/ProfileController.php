<?php

namespace HereAfterLegacy\Http\Controllers;

use HereAfterLegacy\Http\Controllers\Controller;
use HereAfterLegacy\Models\User;

class ProfileController extends Controller
{   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }


    /**
     * Show User Profile.
     *
     * @return void
     */

    
    public function showProfile()
    {
        if ( Auth::check() ) {
            $email = decrypt(Auth::user()->email);
            $id = Auth::user()->id;    
            $name = decrypt(Auth::user()->name);
            return view('dashboard.setting.main', compact('email','name'));
        } else {
            return response()->json(['errors' => ['error' => 'Please Login first!']]);
        }
       
    }

    public function inviteAuthenticatorForAccount()
    {
        $row  = $this->hereafter->getAccountStatus();
        
        foreach ($row as $value) {
            $main_userId = $value->user_id;            
            $auth_user  = $this->hereafter->getAuthenticator($main_userId);
            $hashToken = $this->hereafter->saveAuthenticateAccount($auth_user);
            $this->hereafter->sendAccountAuthenticateMail($auth_user,$hashToken);
        }
    }    

}