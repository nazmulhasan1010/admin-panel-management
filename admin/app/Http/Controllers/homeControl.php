<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\template;
use App\Models\visitor;
use Illuminate\Http\Request;

class homeControl extends Controller
{
    function home(Request $request)
    {
        $totalVisitor = visitor::count();
        $totalPost = template::count();
        $totalMember = teams::count();
        $newVisitor = visitor::orderBy('id', 'desc')->take(3)->get();
        $newPosts = template::orderBy('id', 'desc')->take(3)->get();
        $newMembers = teams::orderBy('id', 'desc')->take(3)->get();
        $session = $request->session()->get('userMail');
        $mail=$session['mail'];
        return view('index', [
            'totalVisitor' => $totalVisitor,
            'totalPost' => $totalPost,
            'totalMember' => $totalMember,
            'newVisitor' => $newVisitor,
            'newPosts' => $newPosts,
            'newMembers' => $newMembers
        ]);
    }
}
