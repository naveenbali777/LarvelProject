<?php

namespace HereAfterLegacy\Http\Controllers;

use HereAfterLegacy\Http\Controllers\Controller;
use HereAfterLegacy\Repositories\UserInvitesRepository;
use HereAfterLegacy\Repositories\HereafterInvitesRepository;

class HearafterController extends Controller
{

     /**
     * The Repository instance.
     *
     * @var HereAfterLegacy\Repository\UserInvitesRepository
     */
    protected $invites;

    /**
     * The Repository instance.
     *
     * @var HereAfterLegacy\Repository\HereafterInvitesRepository
     */
    protected $hereafter;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserInvitesRepository $invites, HereafterInvitesRepository $hereafter) {
        $this->invites = $invites;
        $this->hereafter = $hereafter;
    }


    /**
     * scheduledInvite for invited User.
     *
     * @return file for cronjob
     */

    public function scheduledInvite()
    {
        $row = $this->invites->getAllInvitations();        
    }

    public function hearafterReminder()
    {
       $row = $this->hereafter->setRemider();
    }
    

    public function authenticatorsInvite()
    {
        $row = $this->hereafter->inviteAuthenticator(); 
    }

    public function verify_user_status(\Illuminate\Support\Facades\Input $input)
    {
        $key = $input::get('key', '0');

        $authentocator = $this->hereafter->find_authenticator($key);

        if($authentocator){

            $authentocator->verify_user_death = 1;
            $authentocator->verify_code = 0;
            $authentocator->save();

            return redirect()->route('root')->with('success-message', "Thank you to verify user's status");

        }else{
            return redirect()->route('root')->with('error-message', 'Invalid Request');
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