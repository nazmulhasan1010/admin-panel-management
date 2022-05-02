<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\template;
use App\Models\testomonials;
use App\Models\visitor;
use Illuminate\Http\Request;

class homeControl extends Controller
{
    function home()
    {
        date_default_timezone_set("Asia/Dhaka");
        $date = date('Y-m-d');
        $time = date('h:i:sa');
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        visitor::insert(['ip' => $visitor_ip, 'time' => $time, 'date' => $date]);
        $templetes = json_decode(template::orderBy('id', 'desc')->take(8)->get());
        $teams = json_decode(teams::orderBy('id', 'desc')->take(4)->get());
        $testomonials =json_decode(testomonials::orderBy('id', 'desc')->take(5)->get());

        return view('home',[
            'templetes'=>$templetes,
            'teams'=>$teams,
            'testomonials'=>$testomonials
        ]);

    }
}
