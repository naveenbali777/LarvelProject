<?php

namespace HereAfterLegacy\Http\Controllers\Dashboard;

use HereAfterLegacy\Http\Controllers\Controller;
use Illuminate\Http\Request;
use HereAfterLegacy\Models\Authenticators;
use HereAfterLegacy\Models\Futuremails;
use HereAfterLegacy\Models\Deathplan;
use HereAfterLegacy\Models\User;
use HereAfterLegacy\Repositories\HereafterInvitesRepository;
use HereAfterLegacy\Repositories\UserProfileRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;


class SettingsController extends Controller
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
    public function __construct(HereafterInvitesRepository $hereafter, UserProfileRepository $userprofile) {
        $this->hereafter = $hereafter;
        $this->userprofile = $userprofile;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if ( Auth::check() ) {
            $email = decrypt(Auth::user()->email);
            $id = Auth::user()->id;      
            $fu_detail = Futuremails::where('user_id', $id)->get();
            $au_detail = Authenticators::where('user_id', $id)->get();
            $dp_detail = Deathplan::where('user_id', $id)->first();

            $au_ac_detail = $this->hereafter->viewAuthenticateAccount($email,$id);

            return view('dashboard.setting.main', compact('au_detail','fu_detail','dp_detail','au_ac_detail'));
        } else {
            return 'Please Login first!';
        }
    }

    /**
     * Get a validator for an incoming profile request.
     *
     * @param  array                                    $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function pofileValidator( array $data )
    {
        return Validator::make($data, [
            'phone' => 'numeric|min:10'           
        ]);
    }

    public function updateProfile(Request $request) 
    {
        if ( Auth::check() ) {
            $validator = $this->pofileValidator($request->all());

            if ( $validator->fails() ) {
                $this->throwValidationException($request, $validator);
            }else{
                $user = User::find(Auth::user()->id);
                if($user){
                    $pro = $this->userprofile->store($request,Auth::user()->id);
                    return redirect()->route('setting')->with('success-message', 'Profile update successfully!');
                }else{
                    
                }
            }
        }

    }

    /**
     * Get a validator for an incoming password change request.
     *
     * @param  array                                    $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function passwordValidator( array $data )
    {
        Validator::extend('passwordOld', function($field, $value, $parameters) {
            return Hash::check($value, Auth::user()->password);
        });

        return Validator::make($data, [
            'old_password' => 'required|passwordOld',
            'password' => 'required|confirmed|different:old_password|min:6|regex:/(^(?=.*?[a-zA-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$)/u'           
        ],
        [           
            'old_password.password_old' => 'The Old Password is Incorrect.',
            'password.regex' => 'Password must contain atleast one alphabet,one numeric and one special character.'
        ]);

    }

    public function updatePassword(Request $request) 
    {
        if ( Auth::check() ) {
            $validator = $this->passwordValidator($request->all());
            $request['password_setting_check'] = 1;
            if ( $validator->fails() ) {
                $this->throwValidationException($request, $validator);
            }else{
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('setting')->with('success-message', 'Password changed!');
            }
        }

    }

    public function email_templates(Request $request)
    {       
        if ( Auth::check() ) {
            $id = Auth::user()->id; 
            $auth_id = $request->email_auth_id;         

            $temp =  Futuremails::where('id',$auth_id)->first();
            if ( empty($temp) ) {
                $temp = new Futuremails;
            }

            $temp->user_id = $id ;
            $temp->subject = $request->sub ;  
            $temp->email = $request->sender;
            $temp->message = $request->msg;
            $temp->type = $request->type;
            $temp->save();

            return redirect()->route('setting');
            
        } else {
            return redirect()->route('root');
        }

    }   


    public function authenticators(Request $request)
    {
        if ( Auth::check() ) {
            $user_email = decrypt(Auth::user()->email);
             $id = Auth::user()->id;

             /*$this->validate($request, [
                'email' => 'required|string|email|max:255|unique:authenticators,email,NULL,id,user_id,'.$id.',type,'.$request->type.',deleted_at,NULL'
            ]);*/

             if( $user_email != $request->email){                

                $total = Authenticators::where('user_id', $id)->count();

                if( $total < 2 ){
                    $authontir = new Authenticators;
                    $authontir->user_id = $id ;
                    $authontir->name = $request->name ;  
                    $authontir->email = $request->email;
                    $authontir->relation = $request->relation;
                    $authontir->type = $request->type;
                
                    $authontir->save();
                    $ar_id = $authontir->id;

                    return response()->json(['success' => 'success', 'count' => ($total + 1 ),'auId' => $ar_id]);
                } else {
                    return response()->json(['errors' => ['error' => 'you have not add more.']]);
                }

            } else {
                return response()->json(['errors' => ['error' => "you can't add yourself."]]);
            }

        } else {
            return response()->json(['errors' => ['error' => 'Please Login first!']]);
        }

    }

    public function death_plan_activation(Request $request)
    {
        if ( Auth::check() ) {
            $id = Auth::user()->id;       

            $plan =  Deathplan::where('user_id',$id)->first();
            if(empty($plan)){
                $plan = new Deathplan;
            }

            $plan->user_id = $id ;
            $plan->opt = ($request->plan == 'later') ? $request->plan_date : $request->plan ;  
            $plan->status = 'active';
            $plan->save();

            //return redirect()->route('setting')->with('success-message', 'Your plan is successfully activated!');
            return response()->json(['success' => 'success', 'message' => 'Your plan is successfully activated!' ]);
        } else {
            //return redirect()->route('root')->with('error-message', 'Invalid Request');
            return response()->json(['errors' => ['error' => 'Invalid Request']]);
        }

    }

    public function delete_authenticator($id) {

        if( auth::check() ){

           $userid = Auth::user()->id;
           $row = Authenticators::where('user_id', $userid)->where('id',$id)->first();

           if ($row) {                
                Authenticators::destroy($id);
                $cnt = Authenticators::where('user_id', $userid)->count();
                return response()->json(['success' => 'success', 'type' => $row->type,'cnt' => $cnt ]);

           } else {
                return response()->json(['errors' => ['error' => 'Invalid Request']]);

           }
        }
    }

    public function deleteFutureEmail($id) {

        if( auth::check() ){

           $row = Futuremails::where('id',$id)->first();

           if ($row) {                
                 Futuremails::destroy($id);

                return redirect()->back()->with('success-message', "success");
            } else {
                return redirect()->back()->with('error-message', 'Invalid Request');
            }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
    }


    public function accountDeactivate() {

        if( auth::check() ){
            $user = User::find(Auth::user()->id);
            $user->status = '2';
            $user->save();
            Auth::logout();
            return redirect()->route('root')->with('success-message', 'Now your account has been deactivated. Please contact to admin for reactivate!');
            //echo $user ;
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
    }


}
