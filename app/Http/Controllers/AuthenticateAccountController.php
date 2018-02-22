<?php

namespace HereAfterLegacy\Http\Controllers;

use Auth;
use HereAfterLegacy\Repositories\HereafterInvitesRepository;
use Illuminate\Http\Request;
//use Illuminate\Http\Session;

class AuthenticateAccountController extends Controller
{
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
    public function __construct(HereafterInvitesRepository $hereafter) {
        $this->hereafter = $hereafter;
    }


    public function index($key, Request $request)
    {        
        if ( Auth::check() ) {
            $this->validate($request, [
                'otp_code' => 'required|string',
            ]);

            $verify_otp = $request->otp_code;
            $main_user = $this->hereafter->getMainUser($verify_otp,$key);
            $main_user_id = $main_user->main_user_id;

            if($main_user_id > 0){
                session()->put('authenticator_id', Auth::user()->id);
                Auth::loginUsingId($main_user_id);
                return redirect()->route('dashboard')->with('success-message', 'success');            
            }else{
                return redirect()->back()->with('error-message', "success");
            }
        }
    }

    public function otpForAuthenticateAccount($key)
    {                
        if ( Auth::check() ) {
            $authentocator = $this->hereafter->sentOTP($key,decrypt(Auth::user()->email),decrypt(Auth::user()->name));
            $account_owner = decrypt($authentocator->user['name']);
            return view('authenticate-accounts.authenticator-login', compact('account_owner','key'));
        }
    }

    
}
