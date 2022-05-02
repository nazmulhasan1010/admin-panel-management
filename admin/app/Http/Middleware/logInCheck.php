<?php

namespace App\Http\Middleware;

use App\Models\usersInfo;
use Closure;
use Illuminate\Http\Request;

class logInCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get('userMail');
        if ($user) {
            $mail = $user['mail'];
            $pass = $user['pass'];
            if ($mail != '' && $pass != '') {
                $validity = usersInfo::where('email', '=', $mail)->where('pass', '=', $pass)->get();
                if ($validity == true) {
                    foreach ($validity as $valid) {
                        $email = $valid->email;
                        $pa_css = $valid->pass;
                    }
                    if ($email == $mail && $pa_css == $pass) {
                        return $next($request);
                    } else {
                        return redirect('/');
                    }
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }
}
