<?php

namespace App\Http\Controllers;

use App\Models\usersInfo;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class loginControl extends Controller
{
    function login()
    {
        return view('login');
    }

    function logInfoCheck(Request $info)
    {
        $validity = usersInfo::where('email', '=', $info->input('email'))->where('pass', '=', $info->input('password'))->get();
        if ($validity == true) {
            foreach ($validity as $valid) {
                $email = $valid->email;
                $pass = $valid->pass;
            }
            if ($email == $info->input('email') && $pass == $info->input('password')) {
                return json_encode($validity);
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function temp(Request $request)
    {
        $email = $request->input('userMail');
        $pass = $request->input('pass');
        $fName=$request->input('fName');
        $lName=$request->input('lName');
        $request->session()->put('userMail', [
            'mail' => $email,
            'pass' => $pass,
            'fName'=>$fName,
            'lName'=>$lName,
            'profile'=>$request->input('profile')
        ]);
    }

    function signout(Request $request)
    {
        $status = $request->session()->forget('userMail');
        if ($status == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
