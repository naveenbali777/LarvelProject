<?php

namespace HereAfterLegacy\Http\Controllers\Dashboard;

use HereAfterLegacy\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use HereAfterLegacy\Repositories\UserInvitesRepository;
use HereAfterLegacy\Repositories\FolderRepository;

class MyGroupsController extends Controller
{

    /**
     * The Repository instance.
     *
     * @var HereAfterLegacy\Repository\UserInvitesRepository
     */
    protected $invites;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserInvitesRepository $invites,FolderRepository $folders) {
        $this->invites = $invites;
        $this->folders = $folders;
    }


    /**
     * Shows all inviations list with detail
     *
     * @return \Illuminate\Http\Response
     */
    public function showInvites()
    {
        $invitations = $this->invites->getMyInvitations(Auth::user()->id);

        if ($invitations->count()) {

            foreach ($invitations as $invit) {
                $invited_email = $invit->email;

                $invited_id = $invit->id;
                
                $pt_folder = $this->folders->getInvitedPrivateFolders($invited_id);
                $pb_folder = $this->folders->getInvitedPublicFolders($invited_id);           

                $pvit_inv_folder = implode(",",array_column($pt_folder, 'name'));
                $pub_inv_folder = implode(",",array_column($pb_folder, 'name'));                     

                $invit->privateFolders = $pvit_inv_folder;
                $invit->publicFolders = $pub_inv_folder;
            }
                
        }       

        $frnd = $this->invites->getMyFriends(Auth::user()->id);  

        if ($frnd->count()) {

            foreach ($frnd as $fd) {
                $frnd_email = decrypt($fd->email);
                $wpUserData = $this->invites->getWpDetails($frnd_email);

                $fd->nickName = $wpUserData->user_nicename;
                $fd->wpId = urlencode(base64_encode($wpUserData->ID));
                $fd->q = urlencode(base64_encode($fd->id));
            }
                
        }

        $pvit_folder = $this->folders->getPrivateFolders(Auth::user()->id);
        $pub_folder = $this->folders->getPublicFolders(Auth::user()->id);
               
        $data = array();
        $data['invitations'] = $invitations;
        $data['friends'] = $frnd;
        $data['private_folders'] = $pvit_folder;
        $data['public_folders'] = $pub_folder;

        return view('dashboard.my-group.main', $data);
    }


    /**
     * Sends invite to new member
     *
     * @return \Illuminate\Http\Response
     */
    public function invite(Request $request)
    { 
        if($request['plan'] == 'later'){
            $this->validate($request, [
               'plan_date' => 'after:today'
            ]);
        }

        if ( $this->invites->store($request->all(), Auth::user()->id) ) {
            if($request['plan'] == 'hereafter'){
                $message = "invitation is scheduled to be sent on Hearafter at ".$request->email;
            }elseif($request['plan'] == 'later'){
                $message = "invitation is scheduled to be sent on ".Date('d M, Y', strtotime($request['plan_date']))." at ".$request->email;
            }else{
                $message = "invitation is sent to ".$request->email." successfully!";
            }
            return redirect()->back()->with('success-message', $message);
        } else {
            return redirect()->back()->with('error-message', "OOPS, we encountered some issue while sending invitation to ".$request->email.". Please try again!");
        }
        
    }

    public function deleteInvite($id)
    {        
        if( auth::check() ){

           $row = $this->invites->getById($id);

           if ($row) {                
                $this->invites->destroy($id);
                $this->folders->deletePermission($row->invited_by,$row->email);
                
                return redirect()->back()->with('success-message', "success");
            } else {
                return redirect()->back()->with('error-message', 'Invalid Request');
            }
        } else {
            return redirect()->route('root')->with('error-message', 'Invalid Request');
        }
        
    }
}