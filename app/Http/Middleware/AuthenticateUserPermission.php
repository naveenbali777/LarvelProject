<?php

namespace HereAfterLegacy\Http\Middleware;
use HereAfterLegacy\Models\UserInvites;
use Auth;
use Closure;

class AuthenticateUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() ) {
            $count = UserInvites::where('invited_by',$request->friendId)->where('user_id',Auth::user()->id)->count();
            if($count <= 0){
                return redirect('/');
            }

            return $next($request);
        } else {
            return redirect()->route('root')->with('error-message', 'Please Login first !');
        }
    }
}
