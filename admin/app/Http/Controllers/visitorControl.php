<?php

namespace App\Http\Controllers;

use App\Models\adminvisitor;
use App\Models\visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class visitorControl extends Controller
{
    function visitor()
    {
        date_default_timezone_set("Asia/Dhaka");
        $date = date('Y-m-d');
        $time = date('h:i:sa');
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        adminvisitor::insert(['ip' => $visitor_ip, 'time' => $time, 'date' => $date]);
        return view('visitor');
    }

    function visitorsInfo()
    {
        $data = visitor::orderBy('id', 'desc')->get();
        return $data;
    }

    function visitorsDelete(Request $deleteId)
    {
        $delete = visitor::where('id', '=', $deleteId->input('deleteId'))->delete();
        if ($delete == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function newvisitorMonitor()
    {
        date_default_timezone_set("Asia/Dhaka");
        $date = date('Y-m-d');
        $time = date('h:i:sa');
        $last_seen = json_decode(adminvisitor::orderBy('id', 'desc')->take(1)->get());
        $user_last_seen = json_decode(visitor::orderBy('id', 'desc')->take(1)->get());
        foreach ($last_seen as $a_li) {
            $admin_lt = $a_li->time;
            $admin_dt = $a_li->date;
        }
        foreach ($user_last_seen as $u_li) {
            $user_lt = $u_li->time;
            $user_dt = $u_li->date;
        }
        $user_visit = visitor::where('date', '>', $admin_dt)->count();
        $admin_visit = adminvisitor::where('date', '<=', $user_dt)->count();
        if ($admin_visit > 0) {
            if ($user_visit == 0) {
                $user_visit_bt = visitor::where('time', '>', $admin_lt)->where('date', '=', $date)->count();
                return $user_visit_bt;
            } else {
                $user_visit_bt = visitor::where('time', '>', $admin_lt)->where('date', '=', $date)->count();
                return $user_visit_bt + $user_visit;
            }
        } else {
//            return 0;
        }
    }
}
