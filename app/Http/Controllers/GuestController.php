<?php

namespace HereAfterLegacy\Http\Controllers;

use HereAfterLegacy\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use HereAfterLegacy\Models\User;
use HereAfterLegacy\Models\UserLoginLog AS LoginLog;
use HereAfterLegacy\Models\UserInvites;
use HereAfterLegacy\Models\wpUser;
use HereAfterLegacy\Models\Authenticators;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use HereAfterLegacy\Repositories\UserInvitesRepository;
use HereAfterLegacy\Repositories\HereafterInvitesRepository;

class GuestController extends Controller
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
     * Verifies User Account.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyAccount(\Illuminate\Support\Facades\Input $input)
    {
        $key = $input::get('key', '0');
        $token = $input::get('token', '0');

        $user = User::where('verify_code', $key)->first();
        $token = Hash::make(decrypt($token));

        if ( $user == null ) {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }

        if( Hash::check(decrypt($user->email), $token) ) {
            $user->status = "1";
            $user->verify_code = Hash::make($key);
            $user->save();

            wpUser::updateStatus(decrypt($user->email));

            return redirect()->route('root')->with('success-message', 'Your account is successfully activated! You can Login now');
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
    }


    /**
     * Show the reset password form.
     *
     * @param  \Illuminate\Support\Facades\Input       $request
     * @return redirection
     */
    public function forgotPassword(\Illuminate\Support\Facades\Input $input)
    {
        $key = $input::get('key', 0);

        if( $key ) {
            $user = User::where('verify_code', $key)->first();

            if( null !== $user ) {
                return view('auth.passwords.reset', ['token' => $key]);
            }
        }

        return redirect()->route('root')->with('error-message', 'Invalid URL');
    }


    /**
     * Show the forgot password page.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordForm()
    {
        return view('auth.passwords.recover');
    }


    /**
     * Reset password.
     *
     * @param  Illuminate\Http\Request                  $request
     * @return redirection
     */
    public function resetPassword(Request $request)
    {
        if($request->password === $request->password_confirmation) {

            $validator = $this->validator($request->all());
     
            if ( $validator->fails() ) {
                $this->throwValidationException(
                    $request, $validator
                );
            }
            $user = User::where('verify_code', $request->token)->first();

            $user->password = Hash::make($request->password);
            $user->verify_code = Hash::make($request->token);
            $user->save();

            return redirect()->route('root')->with('success-message', 'Password changed!');
        } else {
            return redirect()->back()->with('error-message', 'Password do not match');
        }
    }


    /**
     * Get a validator for an incoming login request.
     *
     * @param  array                                    $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make(
            $data,
            ['password' => 'required|confirmed|min:6|regex:/(^(?=.*?[a-zA-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$)/u',],
            ['password.regex' => 'Password must contain atleast one alphabet,one numeric and one special character.']
        );   
    }
    

    /**
     * Login user.
     *
     * @param  Illuminate\Http\Request                  $request
     * @return redirection
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $userData = $this->checkEmail($request->email);

        if ( !empty($userData) ) {

            if ( $userData['status'] == '0' ) {

                return redirect()->back()->with('error-message', 'Email is not confirmed for this account. Please check your inbox for confirmation link.')->withInput($request->input());

            } else if ( $userData['status'] == '2' ) {

                return redirect()->back()->with('error-message', 'Your account has been deactivated. Please contact to admin for reactivate!')->withInput($request->input());

            } else {

                if ( Auth::attempt(['email' => $userData['email'], 'password' => $request->password, 'status' => '1']) ) {

                    $log = LoginLog::where('user_id', Auth::user()->id)->first();

                    if ( $log == null ) {
                        $log = new LoginLog;
                        $log->user_id = Auth::user()->id;
                    }

                    $log->last_login = Date('Y-m-d h:i:s', time());

                    if ( $log->save() ) {

                        return redirect('/php-login.php?user='.$request->email.'&pwd='.$request->password);  
                      
                    } else {
                        echo "error saving log";
                        exit;
                    }
                } else {
                    return redirect()->back()->with('error-message', 'Invalid Login')->withInput($request->input());
                }

            }


        } else {

            return redirect()->back()->with('error-message', "User does't exists");

        }
    }


    /*
    * Matches the email for User
    * @param  string                                    $email
    * @return array
    */
    public function checkEmail($email)
    {
        $userArray = array();
        $user = User::get();

        if ( ! empty($user) ) {
            foreach ($user->toArray() as $key => $value) {
                $dcrptEmail = decrypt($value['email']);
                if ( $email == $dcrptEmail ) {

                    $userArray['id'] = $value['id'];
                    $userArray['email'] = $value['email'];
                    $userArray['status'] = $value['status'];
                    break;

                }
            }
        }

        return $userArray;
    }


    /**
     * Accepts User Registeration for user with invitation code
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptInvitation(\Illuminate\Support\Facades\Input $input)
    {
        if ( ! Auth::guest() ) {
            Auth::logout();
        }

        if (  empty($input::get('key')) ) {
            return redirect()->route('root');
        }

        $userKey = $input::get('key');

        $invite = UserInvites::where('token', $userKey)->first();        

        if ( ! $invite == null ) {

            $userData = $this->checkEmail($invite->email);

            if ( !empty($userData) ) {
                $invite->user_id = $userData['id'];
            }

            $invitedUserData = User::where('id',$invite->invited_by)->first();
            $invited_by = decrypt($invitedUserData->name);
            
            $token = new \HereAfterLegacy\Library\UUID;
            $hashToken = $token->limit(15);

            $invite->status = 1;
            $invite->token = $hashToken;

            if ($invite->save()) {
                 return redirect()->route('root')->with('success-message', 'Thank you for accepting the invitation request from '.$invited_by.'. Please register, confirm your registration email and login to view the private content of '.$invited_by.'.');
            }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid URL');
        }
    }

    public function accpetAuthenticatorForAccount(\Illuminate\Support\Facades\Input $input)
    {        
        if ( ! Auth::guest() ) {
            Auth::logout();
        }
        if (  empty($input::get('key')) ) {
            return redirect()->route('root');
        }

        $userKey = $input::get('key');
        $row = $this->hereafter->stopEmailAutentication($userKey);
        return redirect()->route('root')->with('success-message', "Thank you for accepting the invitation. Please register, confirm your registration email and login to control the user-Account in Setting-section.");
    }

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

    public function userLogout()
    {
        if(session()->exists('authenticator_id')){
            $authenticator_id = session()->get('authenticator_id');
            Auth::loginUsingId($authenticator_id);
            session()->forget('authenticator_id');
            return redirect()->route('dashboard')->with('success-message', 'success'); 

        }else{

            Auth::logout();
            return redirect()->route('root');
        }
       
    }



}