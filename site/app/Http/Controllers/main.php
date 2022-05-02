<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main extends Controller
{
    function home()
    {
return view('home');
    }

    function about()
    {
        return view('about');
    }

    function demo()
    {
        return view('demos');
    }

    function service()
    {
        return view('services');
    }
}
