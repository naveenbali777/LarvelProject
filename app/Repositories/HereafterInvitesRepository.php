<?php

namespace HereAfterLegacy\Repositories;

use HereAfterLegacy\Models\UserLoginLog;
use HereAfterLegacy\Models\User;
use HereAfterLegacy\Models\Authenticators;
use HereAfterLegacy\Models\AuthenticateAccounts;
use Mail;
use DB;

class HereafterInvitesRepository extends BaseRepository
{    

   /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\UserLoginLog
     */
    protected $hereafter;

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\User
     */
    protected $user;

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\Authenticators
     */
    protected $authenticators;

    /**
     * The Model instance.
     *
     * @var HereAfterLegacy\Models\AuthenticateAccounts
     */
    protected $authenticate_accounts;

        
    /**
     * Create a new HereafterInvitesRepository instance.
     *
     * @param  App\Models\UserLoginLog         $hereafter
     * @return void
     */
    public function __construct(UserLoginLog $hereafter, User $user, Authenticators $authenticators, AuthenticateAccounts $authenticate_accounts) {
        $this->model = $hereafter;
        $this->user = $user;
        $this->authenticators = $authenticators;
        $this->authenticate_accounts = $authenticate_accounts;
    }


    /**
     * Get Current Date from database
     *
     * @param  string
     * @return string                   $current_date
     */   

    public function currentDate(){
        $row = DB::select('select CURRENT_DATE() as cur_date');
        $current_date = $row[0]->cur_date;

        return $current_date;
    }


    /**
     * Send HereAfter mail to Authenticators by system
     *
     * @param  array                         $user_data
     * 
     */

    public function sendExecutorMail($user_data, $main_user_name )
    {
        $username = decrypt($main_user_name);
        $token = $user_data['token'];
        $link = route('user.verify.death').'?key='.$token;

        $mail = Mail::send('email.executor-user', [
                'user' => $user_data['name'],
                'invited_by' => $username,
                'link' => $link
            ], function ($m) use ($user_data) {
                $m->from('naveenbali811@gmail.com', 'HereAfter');
                $m->to($user_data['email'], $user_data['name'])->subject( env('APP_NAME').' | You Are Invited ' );
            }
        );

        return true;
    }


    public function inviteAuthenticator()
    {
        $current_date = $this->currentDate();
        $current_date = date('Y-m-d', strtotime('-3 month', strtotime($current_date)));
        $userslog = $this->model->where('last_login','<' ,$current_date.' 00:01:00')->with('user')->get();

        if($userslog->count() > 0){
            foreach ($userslog as $key => $log) {
                
                $log_user_id = $log->user_id;
                $log_user_name = $log->user->name;

                if($log_user_id){
                    $auth_users = $this->authenticators->where('user_id',$log_user_id)
                                        ->where('verify_user_death',0)->get();

                    foreach ($auth_users as $pre_user) {
                        $token = new \HereAfterLegacy\Library\UUID;
                        $hashToken = $token->limit(15);
                        $pre_user['token'] = $hashToken;

                        $row = $this->sendExecutorMail($pre_user,$log_user_name); 

                        if($row){
                            $auth_users_token = $this->authenticators->where('id',$pre_user->id)
                                        ->update(array('verify_code' =>$hashToken));                            
                        }             

                    }
                } 
            }
        }

        return true;
    }


    public function setRemider()
    {       
        $current_date = $this->currentDate();

        $thirty_date1 = date('Y-m-d', strtotime('-29 days', strtotime($current_date)));
        $thirty_date2 = date('Y-m-d', strtotime('-31 days', strtotime($current_date)));
        $this->setRemiderUser($thirty_date1, $thirty_date2, '30 days');

        $sixty_date1 = date('Y-m-d', strtotime('-59 days', strtotime($current_date)));
        $sixty_date2 = date('Y-m-d', strtotime('-61 days', strtotime($current_date)));
        $this->setRemiderUser($sixty_date1, $sixty_date2, '60 days');

        $ninety_date1 = date('Y-m-d', strtotime('-88 days', strtotime($current_date)));
        $ninety_date2 = date('Y-m-d', strtotime('-90 days', strtotime($current_date)));
        $this->setRemiderUser($ninety_date1, $ninety_date2, '89 days');

    }

    public function setRemiderUser($date1, $date2, $day_event)
    {  
        $userslog = $this->model->where('last_login','<' ,$date1.' 00:00:00')
                                ->where('last_login','>' ,$date2.' 23:59:00')->with('user')->get();

        if($userslog->count() > 0){
            foreach ($userslog as $key => $log) {
                
                $this->sendReminderMail($log->user, $day_event);
            }
        }

        return true;
    }

    public function sendReminderMail($user_data, $event_day )
    {
        $mail = Mail::send('email.hereafter-reminder', [
                'user' => decrypt($user_data['name']),
                'days' => $event_day
            ], function ($m) use ($user_data) {
                $m->from('naveenbali811@gmail.com', 'HereAfter');
                $m->to(decrypt($user_data['email']), decrypt($user_data['name']))->subject( env('APP_NAME').' | Are You Alive ? ' );
            }
        );

        return true;
    }

    public function find_authenticator($key)
    {
        $auth_users = $this->authenticators->where('verify_code',$key)->first();

        return $auth_users;
    }

    public function getAccountStatus()
    {
        $user_status = $this->authenticators->select(DB::raw("count(*) as cnt"), 'user_id')
                            ->where('verify_user_death',1)->where('verify_code',0)
                            ->groupBy('user_id')->having('cnt', '>=', 2)->get();

        return $user_status;
    }

    public function getAuthenticator($id)
    {
        $auth_user = $this->authenticators->where('type','Executor')->where('user_id',$id)->with('user')->first();
        return $auth_user;
    }

    public function sendAccountAuthenticateMail($user_data,$token)
    {
        $link = route('accept.account.authenticator').'?key='.$token;

        $mail = Mail::send('email.hereafter-auth-account', [
                'Authenticator' => $user_data['name'],                
                'main_user'=>  decrypt($user_data['user']['name']),
                'link' => $link
            ], function ($m) use ($user_data) {
                $m->from('naveenbali811@gmail.com', 'HereAfter');
                $m->to($user_data['email'], $user_data['name'])->subject( env('APP_NAME').' | Accept Account Authenticatation !' );
            }
        );

        return true;
    }

    public function saveAuthenticateAccount($user_data)
    { 
        $check_Authenticate = $this->authenticate_accounts->where('main_user_id',$user_data->user['id'])
                          ->where('authenticator_id', $user_data['id'])->with('user')->first();

        if($check_Authenticate){
            $hashToken = $check_Authenticate->token;
        }else{
            $token = new \HereAfterLegacy\Library\UUID;
            $hashToken = $token->limit(15);

            $auth_account = new $this->authenticate_accounts;
            $auth_account->main_user_id = $user_data->user['id'];
            $auth_account->authenticator_id = $user_data['id'];
            $auth_account->token = $hashToken;
            $auth_account->save();
        }
             
        return $hashToken ;
    }

    public function viewAuthenticateAccount($email,$id)
    { 
        $all_auth_accounts = $this->authenticate_accounts->where('authenticators.email',$email)
                            ->join('authenticators','authenticators.id','=','authenticate_account.authenticator_id')
                            ->with('user')->get();

        if($all_auth_accounts->count() > 0){
            foreach ($all_auth_accounts as $auth_account) {
                $this->authenticate_accounts->where('token',$auth_account->token)->update(['authenticator_user_id' => $id]);
            }
        }   
             
        return $all_auth_accounts ;
    }

    public function sentOTP($code,$email,$name)
    { 
        $check_account = $this->authenticate_accounts->where('token',$code)->with('user')->first();

        $code = new \HereAfterLegacy\Library\UUID;
        $hashCode = $code->limit(6,6);
                            
        if($check_account){

            $check_account->otp = $hashCode;
            $check_account->save();

            $mail = Mail::send('email.verify-otp-account', [     
                'name'=>  $name,
                'verify_code' => $hashCode
                ], function ($m) use ($email,$name) {
                    $m->from('naveenbali811@gmail.com', 'HereAfter');
                    $m->to($email, $name)->subject( env('APP_NAME').' | Verify-Code to Temp Login ' );
                }
            );
        }   
             
        return $check_account ;
    }


    public function getMainUser($code,$key)
    { 
        $main_account = $this->authenticate_accounts->where('token',$key)
                              ->where('otp',$code)->first();             
        return $main_account ;
    }

    public function stopEmailAutentication($key)
    { 
        $authenticator_id = $this->authenticate_accounts->where('token',$key)->value('authenticator_id');
        $this->authenticators->where('id',$authenticator_id)->update(['verify_code' => 1]);

        return true;
    }



    
}
