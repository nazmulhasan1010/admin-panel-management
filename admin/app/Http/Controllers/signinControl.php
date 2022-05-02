<?php

namespace App\Http\Controllers;

use App\Models\usersInfo;
use Illuminate\Http\Request;

class signinControl extends Controller
{
    function signIn()
    {
        return view('signUp');
    }

// sign up
    function signUp(Request $data)
    {
        $urlimg = $data->file('profile')->store('public/publicimg');
        $imgname = explode('/', $urlimg);
        $imgnameurl = 'http://' . $_SERVER['HTTP_HOST'] . '/storage/' . $imgname[1] . '/' . $imgname[2];

        $user_ip = $_SERVER['REMOTE_ADDR'];
        $add = usersInfo::insert([
            'ip' => $user_ip,
            'email' => $data->input('email'),
            'pass' => $data->input('password'),
            'first_name' => $data->input('firstName'),
            'last_name' => $data->input('lastName'),
            'profile' => $imgnameurl
        ]);
        if ($add == true) {
            return 1;
        } else {
            return 0;
        }
    }

// exesTing Check
    function exesTingCheck(Request $email)
    {
        $email_check = "ok";
        $email_p = $email->input('email');
        $check = json_decode(usersInfo::where('email', '=', $email_p)->get());
        foreach ($check as $email_c) {
            $email_check = $email_c->email;
        }
        if ($email_check) {
            return $email_check;
        }
    }
}
