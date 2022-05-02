<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class raf extends Controller
{
    function getsession(Request $request)
    {
        $session = $request->session()->get('userMail');
        $mail = $session['mail'];
        $fn = $session['fName'];
        $ln = $session['lName'];
        $pf = $session['profile'];
        return view('raf', ['mail' => $mail, 'fn' => $fn, 'ln' => $ln, 'pf' => $pf]);
    }
}
