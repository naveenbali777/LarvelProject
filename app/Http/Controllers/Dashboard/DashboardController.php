<?php

namespace HereAfterLegacy\Http\Controllers\Dashboard;

use HereAfterLegacy\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use HereAfterLegacy\Repositories\UserInvitesRepository;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard.index');
    }

}